<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct(); 
    }

    public function getUserDetails($user_id=0)
    { 
           $result = array(); 
           $append = '';
           $user_type=$this->session->userdata('user_type');

           if($user_type=='class' && intval($user_id>0))
           {
             $sql = "SELECT *
                FROM tbl_classes
                WHERE classes_id='".$user_id."' ";
              $result = $this->db->query($sql)->row_array();
           }
           elseif(intval($user_id)>0)
           {
              $append .= ' WHERE user_id='.$user_id;
              $sql = "SELECT a.*
                FROM tbl_mst_users AS a
                ".$append."
                ORDER BY user_id DESC";
              $result = $this->db->query($sql)->row_array();
           }     
          
          return $result;
   
    }



    public function getSettingDetails($user_id=0)
    { 
           $result = array(); 
           $append = '';
           $user_type=$this->session->userdata('user_type');

         
             // $append .= ' WHERE user_id='.$user_id;
              $sql = "SELECT a.*
                FROM tbl_setting AS a where id=1
            
                ORDER BY id DESC";
              $result = $this->db->query($sql)->row_array();
         
          
          return $result;
   
    }



    //UPDATE CHANGE PASSSWORD
     public function saveProfileCngPassword()
    {
        if(isset($_POST) && !empty($_POST))
        { 
          $user_type=$this->session->userdata('user_type');
           $user_id = (isset($_POST['user_id']))?$_POST['user_id']:0;
           $old_password = (isset($_POST['old_password']))?$_POST['old_password']:'';
           
           $new_password = (isset($_POST['new_password']))?$_POST['new_password']:'';
           $confirm_password = (isset($_POST['confirm_password']))?$_POST['confirm_password']:'';
           //echo $vendor_id;exit;
           if($user_type=='class')
           {
            $password = $old_password;
            $sql = "SELECT * FROM tbl_classes WHERE classes_id='".$user_id."'";
           $result = $this->db->query($sql)->row_array();

           }
           else
           {
            $password = md5($old_password);
            $sql = "SELECT * FROM tbl_mst_users WHERE user_id='".$user_id."'";
           $result = $this->db->query($sql)->row_array();
           //echo $this->db->last_query();exit;
           

           }
           if($password != $result['password'])
           {
              $this->session->set_flashdata('error','Old Password Not Matched');
              redirect(ADMIN_CHANGE_PASSWORD_DETAILS_URL.'/'.$user_id);
           }
           else if($new_password==$confirm_password)
           {
              
              if($user_type=='class')
              {
                $data['password'] = $new_password;
                $this->db->where('classes_id',$user_id)->update('tbl_classes',$data);
              }
              else
              {
                 $data['password'] = md5($new_password);

              $this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);
              
              }
              $this->session->set_flashdata('success','Change Password Updated');
              //redirect(ADMIN_CHANGE_PASSWORD_DETAILS_URL.'/'.$user_id);
              $this->session->sess_destroy();
        redirect(ADMIN_LOGIN_URL);
           }
           else
           {
              $this->session->set_flashdata('error','New and Confirm Password not Matching.');
              redirect(ADMIN_CHANGE_PASSWORD_DETAILS_URL.'/'.$user_id);
           }
           
           //echo $vendor_id;exit;
           
        }
      }


} ##EOF

?>
