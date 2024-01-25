<?php $this->load->view('admin/header');?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="multisteps-form mb-5">
  


  <div class="row match-height ">
     <div class="col-md-2">
     </div>
    <div class="col-md-8">
      <div class="card mb-4">
        
        <div class="card-content collapse show">
          <div class="card-body">

           <!--  <div class="card-text">
              <p>This is another variation to the default form control styling. In this example all the form controls has square styling.
                To apply square style add class
                <code>square</code> to any form control.</p>
            </div> -->

            <form action="<?php echo ADMIN_DESIGNER_SUBMIT_URL; ?>" method="post"  c enctype="multipart/form-data">
              <div class="form-body">

               <div class="form-group">
                  <label for="donationinput1">First Name <span style="color: red">*</span></label>
                  <input type="text" id="validationCustom01" class="form-control square" placeholder="name" name="first_name" required>
                    <div class="invalid-feedback">
                    Please provide First Name.
                  </div>
                </div>

                 <div class="form-group">
                  <label for="donationinput1">Last Name<span style="color: red">*</span></label>
                  <input type="text" id="donationinput1" class="form-control square" placeholder="name" name="last_name" required>
                    <div class="invalid-feedback">
                    Please provide Last Name.
                  </div>
                </div>

                <div class="form-group">
                  <label for="donationinput2">Email<span style="color: red">*</span></label>
                  <input type="email" id="donationinput2" class="form-control square" placeholder="email" name="email" required>
                    <div class="invalid-feedback">
                    Please provide Email.
                  </div>
                </div>

                 <div class="form-group">
                  <label for="donationinput5">Password<span style="color: red">*</span></label>
                  <input type="password" id="donationinput5" class="form-control square"  placeholder="Password" name="password" required>
                    <div class="invalid-feedback">
                    Please provide Password.
                  </div>
                </div>

                <div class="form-group">
                  <label for="donationinput3">Contact Number<span style="color: red">*</span></label>
                  <input type="tel" id="donationinput3" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" class="form-control square" minlength="10" maxlength="10" name="phone" required="required">
                    <div class="invalid-feedback">
                    Please provide valid Contact Number.
                  </div>
                </div>
                 <div class="form-group">
                    <label for="donationinput3">Profile Photo</label>
                      <div class="custom-file">
                        <input type="file" class="multisteps-form__input form-control" name="profile_img" id="inputGroupFile01" accept=".jpeg,.jpg,.png">
                       
                        
                  </div>
                </div>

                



                <div class="form-group">
                  <label for="companyinput8">Address</label>
                  <textarea id="companyinput8" rows="5" class="form-control" name="comment" placeholder="Address"></textarea>
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

    </script>