<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_details extends CI_Controller {
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
		
		$data['pageAr']=$this->common_model->getPagesList();
		
		$this->load->view('admin/master/pageList',$data);
	}

	public function details($id=0)
	{		
		$data = array();
		$data['page_title'] = 'Add New ';
		$data['id']=$id;
		$data['pageAr']=$this->getdetails_Byidwise($id);
		$data['bannerAr']=$this->getBannerList();
		$data['top_catAr']=$this->topCategoryList();
		$this->load->view('admin/master/page_details',$data);
	}

	public function topCategoryList()
	{
		$this->db->select();
		$this->db->where('status','1');
		return $this->db->get('top_category')->result_array();
	}
	public function getdetails_Byidwise($id=0)
	{
		$this->db->select();
		$this->db->where('id',$id);
		return $this->db->get('master_page')->row_array();
	}
	public function getBannerList()
	{
		$this->db->select();
		return $this->db->get('tbl_banner')->result_array();
	}
	public function saveDetails()
	{
		$data=array();
		$id=isset($_POST['id'])?$_POST['id']:'';
		$data['banner_id']=isset($_POST['banner_id'])?$_POST['banner_id']:'';
		$data['page_type']=isset($_POST['page_type'])?$_POST['page_type']:'';
		$data['title']=isset($_POST['title'])?$_POST['title']:'';
		$data['cost']=isset($_POST['cost'])?$_POST['cost']:'';
		$data['top_cat_id']=isset($_POST['top_cat_id'])?$_POST['top_cat_id']:'';
		if(isset($_FILES["icomImg"]["name"]) && !empty($_FILES["icomImg"]["name"]))
        {
            $config['upload_path']          = ADMIN_ICON_UPLOAD_PATH_NAME;
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
        	if($this->upload->do_upload('icomImg'))
        	   {
        	        $upload_data = $this->upload->data();
        	        $data['icon']= $upload_data['file_name'];
        	   }else
        	   {
        	   	echo $this->upload->display_errors(); die();
        	   }
        }

//print_r($data); die;
		if($id>0)
		{
			$this->db->where('id',$id)->update('master_page',$data);
			$this->session->set_flashdata('success','Updated Successfully');
		}else
		{
			$this->db->insert('master_page',$data);
			$this->session->set_flashdata('success','Banner Added successfully');
		}
		redirect(ADMIN_PAGES_LIST_URL);
	}

	public function updateStatus($id='',$status='')
	{
		$res=$this->common_model->updateStatusMaqsterPage($id,$status);
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_PAGES_LIST_URL);
	}

	public function delete($id=0)
	{
		$res=$this->db->where('id',$id)->delete('master_page');
		if($res)
		{
			$this->session->set_flashdata('success',' Deleted successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_PAGES_LIST_URL);

	}



	


	
} 

