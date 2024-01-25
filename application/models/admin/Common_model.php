<?php
class Common_model extends CI_Model
{
  function __construct()
  {
    parent :: __construct();
  }


  public function totalTaskStatusBy()
  {
    $user_type=$this->session->userdata('user_type');
    $user_id=$this->session->userdata('user_id');
    if($user_type=='CUSTOMER')
    {
      $sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' AND customer_id=".$user_id.") as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='2' OR t_status='1') AND customer_id=".$user_id.") as processTask,(select COUNT(task_id) from tb_task WHERE t_status='4' AND customer_id=".$user_id.") as complateTask 
        FROM `tb_task` 
        WHERE customer_id=".$user_id." ";
    }
    elseif ($user_type=='DESIGNER') {
      $sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' AND assign_to=".$user_id.") as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='2' OR t_status='1') AND assign_to=".$user_id.") as processTask,(select COUNT(task_id) from tb_task WHERE t_status='5' AND assign_to=".$user_id.") as complateTask 
        FROM `tb_task` 
        WHERE assign_to=".$user_id." ";
      
    }else
    {
      $sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' ) as pendingTask,(select COUNT(task_id) from tb_task WHERE t_status='4' ) as processTask,(select COUNT(task_id) from tb_task WHERE t_status='4' ) as complateTask 
        FROM `tb_task` ";
    }

    return $this->db->query($sql)->row_array();
  }
  
  public function getuserlist($type='')
  {
  	$this->db->select('u.*,w.amount as wallet_amount');
    $this->db->join('tbl_wallet as w','w.user_id=u.user_id','left');
  	$this->db->where('u.user_type',$type);
  	return $this->db->get('tbl_mst_users as u')->result_array();
  }
  public function getstate()
  {
    $this->db->select();
    return $this->db->get('states')->result_array();
  }

  public function getuserDetails($user_id=0)
  {
    $this->db->select();
    $this->db->where('user_id',$user_id);
    return $this->db->get('tbl_mst_users')->row_array();
  }

  public function updateStatus($user_id=0,$status='')
  {
    $data = array('status' =>$status);
    $this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);
    return $this->db->affected_rows();
  }

  public function updateTaskStatus($task_id=0,$status='')
  {
    $data = array('is_publish' =>$status);
    $this->db->where('task_id',$task_id)->update('tb_task',$data);
    return $this->db->affected_rows();
  }

  public function getBannerDetails($banner_id=0)
  {
    return $this->db->where('banner_id',$banner_id)->get('tbl_banner')->row_array();
  }

  public function updateStatusbanner($user_id=0,$status='')
  {
    $data = array('status' =>$status);
    $this->db->where('banner_id',$user_id)->update('tbl_banner',$data);
    return $this->db->affected_rows();
  }
  public function updateStatusMaqsterPage($id=0,$status='')
  {
    $data = array('status' =>$status);
    $this->db->where('id',$id)->update('master_page',$data);
    return $this->db->affected_rows();
  }

  public function getBannerList()
  {
    $this->db->select();
    //$this->db->where('status','1');
    return $this->db->get('tbl_banner')->result_array();
  }

  public function getBannerType()
  {
    $this->db->select();
    $this->db->where('status','1');
    return $this->db->get('tbl_banner')->result_array();
  }

  public function getMeasureType()
  {
    $this->db->select();
    $this->db->where('status','1');
    return $this->db->get('tbl_measure_type')->result_array();
  }

  public function getwalletAmount($user_id)
  {
    $sql="SELECT w.*,s.per_task_value FROM `tbl_wallet` as w LEFT JOIN tbl_setting AS s ON s.id=1
           WHERE w.user_id='".$user_id."' ";
 
    return $this->db->query($sql)->row_array();
  }

  public function getPagesList()
  {
    $this->db->select();
    return $this->db->get('master_page')->result_array();
  }

   public function getPage_scost($id=0)
  {
    $this->db->select('cost');
    $this->db->where('id',$id);
    $walletAr= $this->db->get('master_page')->row_array();
    $cost=isset($walletAr['cost'])?$walletAr['cost']:0;
    return $cost;

  }



  public function sendmail($email,$subject,$body)
  {
   
                
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
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                          // return false;
                            echo $mail->ErrorInfo;die();

                        }
                        else
                        {
                          $id=$this->session->userdata('user_id');
                          $data=array();
                          $data['email']=$email;
                          $data['body']=$body;
                          $data['subject']=$subject;
                          $data['created_by']=isset($id)?$id:0;
                          $this->db->insert('email_log',$data);
                          return true;
                        }

  }



  public function testmail($email,$subject,$body)
  {
   
                        $this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                         $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = 'smtp';
                        $mail->SMTPDebug = 2;
                          $mail->Host = 'divine.herosite.pro';
                        $mail->Port = 587;
                        $mail->SMTPAuth = true;
                          $mail->Username = 'hello@vmittech.in';
                        $mail->Password = 'Virtual@123';
                        $mail->SMTPOptions = array(
'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
));
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                         $mail->setFrom('hello@vmittech.in', 'vmittech.in');
                       
                        $mail->addAddress('hello@vmittech.in', '');
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                           echo $mail->ErrorInfo;
                        }
                        else
                        {
                          echo "sent";
                        }

  }

  public function sendmail_backup($email,$subject,$body)
  {
   
                
                        $this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                         $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = 'smtp';
                        //$mail->SMTPDebug = 2;
                        $mail->Host = 'divine.herosite.pro';
                        $mail->Port = 587;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'manoj@finclub.co.in';
                        $mail->Password = 'Virtual@123';
                        // $mail->Username = 'support@absolutesoftsystem.in';
                        // $mail->Password = 'Support@Absolute';
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                        $mail->setFrom('manoj@finclub.co.in', 'Rixero');
                        $mail->addReplyTo('manoj@finclub.co.in', 'Rixero');
                        // $mail->addReplyTo('support@absolutesoftsystem.in',$mail->Username);
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                           return false;
                        }
                        else
                        {
                          return true;
                        }

  }



  

}#EOF