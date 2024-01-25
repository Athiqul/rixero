<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller 
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

	public function profile_details($user_id=1)
	{		
		$data = array();
		$data['page_title'] = 'Setting Details';
		$data['user_id'] = $user_id=1;
		// if(intval($user_id)>0)
		// {
			$data['user_details'] = $user_details = $this->user_model->getSettingDetails($user_id);
			//echo '<pre>';print_r($user_details);exit();
		//}
		
		$this->load->view('admin/master/setting',$data);
	}
	public function addmoney()
	{
		$data = array();
		$data['page_title'] = 'Add Money';
		$this->load->view('admin/master/addmoney',$data);
	}

	public function save_setting_details()
	{
		if(isset($_POST) && !empty($_POST))
		{
		    $classData=array();
			$user_id=(isset($_POST['user_id']))?$_POST['user_id']:'';
		    $userData['title']=$first_name=(isset($_POST['title']))?$_POST['title']:'';
			$userData['email']=$email=(isset($_POST['email']))?$_POST['email']:'';
	        $userData['mobile']=$mobile=(isset($_POST['mobile']))?$_POST['mobile']:'';
	        $userData['coin_value']=$coin_value=(isset($_POST['coin_value']))?$_POST['coin_value']:0;
	        $userData['per_changes_amount']=$per_changes_amount=(isset($_POST['per_changes_amount']))?$_POST['per_changes_amount']:0;
	        $userData['per_task_value']=$per_task_value=(isset($_POST['per_task_value']))?$_POST['per_task_value']:0;
	       $userData['facebook']=$facebook=(isset($_POST['facebook']))?$_POST['facebook']:'';
	        $userData['instagram']=$instagram=(isset($_POST['instagram']))?$_POST['instagram']:'';
	      $userData['linkdin']=$linkdin=(isset($_POST['linkdin']))?$_POST['linkdin']:'';
	        
	    	if(isset($_FILES["logo"]["name"]) && !empty($_FILES["logo"]["name"]))
	        {
	            $config['upload_path']          = PROFILE_UPLOAD_PATH_NAME;
	            $config['allowed_types']        = 'gif|jpg|jpeg|png';
	            $config['max_size']      = 10000;
	            $config['encrypt_name'] = TRUE;
	            $this->load->library('upload', $config);
	        	if($this->upload->do_upload('logo'))
	        	   {
	        	        $upload_data = $this->upload->data();
	        	        $userData['logo'] = $upload_data['file_name'];
	        	   }
	        }
	        if(intval($user_id)>0)
	        {
	            $class_id=$this->session->userdata('user_id');
	            $user_type=$this->session->userdata('user_type');
	            //print_r($classData);
	           // echo $user_type;exit();
	           
	                 $this->db->where('id','1')->update('tbl_setting',$userData);
	                 $affected_rows=$this->db->affected_rows();
	                 if($affected_rows>0)
	                 {
	                 	$this->db->insert('tbl_setting',$userData);
	                 }
	                $this->session->set_flashdata('success','Data Updated Successful...');
	       
	          
	        }else
	        {
	                 $this->db->insert('tbl_setting',$userData);
	                   $this->session->set_flashdata('success','Data Updated Successful...');

	        }
		}
		redirect(ADMIN_SETTING_URL.'/'.$user_id);
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
