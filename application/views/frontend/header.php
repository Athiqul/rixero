<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rixero|| <?php echo isset($page_title)?$page_title:'';?></title>
    <link rel="shortcut icon" href="<?php echo ASSET_WEB_PATH;?>img/favicon.png" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css"
        integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
        integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css  -->
    <link rel="stylesheet" href="<?php echo ASSET_WEB_PATH;?>css/style.css">
    <?php
    header("Expires: Tue, 01 Jan 2030 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>
<style>
    .dashboardcss:hover{
        display: block;
    }
</style>
</head>

<body>
    <nav class="nav" id="NavBar1" style="background-color: white;">
        <div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-3">
            <a href="<?php echo FRONTEND_HOME; ?>"><img src="<?php echo ASSET_WEB_PATH;?>img/logo.png" width="150px" alt=""></a>
        </div>
        <div class="col-9 text-end hamburgerMenu">
            <i class="fa-solid fa-bars" id="MenuIcon"></i>
        </div>
        <div class="col-9">
            <ul class="navigationArea">
             <li><a href="<?php echo site_url();?>">Home</a></li>
                <li><a href="<?php echo site_url('work'); ?>">Our Work</a></li>
                <li><a href="<?php echo FRONTEND_OUR_WORK_URL; ?>">Our Services</a></li>
               
                <li><a href="<?php echo FRONTEND_CONTACT_URL; ?>">Contact Us</a></li>
                <li><a href="<?php echo FRONTEND_ABOUT_URL; ?>">About Us</a></li>
                 <?php  $user_id= $this->session->userdata('user_id');
       
        if($user_id>0)
        { 
            $this->db->select();
            $this->db->where('user_id',$user_id);
            $res=$this->db->get('tbl_mst_users')->row_array();

            ?>
                <li><a class="dashboardcss" href="<?php echo site_url('admin/dashboard');?>" class="loginButton"><?php echo isset($res['first_name'])?$res['first_name']:''; ?><?php //echo isset($res['last_name'])?$res['last_name']:''; ?></a>
                    <ul style="display:none" class="dropdownDDL">
                        <li> <a href="<?php echo ADMIN_DASHBOARD_URL ;?>">Dashboard </a></li>
                        <hr>
                        <li ><a href="<?php echo ADMIN_PROFILE_DETAILS_URL;?>">Manage Profile </a></li>
                        <hr>
                        <li> <a href="<?php echo LOGOUT_URL;?>"> Logout</a></li>
                        <hr>
                    </ul>



                </li>
                <li><a href="<?php echo LOGOUT_URL;?>"><i class="fa-solid fa-power-off" style='   font-family: "Font Awesome 6 Free";
    font-weight: 900;
    color: #00f2a6;'></i> <span></span></a></li>

        <?php } else { ?>
                <li><a href="<?php echo site_url('login');?>" class="loginButton" style="border-radius:5px">Login</a></li>
            <?php } ?>
                
                <li><a href="#"><i class="fa-solid fa-bell"></i> <span>Notification</span></a></li>
                <!-- 
                <li><a href="<?php echo CUSTOMER_LOGIN_URL; ?>" class="loginButton">Login</a></li>
                <li><a href="#"><i class="fa-solid fa-wallet"></i> <span>Wallet</span></a></li>
                <li><a href="#"><i class="fa-solid fa-bell"></i> <span>Notification</span></a></li> -->
            </ul>
        </div>
    </div>
</div>
 </nav>