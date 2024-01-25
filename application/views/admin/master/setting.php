<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">

          

          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
						
						<form class="multisteps-form__form mb-8" action="<?php echo ADMIN_SETTING_SAVE_URL; ?>" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<!-- <h4 class="form-section">
									<i class="fa fa-user"></i>User Info</h4> -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">Title</label>
											<input type="text" id="companyinput1" class="form-control" name="title" value="<?php echo (isset($user_details['title']))?$user_details['title']:'';?>" placeholder="Enter Site Name...">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">Email</label>
											<input type="email" id="companyinput1" class="form-control" name="email" value="<?php echo (isset($user_details['email']))?$user_details['email']:'';?>" placeholder="Enter Email...">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">Mobile Number</label>
											<input type="tel" id="companyinput1" class="form-control" name="mobile" minlength="10" maxlength="10" pattern="[0-9]+" title="Please Enter 10 digit no." value="<?php echo (isset($user_details['mobile']))?$user_details['mobile']:'';?>" placeholder="Enter Phone..." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">Coin Price <span style="color:red">(In ruppess)</span></label>
											<input type="text" id="companyinput1" class="form-control" name="coin_value"  pattern="[0-9]+" title="Please Enter 10 digit no." value="<?php echo (isset($user_details['coin_value']))?$user_details['coin_value']:'';?>" placeholder="Enter Coin value..." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">Per Task Charges <span style="color:red">(In Coin)</span></label>
											<input type="text" id="companyinput1" class="form-control" name="per_task_value"  pattern="[0-9]+"  value="<?php echo (isset($user_details['per_task_value']))?$user_details['per_task_value']:'';?>" placeholder="Enter task value.." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">Task Changes Amount <span style="color:red">(In Coin)</span></label>
											<input type="text" id="companyinput1" class="form-control" name="per_changes_amount"  pattern="[0-9]+"  value="<?php echo (isset($user_details['per_changes_amount']))?$user_details['per_changes_amount']:'';?>" placeholder="Enter task Changes.." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>
									
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">Facebook</label>
											<input type="url" id="companyinput1" class="form-control" name="facebook" value="<?php echo (isset($user_details['facebook']))?$user_details['facebook']:'';?>" placeholder="Enter Facebook...">
										</div>
									</div>

								</div>
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">instagram</label>
											<input type="url" id="companyinput1" class="form-control" name="instagram"  title="Please Enter instagram" value="<?php echo (isset($user_details['instagram']))?$user_details['instagram']:'';?>" placeholder="Enter instagram..." >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">linkedin</label>
											<input type="url" id="companyinput1" class="form-control" name="linkdin" value="<?php echo (isset($user_details['linkdin']))?$user_details['linkdin']:'';?>" placeholder="Enter linkedin ...">
										</div>
									</div>
									
								</div>

								<?php 
											
											    	$profile_img = (isset($user_details['logo']))?$user_details['logo']:'';
											
												
											?>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label id="projectinput8" class="file center-block">
											<input type="file" class="multisteps-form__input form-control" id="file" name="logo" accept=".png,.jpeg,.png">
											<span class="file-custom"></span>
										</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<img height="100" width="100" class="img-circle" src="<?php echo PROFILE_DISPLAY_PATH_NAME; ?><?php echo $profile_img; ?>">
										</div>
									</div>
								</div>
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
								
							</div>

							<div class="form-actions">
								<a  href='<?php echo ADMIN_DASHBOARD_URL; ?>' class="btn btn-danger mr-1">
									<i class="fa fa-close"></i> Cancel
								</a>
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-save"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>

	


	
	</div>
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

<?php $this->load->view('admin/footer');?>
