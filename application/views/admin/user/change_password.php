<?php $this->load->view('admin/header');?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-6">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">
	<div class="row match-height">
		<div class="col-md-12 ">
			<div class="card">
				
				<div class="card-content collapse show">
					<div class="card-body">
						
						<form class="form" action="<?php echo ADMIN_CHANGE_PASSWORD_DETAILS_SUBMIT_URL; ?>" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section">
									<i class="fa fa-key"></i>Change Password</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="companyinput1">Old Password <span style="color: red;">*</span></label>
											<input type="password" id="companyinput1" class="form-control" name="old_password" id="old_password" value="" placeholder="Old Password..." title="Enter password" required>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="companyinput1">New Password <span style="color: red;">*</span></label>
											<input type="password" id="companyinput1" class="form-control" name="new_password" id="new_password" value="" placeholder="New Password..." class="form-control required" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="companyinput5">Confirm Password <span style="color: red;">*</span></label>
											<input type="password" id="companyinput1" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password..." required >
										</div>
									</div>
								</div>

							

								
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
								
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

	


	
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

<?php $this->load->view('admin/footer');?>
