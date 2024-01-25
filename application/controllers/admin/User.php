<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('isLoggedIn')==FALSE)
		{
			$this->session->set_flashdata('failed','Your session has expired.Please Login.');
		
		}
		$this->load->model('admin/User_model','user_model');
	}

	public function profile_details($user_id=0)
	{	
	$user_id=$this->session->userdata('user_id');	
		$data = array();
		$data['page_title'] = 'Profile Details';
		$data['user_id'] = $user_id;
		$data['walletAr']=$walletAr=$this->getwalletAmount($user_id);
		//print_r($walletAr); die();
		if(intval($user_id)>0)
		{
			$data['user_details'] = $user_details = $this->user_model->getUserDetails($user_id);
			//echo '<pre>';print_r($user_details);exit();
		}
		
		$this->load->view('admin/user/profile_details',$data);
	}
	public function getwalletAmount($user_id=0)
	{
		$this->db->select();
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_wallet')->row_array();
	}

	public function save_profile_details()
	{
		if(isset($_POST) && !empty($_POST))
		{
		    $classData=array();
			$user_id=(isset($_POST['user_id']))?$_POST['user_id']:'';
		    $userData['first_name']=$first_name=(isset($_POST['first_name']))?$_POST['first_name']:'';
			$classData['class_name']=$className=(isset($_POST['className']))?$_POST['className']:'';
	        $userData['last_name']=$last_name=(isset($_POST['last_name']))?$_POST['last_name']:'';
	        $classData['email']=$userData['email']=$email=(isset($_POST['email']))?$_POST['email']:'';
	        $classData['phone']=$userData['phone']=$phone=(isset($_POST['phone']))?$_POST['phone']:'';
	        
	    	if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"]))
	        {
	            $config['upload_path']          = PROFILE_UPLOAD_PATH_NAME;
	            $config['allowed_types']        = 'gif|jpg|jpeg|png';
	            $config['max_size']      = 10000;
	            $config['encrypt_name'] = TRUE;
	            $this->load->library('upload', $config);
	        	if($this->upload->do_upload('image'))
	        	   {
	        	        $upload_data = $this->upload->data();
	        	        $classData['image']=$userData['profile_img'] = $upload_data['file_name'];
	        	   }
	        }
	        if(intval($user_id)>0)
	        {
	            $class_id=$this->session->userdata('user_id');
	            $user_type=$this->session->userdata('user_type');
	            //print_r($classData);
	           // echo $user_type;exit();
	            if($user_type=='class')
	            {
	                $this->db->where('classes_id',$class_id)->update('tbl_classes',$classData);
	                $this->session->set_flashdata('success','Profile Updated Successful...');
	       
	                
	            }
	            else
	            {
	                
	                 $this->db->where('user_id',$user_id)->update('tbl_mst_users',$userData);
	                $this->session->set_flashdata('success','Profile Updated Successful...');
	       
	            }
	        }
		}
		redirect(ADMIN_PROFILE_DETAILS_URL.'/'.$user_id);
	}


	public function change_password($user_id=0)
	{		
		$data = array();
		$data['page_title'] = 'Change Password';
		$data['user_id'] = $user_id;
		$data['user_id'] = $this->session->userdata('user_id'); 
		$this->load->view('admin/user/change_password',$data);
	}

	//UPDATE CHANGE PASSSWORD
    public function saveProfileCngPassword()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $action = $this->user_model->saveProfileCngPassword();
        }
        
    }

}#EOF
