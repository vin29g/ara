<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TransactionModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


	public function add($request_id,$status,$txnrefno,
			$bankrefno,$txnamount,$errorStatus){
		$this->load->model('CostModel', 'cost');
		if($request_id!="" && $status!=""){
			$transaction_status=0;
			if($status=="success"){
				// Success
				$transaction_status=1;
			}
			else if($status=="failure"){
				// Fail
				$transaction_status=2;
			}

			$rows=$this->db->select('user_info.country')->from('user_info')
					->join('user_requests','user_requests.user_id = user_info.id')
					->where('user_requests.request_id',$request_id)->get()->row_array();

			echo $rows['country'];
			if($rows['country'] == 'India')
			{
				$txnamount = 'Rs.'.$txnamount;
			}
			else
			{
				 $charges = $this->cost->currencyConverter('INR','USD',(float)$txnamount);
				$txnamount = '$.'.$txnamount;
			}
			$data=array(
				'request_id'=>$request_id,
				'status'=>$transaction_status,
				'txnrefno'=>$txnrefno,
				'bankrefno'=>$bankrefno,
				'txnamount'=>$txnamount,
				'errorStatus'=>$errorStatus,
				'errorDesc'=>"NA"
				);
			$this->db->insert('transactions',$data);
			if($this->db->affected_rows()>0){
				return true;
			}
			return false;
		}
	}

}