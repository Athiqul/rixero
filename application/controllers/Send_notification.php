<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class Send_notification extends CI_Controller {
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
    $this->load->library('firebasedatabase');
   
	}
  public function getuserlist()
  {
      echo "<pre>"; $res=$this->firebasedatabase->userlist();
      print_r($res);
    
  }

	public function index()
	{

    

		$data = array();
		$data['page_title'] = 'Dashboard';
		//$data['userAr']=$userAr=$this->getuser();
    $data['userAr']=$userAr=$this->firebasedatabase->userlist();
		
		
		$this->load->view('admin/send_notification',$data);
	}
	public function user()
	{
		$data = array();
		$data['page_title'] = 'User List';
		$data['userAr']=$userAr=$this->firebasedatabase->userlist();
		
		
		$this->load->view('admin/user',$data);
	}

	public function getuser()
	{
		$this->db->select();
		return $this->db->get('tbl_users')->result_array();

	}

	public function saveNotification()
	{

		$data=array();
		$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;
		$nt_type=isset($_POST['nt_type'])?$_POST['nt_type']:0;
		$message=isset($_POST['msg'])?$_POST['msg']:0;
		$app_url=isset($_POST['app_url'])?$_POST['app_url']:0;
		$app_version=isset($_POST['app_version'])?$_POST['app_version']:0;

    $img='';
		if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"]))
          {
              $config['upload_path']          = 'uploads/image/';
              $config['allowed_types']        = 'gif|jpg|jpeg|png';
              $config['max_size']      = 10000;
              $config['encrypt_name'] = TRUE;
              $this->load->library('upload', $config);
            if($this->upload->do_upload('image'))
               {
                    $upload_data = $this->upload->data();
                    $data['image'] =$img= $upload_data['file_name'];
               }
               else
               {
                echo $this->upload->display_errors(); die();
               }
          }

		
		$data['user_id']=$user_id;
		$data['notification_type']=$nt_type;
		$data['app_update_url']=$app_url;
		$data['app_version']=$app_version;
		$data['message']=$message;


		$this->db->insert('tbl_notification',$data);
    $insert_id=$this->db->insert_id();

		$fcm_token='cL277RddQ22VTpfd7Yq4tx:APA91bHU7xeFEGnAAjy8byVxmzYojz4MTNcP3IhlvfHTEDI6Rk4_fIF9JGFB2GISep7VDs-MV-SMNJFuVUg_LLimuaG051eMHl7ubuZ26Ef41TqEmGELLrfUqwMuxLvMgbl-Ok4UOLwg';
		//firebase server url to send the curl request
			$url = "https://fcm.googleapis.com/fcm/send";

	    			$API_ACCESS_KEY = "AAAANU49dyU:APA91bHpchTHtOhIIIB-TmhauYNptli4e1zjwyfdMuMohREHAZkmVUlvsrLrqXytMTxuSar1mWMa5O9OKP4oyhpZycIvMZnYJ5638oqTf1FwAYSMWzSrmNBN7AtdNwnyOwC10vETJnch";	

	    

    $dataMsg = array
          (
            'title'=>'FireBase Notification',
            'message'=>$message,
            'app_url'=>$app_url,
            'app_version'=>$app_version,
            'image_url'  => base_url('uploads/image').'/'.$img,
            //'image_url'  => 'http://gusto.zquick.in/assets/images/Website_Banner1.jpg',
            'Sender_name' => $user_id,
              
          );
	          
    $fields = array
      (
       'to'    => $fcm_token,
        'data'=>$dataMsg
      );

     
  
  
    $headers = array
        (
          'Authorization: key=' . $API_ACCESS_KEY,
          'Content-Type: application/json'
        );
   #Send Reponse To FireBase Server

    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch );
    //echo $result; die();
   // return $result;
    $obj=json_decode($result,true);
    //print_r($obj); die();
   $data['multicast_id']=$obj['multicast_id'];
   $data['is_sended_successfully']=$obj['success'];
   $data['results']=$obj['results'];
   $data['image_url']= base_url('uploads/image').'/'.$data['image'];
    
    
    
   $dbname = "notification/".$data['user_id'].'/'.$data['multicast_id'];

    $this->firebasedatabase->saveData($data,$dbname);
    
    curl_close( $ch );
		redirect(base_url('send_notification'));
	}


	public function createUsernameDDL()
    {
        $user_id  = (isset($_POST['user_id']))?$this->input->post('user_id'):0;
        $append = '';


        if(!empty($user_id))
        {
           $dabasename = "notification/";
            $dropDownData=$this->firebasedatabase->userlistByFilter($user_id,$dabasename);
                 // echo "<pre>" ;print_r($dropDownData);exit;

            if(isset($dropDownData) && !empty($dropDownData))
            {
            	$i=0;
                foreach($dropDownData as $vlu)
                {
                  $dabasename1 = "users/";
            $username=$this->firebasedatabase->userlistByFilter($vlu['user_id'],$dabasename1);


                	$i++;
                	$append.="<tr>";
                    $append .= "<td>".$i."</td>";                      
                    $append .= "<td>".$username['user_name']."</td>";                      
                    $append .= "<td>".$vlu['notification_type']."</td>";                      
                    $append .= "<td>".$vlu['message']."</td>";  
                    if($vlu['is_sended_successfully']==1) 
                    {                   
                      $append .= "<td>
  										<span class='label label-sm label-success'>
  										Success </span>
  									</td>"; 
                    } 
                    if($vlu['is_sended_successfully']==0) 
                    {                   
                      $append .= "<td>
                      <span class='label label-sm label-danger'>
                      Failed </span>
                    </td>"; 
                    } 
                    if($vlu['is_sended_successfully']==2) 
                    {                   
                      $append .= "<td>
                      <span class='label label-sm label-info'>
                      Received </span>
                    </td>"; 
                    }                     
                    $append .= "</tr>";                      
                }

            }
        }
          
        echo $append;exit;  
    }
} 
