<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo SITE_FULL_NAME; ?> | <?php echo (isset($page_title))?$page_title:'';?></title>
		<meta name="description" content="" />
		<meta name="Author" content="<?php echo SITE_AUTHOR; ?>" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="<?php echo ADMIN_ASSETS; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="<?php echo ADMIN_ASSETS; ?>assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_ASSETS; ?>assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_ASSETS; ?>assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>

		<div class="padding-15">

			<div class="login-box">

				<!--
				<div class="alert alert-danger noradius">Email not found!</div>
				<div class="alert alert-success noradius">Email sent!</div>
				-->

				<!-- password form -->
				<form action="<?php echo ADMIN_CONFIRM_PASSWORD_DETAILS_SUBMIT_URL; ?>" method="post" class="sky-form boxed ">
					<header><i class="fa fa-key"></i> <b>Confirm Password</b></header>
					
					<fieldset>	
						<!-- ERROR MESSAGE START -->
						<?php $this->load->view('admin/component/dismissible_message'); ?>
						<!-- ERROR MESSAGE END -->
						<label class="label"><strong>Password</strong></label>
						<label class="input">
							<i class="icon-append"></i>
							<input type="password" name="password" id="password" placeholder="Enter Password..." required="required">
							<span class="tooltip tooltip-top-right">Type your Password</span>
						</label>

						<label class="label"><strong>Confirm Password</strong></label>
						<label class="input">
							<i class="icon-append"></i>
							<input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password..." required="required">
							<span class="tooltip tooltip-top-right">Type your Confirm Password</span>
						</label>
						 <a href="<?php echo ADMIN_LOGIN_URL; ?>"><b>Back to Login</b></a> 

					</fieldset>

					<footer>
						<input type="hidden" name="user_id" id="user_id"  value="<?php echo $user_id; ?>">
						<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-key"></i> Save</button>
					</footer>
				</form>
				<!-- /password form -->

				<!-- <div class="alert alert-default noradius">
					The reset link will be sent to your email address. Click the link and reset your account password.
				</div>
 -->
				<hr />

				<div class="text-center">
					© <?php echo date('Y')?> Copyright <a href="<?php //echo FRONT_HOME_URL; ?>" target="_blank"><?php echo SITE_FULL_NAME; ?></a>.<br> All Rights Reserved.Design & developed by  <a href=""    target="_blank"><br>Absolute Soft System & Zquick.</a>
				</div>


				<!-- <div class="socials margin-top-10 text-center">
					<a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
				</div> -->

			</div>

		</div>


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '<?php echo ADMIN_ASSETS; ?>assets/plugins/';</script>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>assets/js/app.js"></script>
	</body>
</html>