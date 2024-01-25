<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class Form extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		// if($this->session->userdata('isLoggedIn')==FALSE)
		// {
		// 	$this->session->set_flashdata('failed','Your session has expired.Please Login.');
		// 	redirect(base_url('login'));
		// }
		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		$this->load->model('admin/Common_model','common_model');
        $this->load->model('admin/User_model','user_model');

	}


	public function index($cat_id=0)
	{
       // $data['referred_from']=$_SERVER['HTTP_REFERER'];
           //     $this->session->set_userdata($data);
        $banner_id=isset($_GET['banner_id'])?$_GET['banner_id']:0;
		$data = array();
		$data['page_title'] = 'Request Creative';
		$data['listAr']=$this->getpageType();		
		$data['coinvalueAr']=$this->getmasterdata();		
        $data['cat_id']=$cat_id; 
        $data['banner_id']=$banner_id; 
        $data['selectedData']=$selectedData=$this->getselectedDesign($banner_id);
        $data['printable_value']=isset($selectedData['banner_id'])?$selectedData['banner_id']:'';
		$this->load->view('frontend/form',$data);
	}
    public function getselectedDesign($id=0)
    {
        $this->db->select();
        $this->db->where('id',$id);
        return $this->db->get('master_page')->row_array();
    }

	public function payment($task_id=0)
	{
		
        $data['title'] = 'Checkout payment ';  
        $this->db->select();
        $this->db->where('task_id',$task_id);
        $res=$this->db->get('tb_task')->row_array();
        $user_id=isset($res['customer_id'])?$res['customer_id']:'';
        $finalAmount=isset($res['finalAmount'])?$res['finalAmount']:0;
        $data['user_details'] = $user_details = $this->user_model->getUserDetails($user_id);
      // echo "<pre>";print_r($user_details); die();
        $data['customer_id']=$user_id;
        $data['amount']=$finalAmount;
        $data['return_url'] = site_url().'form/callback';
        $data['surl'] = site_url().'razorpay/success';;
        $data['furl'] = site_url().'razorpay/failed';;
        $data['currency_code'] = 'INR';
        $this->load->view('frontend/payment', $data);
	}


	public function getmasterdata()
	{
		$this->db->select();
		return $this->db->get('tbl_setting')->row_array();
	}


	public function getpageType()
	{
		$this->db->select();
		return $this->db->get('tbl_banner')->result_array();
	}
	

	public function getprice()
	{
		$type_id=isset($_POST['type_id'])?$_POST['type_id']:'';
		$printable_type=isset($_POST['printable_type'])?$_POST['printable_type']:'';
		$pages_no=isset($_POST['pages_no'])?$_POST['pages_no']:'';
		$this->db->select();
		$this->db->where('id',$type_id);
		$res=$this->db->get('master_page')->row_array();
		$cost=isset($res['cost'])?$res['cost']:0;

		echo json_encode($res);
		//print_r($res);
		die();
	}

	public function saveData()
	{
		//print_r($_POST); die();
		$data=array();
		$data['t_name']=isset($_POST['companyName'])?$_POST['companyName']:'';
		$regAr['first_name']=isset($_POST['name'])?$_POST['name']:'';
		$regAr['phone']=isset($_POST['number'])?$_POST['number']:'';
		$regAr['email']=$email=isset($_POST['email'])?$_POST['email']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		$data['banner_id']=isset($_POST['banner_id'])?$_POST['banner_id']:'';
		$data['t_size_type_id']=$t_size_type_id=isset($_POST['t_size_type_id'])?$_POST['t_size_type_id']:'';
		$data['t_desc']=isset($_POST['desc'])?$_POST['desc']:'';
		$data['color']=isset($_POST['allColours'])?$_POST['allColours']:'';
		$data['printable_type']=$printable_type=isset($_POST['printable_type'])?$_POST['printable_type']:'';
		$data['pages_no']=$pages_no=isset($_POST['pages_no'])?$_POST['pages_no']:'';
		$customWidth=isset($_POST['customWidth'])?$_POST['customWidth']:'';
		$customHeight=isset($_POST['customHeight'])?$_POST['customHeight']:'';
		$data['custom_size']=$customWidth.'*'.$customHeight;
		$data['widthSize']=isset($_POST['widthSize'])?$_POST['widthSize']:'';
		$data['finalAmount']=isset($_POST['finalAmount'])?$_POST['finalAmount']:'';
        $data['orientation']=isset($_POST['orientation'])?$_POST['orientation']:'';

		$user_id=$this->session->userdata('user_id');
		if($user_id>0)
		{
			$data['customer_id']=$this->session->userdata('user_id');
		}
		else
		{
			$regAr['first_name']=md5($password);
			$regAr['user_type']='CUSTOMER';
			$this->db->insert('tbl_mst_users',$regAr);
			$user_id=$this->db->insert_id();
			$sessionArr = array('user_id'=>$user_id,'user_type'=>$regAr['user_type'],'isLoggedIn'=>TRUE);
				$this->session->set_userdata($sessionArr);
			 
		         $subject='Registration has been successfully';
		         $body='your Registration has been successfully.<br>Your Username:-'.$email.'<br>Password:-'.$password;

				$this->common_model->sendmail($email,$subject,$body);
		}
		$data['customer_id']=$user_id;
		

		
		$walletAr=$this->common_model->getwalletAmount($user_id);

		$amount=isset($walletAr['amount'])?$walletAr['amount']:0;


		$per_task_value=$this->common_model->getPage_scost($t_size_type_id);
		if($pages_no>0)
		{
			$per_task_value=$per_task_value*$pages_no;

		}

		if($printable_type!='Front')
		{
			$per_task_value=$per_task_value*2;

		}

		if(isset($_FILES["preffered_logo"]["name"]) && !empty($_FILES["preffered_logo"]["name"]))
        {
            $config['upload_path']          = ADMIN_TASK_DOCUMENT_UPLOAD_PATH_NAME;
            $config['allowed_types']        = '*';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
        	if($this->upload->do_upload('preffered_logo'))
        	   {
        	        $upload_data = $this->upload->data();
        	        $data['t_file']= $upload_data['file_name'];
        	   }else
        	   {
        	   	echo $this->upload->display_errors(); die();
        	   }
        }

        if(isset($_FILES["specificuploadlogo"]["name"]) && !empty($_FILES["specificuploadlogo"]["name"]))
        {
            $config['upload_path']          = ADMIN_TASK_DOCUMENT_UPLOAD_PATH_NAME;
            $config['allowed_types']        = '*';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if($this->upload->do_upload('specificuploadlogo'))
               {
                    $upload_data = $this->upload->data();
                    $data['specificuploadlogo']= $upload_data['file_name'];
               }else
               {
                echo $this->upload->display_errors(); die();
               }
        }

        if(isset($_FILES["uploadLogoInput"]["name"]) && !empty($_FILES["uploadLogoInput"]["name"]))
        {
            $config['upload_path']          = ADMIN_TASK_DOCUMENT_UPLOAD_PATH_NAME;
            $config['allowed_types']        = '*';
            $config['max_size']      = 10000;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if($this->upload->do_upload('uploadLogoInput'))
               {
                    $upload_data = $this->upload->data();
                    $data['uploadLogoInput']= $upload_data['file_name'];
               }else
               {
                echo $this->upload->display_errors(); die();
               }
        }
        if($amount>=$per_task_value)
		{
			$this->db->insert('tb_task',$data);
		         $insert_id=$this->db->insert_id();
		         $notify=array();
		         $notify['title']='New Design Added';
		         $notify['url']='admin/task';
		         $notify['customer_id']=$user_id;
		         $notify['task_id']=$insert_id;
		         $this->db->insert('notification_tbl',$notify);
		         $dataAr['created_by']=$dataAr['user_id']=$user_id;
		        	$dataAr['task_id']=$insert_id;
		        	$dataAr['amount']=$per_task_value;
		        	$dataAr['type']='dr';
		        	$this->db->insert('wallet_history',$dataAr);
		        	$walletupAr['amount']=$amount=$amount-$per_task_value;
		        	//$this->db->where('wallet_id',$wallet_id)->update('tbl_wallet',$walletupAr);

		        	 
		         $subject='New Task Has been uploaded';
		         $body='New task has been created successfully';

				//$this->common_model->sendmail($email,$subject,$body);

				  $this->db->select('email');
                 $this->db->where('user_type','DESIGNER');
                 $emailAr=$this->db->get('tbl_mst_users')->result_array();

            foreach ($emailAr as $key => $emailAr) {
                       $email=isset($emailAr['email'])?$emailAr['email']:'';
                       $this->common_model->sendmail($email,$subject,$body);
                    
                 }


		        	   redirect(ADMIN_TASK_LIST_URL);
		}else
		    {
		    	$this->db->insert('tb_task',$data);
		    	$task_id=$this->db->insert_id();
		        $this->session->set_flashdata('failed','Don"t have enough amount');

                 $subject='New Task Has been uploaded';
                 $body='New Design has been available Please explore and get the task';

                //$this->common_model->sendmail($email,$subject,$body);

                  $this->db->select('email');
                 $this->db->where('user_type','DESIGNER');
                 $emailAr=$this->db->get('tbl_mst_users')->result_array();

            foreach ($emailAr as $key => $emailAr) {
                       $email=isset($emailAr['email'])?$emailAr['email']:'';
                       $this->common_model->sendmail($email,$subject,$body);
                    
                 }
		        redirect(base_url('form/payment').'/'.$task_id);


		    }
	}



	public function createPagednameDDL()
    {
        $banner_id  = (isset($_POST['banner_id']))?$this->input->post('banner_id'):0;
        $cat_id  = (isset($_POST['cat_id']))?$this->input->post('cat_id'):0;
        $selectedBannerpage  = (isset($_POST['selectedBannerpage']))?$this->input->post('selectedBannerpage'):0;
        $append = '<option value="">Select </option>';
        if(!empty($banner_id))
        {
           
		$this->db->select('*');
		
		$this->db->where('banner_id',$banner_id); 
        if($cat_id>0)
        {
            $this->db->where('top_cat_id',$cat_id);
        }
		
		 $dropDownData= $this->db->get('master_page')->result_array();
                   //echo "<pre>" ;print_r($dropDownData);exit;

            if(isset($dropDownData) && !empty($dropDownData))
            {
                foreach($dropDownData as $vlu)
                {
                    $selected='';
                    if($selectedBannerpage==$vlu['id'])
                    {
                        $selected='selected';
                    }
                    $append .= "<option value='".$vlu['id']."'".$selected.">".$vlu['page_type']."</option>";                      
                }
               

            }
        }
          
        echo $append;exit;  
    }
    
    public function checkmail()
	{
		
        $user_id  = $this->session->userdata('user_id');
         $email  = (isset($_POST['email']))?$_POST['email']:'';
        
        $this->db->select();
       $this->db->where('email',$email);
       if($user_id>0)
       {
       	  $this->db->where('user_id!=',$user_id);
       }
        $dropDownData=$this->db->get('tbl_mst_users')->result_array();
       //s echo $this->db->last_query(); die();
       if($dropDownData!='' && !empty($dropDownData))
         {
        	$ss= "exit";
        }
        else
        {
        	$ss= "notexit";
        }
       echo $ss; exit;


	}




     // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        //curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
   // callback method
    public function callback() {     
    $data=array();   
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $user_id=$this->session->userdata('user_id');
            if($user_id>0)
            {
                $data['txt_customer_id']=$user_id;
            }else
            {
                $data['txt_customer_id']=$this->input->post('customer_id');
            }
            $data['payment_id']=$razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $data['txt_order_no']=$merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $data['txt_amount']=($amount/100);
        
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
           
                $result = curl_exec($ch);
            
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                   // echo $error; die();
                } else {
                    $response_array = json_decode($result, true);
                
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            $resAr=$this->getSettingDetails();
             $perrupessCoin=$resAr['coin_value'];

                $totalAmount=$perrupessCoin*$data['txt_amount'];
                $data['coins']=$totalAmount;

            if($success == false) 
            {
                $data['txt_status']='failed';
            }
            if($success == true) 
            {
                $data['txt_status']='success';
                
                $remainingCoin=$this->getRemainingAmount();
               

                $dataAr=array();
                $dataAr['amount']=($remainingCoin+$totalAmount);
               // $this->db->where('user_id',$user_id)->update('tbl_wallet',$dataAr);


            }
             
            $this->db->insert('tbl_transaction',$data);
            // print_r($data); 
            // echo $success; die;

            if ($success === true) {

                //$data['status']=$success;
                //$this->db->insert('transaction_tbl',$data);
                if(!empty($this->session->userdata('ci_subscription_keys'))) 
                {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                // if (!$order_info['order_status_id']) {
                //     //redirect($this->input->post('merchant_surl_id').'/'.$razorpay_payment_id);
                //     redirect(FRONT_CUSTOMER_ORDER_SUCCESS_URL.'/'.$merchant_order_id);
                // } else {
                //     //redirect($this->input->post('merchant_surl_id').'/'.$razorpay_payment_id);
                //     redirect(FRONT_CUSTOMER_ORDER_SUCCESS_URL.'/'.$merchant_order_id);
                // }
                  redirect(FRONT_FAILED_TRANSACTION_URL.'/'.$merchant_order_id);
            } else if($success==false) {
            	$sql="delete from tb_task where customer_id='".$user_id."' order by task_id desc LIMIT 1 ";
            	$this->db->query($sql);
               // $data['status']=$success;
               // $this->db->insert('transaction_tbl',$data);
                //redirect($this->input->post('merchant_furl_id').'/'.$razorpay_payment_id);
                redirect(FRONT_FAILED_TRANSACTION_URL.'/'.$merchant_order_id);
            }

           

        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 

    public function activateAccount($user_id=0)
    {
    	$data['status']='1';
    	$this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);

    	echo "<h2>Thank you for register your account<br> your account has beeen activated</h2>";
    }
    public function success() {
        redirect(site_url('admin/Transaction/history'));
    }  
    public function failed() {
        redirect(site_url('admin/Transaction/history'));

    } 
    public function getSettingDetails()
    {
        $this->db->select();
        return $this->db->get('tbl_setting')->row_array();
    }
    public function getRemainingAmount()
    {
            $user_id=$this->session->userdata('user_id');

        $this->db->select('amount');
        $this->db->where('user_id',$user_id);
        $resAr= $this->db->get('tbl_wallet')->row_array();
        $amount=isset($resAr['amount'])?$resAr['amount']:0;
        return $amount;
    }


    public function mailsent()
    {
        $email="manoj880545@gmail.com";
        $body='hiii';
        $subject='hii';
         $this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                         $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = 'smtp';
                        $mail->SMTPDebug = 2;
                       $mail->Host ='smtp.gmail.com';
                        $mail->Port = '587';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'info@rixero.com';
                        $mail->Password = 'Masnoonkherani@1707';
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                        $mail->setFrom('info@rixero.com', 'Rixero');
                        $mail->addReplyTo('info@rixero.com', 'Rixero');
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                           echo "failes";
                        }
                        else
                        {
                          echo 'sent';
                        }
    }



}