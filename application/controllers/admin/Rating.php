<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {
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


	public function index()
	{		
		$data = array();
		$data['page_title'] = 'Rating';
		$data['rateAr']=$rateAr=$this->getlist();
	
		$this->load->view('admin/transaction/rating',$data);
	}


	public function getlist()
	{
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		$this->db->select('r.*,t.t_name,u.first_name,u.last_name');
		$this->db->join('tb_task as t','t.task_id=r.task_id','left');
		$this->db->join('tbl_mst_users as u','u.user_id=r.designer_id','left');
		if($user_type=='DESIGNER')
		{
			$this->db->where('r.designer_id',$user_id);
		}
		return $this->db->get('tbl_rating as r')->result_array();



	}
}