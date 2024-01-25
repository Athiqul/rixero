<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
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
		$data['page_title'] = 'Banner List';
		
		$data['bannerAr']=$this->common_model->getBannerList();
		
		$this->load->view('admin/banner/list',$data);
	}

	public function add_banner($banner_id=0)
	{		
		$data = array();
		$data['page_title'] = 'Add New Banner';
		$data['banner_id']=$banner_id;
		$data['bannerAr']=$this->common_model->getBannerDetails($banner_id);
		$this->load->view('admin/banner/add',$data);
	}
	public function savebanner()
	{
		$data=array();
		$banner_id=isset($_POST['banner_id'])?$_POST['banner_id']:'';
		$data['b_name']=isset($_POST['b_name'])?$_POST['b_name']:'';
		$data['b_desc']=isset($_POST['b_desc'])?$_POST['b_desc']:'';
		if($banner_id>0)
		{
			$this->db->where('banner_id',$banner_id)->update('tbl_banner',$data);
			$this->session->set_flashdata('success','Updated Successfully');
		}else
		{
			$this->db->insert('tbl_banner',$data);
			$this->session->set_flashdata('success','Banner Added successfully');
		}
		redirect(ADMIN_BANNER_LIST_URL);
	}

	public function updateStatus($user_id='',$status='')
	{
		$res=$this->common_model->updateStatusbanner($user_id,$status);
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_BANNER_LIST_URL);
	}

	public function deleteBanner($user_id=0)
	{
		$res=$this->db->where('banner_id',$user_id)->delete('tbl_banner');
		if($res)
		{
			$this->session->set_flashdata('success','User Deleted successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_BANNER_LIST_URL);

	}



	


	
} 

