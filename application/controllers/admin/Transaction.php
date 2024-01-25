<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('isLoggedIn')==FALSE)
		{
			$this->session->set_flashdata('failed','Your session has expired.Please Login.');
			redirect(ADMIN_LOGIN_URL);
		}
		$this->user_type=$this->session->userdata('user_type');
		$this->user_id=$this->session->userdata('user_id');
		$this->load->model('admin/Common_model','common_model');
	}


	public function history()
	{		
		$data = array();
		$data['page_title'] = 'Transaction History';
		$data['taxtAr']=$taxtAr=$this->getTransactions();
		// echo "<pre>";
		// print_r($taskAr); die();
		$this->load->view('admin/transaction/history',$data);
	}

	public function getTransactions()
	{
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');

		$this->db->select('t.*,u1.first_name,u1.last_name,u1.user_type');
		$this->db->join('tbl_mst_users as u1','u1.user_id=t.txt_customer_id');
		if($user_type=='CUSTOMER' || $user_type=='DESIGNER')
		{
			$this->db->where('t.txt_customer_id',$this->user_id);
		}
		return $this->db->get('tbl_transaction as t')->result_array();
	}

	public function wallet()
	{
		$data = array();
		$data['page_title'] = 'Wallet History';
		$data['taxtAr']=$taxtAr=$this->getWalletTransactions();
		//echo $this->db->last_query(); die();
		// echo "<pre>";
		// print_r($taskAr); die();
		$this->load->view('admin/transaction/wallet_history',$data);
	}

	public function getWalletTransactions()
	{
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');

		$this->db->select('t.*,u1.first_name,u1.last_name,u1.user_type,tk.t_name');
		$this->db->join('tbl_mst_users as u1','u1.user_id=t.user_id');
		$this->db->join('tb_task as tk','tk.task_id=t.task_id');
		if($user_type=='CUSTOMER' || $user_type=='DESIGNER')
		{
			$this->db->where('t.user_id',$user_id);
		}
		return $this->db->get('wallet_history as t')->result_array();
	}
}
?>