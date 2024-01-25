<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rixero</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css"
        integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css  -->
    <link rel="stylesheet" href="<?php echo ASSET_WEB_PATH;?>css/style.css">

</head>

<body>
    <nav class="nav" id="NavBar">

    </nav>

    <div class="container addMarginNav py-md-5">
        <div class="row justify-content-between">
            <div class="col-md-3 col-12">
                <img src="<?php echo ASSET_WEB_PATH;?>img/person_working.png" alt="" class="img-fluid d-none d-md-block">
            </div>
            <div class="col-md-5 col-12 position-relative overflow-hidden">
                <form action="<?php echo base_url('login/checkuserlogin'); ?>" method="post">

                    <div class="loginForm login" >
                        <div>
                            <h3>
                                Login
                            </h3>
                            <p>
                                Hey, Enter your details to sign in <br>
                                to your account
                            </p>
                            <p><?php $this->load->view('admin/component/dismissible_message.php'); ?></p>
                        </div>
                        <div class="my-3">
                            <input type="email" placeholder="Email" name="email" value="<?php if(isset ($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required="required">
                        </div>
                        <div class="my-3">
                            <input type="password" name="password" placeholder="Password" value="<?php if(isset ($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label for="rememberme">
                                <input type="checkbox" name="remember_me" id="remember_me" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?>>  Remember me
                            </label>
                            <div>
                                <a href="#">Forget Password</a>
                            </div>
                        </div>
                        <div>
                            <button type="Submit">Sign in</button>
                        </div>
                        <div>
                            <button class="google"><img src="<?php echo ASSET_WEB_PATH;?>img/google.png" alt="Google"> Sign in with Google</button>
                        </div>
                        <br>
                        <div class="dontHaveAcc">
                            <p>
                                Don’t have an account? <a href="#aaaa" id="signupFormToggle">Sign up</a>
                            </p>
                        </div>
                    </div>



                </form>
                <form action="<?php echo CUSTOMER_SAVE_REGISTRATION_URL;?>" method='post'>
                    <div class="loginForm signup">
                        <div class="dontHaveAcc">
                            <p>
                                Already have an account? <a href="#" id="loginTarget">Sign in</a>
                            </p>
                        </div>
                        <div>
                            <h3>
                                Register
                            </h3>
                            <p>
                                Hey, Enter your details to Register <br>
                                your account
                            </p>
                        </div>
                        <div class="my-3">
                            <input type="text" name="first_name" placeholder="First Name">
                        </div>
                        <div class="my-3">
                            <input type="text" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="my-3">
                            <input type="tel" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" minlength="10" maxlength="10" name="phone">
                        </div>
                        <div class="my-3">
                            <input type="email"  name="email" placeholder="Email">
                        </div>
                        <div class="my-3">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        

                        <div>
                            <button type="Submit">Register</button>
                        </div>
                        <div>
                            <button class="google"><img src="<?php echo ASSET_WEB_PATH;?>img/google.png" alt="Google"> Sign up with Google</button>
                        </div>
                        <br>
                       
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-12 align-self-end">
                <img src="<?php echo ASSET_WEB_PATH;?>img/personWorkingDesktop.png" alt="" class="img-fluid">

            </div>
        </div>
    </div>
    <footer id="footer">

    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"
        integrity="sha512-vyRAVI0IEm6LI/fVSv/Wq/d0KUfrg3hJq2Qz5FlfER69sf3ZHlOrsLriNm49FxnpUGmhx+TaJKwJ+ByTLKT+Yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="<?php echo ASSET_WEB_PATH;?>js/script.js"></script>
    <script>
        $("#signupFormToggle").click(function () {

            $(".signup").addClass("hidden")
            setTimeout(() => {
                
                $(".login").addClass("hidden")
                $(".signup").addClass("unset")
            }, 1000);
        })
        $("#loginTarget").click(function () {

            $(".signup").removeClass("unset")
            $(".login").removeClass("hidden")
            $(".signup").removeClass("hidden")
            setTimeout(() => {
                
            }, 1000);
        })
    </script>
</body>

</html>