<!DOCTYPE html>
<html lang="en">
<?php
$this->CI =& get_instance();
$this->CI->load->model('admin/User_model','user_model');
$this->CI->load->model('admin/Common_model','common_model');
$user_id = $this->session->userdata('user_id');    
$userdetails = $this->CI->user_model->getUserDetails($user_id); 
$task1 = $this->CI->common_model->totalTaskStatusBy(); 
$user_type=$this->session->userdata('user_type');
//print_r($userdetails);exit();

?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="https://flnew.mcops.in/demo/asset/img/logo-ct-dark.png">
    <title>
       Rixero
    </title>


    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="<?php echo ASSETPATH;?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo ASSETPATH;?>/css/nucleo-svg.css" rel="stylesheet" />

    <script src="<?php echo ASSETPATH;?>/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo ASSETPATH;?>/css/nucleo-svg.css" rel="stylesheet" />
    <link href="<?php echo ASSETPATH;?>/css/toastr.min.css" rel="stylesheet" />
<?php if($user_type=='ADMIN')
{ ?>
    <link id="pagestyle" href="<?php echo ASSETPATH;?>/css/soft-ui-dashboard.minc924.css?v=1.0.6" rel="stylesheet" />
<?php }elseif($user_type=='CUSTOMER'){
    ?>
    <link id="pagestyle" href="<?php echo ASSETPATH;?>/css/customer/soft-ui-dashboard.minc924.css?v=1.0.6" rel="stylesheet" />

<?php }elseif($user_type=='DESIGNER' || $user_type=='DESIGNERHEAD')
{?>
    <link id="pagestyle" href="<?php echo ASSETPATH;?>/css/designer/soft-ui-dashboard.minc924.css?v=1.0.6" rel="stylesheet" />

<?php } ?>
    <style>
        .async-hide {
          opacity: 0 !important
      }
  </style>
 
</head>
<body class="g-sidenav-show  bg-gray-100">


    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
       
        <?php $this->load->view('admin/sidebar');?>
        
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <!-- <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard">Online Builder</a>
            </li> -->
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>

            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo isset($userdetails['first_name'])?$userdetails['first_name']:''; ?></span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="<?php echo ADMIN_PROFILE_DETAILS_URL.'/'.$user_id; ?>">
                        <div class="d-flex py-1">
                            
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                  <i class="fa fa-user"></i> &nbsp;&nbsp;Edit Profile
                                </h6>
                            </div>
                        </div>
                    </a>
                </li> 
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="<?php echo ADMIN_CHANGE_PASSWORD_DETAILS_URL.'/'.$user_id; ?>">
                        <div class="d-flex py-1">
                            
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <i class="fa fa-key"></i>&nbsp;&nbsp;Change Password
                                </h6>
                                
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item border-radius-md" href="<?php echo LOGOUT_URL; ?>">
                        <div class="d-flex py-1">
                            
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                  <i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout
                                </h6>
                               
                            </div>
                        </div>
                    </a>
                </li>
              </ul>
            </li>
            
            
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-wallet fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <?php
            $count=1;
            $count1=1;
            $this->db->select();
                    if($user_type=='CUSTOMER')
                    {
                      $this->db->where('customer_id',$user_id);
                    }
                     if($user_type=='DESIGNER')
                    {
                      $this->db->where('designer_id',$user_id);
                      $this->db->or_where('is_new','1');
                    }
                    $this->db->where('is_seen','0');
                    $this->db->order_by('id','desc');
                      $this->db->limit('7');
                      $res=$this->db->get('notification_tbl')->result_array();


                      $this->db->select();
                    if($user_type=='CUSTOMER')
                    {
                      $this->db->where('customer_id',$user_id);
                    }
                     if($user_type=='DESIGNER')
                    {
                      $this->db->where('designer_id',$user_id);
                      $this->db->or_where('is_new','1');
                    }
                    $this->db->where('is_seen','0');
                    $this->db->order_by('id','desc');
                      $countAr=$this->db->get('notification_tbl')->result_array();
                    



                      ?>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer" style="font-size:19px"></i><span style="position: absolute;
    right: -10%;
    top: -22%;
    content: attr(data-count);
    font-size: 61%;
    padding: 0.6em;
    border-radius: 999px;
    line-height: .75em;
    color: white;
    background: rgb(249 48 140);
    text-align: center;
    min-width: 2em;
    font-weight: bold;"><?php echo count($countAr);?></span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <?php 
                
                      if($res!='' && !empty($res))
                      {
                        foreach ($res as $key => $value) { ?>
                       
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?php echo base_url();?><?php echo $value['url'];?>">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                       
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                       <span class="font-weight-bold"><?php echo $value['title'];?></span> 
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          <?php echo $value['created_on'];?>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              <?php }?>
          <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?php echo base_url('admin/Notification');?>">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                       
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                       <span class="font-weight-bold"><?php echo 'View More';?></span> 
                        </h6>
                       
                      </div>
                    </div>
                  </a>
                </li>

            <?php }else{ ?>

                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?php echo base_url('admin/Notification');?>">
                    <div class="d-flex py-1">
                    
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                       <span class="font-weight-bold"><?php echo 'No Notification';?></span> 
                        </h6>
                       
                      </div>
                    </div>
                  </a>
                </li>

           <?php } ?>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
         <hr class="horizontal dark my-1">