<?php $this->load->view('admin/header');?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">

          

          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
              <form class="multisteps-form__form mb-8"  action="<?php echo ADMIN_CUSTOMER_SUBMIT_URL; ?>" method="post" enctype="multipart/form-data">

                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                 
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <label>First Name <span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="text" name="first_name" value="<?php echo  isset($details['first_name'])?$details['first_name']:'';?>" required placeholder="eg. Michael" />
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label> Last Name<span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="text" placeholder="eg. Prior" value="<?php echo  isset($details['last_name'])?$details['last_name']:'';?>" name="last_name" required />
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <label>Mobile Number <span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="text" pattern="[1-9]{1}[0-9]{9}" value="<?php echo  isset($details['phone'])?$details['phone']:'';?>" title="Enter 10 digit mobile number" minlength="10" maxlength="10" name="phone"  placeholder="eg. Creative Tim"required />
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Email<span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="email" name="email" value="<?php echo  isset($details['email'])?$details['email']:'';?>" placeholder="eg. soft@dashboard.com" />
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <label>Password<span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="password" name="password"  placeholder="******" />
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Profile Photo<span style="color: red">*</span></label>
                        <input class="multisteps-form__input form-control" type="file" placeholder="******" name="profile_img" accept=".jpeg,.jpg,.png"/>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-12">
                        <label>Address</label>
                        <textarea class="multisteps-form__input form-control"   name="address" placeholder="Address" accept=".jpeg,.jpg,.png"/><?php echo  isset($details['address'])?$details['address']:'';?></textarea>
                      </div>
                      
                    </div>
                    <input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">

                    <div class="button-row d-flex mt-4 text-center">
                      <a class="btn bg-danger  mb-0 js-btn-next" href="<?php echo ADMIN_CUSTOMER_LIST_URL;?>" style="color: white" >Cancel</a>&nbsp;&nbsp;
                      <button class="btn bg-gradient-dark  mb-0 js-btn-next" type="submit" title="save">Submit</button>
                    </div>
                  </div>
                </div>

                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</main>

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