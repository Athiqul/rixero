<?php
class Manage_user_model extends CI_Model
{
  function __construct()
  {
    parent :: __construct();
  }

  public function saveManageUser_details()
  {
    if(isset($_POST) && !empty($_POST))
    {
      $user_id=(isset($_POST['user_id']))?$_POST['user_id']:'';
      $userData['first_name']=$first_name=(isset($_POST['first_name']))?$_POST['first_name']:'';
          $userData['last_name']=$last_name=(isset($_POST['last_name']))?$_POST['last_name']:'';
          $userData['email']=$email=(isset($_POST['email']))?$_POST['email']:'';
          $userData['phone']=$phone=(isset($_POST['phone']))?$_POST['phone']:'';
          
          if(isset($_POST['password']) && !empty($_POST['password']))
          {
            $userData['password']= $password = md5($_POST['password']);
          }
          
          $user_type=(isset($_POST['user_type']))?$_POST['user_type']:'';
          if(!empty($user_type))
          {
            $userData['user_type'] = $user_type;
          }
          
        if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"]))
          {
              $config['upload_path']          = PROFILE_UPLOAD_PATH_NAME;
              $config['allowed_types']        = 'gif|jpg|jpeg|png';
              $config['max_size']      = 10000;
              $config['encrypt_name'] = TRUE;
              $this->load->library('upload', $config);
            if($this->upload->do_upload('image'))
               {
                    $upload_data = $this->upload->data();
                    $userData['profile_img'] = $upload_data['file_name'];
               }
          }
          if(intval($user_id)>0)
          {
              $this->db->where('user_id',$user_id)->update('tbl_mst_users',$userData);
              $this->session->set_flashdata('success','User Updated Successful...');
          }
          else
          {
             $sql= "SELECT * FROM tbl_mst_users WHERE email='".$email."' ";
              $result = $this->db->query($sql)->row_array();
              if($result)
              {
                  $this->session->set_flashdata('error','Email already Exits');
                  redirect(ADMIN_MANAGE_USERS_DETAILS_URL);
              }
             $this->db->insert('tbl_mst_users',$userData);
              $this->session->set_flashdata('success','user Added Successful...');
          }
    }
    
  }

  public function getManageUserDetails($user_id=0)
    { 
          $result = array();
    $append = '';
    $orderBy = 'ORDER BY a.post_id DESC';
    if(intval($user_id)>0)
    {
      $append .= ' WHERE user_id='.$user_id;
      $orderBy='';
    }
              
              $sql = "SELECT a.*
                FROM tbl_mst_users AS a
                ".$append."
                ORDER BY user_id DESC";
              $result = $this->db->query($sql)->result_array();
            
           //echo "<pre>"; print_r($result); exit();   
          
          return $result;
   
    }

    public function updateStatus($user_id='0',$status='')
  {
    if(intval($user_id)>0 && $status!='')
        {
            $data['status'] = $status;
            $this->db->where('user_id',$user_id)->update('tbl_mst_users',$data);
            $this->session->set_flashdata('success','Status Updated Successfully...');

        }
  }
  public function manageUserDelete($user_id=0)
  {
    if(intval($user_id)>0)
    { 
      $sql=$this->db->where('user_id',$user_id)->delete('tbl_mst_users');
    //echo $this->db->last_query($sql);exit();
        $this->session->set_flashdata('deleted', 'Post Deleted Successfully...');
    }
  }


}#EOF