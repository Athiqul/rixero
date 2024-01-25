<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
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
		$data['page_title'] = 'Task List';
		$data['taskAr']=$taskAr=$this->getPendingTask();
		// echo "<pre>";
		// print_r($taskAr); die();
		$this->load->view('admin/task/list',$data);
	}

	public function updatework($id=0)
	{
		$data=array();
		$data['task_id']=$id;
		$this->load->view('admin/task/update_work',$data);
	}

	public function viewActivity($id=0)
	{
		$data=array();
		$data['task_id']=$id;
		$data['taskAr']=$this->getActivity($id);
		$this->load->view('admin/task/viewActivity',$data);
	}

	public function reassignTask($id=0)
	{
		$data=array();
		$data['task_id']=$id;
		$data['userAr']=$this->getDesigner($id);
		$this->load->view('admin/task/reassign',$data);
	}
	public function getDesigner($task_id=0)
	{
		$resAr=$this->db->select('assign_to')->where('task_id',$task_id)->get('tb_task')->row_array();
		$id=isset($resAr['assign_to'])?$resAr['assign_to']:0;
		$sql="select * from tbl_mst_users where user_id NOT IN(".$id.") AND user_type='DESIGNER' ";
		return $this->db->query($sql)->result_array();

	}

	public function saveReassign()
	{
		$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;
		$task_id=isset($_POST['task_id'])?$_POST['task_id']:0;
			$res=$this->db->where('task_id',$task_id)->get('tb_task')->row_array();
		$t_duration=$res['t_duration'];


		$data1['desc']=$desc=isset($_POST['desc'])?$_POST['desc']:0;
		$data1['work_type']='ASSIGNED';


		$data1['task_id']=$task_id;
			$data1['worked_days']='0';
			$data1['assign_date']=CURRENT_DATE_TIME_YMD;
			
			$data1['user_id']=$data['assign_to']=$user_id;
			$data1['left_days']=$data['left_days']=$t_duration;
			$data['work_progress']=$data['work_progress']='0';
			$data['t_status']='1';
			$this->db->where('task_id',$task_id)->update('tb_task',$data);
			$this->db->insert('tbl_assign_task_acivity',$data1);
			$this->session->set_flashdata('success','Task Assgned successfully');
			redirect(ADMIN_TASK_ACCEPTED_LIST_URL);
	}



	public function getActivity($task_id=0)
	{
		$user_type=$this->session->userdata('user_type');
			$user_id=$this->session->userdata('user_id');

		$this->db->select('t.*,DATEDIFF(now(), t.assign_date) as workdays,u1.first_name as assign_fname,u1.last_name as assign_lname,tsk.t_name as title');
		
		$this->db->join('tb_task as tsk','tsk.task_id=t.task_id');
		$this->db->join('tbl_mst_users as u1','u1.user_id=t.user_id');
		
		if($user_type=='DESIGNER')
		{
			$this->db->where('t.user_id',$user_id);
		}
		$this->db->where('t.task_id',$task_id);

		return $this->db->get('tbl_assign_task_acivity as t')->result_array();


	}


	public function updateworkprogress()
	{
		$data=array();
		$data1=array();
		$user_id=$this->session->userdata('user_id');
		$data['task_id']=$task_id=isset($_POST['task_id'])?$_POST['task_id']:0;
		$sql="SELECT DATEDIFF(now(), assign_date) as workdays,TIMEDIFF(now(), assign_date) as remainingday FROM `tbl_assign_task_acivity` WHERE task_id='".$task_id."' ORDER by assign_id ASC LIMIT 1";
		$workAr=$this->db->query($sql)->row_array();
		
		
		$data['work_progress']=$data1['work_progress']=$work_progress=isset($_POST['work_progress'])?$_POST['work_progress']:0;
		$data['desc']=$desc=isset($_POST['desc'])?$_POST['desc']:0;
		$data1['last_worked_on']=$data['user_id']=$user_id;
		$data1['last_upadated_date']=$data['assign_date']=CURRENT_DATE_TIME_YMD;
		$data1['t_status']='4';
		$data1['left_days']=$data['left_days']=isset($workAr['remainingday'])?$workAr['remainingday']:0;
		$data1['no_of_days_worked']=$data['worked_days']=isset($workAr['workdays'])?$workAr['workdays']:0;
		//print_r($data1); die();
		$data['work_type']='INPROGRESS';
		$this->db->insert('tbl_assign_task_acivity',$data);
		$this->db->where('task_id',$task_id)->update('tb_task',$data1);
		$this->session->set_flashdata('success','work Added successfully');
		redirect(ADMIN_TASK_ACCEPTED_LIST_URL);

	}

	public function updateStatus($task_id='',$status='')
	{
		$res=$this->common_model->updateTaskStatus($task_id,$status);
		if($res>0)
		{
			$this->session->set_flashdata('success','Status update successfully');
		}else
		{
			$this->session->set_flashdata('failed','Something went to wrong');

		}
		redirect(ADMIN_TASK_LIST_URL);
	}


	public function acceptTaskBYDesigner($task_id=0)
	{
		$user_id=$this->session->userdata('user_id');
		$res=$this->db->where('task_id',$task_id)->get('tb_task')->row_array();
		$t_duration=$res['t_duration'];
		$t_status=$res['t_status'];
		if($t_status==0)
		{
			$data=array();
			$data1=array();
			$data1['task_id']=$task_id;
			$data1['worked_days']='0';
			$data1['assign_date']=CURRENT_DATE_TIME_YMD;
			$data1['desc']='Task Accepted by User';
			$data1['user_id']=$data['assign_to']=$user_id;
			$data1['left_days']=$data['left_days']=$t_duration;
			$data['work_progress']=$data['work_progress']='0';
			$data['t_status']='1';
			$this->db->where('task_id',$task_id)->update('tb_task',$data);
			$this->db->insert('tbl_assign_task_acivity',$data1);
			$this->session->set_flashdata('success','Task Accepted successfully');
		}else
		{
			$this->session->set_flashdata('failed','Task not available');


		}
		redirect(ADMIN_TASK_ACCEPTED_LIST_URL);

	}

	public function getPendingTask()
	{
			$user_type=$this->session->userdata('user_type');
			$user_id=$this->session->userdata('user_id');
		$this->db->select('t.*,m.name as measure_name,b.b_name as banner_type,m.name as measure_in,u.first_name,u.last_name');
		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id');
		$this->db->join('tbl_measure_type as m','m.id=t.t_size_type_id');
		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id');

		$this->db->where('t.t_status','0');
		if($user_type=='CUSTOMER')
		{
		$this->db->where('t.customer_id',$user_id);

		}else
		{
		$this->db->where('t.is_publish','1');

		}
		return $this->db->get('tb_task as t')->result_array();
	}


	public function getAcceptedTask()
	{
		$user_type=$this->session->userdata('user_type');
			$user_id=$this->session->userdata('user_id');
		$this->db->select('t.*,m.name as measure_name,b.b_name as banner_type,m.name as measure_in,u.first_name,u.last_name,u1.first_name as assign_fname,u1.last_name as assign_lname');
		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id');
		$this->db->join('tbl_measure_type as m','m.id=t.t_size_type_id');
		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id');
		$this->db->join('tbl_mst_users as u1','u1.user_id=t.assign_to');
		$this->db->where('t.t_status!=','0');
		if($user_type=='CUSTOMER')
		{
		$this->db->where('t.customer_id',$user_id);

		}elseif($user_type=='DESIGNER')
		{
		$this->db->where('t.assign_to',$user_id);

		}
		return $this->db->get('tb_task as t')->result_array();
	}

	public function accepted_list()
	{		
		$data = array();
		$data['page_title'] = 'Task List';
		$data['taskAr']=$taskAr=$this->getAcceptedTask();
			// echo "<pre>";
		// print_r($taskAr); die();
		$this->load->view('admin/task/accepted_list',$data);
	}

	public function addTask()
	{		
		$data = array();
		$data['page_title'] = 'Task add';
		$data['bannerType']=$this->common_model->getBannerType();
		$data['measureType']=$this->common_model->getMeasureType();
		$this->load->view('admin/task/addtask',$data);
	}

	public function saveTaskdata()
	{
		$user_id=$this->session->userdata('user_id');
		$data=array();
		$data['t_name']=$t_name=isset($_POST['t_name'])?$_POST['t_name']:'';
		$data['banner_id']=$t_type=isset($_POST['t_type'])?$_POST['t_type']:'';
		$data['t_duration']=$t_duration=isset($_POST['t_duration'])?$_POST['t_duration']:'';
		$data['t_size']=$t_size=isset($_POST['t_size'])?$_POST['t_size']:'';
		$data['t_size_type_id']=$t_size_type_id=isset($_POST['t_size_type_id'])?$_POST['t_size_type_id']:'';
		$data['t_desc']=$t_desc=isset($_POST['t_desc'])?$_POST['t_desc']:'';
		$data['printable_type']=$printable_type=isset($_POST['printable_type'])?$_POST['printable_type']:'';
		$data['last_date']=$last_date=isset($_POST['last_date'])?$_POST['last_date']:'';
		$data['customer_id']=$user_id;
		if(isset($_FILES["t_file"]["name"]) && !empty($_FILES["t_file"]["name"]))
        {
            $config['upload_path']          = ADMIN_TASK_DOCUMENT_UPLOAD_PATH_NAME;
            $config['allowed_types']        = '*';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
        	if($this->upload->do_upload('t_file'))
        	   {
        	        $upload_data = $this->upload->data();
        	        $data['t_file']= $upload_data['file_name'];
        	   }else
        	   {
        	   	echo $this->upload->display_errors(); die();
        	   }
        }

        $this->db->insert('tb_task',$data);
        $this->session->set_flashdata('success','Task Added successfully');
        redirect(ADMIN_TASK_LIST_URL);
	}


	
} 

