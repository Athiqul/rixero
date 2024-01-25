<?php
$this->CI =& get_instance();
$this->CI->load->model('admin/User_model','user_model');
$user_id = $this->session->userdata('user_id');    
$userdetails = $this->CI->user_model->getUserDetails($user_id); 
$user_type=$this->session->userdata('user_type');
//print_r($userdetails);exit();

?>

  <!-- BEGIN: Head-->
  
<head>
    

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/timeline/vertical-timeline.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/pages/timeline.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/css/plugins/extensions/toastr.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>app-assets/vendors/css/extensions/toastr.css">
     
    <!-- END: Page CSS-->
<script src="https://use.fontawesome.com/f8c9ecd472.js"></script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS; ?>assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body  data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    
