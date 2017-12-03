<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('auth/ion_auth');
	}
	//	Added by KK
	//	Rules to write good code
	//	Use cssStyle to add stylesheet to your page
	//	Example usage: $data['cssStyle'] = array('indexFolder/mystylesheet.min.css','moreStylesheets.css');
	//	Place your css and js inside appropriate folders
	//	Use scripts to add javascripts to your page
	//	Example usage: $data['scripts'] = array('myscript.min.js','moreScripts.js');
	//	Use _render_page to load views, do not use load->view
	//	Add current_page variable to every page
	//	Use one of the naming conventions - Camel case or snake case

	public function handle_404(){
		$this->load->view('errors/404');
	}
	public function index()
	{
		$data['title']="Home";
		$data['current_page']="home";
		$data['cssStyle']=array('index.min.css');
		$this->_render_page("index",$data);
	}

	public function applyForTranscript(){
		$data['title']="Apply For Transcript";
		$data['current_page']="applyTranscript";
		$this->_render_page("infoProcurement/applyForTranscript",$data);
	}
	public function costDescription(){
		if(count($this->input->post())==0)
			redirect('/','refresh');
		//print_r($_POST);
		$this->load->model('CostModel');
		$this->CostModel->saveSelectedScripts();
		$this->CostModel->calculateCost();

		$data['title']="showCost";
		$data['current_page']="showCost";
		$this->_render_page("infoProcurement/showCost",$data);
	}

	public function uploadDocuments(){
		if(null==$this->session->userdata('checkedCost'))
			redirect('/','refresh');
		$data['title']="Upload Documents";
		$data['current_page']="uploadDocuments";
		$this->_render_page("infoProcurement/uploadDocuments",$data);

	}

	public function selectScripts(){
		if(null==$this->input->post('name'))
			redirect('/','refresh');

		$this->load->model('CostModel');
		$data['data'] = $this->CostModel->saveBasicInfo();
		$data['title']="Select Scripts";
		$data['current_page']="selectScripts";
		$this->_render_page("infoProcurement/selectScripts",$data);

	}

	public function basicInformation(){
		$data['title']="Basic Information";
		$data['current_page']="basicinfo";
		$this->_render_page("infoProcurement/basicInformation",$data);
	}

	public function confirmCost(){
		$this->session->set_userdata('checkedCost','true');
		$userdata=$this->session->userdata('step1_data');
		if($userdata['rollno']==$this->input->post('rollno')){
			$this->session->userdata('confirmedCost',true);
			redirect(base_url().'index.php/index/uploadDocuments','refresh');
		}
	}

	public function saveDocuments(){
		$this->load->model('CostModel');

		$bool=$this->CostModel->createRequestID();
		if($bool)
		{
			// print("Hello");
			$this->CostModel->saveUploadedFiles();
		}
		else{
			$this->session->set_flashdata('message',"Unexpected failure in creating request ID. Please reinitiate the process!");
			redirect("/","refresh");
		}
		//save everything to database-starting with userInfo
		$this->CostModel->saveUserInfo();
		$userInfo=$this->session->userdata('step1_data');
		$data['request_id']=$this->session->userdata('req_id');
		$data['userdata']=$userInfo;

		/* Payubiz integration part */
		$data['email']=$userInfo['email'];
		$data['phone']=$userInfo['contact'];
		list($first,$last) = explode(" ", $userInfo['name']);
		$data['firstname'] = $first;

		$set_data = $this->session->all_userdata();

		$check_country=$userInfo['country']===0||$userInfo['country']==="India";
		$data['costString']="";
		if($check_country)
			$data['costString']="Rs. " .$set_data['price'];
		else
				$data['costString']= "$ ".$set_data['price'];
		$data['servicesChosen']="";
		foreach ($set_data['request_cost_array'] as $key => $value){
			$data['servicesChosen']=$data['servicesChosen'].$key." ";
		}
		$this->araSendMail($userInfo['email'],"ARA | WSDC-NIT Warangal, Your Request has been recorded",$data,"confirmUser");
		
		
		if($set_data['price']==0){
			$data['message']= "Request Registered Succesfully.Please Remember Your Tracking ID : ".$data['request_id'];
			$data['title']="Make Payments";
			$data['current_page']="makePayments1";
			$this->_render_page("index",$data);
		}
		else{
			$data['title']="Make Payments";
			$data['current_page']="makePayments1";
			$from   = 'USD'; /*change it to required currencies */
			$to     = 'INR';
			$data['dollarValue'] = $this->CostModel->currencyConverter($from,$to,1);
			$this->_render_page("infoProcurement/makePayments1",$data);
		}

		
	}

	// public function testConvert($from="",$to=""){
	// 	$this->load->model('CostModel');
	// 	echo $this->CostModel->convert($from,$to);
	// }

	public function transactionStatus(){
		$this->load->model('TransactionModel');
		$request_id=$this->input->post('req_id');
		$status=$this->input->post('status');
		$txnrefno=$this->input->post('txnrefno');
		$bankrefno=$this->input->post('bankrefno');
		$txnamount=$this->input->post('txnamount');
		$errorStatus=$this->input->post('errorStatus');
		//$status=(int)$status;
		$this->TransactionModel->add($request_id,$status,$txnrefno,
			$bankrefno,$txnamount,$errorStatus);
			$data['title']="Payment Status";
			$data['current_page']="paymentStatus";
			$data['txnid']=$request_id;
			$data['txnrefno']=$txnrefno;
			$data['amount']=$txnamount;
			$data['status']=$status;
		if($status==="success"){
			$this->session->set_flashdata('success',"Transaction successful! Your transaction/request id is ".$request_id." Please check your email ID provided to us!");
		}
		else if($status==="failure"){
			$this->session->set_flashdata('danger',"Transaction failure! Your transaction/request id is ".$request_id. " Please check your email ID provided to us!");
		}
		else{
			$this->session->set_flashdata('danger',"Unexpected failure");
		}
		$userInfo=$this->session->userdata('step1_data');

		$this->araSendMail($userInfo['email'],"Payment status for WSDC ARA transaction",$data,"main");
		$this->_render_page('payments/paymentStatus',$data);
	}


	//=========================  ADMIN  PORTAL======================================

	public function adminLogin(){
		$data['title']="Admin Login";
		$data['current_page']="adminLogin";
		if($this->ion_auth->is_admin())
			redirect('index/viewRequests');
		else
			redirect('auth/login');
	}

	public function viewRequests(){
		if($this->ion_auth->is_admin())
			{
		$this->load->model('AdminModel');
		$data['data'] = $this->AdminModel->getData();
		$data['title']="View Requests";
		$data['current_page']="viewRequests";
		$data['cssStyle']=array('dataTables.bootstrap.min.css','buttons.dataTables.min.css');
		$data['scripts']=array('jquery.min.js','jquery.dataTables.min.js','dataTables.bootstrap.min.js','dataTables.buttons.min.js','buttons.print.min.js','tables.js');
		$this->_render_page("admin/viewRequests",$data);
		}
		else{
			redirect('index/adminLogin');
		}
	}

	public function editRequests($id=""){
		if($this->ion_auth->is_admin())
			{
		$this->load->model('AdminModel');
		$data['data'] = $this->AdminModel->getRowData($this->input->get('id'));
		$data['title']="Edit Requests";
		$data['current_page']="editRequest";
		$this->_render_page("admin/editRequest",$data);
		}
		else{
			redirect('index/adminLogin');
		}
	}

	public function updateRequest(){

		if($this->ion_auth->is_admin())
			{
			$this->load->model('AdminModel');
			$data['data']=$this->AdminModel->updateRequest();

			$data['data'] = $this->AdminModel->getData();
			$data['title']="View Requests";
			$data['current_page']="viewRequests";
			redirect('viewRequests');
			//$this->_render_page("admin/viewRequests",$data);
		}
		else{
			redirect('index/adminLogin');
		}
	}

	//*****************************************VIEW STATUS OF APPLICATION*****************************
	public function viewStatus(){
		$data['title']="view status";
		$data['current_page']="viewStatus";
		$this->_render_page("viewStatus",$data);
	}
	public function check(){
		$this->load->model('AdminModel');
		$data['data'] = $this->AdminModel->saveId();
		$data['title']="Show Status";
		$data['current_page']="showStatus";
		$this->_render_page("showStatus",$data);
	}


	//Don't change any code under this comment

	public function araSendMail($toEmail="",$subject="ARA | WSDC NIT Warangal",$mailData="",$template="default"){
	$this->load->library('email');
	$config['mailtype']="html";
	$this->email->initialize($config);
	$this->email->from('wsdc@nitw.ac.in', 'Alumni Request Automation NIT Warangal');
	$this->email->to($toEmail);

	$this->email->subject($subject);
	$body=$this->load->view('mail-template/'.$template.'.php',$mailData,TRUE);
	$this->email->message($body);
	$this->email->send();

		}
	function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = array(
			$this->load->view("/menu/header.php", $data, $returnhtml),
			$this->load->view($view, $this->viewdata, $returnhtml),
			$this->load->view("/menu/footer.php", $data, $returnhtml)
			);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

	public function applicationForm($id=""){
		if($this->ion_auth->is_admin())
			{
		$this->load->model('AdminModel');
		$data['data'] = $this->AdminModel->getAppData($this->input->get('id'));
		$data['title']="Application Form";
		$data['current_page']="applicationForm";
		$this->_render_page("admin/applicationForm",$data);
		}
		else{
			redirect('index/adminLogin');
		}
	}

}
