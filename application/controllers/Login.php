<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class Login extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
			$this->load->model('admin/Common_model','common_model');
		
   
	}
	public function index()
	{
		// $data['referred_from']=$_SERVER['HTTP_REFERER'];
		// 		$this->session->set_userdata($data);

		
		$data = array();
		$data['page_title'] = 'Login';		
		$this->load->view('frontend/login',$data);
	}

	public function testmail()
	{
		$this->load->model('admin/Common_model','common_model');

		$subject1='Account Activation';
		      //   $body1='Dear Customer,<br>
		         //&bnsp;&nbsp; your account is not activated ,To activate your account click on given link<br>';
		         //$body1.=base_url('form/activateAccount/');
$body1='test';

		$email='manoj880545@gmail.com';
	
		 $this->load->library('PHPMailer');
                        
                         $mail = new PHPMailer;
                        $mail->isSMTP();
                         $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = 'smtp';
                        //$mail->SMTPDebug = 2;
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
                        $mail->Subject = $subject1;
                        
                        $mail->Body    = $body1;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                          // return false;
                            echo $mail->ErrorInfo;die();

                        }
		
	}

	public function saveRegistration()
	{
		$data['first_name']=isset($_POST['first_name'])?$_POST['first_name']:'';
		$data['last_name']=isset($_POST['last_name'])?$_POST['last_name']:'';
		$data['email']=$email=isset($_POST['email'])?$_POST['email']:'';
		$data['phone']=isset($_POST['phone'])?$_POST['phone']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		$data['password']=md5($password);
		$data['user_type']='CUSTOMER';
		$this->db->select();
		$this->db->where('email',$email);
		$emailAr=$this->db->get('tbl_mst_users')->row_array();
		if($emailAr=='' && empty($emailAr))
		{

        	$this->db->insert('tbl_mst_users',$data);
        	$insert_id=$this->db->insert_id();
        	//$insert_id=1;
        	if($insert_id>0)
        	{
        		$link='https://vmittech.in/about/activateNow/'.$insert_id;
        		$subject1='Account Activation';
		         $body1='Dear Customer,<br>
		          your account is not activated ,To activate your account click on given link<br>';
		          $body1.="<a href='".$link."'>Activate Now</a>";

		          $this->common_model->sendmail($email,$subject1,$body1);
		        
		        $walletData['user_id']=$insert_id;
		        $walletData['amount']='500';
		        $this->db->insert('tbl_wallet',$walletData);

				



        		$this->db->insert('tbl_wallet',$arrayName = array('user_id' => $insert_id));
        		$this->session->set_flashdata('success','Registration  successfully,Please confirm your Email to Login');
        	}else
        	{
        		$this->session->set_flashdata('failed','Something went to wrong');

        	}
        }else
        {
        		$this->session->set_flashdata('failed','Email-ID Already exist');

        }

        	redirect(base_url('login#aaaa'));
	}




	public function checkuserlogin()
	{

		$email= $this->input->post('email');
		$password=  $this->input->post('password');
		$remember_me = $this->input->post('remember_me');
		$encPassword=md5($password);
	   	$loginResult=$this->db->where(array('user_type' => 'CUSTOMER','email' => $email,'password' => $encPassword))->get('tbl_mst_users')->row_array(); 
	   	
	   

		if(isset($loginResult) && !empty($loginResult))
		{
			$user_id=$loginResult['user_id'];
			$usertype=$loginResult['user_type'];
			$status=$loginResult['status'];
			if($status==1)
			{
				//remember me
				if($remember_me == 1) 
				{
		            setcookie('email', $email, time() + 60 * 60 * 24 * 100, "/");
		            setcookie('password', $password, time() + 60 * 60 * 24 * 100, "/");
		            setcookie('remember_me', $remember_me, time() + 60 * 60 * 24 * 100, "/");
		        } 
		        else 
		        {
		            setcookie('email', 'gone', time() - 60 * 60 * 24 * 100, "/");
		            setcookie('password', 'gone', time() - 60 * 60 * 24 * 100, "/");
		            setcookie('remember_me', 'gone', time() - 60 * 60 * 24 * 100, "/");
		        }

		        //set session
				$sessionArr = array('user_id'=>$user_id,'user_type'=>$usertype,'isLoggedIn'=>TRUE);
				$this->session->set_userdata($sessionArr);
				//$referred_from = $this->session->userdata('referred_from');
//redirect($referred_from, 'refresh');
				//redirect(ADMIN_DASHBOARD_URL);
				redirect(base_url('home'));
			}else
			{
				$this->session->set_flashdata('failed','Account has been blocked by admin!..');
				redirect(base_url('login'));

			}
		}
		else
		{
         	$this->session->set_flashdata('failed','Username or Password wrong!..');
			redirect(base_url('login'));
		}


		
	}
}