<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_user extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('isLoggedIn')==FALSE)
		{
			$this->session->set_flashdata('failed','Your session has expired.Please Login.');
			redirect(site_url('admin/login'));
		}
		//check user permission
		if($this->session->userdata('user_type')=='GUESTUSER')
		{
			$this->session->set_flashdata('warning','You have restricted access.');
			redirect(ADMIN_DASHBOARD_URL);
		}
		$this->load->model('admin/Manage_user_model','manage_user_model');
	}

	public function user_details($user_id='')
	{		
		$data = array();
		$data['page_title'] = 'Users Details';
		$data['user_id'] = $user_id;
		if(intval($user_id>0)){
		$data['user_details'] =$user_details=$this->manage_user_model->getManageUserDetails($user_id);
		}
		$this->load->view('admin/manage_user/user_details',$data);
	}
	public function saveManageUser_details()
	{
		$action=$this->manage_user_model->saveManageUser_details();
		redirect(ADMIN_MANAGE_USERS_LIST_URL);
	}

	public function ManageUser_list()
	{		
		$data = array();
		$data['page_title'] = 'Users List';
		$data['UseresultAr'] =$UseresultAr=$this->manage_user_model->getManageUserDetails();
		//echo "<pre>"; print_r($UseresultAr); exit(); 
		$this->load->view('admin/manage_user/user_list',$data);
	}

	public function updateStatus($user_id='0',$status='')
	{
		$action=$this->manage_user_model->updateStatus($user_id,$status);
		redirect(ADMIN_MANAGE_USERS_LIST_URL);
	}
	public function manageUserDelete($user_id='')
	{
		$action=$this->manage_user_model->manageUserDelete($user_id);
		//echo $this->db->last_query($action);exit();
		redirect(ADMIN_MANAGE_USERS_LIST_URL);
	}
	

}