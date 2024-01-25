<?php $this->load->view('admin/header');?>

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
                                    
                                    <div class="table-responsive">
                                         <table class="table table-flush table align-items-center mb-0" id="datatable-search">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                      <th>No of order</th>
                                                      <th>Active Design</th>
                                                      <th>Pending Design</th>
                                                      <th>Complete Design</th>
                                                      <th>Rixi Coin</th>
                                                    <th>Join Date</th>
                                                     <th>Status</th>
                                                      <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($userAr!='' && !empty($userAr))
                                                {
                                                    $i=0;
                                                    foreach ($userAr as $key => $value) {
                                                      $i++;
                                                      $status=$value['status'];
                                                      $user_id=$value['user_id'];
                                                         $profile_img=$value['profile_img'];
                                                          $statusdesc='';
                                                          if($status==1)
                                                          {
                                                            $statusdesc='<span class="badge badge-sm bg-gradient-success">Active</span>';
                                                          }else
                                                          {
                                                            $statusdesc='<span class="badge badge-sm bg-gradient-danger">Inactive</span>';

                                                          }

                                                          $sql="SELECT COUNT(task_id) as totalTask,(select COUNT(task_id) from tb_task WHERE t_status='0' AND assign_to=".$user_id.") as pendingTask,(select COUNT(task_id) from tb_task WHERE (t_status='4' OR t_status='1') AND assign_to=".$user_id.") as processTask,(select COUNT(task_id) from tb_task WHERE t_status='5' AND assign_to=".$user_id.") as complateTask 
                                                              FROM `tb_task` 
                                                              WHERE assign_to=".$user_id." ";
                                                              $res=$this->db->query($sql)->row_array();

                                                        ?>
                                                     
                                                <tr>
                                                    <td><?php echo $i;?> </td>
                                                     <td><?php if($profile_img!='')
                                                        {?>
                                                          <img src="<?php echo PROFILE_DISPLAY_PATH_NAME.'/'.$profile_img; ?>" width="100" height="100">

                                                        <?php }else { ?>
                                                          <img src="<?php echo BLANK_IMAGE; ?>" width="100" height="100">
                                                        <?php } ?>  
                                                        </td>
                                                    <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                                                    <td><?php echo $value['email']; ?></td>
                                                    <td><?php echo $value['phone']; ?></td>

                                        <td><?php echo isset($res['totalTask'])?$res['totalTask']:0;?></td>
                                        <td><?php echo isset($res['processTask'])?$res['processTask']:0;?></td>
                                        <td><?php echo isset($res['pendingTask'])?$res['pendingTask']:0;?></td>
                                        <td><?php echo isset($res['complateTask'])?$res['complateTask']:0;?></td>
                                        <td><?php echo isset($res['complateTask'])?$res['complateTask']:0;?></td>
                                                    <td><?php echo isset($value['created_on'])?date('d-M-Y',strtotime($value['created_on'])):''; ?></td>
                                                     <td><?php echo $statusdesc; ?></td>
                                                    <td>
                                                      <a href="<?php echo ADMIN_DESIGNER_ADD_URL.'/'.$user_id;?>" class="btn btn-outline-success mr-1" title="update Details"> <i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure want to Delete')" href="<?php echo ADMIN_DESIGNER_DELETE_URL.'/'.$user_id;?>" class="btn btn-outline-danger mr-1" title="Delete User"> <i class="fa fa-trash"></i></a>

                                                    <?php if($status==1) { ?>
                                                       <a onclick="return confirm('Are you sure want to block')" href="<?php echo ADMIN_DESIGNER_UPDATE_STATUS_URL.'/'.$user_id.'/0';?>" class="btn btn-outline-danger mr-1" title="Block User"> <i class="fa fa-lock"></i></a>
                                                     <?php } else { ?>
                                                       <a onclick="return confirm('Are you sure want to Unblock')" href="<?php echo ADMIN_DESIGNER_UPDATE_STATUS_URL.'/'.$user_id.'/1';?>" class="btn btn-outline-danger mr-1" title="Unblock User"> <i class="fa fa-unlock"></i></a>
                                                     <?php } ?>
                                                    </td>
                                                    
                                                </tr>
                                                
                                               <?php } } ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
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
