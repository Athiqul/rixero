<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userslist extends CI_Controller 
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
		
	}

	public function index()
	{		
		$data = array();
		$data['page_title'] = 'USERS LIST';
		$data['UsersAr'] =$UsersAr=$this->getUserDetails();
		//echo "<pre>"; print_r($UsersAr); exit(); 
		$this->load->view('admin/userslist/user_list',$data);
	}

	public function getUserDetails()
	{
		$this->db->select('*');
		$this->db->order_by('user_id','desc');
		return $this->db->get('user_tbl')->result_array();
	}

	public function viewUser($user_id=0)
	{
				
		$data = array();
		$data['user_id']=$user_id;
		$data['page_title'] = 'USER DETAILS';
		$data['userAr']=$userAr=$this->detailsShow($user_id);
		//print_r($userAr);exit();
		$this->load->view('admin/userslist/detailshow',$data);
	
	}
	
	public function detailsShow($user_id=0)
	{
		$this->db->SELECT('*');
    	$this->db->where('user_id',$user_id);
    	return $this->db->get('user_tbl')->result_array();
	}
	
	public function updateStatus($user_id='0',$status='')
	{
	   if(intval($user_id)>0 && $status!='')
        {
            $data['isActive'] = $status;
            $this->db->where('user_id',$user_id)->update('user_tbl',$data);
            $this->session->set_flashdata('success','Status Updated Successfully...');

        }
	    redirect(ADMIN_USERSLIST_LIST_URL);
	}
	public function deleteUser($user_id=0)
	{
		$this->db->where('user_id',$user_id)->delete('user_tbl');
		$this->session->set_flashdata('success','Deleted Successfully...');
		redirect(ADMIN_USERSLIST_LIST_URL);
	}
}