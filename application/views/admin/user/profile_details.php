<?php $this->load->view('admin/header');?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">
  <div class="row">
    <div class="col-xl-3 col-lg-5 col-md-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="card-title-wrap bar-primary">
            <div class="card-title" style="font-size: x-large;font-weight: 800;">Wallet Amount -&nbsp;&nbsp;<?php echo isset($walletAr['amount'])?$walletAr['amount']:0;?>&nbsp;coins </div>
            <hr>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body p-0 pt-0 pb-1">
            <ul>
            	<form action="<?php echo ADMIN_PAYMENT_URL;?>" method="post">
            		<div class="form-group">
            			<input type="number" name="amount" class=" form-control" placeholder="Enter Amount" onkeypress="if(event.which < 48 || event.which > 57 ) if(event.which != 8) return false;" min="1" required>
            		</div>
            		  <button type="submit" class="mr-1 mb-1 btn btn-info btn-min-width" ><i class="fa fa-money"></i> Add Money</button>
            		
            	</form>
              
              
            </li>
            </ul>
          </div>
        </div>

      </div>
      
    </div>
    <div class="col-xl-9 col-lg-7 col-md-12">
      <!--Project Timeline div starts-->
      <div id="timeline">
        <div class="card">
         
          <div class="card-body">
            <form class="form" action="<?php echo ADMIN_PROFILE_DETAILS_SUBMIT_URL; ?>" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section">
									<i class="fa fa-user"></i>User Info</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">First Name</label>
											<input type="text" id="companyinput1" class="form-control" name="first_name" value="<?php echo (isset($user_details['first_name']))?$user_details['first_name']:'';?>" placeholder="Enter First Name...">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">Last Name</label>
											<input type="text" id="companyinput1" class="form-control"  name="last_name" value="<?php echo (isset($user_details['last_name']))?$user_details['last_name']:'';?>" placeholder="Enter Last Name..." >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput1">Email</label>
											<input type="email" id="companyinput1" class="form-control" name="email" value="<?php echo (isset($user_details['email']))?$user_details['email']:'';?>" placeholder="Enter Email...">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyinput5">Phone</label>
											<input type="tel" id="companyinput1" class="form-control" name="phone" minlength="10" maxlength="10" pattern="[0-9]+" title="Please Enter 10 digit no." value="<?php echo (isset($user_details['phone']))?$user_details['phone']:'';?>" placeholder="Enter Phone..." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>
									</div>
								</div>

								<?php 
											
											    	$profile_img = (isset($user_details['profile_img']))?$user_details['profile_img']:'';
											
												
											?>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label id="projectinput8" class="file center-block">
											<input type="file" id="file" name="image" accept=".png,.jpeg,.png">
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
      <!--Project Timeline div ends-->
    </div>
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
