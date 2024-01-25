<?php $this->load->view('admin/header_new');
$user_type=$this->session->userdata('user_type');
?>

    <!-- BEGIN: Content-->
     <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        
<!--/ eCommerce statistic -->

 <div class="content-body"><!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                          
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="card-header">
                                     <h4 class="card-title" style="font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;text-align: center;">feedback </h4>
                                    </div>
                                    <form action="<?php echo base_url('admin/Task/savestarRating'); ?>" method="post"  class="needs-validation" novalidate enctype="multipart/form-data">
                                      <div class="form-body">

                                       <div class="form-group">
                                          <label for="donationinput1"> Select Rating<span style="color: red">*</span></label>
                                         <select id="rating"  class="form-control" name="rating" >
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="5" >5</option>
                                               
                                               
                                              </select>
                                        </div>

                                         <div class="form-group">
                                          <label for="donationinput1">feedback<span style="color: red">*</span></label>
                                          <input type="text" id="donationinput1" class="form-control square" placeholder="Description" name="desc" required>
                                            <div class="invalid-feedback">
                                            Please provide Description.
                                          </div>
                                        </div>
                                        <input type="text" name="task_id" value="<?php echo $task_id;?>">
                                        <input type="text" name="user_id" value="<?php echo $user_id;?>">
                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-danger mr-1"><i class="fa fa-close"></i> Close </button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </div>
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

<?php $this->load->view('admin/footer_new');?>
