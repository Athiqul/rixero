<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Task  Add</h3>
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
            <?php $this->load->view('admin/component/dismissible_message');?>

           <!--  <div class="card-text">
              <p>This is another variation to the default form control styling. In this example all the form controls has square styling.
                To apply square style add class
                <code>square</code> to any form control.</p>
            </div> -->

            <form action="<?php echo ADMIN_TASK_SAVEDATA_URL;?>" method="post"   enctype="multipart/form-data">
              <div class="form-body">

                <div class="form-group">
                  <label for="donationinput1">Banner Name <span style="color: red">*</span></label>
                  <input type="text" id="validationCustom01" class="form-control square" placeholder="name" name="t_name" required>
                    <div class="invalid-feedback">
                    Please provide Banner Name.
                  </div>
                </div>

                <div class="form-group">
                  <label for="donationinput4">Designer Type</label>
                  <select id="t_type"  class="form-control" name="t_type" onclick="createPagenameDDL()" required>
                        <option value="" selected="" >----Select----</option>
                        <?php if($bannerType!='' && !empty($bannerType))
                        {
                          foreach ($bannerType as $key => $bannerType) { ?>
                            <option value="<?php echo $bannerType['banner_id'];?>"><?php echo $bannerType['b_name'];?></option>
                           
                          <?php }
                        } ?>
                       
                      </select>
                </div>

                <!-- <div class="form-group">
                  <label for="donationinput2">Duration<span style="color: red">*(Days)</span></label>
                  <input type="number" id="donationinput2" class="form-control square" placeholder="Duration" name="t_duration" required>
                    <div class="invalid-feedback">
                    Please provide Duration.
                  </div>
                </div>
 -->
                <!-- <div class="form-group">
                  <label for="donationinput2">Estimate Date<span style="color: red">*</span></label>
                  <input type="date" id="datepicker" class="form-control square" placeholder="Estimate Date" name="last_date" required>
                    <div class="invalid-feedback">
                    Please provide Estimate Date.
                  </div>
                </div> -->

                  <div class="form-group">
                  <label for="donationinput4"> Banner Size</label>
                  <select id="t_size_type_id"  class="form-control" name="t_size_type_id" onchange="createCoursenameDDL();">
                        <option value="none" selected="" disabled="">Select</option>
                        <?php if($measureType!='' && !empty($measureType))
                        {
                          print_r($measureType);
                          foreach ($measureType as $key => $measureType) { ?>
                            <option value="<?php echo $measureType['id'];?>"><?php echo $measureType['page_type'];?></option>
                           
                          <?php }
                        } ?>
                       
                      </select>
                </div>

                <div class="form-group">
                  <label for="donationinput4">Banner Type</label>
                  <select id="printable_type"  class="form-control" name="printable_type" >
                        <option value="Front">Front</option>
                        <option value="Front && Back" >Front && Back</option>
                        
                       
                      </select>
                </div>


                <!-- <div class="form-group">
                  <label for="donationinput2">Size<span style="color: red">*(width,height)</span></label>
                  <input type="text"  class="form-control square" name="t_size" placeholder="Enter Banner Size" name="s" required>
                    
                </div>
 -->
                 
                 <div class="form-group">
                    <label for="donationinput3">Document</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="t_file" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01" accept=".jpeg,.jpg,.png"></label>
                        
                  </div>
                </div>


                <div class="form-group">
                  <label for="companyinput8">Description</label>
                  <textarea id="companyinput8" rows="5" class="form-control" name="t_desc" placeholder="Description"></textarea>
                </div>

                
              </div>

              <div class="form-actions right">
                <button type="button" class="btn btn-danger mr-1">
                  <i class="fa fa-close"></i> Cancel
                </button>
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


  
function createPagenameDDL()
    {

      //alert();
        var banner_id = $("#t_type").val(); 
        //alert(pack_id);
        var parameters="banner_id="+banner_id;
        $.ajax({
            type: "POST",
            url: "<?php echo ADMIN_TASK_PAGE_URL; ?>",
            data: parameters,
            cache: false,
            success:function(responseData)
            {      


                $("#t_size_type_id").html(''); 
                $("#t_size_type_id").html(responseData); 
            }   
        });
    }

    </script>

    </script>