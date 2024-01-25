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
                                     <h4 class="card-title" style="font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;text-align: center;">Update Worked Progress </h4>
                                    </div>
                                    <form action="<?php echo ADMIN_TASK_UPDATE_WORK_SUBMIT_URL; ?>" method="post"  class="needs-validation" novalidate enctype="multipart/form-data">
                                      <div class="form-body">

                                       <div class="form-group">
                                          <label for="donationinput1"> Work Progress<span style="color: red">*(in %)</span></label>
                                          <input type="number" id="validationCustom01" class="form-control square" placeholder="Work Progress" max="100" min="<?php echo isset($details['work_progress'])?$details['work_progress']:0;?>" name="work_progress" id="work_progress" required>
                                            <div class="invalid-feedback">
                                            Please provide Work Progress between <?php echo isset($details['work_progress'])?$details['work_progress']:0;?> to 100 .
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="donationinput1">Status<span style="color: red">*</span></label>
                                            <select id="status"  class="form-control" name="status" onchange="showDiv(this)">
                                                <option value="4">In Process</option>
                                                <option value="5">Complete</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="originfile" style="display: none;">
                                          <label for="donationinput1">Original File<span style="color: red">*</span></label>
                                        <input type="file" class=" form-control" name="originfile" id="inputGroupFile01">
                                        </div>
                                        <div class="form-group" id="printablefile" style="display: none;">
                                          <label for="donationinput1">Printable file<span style="color: red">*</span></label>
                                           <input type="file" class=" form-control" name="printablefile" id="inputGroupFile01">
                                        </div>

                                         <div class="form-group">
                                          <label for="donationinput1">Description<span style="color: red">*</span></label>
                                          <input type="text" id="donationinput1" class="form-control square" placeholder="Description" name="desc" required>
                                            <div class="invalid-feedback">
                                            Please provide Description.
                                          </div>
                                        </div>
                                        <input type="hidden" name="task_id" value="<?php echo $task_id;?>">
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
<script>
    
function showDiv(element)
{
    document.getElementById('originfile').style.display = element.value == 5 ? 'block' : 'none';
    document.getElementById('printablefile').style.display = element.value == 5 ? 'block' : 'none';
   // document.getElementById('work_progress').value = '0';
}
</script>