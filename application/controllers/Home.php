<?php

defined('BASEPATH') OR exit('No direct script access allowed');





  

class Home extends CI_Controller {

	

	public function index()

	{

		$data = array();

		$data['page_title'] = 'Home';
		$data['designAr']=$designAr=$this->getDesign();			
		$data['topCatAr']=$topCatAr=$this->getTopCategory();			

		$this->load->view('frontend/index',$data);

	}
	public function getinfo()
	{
		ini_set('display_errors', 0);
		error_reporting(0);
		echo phpinfo();
	}

public function getDesign()
	{
		$this->db->select();
		return $this->db->get('master_page')->result_array();
	}


	public function getTopCategory()
	{
		$this->db->select();
		$this->db->where('status','1');
		return $this->db->get('top_category')->result_array();
	}






}