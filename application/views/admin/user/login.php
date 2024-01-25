
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo ASSETPATH;?>img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo ASSETPATH;?>img/logo-ct-dark.png">
    <title> Rixero|| Login </title>


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="<?php echo ASSETPATH;?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo ASSETPATH;?>/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo ASSETPATH;?>/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="<?php echo ASSETPATH;?>css/soft-ui-dashboard.min.css?v=1.0.9" rel="stylesheet" />

    <style>
        .async-hide {
          opacity: 0 !important
      }
  </style>

</head>
<body class="bg-gray-100">


    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


    

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../asset/img/curved-images/curved9.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome Back!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    
                        <h5 class="text-center"> <img src="<?php echo ASSETPATH;?>img/logo-ct-dark.png" width="100" height="100" style="
    width: 80%;
"></h5>
                        <?php $this->load->view('admin/component/dismissible_message.php'); ?>
                  
                    <div class="row px-xl-5 px-sm-4 px-3">
                       
                    </div>
                    <div class="card-body">
                        <form role="form" class="text-start" action="<?php echo LOGIN_URL; ?>" method="post">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="<?php if(isset ($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required="required">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" value="<?php if(isset ($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="remember_me" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?> >
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                            </div>
                          <!--   <div class="mb-2 position-relative text-center">
                                <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                    or
                                </p>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn bg-gradient-dark w-100 mt-2 mb-4">Sign up</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<script src="<?php echo ASSETPATH;?>js/core/popper.min.js"></script>
<script src="<?php echo ASSETPATH;?>js/core/bootstrap.min.js"></script>
<script src="<?php echo ASSETPATH;?>js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo ASSETPATH;?>js/plugins/smooth-scrollbar.min.js"></script>

<script src="<?php echo ASSETPATH;?>js/plugins/dragula/dragula.min.js"></script>
<script src="<?php echo ASSETPATH;?>js/plugins/jkanban/jkanban.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
</html>