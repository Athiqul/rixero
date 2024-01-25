<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Customer Add</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Customer</a>
                  </li>
                  <li class="breadcrumb-item active">Add
                  </li>
                </ol>
              </div>
            </div>
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

           <!--  <div class="card-text">
              <p>This is another variation to the default form control styling. In this example all the form controls has square styling.
                To apply square style add class
                <code>square</code> to any form control.</p>
            </div> -->

            <form  action="<?php echo ADMIN_BANNER_SAVEDATA_URL; ?>" method="post" enctype="multipart/form-data"  class="needs-validation" novalidate >
              <div class="form-body">

                <div class="form-group">
                  <label for="donationinput1">Banner Name <span style="color: red">*</span></label>
                  <input type="text" id="validationCustom01" class="form-control square" placeholder="Banner name" name="b_name" value="<?php echo isset($bannerAr['b_name'])?$bannerAr['b_name']:'';?> " required>
                    <div class="invalid-feedback">
                    Please provide Banner Name.
                  </div>
                </div>

                <div class="form-group">
                  <label for="companyinput8">description</label>
                  <textarea id="companyinput8" rows="5" class="form-control" name="b_desc" placeholder="Description"><?php echo isset($bannerAr['b_desc'])?$bannerAr['b_desc']:'';?></textarea>
                </div>

                
                  <input type="hidden" name="banner_id" value="<?php echo $banner_id;?>">
                

              </div>

              <div class="form-actions right">
                <a href="<?php echo ADMIN_BANNER_LIST_URL;?>" class="btn btn-danger mr-1">
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
<script>
      
function createCoursenameDDL()
    {

      //alert();
        var state_id = $("#state_id").val(); 
        //alert(pack_id);
        var parameters="state_id="+state_id;
        $.ajax({
            type: "POST",
            url: "<?php echo ADMIN_CITY_DDL_URL; ?>",
            data: parameters,
            cache: false,
            success:function(responseData)
            {      


                $("#city_id").html(''); 
                $("#city_id").html(responseData); 
            }   
        });
    }

    </script>