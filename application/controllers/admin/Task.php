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

		$this->user_type=$this->session->userdata('user_type');

		$this->user_id=$this->session->userdata('user_id');

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



	public function invoice($task_id)

	{		



		$data = array();

		$data['page_title'] = 'Task List';

		$data['task_id']=$task_id;

		$data['details']=$taskAr=$this->gettaskDEtailsdetails($task_id);

		 // echo "<pre>";

		 // print_r($taskAr); die();

		$this->load->view('admin/task/invoice',$data);

	}

public function gettaskDEtailsdetails($task_id)

	{

		$this->db->select('t.*,u.phone,u.address,u.first_name as cfname,u.last_name as clname,u.profile_img,u.email,m.page_type,m.cost,w.amount as charges');

		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id','left');

		$this->db->join('master_page as m','m.id=t.t_size_type_id');

		$this->db->join('wallet_history as w','w.task_id=t.task_id');



		$this->db->where('t.task_id',$task_id);

		return $this->db->get('tb_task as t')->row_array();

	}



	public function order()

	{		

		$data = array();

		$data['page_title'] = 'Task List';

		$data['taskAr']=$taskAr=$this->orderTask();

		//echo $this->db->last_query();

			// echo "<pre>";

		// print_r($taskAr); 

		//die();

		$this->load->view('admin/task/customer_order',$data);

	}



	public function sentOnEmail($task_id=0)

	{

		$data['details']=$details=$this->gettaskDEtails($task_id);

		$subject = 'Rixero ';

       

        $printablefile=isset($details['printablefile'])?$details['printablefile']:'';

        //$email=isset($details['email'])?$details['email']:'';

        $email='manoj880545@gmail.com';

          	

    //$path=ADMIN_BANNER_DISPLAY_PATH_NAME.'/'.$printablefile;

        $path="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png";

     $body = 'your file is'.$path;



        			$this->load->library('PHPMailer');

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->SMTPKeepAlive = true;   

                        // $mail->Mailer = “smtp”;

                        $mail->Mailer = "smtp";

                        $mail->Host = 'mail.big-ventures.com';

                        $mail->Port = 587;

                        $mail->SMTPAuth = true;

                        $mail->Username = 'manoj@big-ventures.com';

                        $mail->Password = '7Ala2yd34iv#';

                        $mail->IsHTML();

                        $mail->wordwrap = true;

                        

                        $mail->setFrom('manoj@big-ventures.com', 'Rixero');

                        $mail->addReplyTo('manoj@big-ventures.com', 'Rixero');



                    $mail->addAddress($email, '');

                    $mail->Subject = $subject;

                    $mail->Body    = $body;

                    $mail->AddEmbeddedImage($path, 'logoimg', 'namDiames.png');

                    

                      $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'mime/type');

                    $mail->AltBody = ' ';

     

			        if (!$mail->send()) 

			        {

			                $arrResponse['response'] = 'failure';

			                $arrResponse['message'] = $mail->ErrorInfo;

			        }

			  else {





			         $arrResponse['response'] = 'failure';

			         $arrResponse['message'] = 'Mail sent';

			        

			        

			        }



			        redirect(base_url('admin/task/details'.$task_id));

			        print_r($arrResponse);

echo $path; die;

	}



	public function orderTask()

	{

		$user_type=$this->session->userdata('user_type');

			$user_id=$this->session->userdata('user_id');

		$this->db->select('t.*,m.page_type as measure_name,m.cost as price,b.b_name as banner_type,m.page_type as measure_in,u.first_name,u.last_name,u1.first_name as assign_fname,u1.last_name as assign_lname');

		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id');

		$this->db->join('master_page as m','m.id=t.t_size_type_id');

		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id','left');

		$this->db->join('tbl_mst_users as u1','u1.user_id=t.assign_to','left');

		///$this->db->where('t.t_status!=','0');

		if($user_type=='CUSTOMER')

		{

		$this->db->where('t.customer_id',$user_id);



		}elseif($user_type=='DESIGNER')

		{

		$this->db->where('t.assign_to',$user_id);



		}

		$this->db->order_by('t.task_id','desc');

		return $this->db->get('tb_task as t')->result_array();

	}



	public function details($task_id=0)

	{	

		$dd['is_seen']=1;

				if($this->user_type=='CUSTOMER')

                    {

                      $this->db->where('customer_id',$this->user_id);

                      $this->db->where('task_id',$task_id);

                      $this->db->update('notification_tbl',$dd);

                    //  echo $this->db->last_query();

                    }

                     if($this->user_type=='DESIGNER')

                    {

                      $this->db->where('designer_id',$this->user_id,'task_id',$task_id)->update('notification_tbl',$dd);

                      

                    }



		$data = array();

		$data['page_title'] = 'Task List';

		$data['taskAr']=$taskAr=$this->getHistoryActivity($task_id);

		$data['details']=$details=$this->gettaskDEtails($task_id);

		$data['task_id']=$task_id;





	 // echo "<pre>";

	// 	 print_r($details); die();

		$this->load->view('admin/task/task_details',$data);

	}

	





	public function getHistoryActivity($task_id=0)

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



	public function updatework($id=0)

	{

		$data=array();

		$data['task_id']=$id;

		$data['details']=$this->gettaskDEtails($id);

		$this->load->view('admin/task/update_work',$data);

	}

	public function gettaskDEtails($task_id)

	{

		$this->db->select('t.*,u.first_name as cfname,u.last_name as clname,u.profile_img');

		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id','left');

		$this->db->where('t.task_id',$task_id);

		return $this->db->get('tb_task as t')->row_array();

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

	public function ratingTask($id=0)

	{

		$data=array();

		$data['task_id']=$id;

		$resAr=$this->db->select('assign_to')->where('task_id',$id)->get('tb_task')->row_array();

		$user_id=isset($resAr['assign_to'])?$resAr['assign_to']:0;

		$data['user_id']=$user_id;

		$data['userAr']=$this->getDesigner($id);

		$this->load->view('admin/task/rating',$data);

	}



	public function changestask($id=0)

	{

		$data=array();

		$data['task_id']=$id;

		$data['userAr']=$this->getDesigner($id);

		$this->load->view('admin/task/changestask',$data);

	}



	public function savechangestask()

	{



			$customer_id=$this->session->userdata('user_id');



		$data1=array();

		$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;

		$task_id=isset($_POST['task_id'])?$_POST['task_id']:0;



		$sql="SELECT COUNT(assign_id) as changes FROM `tbl_assign_task_acivity` WHERE `task_id` = '".$task_id."' AND `is_changes` = '1'";

		$changes=$this->db->query($sql)->row_array();

		 $noOfChanges=isset($changes['changes'])?$changes['changes']:0;







		$data1['work_type']='CHANGES';

		$data1['is_changes']='1';

		$data1['task_id']=$task_id;

		$data1['desc']=$desc=isset($_POST['desc'])?$_POST['desc']:0;

	

		$data1['assign_date']=CURRENT_DATE_TIME_YMD;

			

		$data1['user_id']=$user_id;



		if(isset($_FILES["imagefile"]["name"]) && !empty($_FILES["imagefile"]["name"]))

		        {

		            $config['upload_path']          = ADMIN_BANNER_UPLOAD_PATH_NAME;

		            $config['allowed_types']        = '*';

		            //$config['max_size']      = 10000;

		            $config['encrypt_name'] = TRUE;

		            $this->load->library('upload', $config);

		        	if($this->upload->do_upload('imagefile'))

		        	   {

		        	        $upload_data = $this->upload->data();

		        	        $data1['imagefile']= $upload_data['file_name'];

		        	   }else

		        	   {

		        	   	echo $this->upload->display_errors(); die();

		        	   }

		        }

		       



		if($noOfChanges>=3)

		{ //echo "string"; die;

			$this->db->select('amount');

			$this->db->where('user_id',$customer_id);

			$amountAr=$this->db->get('tbl_wallet')->row_array();

			 $amount=isset($amountAr['amount'])?$amountAr['amount']:0;



			$this->db->select();

			$this->db->where('status','1');

			$amountAr1=$this->db->get('tbl_setting')->row_array();

			 $per_changes_amount=isset($amountAr1['per_changes_amount'])?$amountAr1['per_changes_amount']:0;





			if($per_changes_amount<=$amount)

			{

				$wallet=array();

				$wallet['amount']=$amount-$per_changes_amount;

				$this->db->where('user_id',$customer_id)->update('tbl_wallet',$wallet);



				$taskData=array();

				$taskData['user_id']=$customer_id;

				$taskData['task_id']=$task_id;

				$taskData['type']='dr';

				$taskData['amount']=$per_changes_amount;

				//echo $user_id;die();

				$this->db->insert('wallet_history',$taskData);

				$this->db->insert('tbl_assign_task_acivity',$data1);

				 $nofity=array();

		         $nofity['title']='Changes for design';

		         $nofity['url']='admin/task/details/'.$task_id;

		         $nofity['designer_id']=$user_id;

		         $nofity['task_id']=$task_id;

		         $this->db->insert('notification_tbl',$nofity);

		        

		         

		         

			}else

			{

				$this->session->set_flashdata('failed',"Don't have enough balance");

				redirect(ADMIN_TASK_DETAILS_URL.'/'.$task_id);

			}



		}else

		{

			//echo "HHH"; die;

			$this->db->insert('tbl_assign_task_acivity',$data1);

			 $notify=array();

		         $notify['title']='Changes for design';

		         $notify['url']='admin/task/details/'.$task_id;

		         $notify['designer_id']=$user_id;

		         $notify['task_id']=$task_id;

		         $this->db->insert('notification_tbl',$notify);





		}

		

		redirect(ADMIN_TASK_DETAILS_URL.'/'.$task_id);



	}

	public function getDesigner($task_id=0)

	{

		$resAr=$this->db->select('assign_to')->where('task_id',$task_id)->get('tb_task')->row_array();

		$id=isset($resAr['assign_to'])?$resAr['assign_to']:0;

		$sql="select * from tbl_mst_users where user_id NOT IN(".$id.") AND user_type='DESIGNER' ";

		return $this->db->query($sql)->result_array();



	}

	public function savestarRating()

	{

		$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;

		$task_id=isset($_POST['task_id'])?$_POST['task_id']:0;

		$rating=isset($_POST['rating'])?$_POST['rating']:0;

		$feedback=isset($_POST['desc'])?$_POST['desc']:0;

		





		$data1['task_id']=$task_id;

		$data1['rating']=$rating;

		$data1['feedback']=$feedback;

	

			

			$data1['designer_id']=$user_id;

			

			$this->db->insert('tbl_rating',$data1);

			$this->db->where('task_id',$task_id)->update('tb_task',array('is_approved' =>'1'));

			$this->session->set_flashdata('success','Task Assgned successfully');

			redirect(ADMIN_TASK_ACCEPTED_LIST_URL);

	}



	public function saveReassign()

	{

		$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;

		$task_id=isset($_POST['task_id'])?$_POST['task_id']:0;

			$res=$this->db->where('task_id',$task_id)->get('tb_task')->row_array();

		

		$data1['desc']=$desc=isset($_POST['desc'])?$_POST['desc']:0;

		$data1['work_type']='ASSIGNED';





		$data1['task_id']=$task_id;

	

			$data['accepted_date']=$data1['assign_date']=CURRENT_DATE_TIME_YMD;

			

			$data1['user_id']=$data['assign_to']=$user_id;

			

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

		

		$this->db->select('customer_id');

		$this->db->where('task_id',$task_id);

		$taskAr=$this->db->get('tb_task')->row_array();

		

		$work_progress=isset($_POST['work_progress'])?$_POST['work_progress']:0;

		$data['desc']=$desc=isset($_POST['desc'])?$_POST['desc']:'';

		$data1['t_status']=$status=isset($_POST['status'])?$_POST['status']:'';

		$data1['last_worked_on']=$data['user_id']=$user_id;

		$data1['last_upadated_date']=$data['assign_date']=CURRENT_DATE_TIME_YMD;

		//$data1['t_status']='4';

		$data1['left_days']=$data['left_days']=isset($workAr['remainingday'])?$workAr['remainingday']:0;

		$data1['no_of_days_worked']=$data['worked_days']=isset($workAr['workdays'])?$workAr['workdays']:0;

		//print_r($data1); die();



		 $this->db->select();

		        $this->db->where('task_id',$task_id);

		        $this->db->where('is_changes','1');

		        $this->db->order_by('assign_id','desc');

		        $update_status=$this->db->get('tbl_assign_task_acivity')->row_array();

		if($status==5)

		{

			$data['work_type']='COMPLETED';

			$data['work_progress']=$data1['work_progress']='100';

			$data['work_type']='Completed task';

			if(isset($_FILES["originfile"]["name"]) && !empty($_FILES["originfile"]["name"]))

		        {

		            $config['upload_path']          = ADMIN_BANNER_UPLOAD_PATH_NAME;

		            $config['allowed_types']        = '*';

		            $config['max_size']      = 10000;

		            $config['encrypt_name'] = TRUE;

		            $this->load->library('upload', $config);

		        	if($this->upload->do_upload('originfile'))

		        	   {

		        	        $upload_data = $this->upload->data();

		        	        $data1['originfile']= $upload_data['file_name'];

		        	   }else

		        	   {

		        	   	echo $this->upload->display_errors(); die();

		        	   }

		        }



		        if(isset($_FILES["printablefile"]["name"]) && !empty($_FILES["printablefile"]["name"]))

		        {

		            $config['upload_path']          = ADMIN_BANNER_UPLOAD_PATH_NAME;

		            $config['allowed_types']        = '*';

		            $config['max_size']      = 10000;

		            $config['encrypt_name'] = TRUE;

		            $this->load->library('upload', $config);

		        	if($this->upload->do_upload('printablefile'))

		        	   {

		        	        $upload_data = $this->upload->data();

		        	        $data1['printablefile']= $upload_data['file_name'];

		        	   }else

		        	   {

		        	   	echo $this->upload->display_errors(); die();

		        	   }

		        }



		        if($update_status!='' && !empty($update_status))

		         {

		         	$dd['status']='1';

		         	$this->db->where('assign_id',$update_status['assign_id'])->update('tbl_assign_task_acivity',$dd);

		         }

		}else

		{

			$data['work_progress']=$data1['work_progress']=$work_progress;

			$data['work_type']='INPROGRESS';

		}

		

		$this->db->insert('tbl_assign_task_acivity',$data);

		$this->db->where('task_id',$task_id)->update('tb_task',$data1);

		$this->session->set_flashdata('success','work Added successfully');

		$nofity=array();

		         $nofity['title']='Updated Designing from Designer';

		         $nofity['url']='admin/task/details/'.$task_id;

		         $nofity['customer_id']=$taskAr['customer_id'];

		         $nofity['task_id']=$task_id;

		         $this->db->insert('notification_tbl',$nofity);



		redirect(ADMIN_TASK_ACCEPTED_LIST_URL);



	}



	

		public function updateTaskStatus($task_id=0,$status='')

  			{

    $data = array('t_status' =>$status);

    $this->db->where('task_id',$task_id)->update('tb_task',$data);

    $res= $this->db->affected_rows();

  

		if($res>0)

		{

			$this->session->set_flashdata('success','Status update successfully');

		}else

		{

			$this->session->set_flashdata('failed','Something went to wrong');



		}

		redirect(base_url('admin/task/order'));

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

			$data['accepted_date']=CURRENT_DATE_TIME_YMD;

			$data1['desc']='Task Accepted by User';

			$data1['user_id']=$data['assign_to']=$user_id;

			$data1['left_days']=$data['left_days']=$t_duration;

			$data['work_progress']=$data['work_progress']='0';

			$data['t_status']='1';

			$this->db->where('task_id',$task_id)->update('tb_task',$data);

			$this->db->insert('tbl_assign_task_acivity',$data1);

			 $notify=array();

		         $notify['title']='Task Accepted By Designer';

		         $notify['url']='admin/task/accepted_list';

		         $notify['customer_id']=$res['customer_id'];

		         $notify['task_id']=$task_id;

		         $this->db->insert('notification_tbl',$notify);



		          $this->db->select('email,first_name,last_name');

		         $this->db->where('user_id',$user_id);

		         $emailAr=$this->db->get('tbl_mst_users')->row_array();

		         $email=isset($emailAr['email'])?$emailAr['email']:'';

		         $subject='New Task Has been accepted';

		         $body='New task has been accpeted';

				$this->common_model->sendmail($email,$subject,$body);



				$this->db->select('email');

		         $this->db->where('user_id',$res['customer_id']);

		         $emailAr=$this->db->get('tbl_mst_users')->row_array();

		         $email=isset($emailAr['email'])?$emailAr['email']:'';

		         $subject='Task Accepted';

		         $body='Your task has been accepted By Designer';

				$this->common_model->sendmail($email,$subject,$body);



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

		$this->db->select('t.*,m.page_type as measure_name,b.b_name as banner_type,m.page_type as measure_in,u.first_name,u.last_name');

		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id');

		$this->db->join('master_page as m','m.id=t.t_size_type_id');

		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id');



		$this->db->where('t.t_status','0');

		if($user_type=='CUSTOMER')

		{

		$this->db->where('t.customer_id',$user_id);



		}else

		{

		$this->db->where('t.is_publish','1');



		}

		$this->db->order_by('t.task_id','DESC');

		return $this->db->get('tb_task as t')->result_array();

	}





	public function getAcceptedTask()

	{

		$user_type=$this->session->userdata('user_type');

			$user_id=$this->session->userdata('user_id');

		$this->db->select('t.*,TIME_TO_SEC(TIMEDIFF("08:00:00",TIMEDIFF(now(),accepted_date))) as remainingtime,TIMESTAMPDIFF(SECOND, "08:00:00", now()) as timecounter,m.page_type as measure_name,b.b_name as banner_type,m.page_type as measure_in,u.first_name,u.last_name,u1.first_name as assign_fname,u1.last_name as assign_lname');

		$this->db->join('tbl_banner as b','b.banner_id=t.banner_id');

		$this->db->join('master_page as m','m.id=t.t_size_type_id');

		$this->db->join('tbl_mst_users as u','u.user_id=t.customer_id','left');

		$this->db->join('tbl_mst_users as u1','u1.user_id=t.assign_to','left');

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
		
		//echo "hii"; die;

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

		$data['measureType']=$measureType=$this->getMasterPageType();

		//print_r($measureType); die();

		$this->load->view('admin/task/addtask',$data);

	}

	public function getMasterPageType()

	{

		$this->db->select();

		$this->db->where('status','1');

		return $this->db->get('master_page')->result_array();

	}



	public function saveTaskdata()

	{



		$user_id=$this->session->userdata('user_id');





		$data=array();

		$dataAr=array();

		$walletupAr=array();

		$walletAr=$this->common_model->getwalletAmount($user_id);



		$amount=isset($walletAr['amount'])?$walletAr['amount']:0;

		//$per_task_value=isset($walletAr['per_task_value'])?$walletAr['per_task_value']:0;

		$wallet_id=isset($walletAr['wallet_id'])?$walletAr['wallet_id']:0;



		$data['t_size_type_id']=$t_size_type_id=isset($_POST['t_size_type_id'])?$_POST['t_size_type_id']:0;

			$per_task_value=$this->common_model->getPage_scost($t_size_type_id);



		if($amount>=$per_task_value)

		{



				$data['t_name']=$t_name=isset($_POST['t_name'])?$_POST['t_name']:'';

				$data['banner_id']=$t_type=isset($_POST['t_type'])?$_POST['t_type']:'';

				$data['t_duration']=$t_duration=isset($_POST['t_duration'])?$_POST['t_duration']:'';

				$data['t_size']=$t_size=isset($_POST['t_size'])?$_POST['t_size']:'';

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

		       // print_r($data); 

		        $this->db->insert('tb_task',$data);

		         $insert_id=$this->db->insert_id();

		         $notify=array();

		         $notify['title']='New Design Added';

		         $notify['url']='admin/task';

		         $notify['customer_id']=$user_id;

		         $notify['is_new']=1;

		         $notify['task_id']=$insert_id;

		         $this->db->insert('notification_tbl',$notify);



		         $this->db->select('email');

		         $this->db->where('user_type','DESIGNER');

		         $emailAr=$this->db->get('tbl_mst_users')->result_array();

		         $email=isset($emailAr['email'])?$emailAr['email']:'';

		         $subject='New Task Has been uploaded';

		         $body='New task has been found please read and accept the task';

		         foreach ($emailAr as $key => $emailAr) {

		         	   $email=isset($emailAr['email'])?$emailAr['email']:'';

		         	   $this->common_model->sendmail($email,$subject,$body);

		         	

		         }



			

		        if($insert_id>0)

		        {

		        	$dataAr['created_by']=$dataAr['user_id']=$user_id;

		        	$dataAr['task_id']=$insert_id;

		        	$dataAr['amount']=$per_task_value;

		        	$dataAr['type']='dr';

		        	$this->db->insert('wallet_history',$dataAr);

		        	$walletupAr['amount']=$amount=$amount-$per_task_value;

		        	$this->db->where('wallet_id',$wallet_id)->update('tbl_wallet',$walletupAr);

		        	$nofity=array();

		         $nofity['title']=$per_task_value.'Amount Deducted ';

		         $nofity['url']='admin/Transaction/wallet';

		         $nofity['customer_id']=$user_id;

		         $nofity['task_id']=$insert_id;

		         $this->db->insert('notification_tbl',$nofity);

		        	$this->session->set_flashdata('success','Task Added successfully');



		        }

		        

		    }else

		    {

		        $this->session->set_flashdata('failed','Don"t have enough amount');

		        redirect(ADMIN_ADD_MONEY_URL);





		    }

        redirect(ADMIN_TASK_LIST_URL);

	}





	public function createPagednameDDL()

    {

        $banner_id  = (isset($_POST['banner_id']))?$this->input->post('banner_id'):0;

        $append = '<option value="">Select </option>';

        if(!empty($banner_id))

        {

           

		$this->db->select('*');

		

		$this->db->where('banner_id',$banner_id); 

		

		 $dropDownData= $this->db->get('master_page')->result_array();

                   //echo "<pre>" ;print_r($dropDownData);exit;



            if(isset($dropDownData) && !empty($dropDownData))

            {

                foreach($dropDownData as $vlu)

                {

                    $append .= "<option value=".$vlu['id'].">".$vlu['page_type']."</option>";                      

                }

                if($banner_id==2)

                {

                    $append .= "<option value='Custom'>Custom Size</option>";                      



                }



            }

        }

          

        echo $append;exit;  

    }







	

} 



