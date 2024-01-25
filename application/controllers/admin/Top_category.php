<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top_category extends CI_Controller {
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
		$data['page_title'] = ' List';
		
		$data['listAr']=$this->tagsList();
		
		$this->load->view('admin/top_category',$data);
	}

	public function deleteTopCategory($id=0)
	{
		$this->db->where('id',$id)->delete('top_category');
		$this->session->set_flashdata('success','Category Delete successfully');
            redirect(base_url('admin/Top_category'));

	}

	public function updateStatus($id='',$status='')
	{
		$data['status']=$status;
		$this->db->where('id',$id)->update('top_category',$data);
		$res=$this->db->affected_rows();
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		            redirect(base_url('admin/Top_category'));

	}


	public function add()
	{		
		$data = array();
		$data['page_title'] = 'Add  Top Category';
		
		$data['listAr']=$this->tagsList();
		
		$this->load->view('admin/add_top_cat',$data);
	}

	


	public function tagsList()
	{
		$this->db->select();
		return $this->db->get('top_category')->result_array();
	}


	public function savetagsData()
	{
		$data=array();
		$data['cat_name']=$cat_name=isset($_POST['cat_name'])?$_POST['cat_name']:'';
		$this->db->insert('top_category',$data);
		$this->session->set_flashdata('success','Category added successfully');

		

            redirect(base_url('admin/Top_category'));
	}
}