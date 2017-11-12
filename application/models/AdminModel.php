<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();

	}

	public function getRowData($id=""){
		$rows=$this->db->select('*')->from('user_requests')->where('request_id',$id)->get()->result_array();
		return $rows[0];
	}


  public function Status_value($id)
  { 
       if($id ==0)
       $answer= "Registered Succesfully";
       elseif($id == 1)
       $answer= "Payment Made";
       elseif($id ==2 )
       $answer= "Payment Succesful";
       elseif($id == 3)
       $answer= "Request Assigned" ;
       elseif($id ==4 )
       $answer= "Request Successful";
       return $answer;
 
  }

public function getData(){
	$this->db->select('user_info.name, user_info.rollno, user_info.contact, user_info.email, 
		               user_requests.request_id, user_requests.status, user_requests.sem_list, user_requests.date,user_requests.assigned, user_requests.completion_date,
		               services.description,costs.type')
	->from("user_requests")
	->join("user_info",'user_requests.user_id = user_info.id')
	->join("request_services",'request_services.request_id=user_requests.request_id')
	->join("costs",'request_services.service_id = costs.id')
	->join("services",'costs.service = services.id');


	$query = $this->db->get();
	// print_r($this->db->last_query());
  $count = $query->num_rows();
	$data = $query->result_array();



	$new_data = array();
    $i=0;
	while( $i <$count )
	{
    $data[$i]['status']= $this->Status_value($data[$i]['status']);
    if($data[$i]['completion_date']==NULL)
      $data[$i]['completion_date']="Incomplete";
    
    $typ = "";
		$temp_i = $i;
		$temp_id = $data[$i]['request_id'];
		$records = array();
    $typ = '';
		while( $i <$count  && $data[$i]['request_id'] == $temp_id)
		{
			if($data[$i]['type'] != null)
			{
				if($data[$i]['type']== 0 )
					$typ = '-Original';
				else if($data[$i]['type'] == 1)
					$typ = '-Duplicate';
		    }
      array_push($records, $data[$i]['description'].$typ);
      $this->db->select('*')->from('transactions')->where('request_id',$data[$i]['request_id']);
      $rquery=$this->db->get();
      $rresult=$rquery->result_array();
      $data[$i]['tstatus']=0;
      if(count($rresult)>0)
      $data[$i]['tstatus']=$rresult[0]['status'];
			$i = $i+1;
			$typ = "";
		}
    
		array_push($new_data,$data[$temp_i]);
		$new_data[sizeof($new_data)-1]['description']=$records;
	}
		// var_dump($data[sizeof($data)-1]);
		// echo "string \n \n";
		// var_dump($new_data[sizeof($new_data)-1]);
  return $new_data;
		
 }

  public function status_rev($status)
  {
  	  if($status == "Registered succesfully")
  	  	$answer = 0;
  	  elseif($status =="Payment made")
  	  	$answer = 1;
  	  elseif($status =="Payment Succesful")
  	  	$answer = 2;
  	  elseif($status == "request assigned")
  	  	$answer =3;
  	  elseif($status == "request Suuccessful")
  	  	$answer =4;
  	  return $answer;
  }

  public function updateRequest()
  {
  	//get current status in $current 

  	$this->db->select('status')->from('user_requests')->where('request_id',$this->input->post('req_id'));
  	$query = $this->db->get();
	$data = $query->result_array();
	$current = $data[0]['status'];
    //updated status by admin in $status
  	$status = $this->input->post('status');
  	
  	if($status != $current)
  		$flag =1; //send mail
  	else
  		$flag=0; //don't do anything
  	$assigned = $this->input->post('assigned');
  	if($status == 4)
  		$date = date("Y-m-d");
  	else
  		$date = NULL;
  	$data = array(
  		'status' => $status,
  		'completion_date' => $date,
  		'assigned' => $assigned
  	);

    $this->db->where('request_id', $this->input->post('req_id'));
    $this->db->update('user_requests',$data);
  	
  }

  public function saveId(){
		$req_id = $this->input->post('req_id');
		$this->db->select('user_requests.status, user_requests.assigned, user_requests.completion_date')
	     ->from("user_requests")
	     ->where('request_id', $req_id);
    
	$query = $this->db->get();
  if($query->num_rows()==0){
    return NULL;
  }
  
  $data = $query->result_array();
	$data[0]['status']=$this->Status_value($data[0]['status']);
	return $data[0];
       
	}


}