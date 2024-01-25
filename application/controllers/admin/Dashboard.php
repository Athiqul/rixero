<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
	}


	public function index()
	{		$user_id=$this->session->userdata('user_id');
		$data = array();
		$data['page_title'] = 'Dashboard';		
		$data['taskAr']=$taskAr=$this->getAcceptedTask();
		$data['taskCout']=$taskCout=$this->totalTaskStatusBy();
		$data['walletAr']=$walletAr=$this->getwalletAmount($user_id);
		//print_r($taskCout); die();
		$this->load->view('admin/dashboard',$data);
	}
	public function getwalletAmount($user_id=0)
	{
		$this->db->select();
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_wallet')->row_array();
	}


	public function totalTaskStatusBy()
	{
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		if($user_type=='CUSTOMER')
		{
			$sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' AND customer_id=".$user_id.") as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='2' OR t_status='1') AND customer_id=".$user_id.") as processTask,(select COUNT(task_id) from tb_task WHERE t_status='5' AND customer_id=".$user_id.") as complateTask 
				FROM `tb_task` 
				WHERE customer_id=".$user_id." ";
		}
		elseif ($user_type=='DESIGNER') {
			$sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' AND assign_to=".$user_id.") as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='2' OR t_status='1') AND assign_to=".$user_id.") as processTask,(select COUNT(task_id) from tb_task WHERE t_status='5' AND assign_to=".$user_id.") as complateTask 
				FROM `tb_task` 
				WHERE assign_to=".$user_id." ";
			
		}else
		{
			$sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' ) as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='2' OR t_status='1') ) as processTask,(select COUNT(task_id) from tb_task WHERE t_status='5' ) as complateTask 
				FROM `tb_task` ";
		}

		return $this->db->query($sql)->row_array();
	}

	public function getAcceptedTask()
	{
		$user_type=$this->session->userdata('user_type');
			$user_id=$this->session->userdata('user_id');
		$this->db->select('t.*,m.name as measure_name,b.b_name as banner_type,m.name as measure_in,u.first_name,u.last_name,u1.first_name as assign_fname,u1.last_name as assign_lname');
		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id','left');
		$this->db->join('tbl_measure_type as m','m.id=t.t_size_type_id','left');
		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id','left');
		$this->db->join('tbl_mst_users as u1','u1.user_id=t.assign_to','left');
		//$this->db->where('t.t_status!=','0');
		if($user_type=='CUSTOMER')
		{
		$this->db->where('t.customer_id',$user_id);

		}elseif($user_type=='DESIGNER')
		{
		$this->db->where('t.assign_to',$user_id);

		}
		return $this->db->get('tb_task as t')->result_array();
	}
} 

