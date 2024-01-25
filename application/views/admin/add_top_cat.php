<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title"> Add Top Category</h3>
          </div>
          
        </div>
<!--/ eCommerce statistic -->

 <div class="content-body"><!-- Zero configuration table -->
            <section id="basic-form-layouts">
  


  <div class="row match-height ">
     <div class="col-md-2">
     </div>
    <div class="col-md-8">
      <div class="card">
        
        <div class="card-content collapse show">
          <div class="card-body">

          

            <form  action="<?php echo base_url('admin/Top_category/savetagsData'); ?>" method="post" enctype="multipart/form-data"  class="needs-validation" novalidate >
              <div class="form-body">

                <div class="form-group">
                  <label for="donationinput1">Category Name <span style="color: red">*</span></label>
                 <input type="text" name="cat_name" class="form-control" required>
                 
                </div>

                
                
                 
                

              </div>

              <div class="form-actions right">
                <a href="<?php echo base_url('admin/Top_category');?>" class="btn btn-danger mr-1">
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


  
</section>
<!--/ Statistics -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

<?php $this->load->view('admin/footer');?>
