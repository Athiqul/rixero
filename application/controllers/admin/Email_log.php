<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Email_log extends CI_Controller {

	function __construct()

	{

		parent:: __construct();

		if($this->session->userdata('isLoggedIn')==FALSE)

		{

			$this->session->set_flashdata('failed','Your session has expired.Please Login.');

			redirect(ADMIN_LOGIN_URL);

		}

		$user_type=$this->session->userdata('user_type');

		$user_id=$this->session->userdata('user_id');

		$this->load->model('admin/Common_model','common_model');

	}





	public function index()

	{		

		$data = array();

		$data['page_title'] = 'Email Log List';

		

		$data['listAr']=$this->getlist();

		

		$this->load->view('admin/email_log',$data);

	}


	public function getlist()
	{
		$this->db->select();
		return $this->db->get('email_log')->result_array();
	}
}
