<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
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
		$data['page_title'] = 'Faq List';
		
		$data['listAr']=$this->getFaqList();
		
		$this->load->view('admin/faq_list',$data);
	}

	public function faq_add($banner_id=0)
	{		
		$data = array();
		$data['page_title'] = 'Add New FAQ';
		$data['banner_id']=$banner_id;
		$data['bannerAr']=$this->common_model->getBannerDetails($banner_id);
		$this->load->view('admin/faq_add',$data);
	}

	public function getFaqList()
	{
		$this->db->select();
		return $this->db->get('faq_tbl')->result_array();
	}

	public function updateStatus($id='',$status='')
	{
		$data['status']=$status;
		$this->db->where('id',$id)->update('faq_tbl',$data);
		$res=$this->db->affected_rows();
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_FAQ_URL);
	}

	public function deleteFAq($id=0)
	{
		$this->db->where('id',$id)->delete('faq_tbl');
		$res=$this->db->affected_rows();
		if($res)
		{
			$this->session->set_flashdata('success','Question Deleted successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_FAQ_URL);

	}


	public function saveFaq()
	{
		$data=array();

		$data['question']=isset($_POST['question'])?$_POST['question']:'';
		$data['answer']=isset($_POST['answer'])?$_POST['answer']:'';
		$this->db->insert('faq_tbl',$data);
		$this->session->set_flashdata('success','Faq Added successfully');
		redirect(ADMIN_FAQ_URL);
	}
}