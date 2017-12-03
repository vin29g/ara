<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CostModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();

	}

	public function saveBasicInfo(){
		session_unset();
		$data=array(
			'name'=>$this->input->post('name'),
			'rollno'=>$this->input->post('rollno'),
			'course_type'=>$this->input->post('course_type'),
			'batch'=>$this->input->post('batch'),
			'branch'=>$this->input->post('branch'),
			'country'=>$this->input->post('country'),
			'contact'=>$this->input->post('contact'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'ipaddress'=>$this->input->ip_address(),
			'useragent'=>$this->input->user_agent()
		);
		$this->session->set_userdata('step1_data', $data);
		return $data;
	}

	public function saveSelectedScripts(){
		$data=array(
			'transcripts'=>$this->input->post('transcripts'),
			'degree_certi'=>$this->input->post('degree_certi'),
			'con_grade_sheet'=>$this->input->post('con_grade_sheet'),
			'sem_grade_sheet'=>$this->input->post('sem_grade_sheet'),
			'sem'=>array(),
			'bonafide_certi'=>$this->input->post('bonafide_certi'),
			'medium_of_instruction'=>$this->input->post('medium_of_instruction'),
			'conversion'=>$this->input->post('conversion'),
			'tcmigration'=>$this->input->post('tcmigration')
		);
		for ($i=1; $i <=8 ; $i++) {
			$data['sem'][$i]=$this->input->post('s'.$i);
		}

		$this->session->set_userdata('selected_scripts', $data);

	}

	//to be called while uploading the file
	public function createRequestID(){

		$userInfo=$this->session->userdata('step1_data');
		$this->load->helper('string');
		$rno=$userInfo['rollno'];
		$req_id=0;
		do{
			$rand=random_string('numeric',16-strlen($rno));
			$req_id=$rno.$rand;
			$query=$this->db->select('request_id')->from('request_services')->where('request_id',$req_id)->get();
		}while($query->num_rows>0);
		$this->session->set_userdata('req_id',$req_id);
		return true;
	}

	public function saveUploadedFiles(){
		$userinfo=$this->session->userdata('step1_data');
		$dir='/var/www/html/ara/uploads/transcripts/'.$this->session->userdata('req_id');
		//print($dir);
		if( is_dir($dir) === false )
		{
			mkdir($dir,0777,true);
			//$this->session->set_flashdata('warning', "creating Directory! at ".$dir);
		}
		else{
			//  $this->session->set_flashdata('message', "Error creating Directory! at ".$dir);
		}
		$config['upload_path'] = $dir.'/';
		$config['allowed_types'] = 'jpg|png|docx|doc|jpeg|zip|pdf';
		$config['max_size'] = '10000';

		$saveData=array(
			'secondary_type'=>$this->input->post('secondary_type')
		);

		$this->load->library('upload');
		foreach ($_FILES as $fieldname => $fileObject)  //fieldname is the form field name
		{
		    if (!empty($fileObject['name']))
		    {
		        $this->upload->initialize($config);
		        if (!$this->upload->do_upload($fieldname))
		        {
		            $errors = $this->upload->display_errors();
		            $this->session->set_flashdata('info',$errors);
		        }
		        else
		        {
					$filedata=$this->upload->data();
		             $this->session->set_flashdata('info',"Upload success for ".$fileObject['name']);
		        }
		    }
				// echo $fieldname;
		}
		$saveData['doc1']=$_FILES['doc1']['name'];
		$this->session->set_userdata('uploadData',$saveData);

		return TRUE;
	}
	public function saveUploadedDocs($req_id){
		$data=array(
			'request_id'=>$req_id,
			'doc1'=>$_FILES['doc1']['name'],
			'secondary_type'=>$this->input->post('secondary_type')
		);
		if($this->saveUploadedFiles()){
			$this->db->insert("uploaded_documents",$data);
			return true;
		}
		else
		return false;
	}

	public function saveUserRequest($user_id){
		//find out the service for the services requested
		$session_data=$this->session->all_userdata();
		$requested_services=$this->session->userdata('requested_services');
		$req_id=$session_data['req_id'];

		$data=array();
		for ($i=0; $i < sizeof($requested_services) ; $i++) {
			array_push($data,array(
				'request_id'=>$req_id,
				'service_id'=>$requested_services[$i]
			));
		}
		$this->db->insert_batch("request_services",$data);
		//var_dump($session_data['price']);
		if($session_data['price'] == 0)
			$status=1;
		else
			$status=0;
		//===========User_requests table=====================
		$data=array(
			'request_id'=>$req_id,
			'user_id'=>$user_id,
			'status'=>$status,
			'sem_list'=>$session_data['sem_list']
		);

		$this->db->insert("user_requests",$data);
		$this->saveUploadedDocs($req_id);

	}

	public function updateUserRequest($reqid)
	{
		$q = "UPDATE user_requests SET status = 2 where request_id = $req_id";
		$this->db->query($q);
		return;
	}
	public function saveUserInfo(){
		$session_data=$this->session->all_userdata();
		//=========Save basic info===================
		$data=array();
		$user_data=$session_data['step1_data'];
		$data['name']=$user_data['name'];
		$data['rollno']=$user_data['rollno'];
		$data['course_type']=$user_data['course_type'];
		$data['batch']=$user_data['batch'];
		$data['country']=$user_data['country'];
		$data['contact']=$user_data['contact'];
		$data['address']=$user_data['address'];
		$data['email']=$user_data['email'];
		$data['ipaddress']=$user_data['ipaddress'];
		$data['useragent']=$user_data['useragent'];
		$rows = $this->db->select('id')->from('courses')->where('course',$user_data['branch'])->get()->result_array();
		$data['course_id']=$rows[0]['id'];
		$user_id=0;

		$query=$this->db->select('id')->from('user_info')->where(array('rollno'=>$data['rollno'],'course_id'=>$data['course_id'],'batch'=>$data['batch']))->get();
		if($query->num_rows()==0)
		$this->db->insert("user_info",$data);

		$query=$this->db->select('id')->from('user_info')->where(array('rollno'=>$data['rollno'],'course_id'=>$data['course_id'],'batch'=>$data['batch']))->get();

		$result=$query->result_array();
		$user_id=$result[0]['id'];


		//=========Save User_Requests=================

		$this->saveUserRequest($user_id);
	}


	public function currencyConverter($from_Currency,$to_Currency,$amount) {
		$from_Currency = urlencode($from_Currency);
		$to_Currency = urlencode($to_Currency);
		$get = file_get_contents("https://finance.google.com/finance/converter?a=1&from=$from_Currency&to=$to_Currency");
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);
		$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
		return $converted_currency;
	}


	public function calculateCost(){
		$sem_list="";
		$price=0;
		$output= array();
		$requested_services=array();
		// ARRAY TO STORE EACH COST IN SESSION VARIABLES
		$cost=array(
			'transcripts5'=>0,
			'transcripts10'=>0,
			'degree_certi'=>0,
			'con_grade_sheet'=>0,
			'sem_grade_sheet'=>0,
			'bonafide_certi'=>0,
			'medium_of_instruction'=>0,
			'conversion'=>0,
			'tcmigration'=>0
		);
		$step1_data=$this->session->userdata('step1_data');
		$year=$step1_data['batch'];
		$country=$step1_data['country']==='India' ? 0 : 1;


		// ----------------------------------SELECTED SCRIPTS DATA-----------------------------
		$step2_data=$this->session->userdata('selected_scripts');
		$transcripts=$step2_data['transcripts'];
		$degree_certi=$step2_data['degree_certi'];
		$con_grade_sheet = $step2_data['con_grade_sheet'];

		$sem_grade_sheet = $step2_data['sem_grade_sheet'];
		$sem=$step2_data['sem'];
		$bonafide_certi =  $step2_data['bonafide_certi'];
		$medium_of_instruction = $step2_data['medium_of_instruction'];
		$conversion = $step2_data['conversion'];
		$tcmigration = $step2_data['tcmigration'];



		// --------------------------TRANSCRIPTS- 5 AND 10 SETS-----------------------------
		if(isset($transcripts))
		{
			$after=NULL;
			$year=NULL;
			$type=NULL;
			$query=$this->db->select('id')->from('services')->where(array('service'=>'transcripts'.
			$transcripts))->get();
			$row = $query->result_array();
			$id = $row[0]['id'];
			$query=$this->db->select('year')->from('costs')->where(array('service'=>$id))->get();
			$row = $query->result_array();
			$temp_year = $row[0]['year'];
			if(isset($temp_year))
			{
				$after = $temp_year>=$year ? 0 : 1;
			}
			$query=$this->db->select('cost,id')->from('costs')->where(array('service'=>$id,'country'=>$country,'after'=>$after,'year'=>$temp_year))->get();
			$row = $query->result_array();
			$cost['transcripts'] = $row[0]['cost'] ;
			array_push($requested_services,$row[0]['id']);
			$price = $price + $cost['transcripts'];
			$output['Transcripts -' .$transcripts. 'Sets']=$cost['transcripts'];

		}


		// ---------------------------------CONSOLIDATED GRADE SHEETS----------------------------------------
		if(isset($con_grade_sheet))
		{
			if((int)$step1_data['batch']>=2010){
				if($con_grade_sheet==0)
				$output['Consolidated Grade Sheets'.'-Original'] = $cost['con_grade_sheet'];
				elseif ($con_grade_sheet==1) {
					$output['Consolidated Grade Sheets'.'-Duplicate'] = $cost['con_grade_sheet'];
				}
			}
			else{
				$after=NULL;
				$year=NULL;
				$type=NULL;
				$query=$this->db->select('id')->from('services')->where(array('service'=>'con_grade_sheet'))->get();
				$row = $query->result_array();
				$id = $row[0]['id'];
				$query=$this->db->select('year')->from('costs')->where(array('service'=>$id,'type'=>$con_grade_sheet))->get();
				$row = $query->result_array();
				$temp_year = $row[0]['year'];
				if(isset($temp_year))
				{
					$after=$temp_year>=$year ? 0 : 1;
				}
				$query=$this->db->select('cost,id')->from('costs')->where(array('service'=>$id,'type'=>$con_grade_sheet,
				'country'=>$country,'after'=>$after,'year'=>$temp_year))->get();
				$row = $query->result_array();
				$cost['con_grade_sheet'] = $row[0]['cost'] ;
				array_push($requested_services,$row[0]['id']);
				$price = $price + $cost['con_grade_sheet'];

				if($con_grade_sheet==0)
				$output['Consolidated Grade Sheets'.'-Original'] = $cost['con_grade_sheet'];
				elseif ($con_grade_sheet==1) {
					$output['Consolidated Grade Sheets'.'-Duplicate'] = $cost['con_grade_sheet'];
				}
			}
		}

		// --------------------------------------DEGREE CERTIFICATE---------------------------------------
		if(isset($degree_certi))
		{
			//The cost is 0 for year>=2005 and this configuration is done in db

			// if((int)$step1_data['batch']>=2006){
			// 	if($degree_certi==0){
			// 		$output['Degree Certificates'.' (Original)'] = 0;
			// 	}

			// 	elseif($degree_certi==1){
			// 		$output['Degree Certificates'.' (Duplicate)'] = 0;

			// 	}
			// }
			//else{
				$after=NULL;
				$year=NULL;
				$type=NULL;
				$query=$this->db->select('id')->from('services')->where(array('service'=>'degree_certi'))->get();
				$row = $query->result_array();
				$id = $row[0]['id'];
				$query=$this->db->select('year')->from('costs')->where(array('service'=>$id,'type'=>$degree_certi))->get();
				$row = $query->result_array();
				
				$temp_year = $row[0]['year'];
				if(isset($temp_year))
				{
					$after=$temp_year>=$year ? 0 : 1;
				}
				$query=$this->db->select('cost,id')->from('costs')->where(array('service'=>$id,'type'=>
				$degree_certi,'country'=>$country,'after'=>$after,'year'=>$temp_year))->get();
				
				$row = $query->result_array();
				$cost['degree_certi'] = $row[0]['cost'];
				array_push($requested_services,$row[0]['id']);

				$price = $price + $cost['degree_certi'];


				if($degree_certi==0){
					$output['Degree Certificates'.' (Original)'] = $cost['degree_certi'];
				}

				elseif($degree_certi==1){
					$output['Degree Certificates'.' (Duplicate)'] = $cost['degree_certi'];

				}
			//}
		}


		// -----------------------------SEMESTER GRADE SHEETS-----------------------------------------
		if(isset($sem_grade_sheet))
		{
			$after=NULL;
			$year=NULL;
			$type=NULL;
			$query=$this->db->select('id')->from('services')->where(array('service'=>
			'sem_grade_sheet'))->get();
			$row = $query->result_array();
			$id = $row[0]['id'];
			$count=0;
			//write another code
			$semesters='';
			for ($i=1; $i <=8 ; $i++) {
				if(isset($sem[$i])){
					$sem_list=$sem_list.$i;
					$count=$count+1;
					$semesters = $semesters.'Sem '.$i.',';
				}
			}

			$query=$this->db->select('year')->from('costs')->where(array('service'=>$id,'type'=>$sem_grade_sheet))->get();
			$row = $query->result_array();
			$temp_year = $row[0]['year'];

			if(isset($temp_year)){
				$after=$temp_year>=$year ? 0 : 1;
			}


			$query=$this->db->select('cost,id')->from('costs')->where(array('service'=>$id,'type'=>$sem_grade_sheet,'country'=>$country,'after'=>$after))->get();
			$row = $query->result_array();
			array_push($requested_services,$row[0]['id']);
			$cost['sem_grade_sheet'] = $row[0]['cost'] * $count;
			$price = $price + $cost['sem_grade_sheet'];
			if($sem_grade_sheet==0)
			$output['Semester Grade Sheets'.'-Original'.$semesters] = $cost['sem_grade_sheet'];
			else
			$output['Semester Grade Sheets'.'-Duplicate'.$semesters] = $cost['sem_grade_sheet'];
		}

		//-------------------TC and Migration---------------
		if(isset($tcmigration)){
			$after=NULL;
			$year=NULL;
			$type=NULL;
			$temp_year=NULL;
			$query=$this->db->select('id')->from('services')->where(array('service'=>'tcmigration'))->get();
			$row = $query->result_array();
			$id = $row[0]['id'];
			$query=$this->db->select('year')->from('costs')->where(array('service'=>$id,'type'=>$tcmigration))->get();
			
			if($query->num_rows()>0){
				$row = $query->result_array();
				$temp_year = $row[0]['year'];
			}
			
			if(isset($temp_year))
			{
				$after=$temp_year>=$year ? 0 : 1;
			}
			$query=$this->db->select('cost,id')->from('costs')->where(array('service'=>$id,'type'=>$tcmigration,
			'country'=>$country,'after'=>$after,'year'=>$temp_year))->get();

			$row = $query->result_array();
			$cost['tcmigration'] = $row[0]['cost'] ;
			array_push($requested_services,$row[0]['id']);
			$price = $price + $cost['tcmigration'];
			$output['TC &amp; Migration Certicate']=(int)$tcmigration;
			
		}

		// echo $price;

		$postal_country=$step1_data['country'];
		$postal_charges=json_decode(postal_charges);
		$countries=json_decode(countries);
		$charges=$this->currencyConverter('INR','USD',1);
		// echo $charges;

		for ($i=0; $i < count($countries); $i++) {
			if($countries[$i]==$postal_country){
				// echo $postal_charges[$i];
				$postal_charge=$charges*$postal_charges[$i];
				$price=$price+(float)$postal_charge;
				// echo $price;
				$output['Postal Charges']=$postal_charge;
				break;
			}
		}
		$this->session->set_userdata('sem_list',$sem_list);
		$this->session->set_userdata('requested_services',$requested_services);
		$this->session->set_userdata('request_cost_array',$output);
		$this->session->set_userdata('costarray',$cost);
		$this->session->set_userdata('price',$price);
		
	}
}
