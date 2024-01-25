<?php $this->load->view('admin/header');?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Add Page Type</h3>
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

            <form  action="<?php echo ADMIN_PAGES_DETAILS_URL; ?>" method="post" enctype="multipart/form-data"  >
              <div class="form-body">

                <div class="form-group"><?php $banner_id1= isset($pageAr['banner_id'])?$pageAr['banner_id']:'';?>
                  <label for="donationinput1" > Select Type <span style="color: red">*</span></label>
               <select class="form-control" name="banner_id">
                 <?php if($bannerAr!='' && !empty($bannerAr))
                        {
                            foreach ($bannerAr as $key => $value) { 
                              $selected='';
                              if($banner_id1==$value['banner_id'])
                              {
                                $selected='selected';
                              }
                              ?>
                           
                       <option value="<?php echo $value['banner_id']; ?>" <?php echo $selected;?>><?php echo $value['b_name']; ?></option>
                     <?php } } ?>
               
               </select>
                   
                </div>


                <div class="form-group"><?php $top_cat_id1= isset($pageAr['top_cat_id'])?$pageAr['top_cat_id']:'';?>
                  <label for="donationinput1" > Select Category <span style="color: red">*</span></label>
               <select class="form-control" name="top_cat_id" required>
                <option value="">--Select--</option>
                 <?php if($top_catAr!='' && !empty($top_catAr))
                        {
                            foreach ($top_catAr as $key => $value) { 
                              $selected='';
                              if($top_cat_id1==$value['id'])
                              {
                                $selected='selected';
                              }
                              ?>
                           
                       <option value="<?php echo $value['id']; ?>" <?php echo $selected;?>><?php echo $value['cat_name']; ?></option>
                     <?php } } ?>
               
               </select>
                   
                </div>

                
                <div class="form-group">
                  <label for="donationinput1">Title <span style="color: red">*</span></label>
                  <input type="text" id="validationCustom01" class="form-control square" placeholder="Page Type" name="page_type" value="<?php echo isset($pageAr['page_type'])?$pageAr['page_type']:'';?>" required>
                   
                </div>
                <div class="form-group">
                  <label for="donationinput1"> Cost <span style="color: red">* (in Rixi coin)</span></label>
                  <input type="text" id="validationCustom01" class="form-control square" placeholder="Price" name="cost" value="<?php echo isset($pageAr['cost'])?$pageAr['cost']:'';?>" required>
                   
                </div>

                <div class="form-group">
                  <label for="donationinput1"> Icon <span style="color: red">* </span></label>
                <input type="file" name="icomImg" class="form-control square" accept=".jpeg,.png,.jpg">
                   
                </div>

               

                
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                

              </div>

              <div class="form-actions right">
                <a href="<?php echo ADMIN_PAGES_LIST_URL;?>" class="btn btn-danger mr-1"><i class="fa fa-close"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save
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