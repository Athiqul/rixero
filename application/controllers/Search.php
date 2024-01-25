<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class Search extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		
   
	}
	public function index()
	{
		$data = array();
		$data['page_title'] = 'Search';		
		$data['listAr']=$this->getourWork();
		$data['workAr']=$workAr=$this->getallwork();
		// echo $this->db->last_query();
		// print_r($workAr); die();
		$this->load->view('frontend/search',$data);
	}


	public function getourWork()
	{
		$this->db->select();
		$this->db->where('status','1');
		return $this->db->get('tags')->result_array();
	}



	public function work_details($id=0)
	{
		$data = array();
		$data['page_title'] = 'Details';		
		$data['listAr']=$this->getourWorkbyId($id);
		$data['listAr1']=$this->getourWork();
		$data['activeId']=$id;
		$data['workAr']=$workAr=$this->getallwork($id);

		$this->load->view('frontend/work_deatils',$data);
	}

	public function getallwork($id=0)
	{
		$this->db->select();
		if($id>0)
		{
			$this->db->where('tag_id',$id);
		}
		return $this->db->get('tags_images')->result_array();
	}

	public function getourWorkbyId($id)
	{
		$this->db->select();
		$this->db->where('status','1');
		$this->db->where('id',$id);
		return $this->db->get('tags')->row_array();
	}
}