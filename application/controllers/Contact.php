<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class Contact extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/common_model','common_model');
		
   
	}
	public function index()
	{
		$data = array();
		$data['page_title'] = 'Contact';		
		$data['faqAr']=$this->getFaqList();
		$this->load->view('frontend/contact_us',$data);
	}


	public function getFaqList()
	{
		$this->db->select();
		$this->db->where('status','1');
		return $this->db->get('faq_tbl')->result_array();
	}

	public function sendmsg()
	{
		$email='info.varanasi@punontechnologies.com';
		$name=isset($_POST['name'])?$_POST['name']:'';
		$lname=isset($_POST['lname'])?$_POST['lname']:'';
		$email=isset($_POST['email'])?$_POST['email']:'';
		$mobile=isset($_POST['mobile'])?$_POST['mobile']:'';
		$msg=isset($_POST['msg'])?$_POST['msg']:'';
		$subject='Inquiry about the Design';
		$body='Name='.$name.'&nbsp'.$lname.'<br>'.'Email='.$email.'<br>'.'Mobile='.$mobile.'<br>'.'message='.$msg.'<br>';
		$this->common_model->sendmail($email,$subject,$body);

		redirect(base_url('Contact'));
	}


}