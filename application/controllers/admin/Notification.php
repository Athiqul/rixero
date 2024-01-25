<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Notification extends CI_Controller {

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
		$data['page_title'] = 'Notification List';
		$data['listAr']=$this->getList();
		$this->load->view('admin/notification',$data);

	}


	public function getList()
	{
				$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');

					
                    if($user_type=='CUSTOMER')
                    {
                    	$this->db->select('n.*,u.first_name,u.last_name');
                    	$this->db->join('tbl_mst_users as u','u.user_id=n.customer_id','left');
                      $this->db->where('n.customer_id',$user_id);
                    }elseif($user_type=='DESIGNER')
                    {
                    		$this->db->select('n.*,u.first_name,u.last_name');
                    	$this->db->join('tbl_mst_users as u','u.user_id=n.designer_id','left');

                      $this->db->where('n.designer_id',$user_id);
                      $this->db->or_where('n.is_new','1');
                    }else
                    {
                    	$this->db->select('n.*,u.first_name,u.last_name');
                    	$this->db->join('tbl_mst_users as u','u.user_id=n.customer_id','left');
                    		$this->db->join('tbl_mst_users as u1','u1.user_id=n.designer_id','left');
                    }
                   // $this->db->where('is_seen','0');
                    $this->db->order_by('n.id','desc');
                      return $res=$this->db->get('notification_tbl as n')->result_array();

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