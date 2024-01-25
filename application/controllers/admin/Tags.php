<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {
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
		
		$data['listAr']=$this->tagsList();
		
		$this->load->view('admin/list_tag',$data);
	}


	public function add()
	{		
		$data = array();
		$data['page_title'] = 'Add Tags';
		
		$data['listAr']=$this->tagsList();
		
		$this->load->view('admin/add_tag',$data);
	}

	public function deleteTags($id=0)
	{
		$this->db->where('id',$id)->delete('tags');
		$this->session->set_flashdata('success','Tag Delete successfully');
            redirect(base_url('admin/tags'));

	}


	public function updateStatus($id='',$status='')
	{
		$data['status']=$status;
		$this->db->where('id',$id)->update('tags',$data);
		$res=$this->db->affected_rows();
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		            redirect(base_url('admin/tags'));

	}


	public function tags_images($id=0)
	{
		$data = array();
		$data['page_title'] = 'Add Tags';
		
		$data['workAr']=$this->getallwork($id);
		
		$this->load->view('admin/tags_images',$data);
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

	


	public function tagsList()
	{
		$this->db->select();
		return $this->db->get('tags')->result_array();
	}


	public function savetagsData()
	{

		$tag_id=isset($_POST['tag_id'])?$_POST['tag_id']:'';
		/* MULITPLE images UPLOAD STARTS*/
            if(isset($_FILES["images"]["name"]) && !empty($_FILES["images"]["name"]))
            {
               $TEMP_FILES = (isset($_FILES))?$_FILES:array();
               $count = count($_FILES['images']['size']);
               
               if($count>0)
                {
                    for($i=0; $i<$count; $i++)
                    {
                        unset($config);
                        $originalFileName = $TEMP_FILES['images']['name'][$i];
                        $_FILES['images']['name']= $TEMP_FILES['images']['name'][$i];
                        $_FILES['images']['type']    =$TEMP_FILES['images']['type'][$i];
                        $_FILES['images']['tmp_name'] =$TEMP_FILES['images']['tmp_name'][$i];
                        $_FILES['images']['error']       =$TEMP_FILES['images']['error'][$i];
                        $_FILES['images']['size']    =$TEMP_FILES['images']['size'][$i];   
                       
                        // $config['upload_path']          = 'uploads/admin/images/slider/';
                        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        // $config['encrypt_name'] = TRUE;
                        
                        $configVideo['encrypt_name'] = TRUE;
                        $configVideo['upload_path'] ='uploads/tags/';
                         $configVideo['max_size'] = '102400000';
                         $configVideo['allowed_types'] = '*';
                        $this->load->library('upload', $configVideo);
                         $this->upload->initialize($configVideo);
                        if(!$this->upload->do_upload('images'))
                        {
                           echo $error = $this->upload->display_errors();die();
                            $errorText = $originalFileName. ' error : '.$error;                     
                            $errorArr[]  = $errorText;
                        }
                        else
                        {
                             
                                $upload_data = $this->upload->data();
                                $images = $upload_data['file_name'];   
                                $data=array();
                                $data['tag_id']=$tag_id;
                                $data['images']=$images;
                                $this->db->insert('tags_images',$data);
                                
                                
                                
                                                 
                        }

                    }
                }          
            }

		$this->session->set_flashdata('success','Category added successfully');

            redirect(base_url('admin/tags'));
	}
}