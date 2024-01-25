<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tags Add</h3>
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

          

            <form  action="<?php echo base_url('admin/tags/savetagsData'); ?>" method="post" enctype="multipart/form-data"  class="needs-validation" novalidate >
              <div class="form-body">

                <div class="form-group">
                  <label for="donationinput1">Select Tags <span style="color: red">*</span></label>
                  <select name="tag_id" class="form-control">
                    <option>--Select--</option>
                    <?php if($listAr!='' && !empty($listAr))
                    {
                      foreach ($listAr as $key => $value) { ?>
                        <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                        
                     <?php }
                    } ?>
                  </select>
                 
                </div>

                <div class="form-group">
                  <label for="companyinput8">Images</label>
                  <input type="file" class="form-control" name="images[]" accept=".png,.jpg,.jpeg" multiple>
                
                </div>

                
                  <input type="hidden" name="banner_id" value="<?php //echo $banner_id;?>">
                

              </div>

              <div class="form-actions right">
                <a href="<?php echo base_url('admin/tags');?>" class="btn btn-danger mr-1">
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