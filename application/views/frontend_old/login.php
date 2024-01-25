 <?php $this->load->view('frontend/header');?>

    <div class="container addMarginNav py-md-5">
        <div class="row justify-content-between">
            <div class="col-md-3 col-12">
                <img src="<?php echo ASSET_WEB_PATH;?>img/person_working.png" alt="" class="img-fluid d-none d-md-block">
            </div>
            <div class="col-md-5 col-12 position-relative overflow-hidden">
                 <form action="<?php echo base_url('login/checkuserlogin'); ?>" method="post">

                    <div class="loginForm login" >
                        <div>
                            <h3> Login</h3>
                            <p>
                                Hey, Enter your details to sign in <br>
                                to your account
                            </p>
                            <p><?php $this->load->view('frontend/component/dismissible_message.php'); ?></p>
                        </div><div class="my-3">
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
                                <a href="#">Forgot Password</a>
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
                            <input type="tel" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" placeholder="Enter 10 digit mobile number" minlength="10" maxlength="10" name="phone">
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
     <?php $this->load->view('frontend/footer');?>
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