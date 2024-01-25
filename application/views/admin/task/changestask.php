<?php $this->load->view('admin/header_new');
$user_type=$this->session->userdata('user_type');


$resAr=$this->db->select('u.*')
                ->join('tbl_mst_users as u','u.user_id=t.assign_to')
                ->where('task_id',$task_id)
                ->get('tb_task as t')->row_array();
               // print_r($resAr); die();
        $first_name=isset($resAr['first_name'])?$resAr['first_name']:'';
        $last_name=isset($resAr['last_name'])?$resAr['last_name']:'';
        $user_id=isset($resAr['user_id'])?$resAr['user_id']:'';
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
                                     <h4 class="card-title" style="font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;text-align: center;">Changes Design </h4>
                                    </div>
                                    <form action="<?php echo ADMIN_TASK_SAVE_URL; ?>" method="post"  class="needs-validation" novalidate enctype="multipart/form-data">
                                      <div class="form-body">

                                       <div class="form-group" style="display:none">
                                          <label for="donationinput1"> Select Designer<span style="color: red">*</span></label>
                                         <select id="user_id"  class="form-control" name="user_id" >
                                                <option value="<?php echo $user_id;?>"  ><?php echo $first_name.' '.$last_name;?></option>
                                               
                                              
                                               
                                              </select>
                                        </div>
                                         <div class="form-group">
                                          <label for="donationinput1">Changes Description<span style="color: red">*</span></label>
                                          <input type="text" id="donationinput1" class="form-control square" placeholder="Description" name="desc" required>
                                            <div class="invalid-feedback">
                                            Please provide Description.
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="donationinput1">File<span style="color: red">*</span></label>
                                          <input type="file" id="donationinput1" class="form-control square" placeholder="Description" name="imagefile" required>
                                           
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
