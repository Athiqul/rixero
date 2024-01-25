<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class About_us extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		
   
	}
	public function index()
	{
		$data = array();
		$data['page_title'] = 'About Us';
		$data['designAr']=$designAr=$this->getDesign();		
		//print_r($designAr); die();
		$this->load->view('frontend/about',$data);
	}

	public function getDesign()
	{
		$this->db->select();
		return $this->db->get('master_page')->result_array();
	}
}