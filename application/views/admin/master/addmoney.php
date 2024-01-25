<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Add Money</h3>
          </div>
          
        </div>
<!--/ eCommerce statistic -->

 <div class="content-body"><!-- Zero configuration table -->
            <section id="basic-form-layouts">
  


  <div class="row match-height ">
     <div class="col-md-2">
     </div>
    <div class="col-md-4">
      <div class="card">
        
        <div class="card-content collapse show">
          <div class="card-body">
            <?php $this->load->view('admin/component/dismissible_message');?>

         

            <form action="<?php echo ADMIN_PAYMENT_URL;?>" method="post"   enctype="multipart/form-data">
              <div class="form-body">
                  <div class="row mt-3">
                      <div class="col-12 col-sm-12">
                        <div class="form-group">
                          <label for="donationinput1">Add Money <span style="color: red">*</span></label>
                            <input type="number" name="amount" class=" form-control" placeholder="Enter Amount" onkeypress="if(event.which < 48 || event.which > 57 ) if(event.which != 8) return false;" min="1" required>
                        </div>
                      </div>
                    </div>

                

              

                
              </div>

              <div class="form-actions text-center mt-3">
                <a href="<?php echo ADMIN_DASHBOARD_URL;?>" class="btn btn-danger mr-1">
                  <i class="fa fa-close"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-money"></i> Add Money
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  
  </div>


  
</section>
<!--/ Statistics -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

<?php $this->load->view('admin/footer');?>
 