<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{		
		$data = array();
		$data['page_title'] = 'Login';
		$this->load->view('admin/user/login',$data);
	}

	public function checkuserlogin()
	{

		$email= $this->input->post('email');
		$password=  $this->input->post('password');
		$remember_me = $this->input->post('remember_me');
		$encPassword=md5($password);
	   	$loginResult=$this->db->where(array('email' => $email,'password' => $encPassword))->get('tbl_mst_users')->row_array(); 
	   	
	   

		if($loginResult!='' && !empty($loginResult))
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
				redirect(ADMIN_DASHBOARD_URL);
			}else
			{
				$this->session->set_flashdata('failed','Account has been blocked by admin!..');
				redirect(ADMIN_LOGIN_URL);

			}
		}
		else
		{
         	$this->session->set_flashdata('failed','Username or Password wrong!..');
			redirect(ADMIN_LOGIN_URL);
		}


		
	}

	public function forgot_password()
	{		
		$data = array();
		$data['page_title'] = 'Forgot Password';
		$this->load->view('admin/user/forgot_password',$data);
	}

	public function saveForgotPassword()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$email =  $this->input->post('email');
			$checkEmail = $this->db->where(array('email' => $email))->get('tbl_mst_users')->row_array();
			$classEmail = $this->db->where(array('email' => $email))->get('tbl_classes')->row_array();
		//	print_r($classEmail);
		//	echo count($classEmail);exit();
			if($checkEmail!='' && !empty($checkEmail))
			{
				$user_id = $checkEmail['user_id'];
				$upData['email_otp_verification'] = $email_otp_verification = mt_rand(100000, 999999);
	            $upData['email_otp_sent_on'] = CURRENT_DATE_TIME_YMD;
	            $saveAction = $this->db->where('user_id',$user_id)->update('tbl_mst_users',$upData);
	            $this->session->set_flashdata('success',' Please enter 6-digit Otp No.');
	            
	            $this->session->set_userdata('cnfm','admin');//set the temporary session for update further password
	            
	          //  $email='mauryamanojcl222@gmail.com';
		        $subject='Forget Password';
		        $body="Your OTP(ONE TIME PASSWORD) is ".$email_otp_verification;
		        
		         $mailArray["To"]        = $email;
                        $mailArray["Subject"]   =$subject;
                        $mailArray["Body"]      = $body;
                
                        $this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = “smtps”;
                        //$mail->SMTPDebug = 2;
                        $mail->Host = 'ssl://smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'support@absolutesoftsystem.in';
                        $mail->Password = 'Support@Absolute';
                        // $mail->Username = 'support@absolutesoftsystem.in';
                        // $mail->Password = 'Support@Absolute';
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                        $mail->setFrom('support@absolutesoftsystem.in', 'Absolute Soft System');
                        $mail->addReplyTo('support@absolutesoftsystem.in', 'Absolute Soft System');
                        // $mail->addReplyTo('support@absolutesoftsystem.in',$mail->Username);
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                        if (!$mail->send()) 
                        {
                            echo $mail->ErrorInfo; //exit();
                        }
                        else
                        {
                            echo 'Mail sent'; //exit();
                        }
		
		
	            
	            redirect(ADMIN_OTP_VERIFICATION_DETAILS_URL.'/'.$user_id);
	   			
			}
			else if($classEmail!='' && !empty($classEmail))
			{
			    $user_id = $classEmail['classes_id'];
				$upData['email_otp_verification'] = $email_otp_verification = mt_rand(100000, 999999);
	            $upData['email_otp_sent_on'] = CURRENT_DATE_TIME_YMD;
	            $saveAction = $this->db->where('classes_id',$user_id)->update('tbl_classes',$upData);
	            $this->session->set_flashdata('success',' Please enter 6-digit Otp No.');
	            
	            $this->session->set_userdata('cnfm','classes');//set temporary session to update further password
	            
	          //  $email='mauryamanojcl222@gmail.com';
		        $subject='Forget Password';
		        $body="Your OTP(ONE TIME PASSWORD) is ".$email_otp_verification;
		        
		         $mailArray["To"]        = $email;
                        $mailArray["Subject"]   =$subject;
                        $mailArray["Body"]      = $body;
                
                        $this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = “smtps”;
                        //$mail->SMTPDebug = 2;
                        $mail->Host = 'ssl://smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'support@absolutesoftsystem.in';
                        $mail->Password = 'Support@Absolute';
                        // $mail->Username = 'support@absolutesoftsystem.in';
                        // $mail->Password = 'Support@Absolute';
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                        $mail->setFrom('support@absolutesoftsystem.in', 'Absolute Soft System');
                        $mail->addReplyTo('support@absolutesoftsystem.in', 'Absolute Soft System');
                        // $mail->addReplyTo('support@absolutesoftsystem.in',$mail->Username);
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                        if (!$mail->send()) 
                        {
                            echo $mail->ErrorInfo; //exit();
                        }
                        else
                        {
                            echo 'Mail sent'; //exit();
                        }
		
		
	            
	            redirect(ADMIN_OTP_VERIFICATION_DETAILS_URL.'/'.$user_id);
	   			
			    
			}
		 	else
		 	{
		 		$this->session->set_flashdata('failed','Email Not Matched');
		 		redirect(ADMIN_FORGET_PASSWORD_DETAILS_URL);
		 	}
		}
	}

	public function otp_verification($user_id=0)
	{		
		$data = array();
		$data['page_title'] = 'Email Otp Verification';
		$data['user_id'] = $user_id;
		$this->load->view('admin/user/otp_verification',$data);
	}

	public function saveOtpVerification()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$user_id = $this->input->post('user_id');
			$email_otp_verification = $this->input->post('email_otp_verification');
			$checkOtpVerification = $this->db->where(array('email_otp_verification' => $email_otp_verification, 'user_id' => $user_id))->get('tbl_mst_users')->row_array();
		
			$classOtpVerification = $this->db->where(array('email_otp_verification' => $email_otp_verification, 'classes_id' => $user_id))->get('tbl_classes')->row_array();
		
			if($checkOtpVerification!='' && !empty($checkOtpVerification))
			{
				redirect(ADMIN_OTP_CONFIRM_PASSWORD_DETAILS_URL.'/'.$user_id);
			}
			else if($classOtpVerification!='' && !empty($classOtpVerification))
			{
			    redirect(ADMIN_OTP_CONFIRM_PASSWORD_DETAILS_URL.'/'.$user_id);
			
			    
			}
		 	else
		 	{
		 		$this->session->set_flashdata('failed','Otp Not Matched');
		 		redirect(ADMIN_OTP_VERIFICATION_DETAILS_URL.'/'.$user_id);
		 	}
		}
	}

	public function confirm_password($user_id=0)
	{		
		$data = array();
		$data['page_title'] = 'Confirm Password';
		$data['user_id'] = $user_id;
		$this->load->view('admin/user/confirm_password',$data);
	}

	public function saveConfirmPassword()
	{
		if(isset($_POST) && !empty($_POST))
		{	
			$user_id = $this->input->post('user_id');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			if($password==$confirm_password)
			{
			    $data1['password']=$password;
				$data['password'] = md5($password);
				$cnfmEmailType=$this->session->userdata['cnfm'];//die;
				if($cnfmEmailType=='admin')
				{
				    $action = $this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);
				}
				else if($cnfmEmailType=='classes')
				{
				    $action = $this->db->where('classes_id',$user_id)->update('tbl_classes',$data1);
				}	//echo $this->db->last_query($action);exit();
			}
			else
			{
				$this->session->set_flashdata('failed','Password Not Mached.');
				redirect(ADMIN_OTP_CONFIRM_PASSWORD_DETAILS_URL.'/'.$user_id);
			}
			
		}
		redirect(ADMIN_LOGIN_URL);
	}

	public function logout()
    {
    	$user_type=$this->session->userdata('user_type');
    	 $this->session->sess_destroy();
    	 if($user_type=='CUSTOMER')
          {
          	redirect(base_url('login'));
          }else
          {

        redirect(ADMIN_LOGIN_URL);
    
          }
       

    }

}#EOF


