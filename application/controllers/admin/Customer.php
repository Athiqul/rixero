<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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
		$data['page_title'] = 'Customers List';
		$data['userAr']=$this->common_model->getuserlist('CUSTOMER');
		$this->load->view('admin/customer/list',$data);
	}

	public function add_customer($id=0)
	{		
		$data = array();
		$data['page_title'] = 'Customers List';
		$data['customer_id']=$id;
		$data['stateAr']=$this->common_model->getstate();
		$data['details']=$this->getdetailsById($id);
		$this->load->view('admin/customer/add_customer',$data);
	}

	public function deleteUser($user_id=0)
	{
		$res=$this->db->where('user_id',$user_id)->delete('tbl_mst_users');
		if($res)
		{
			$this->session->set_flashdata('success','User Deleted successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_CUSTOMER_LIST_URL);

	}


	public function updateStatus($user_id='',$status='')
	{
		$res=$this->common_model->updateStatus($user_id,$status);
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_CUSTOMER_LIST_URL);
	}


	public function getdetailsById($user_id=0)
	{
		$this->db->select();
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_mst_users')->row_array();
	}


	public function submitcustomer()
	{
		$data=array();
		$user_id =isset($_POST['customer_id'])?$_POST['customer_id']:0;
		$data['first_name']=isset($_POST['first_name'])?$_POST['first_name']:'';
		$data['last_name']=isset($_POST['last_name'])?$_POST['last_name']:'';
		$data['email']=isset($_POST['email'])?$_POST['email']:'';
		$data['phone']=isset($_POST['phone'])?$_POST['phone']:'';
		$data['state_id']=isset($_POST['state_id'])?$_POST['state_id']:'';
		$data['city_id']=isset($_POST['city_id'])?$_POST['city_id']:'';
		$data['pin_code']=isset($_POST['pin_code'])?$_POST['pin_code']:'';
		$data['address']=isset($_POST['address'])?$_POST['address']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		if($password!='')
		{
		$data['password']=md5($password);
	}
		$data['user_type']='CUSTOMER';
		if(isset($_FILES["profile_img"]["name"]) && !empty($_FILES["profile_img"]["name"]))
        {
            $config['upload_path']          = PROFILE_UPLOAD_PATH_NAME;
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
        	if($this->upload->do_upload('profile_img'))
        	   {
        	        $upload_data = $this->upload->data();
        	        $data['profile_img']= $upload_data['file_name'];
        	   }else
        	   {
        	   	echo $this->upload->display_errors(); die();
        	   }
        }

        if($user_id>0)
        {
        	$this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);
        	$this->session->set_flashdata('success','Data update successfully');
        }
        else
        {

        	$this->db->insert('tbl_mst_users',$data);
        	$insert_id=$this->db->insert_id();
        	$this->db->insert('tbl_wallet',$arrayName = array('user_id' => $insert_id));
        		$email=$data['email'];
		         $subject='Your Registration successfully';
		         $body='your Registration has been successfully.<br>Your Username:-'.$data['email'].'<br>Password:-'.$password;
				$this->common_model->sendmail($email,$subject,$body);
        	$this->session->set_flashdata('success','Data update successfully');

        }

        redirect(ADMIN_CUSTOMER_LIST_URL);

        

	}


	public function createCitynameDDL()
    {
        $state_id  = (isset($_POST['state_id']))?$this->input->post('state_id'):0;
        $append = '<option value="">Select City Name</option>';
        if(!empty($state_id))
        {
           
		$this->db->select('*');
		$this->db->where('state_id',$state_id); 
		$this->db->order_by('name','asc');
		 $dropDownData= $this->db->get('city')->result_array();
                   //echo "<pre>" ;print_r($dropDownData);exit;

            if(isset($dropDownData) && !empty($dropDownData))
            {
                foreach($dropDownData as $vlu)
                {
                    $append .= "<option value=".$vlu['id'].">".$vlu['name']."</option>";                      
                }

            }
        }
          
        echo $append;exit;  
    }


	
} 

