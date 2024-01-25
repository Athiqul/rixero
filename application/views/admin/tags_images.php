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

                <?php if($workAr!='' && !empty($workAr))
                    {
                        foreach ($workAr as $key => $value) { ?>

                    <div class="gallery-item">
                        <div class="content">
                            
                            <img src="<?php echo base_url('uploads/tags/').$value['images'];?>" alt="" style="width: 25%;">
                        </div>
                    </div>
                <?php } } ?>

              
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