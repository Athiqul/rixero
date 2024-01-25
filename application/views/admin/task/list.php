<?php $this->load->view('admin/header');
$user_type=$this->session->userdata('user_type');
?>
 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">
                      
                        <?php $this->load->view('admin/component/dismissible_message');?>     
                            
                                    
                                    <div class="table-responsive">
                                         <table class="table table-flush table align-items-center mb-0" id="datatable-search">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Title</th>
                                                    <th>Customer Name</th>
                                                   
                                                    <th>Banner Type</th>
                                               <!--      <th>Size(height,width)</th> -->
                                                    <th>size In</th>
                                                   <!--  <th>Duration</th> -->
                                                    <th>Posted Time</th>
                                                    <?php if($user_type=='CUSTOMER')
                                                    {
                                                    echo "<th>Is_Published</th>";
                                                }
                                                    ?>
                                                 
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php if($taskAr!='' && !empty($taskAr))
                                            {
                                                $i=0;
                                                foreach ($taskAr as $key => $value) {
                                                    $i++;
                                                   $task_id=$value['task_id'];
                                                   $is_publish=$value['is_publish'];
                                                   $t_status=$value['t_status'];
                                                    $desc='';
                                                    $created_on=strtotime($value['created_on']);
                                                    $c_date=CURRENT_DATE_TIME_YMD;



                                                    
                                                ?>
                                            <tr>
                                              <td><?php echo $i;?></td>
                                              <td><?php echo isset($value['t_name'])?$value['t_name']:'';?></td>
                                              <td><?php echo isset($value['first_name'])?$value['first_name']:'';?>&nbsp;&nbsp;<?php echo isset($value['last_name'])?$value['last_name']:'';?></td>
                                          
                                              <td><?php echo isset($value['banner_type'])?$value['banner_type']:'';?></td>
                                             <!--  <td><?php //echo isset($value['t_size'])?$value['t_size']:'';?></td> -->
                                              <td><?php echo isset($value['measure_in'])?$value['measure_in']:'';?></td>
                                            <!--   <td><?php //echo isset($value['t_duration'])?$value['t_duration']:'';?>&nbsp;days</td> -->
                                              <!-- <td><?php echo isset($value['created_on'])?date('H:i:s',strtotime($value['created_on'])):''; ?></td> -->
                                              <td><?php echo round(abs($created_on - strtotime($c_date)) / 3600,2). " hours"; ?></td>
                                             
                                              <?php if($user_type=='CUSTOMER')
                                                    { if($is_publish==0)
                                              {?>
                                              <td><button class="btn btn-sm btn-outline-danger round" type="button">NO</button></td>
                                              <?php } else { ?>
                                              <td><button class="btn btn-sm btn-outline-success round" type="button">YES</button></td>

                                              <?php }  }?>
                                       
                                              <td>  
                                                <?php if($user_type=='CUSTOMER')
                                                { 
                                                if($is_publish==1) { ?>
                                             <a onclick="return confirm('Are you sure want to Unpublish')" href="<?php echo ADMIN_TASK_UPDATE_STATUS_URL.'/'.$task_id.'/0';?>" class="btn btn-outline-danger mr-1" title="Unpublish Task"> <i class="fa fa-lock"></i>Unpublish</a>
                                           <?php } else { ?>
                                             <a onclick="return confirm('Are you sure want to publish')" href="<?php echo ADMIN_TASK_UPDATE_STATUS_URL.'/'.$task_id.'/1';?>" class="btn btn-outline-danger mr-1" title="Publish Task"> <i class="fa fa-unlock"></i>Publish</a>
                                           <?php }  } ?>



                                                <?php if($t_status==0 && $user_type=='DESIGNER')
                                              { ?>
                                                <a onclick="return confirm('Are you sure want to Accept Task')" href="<?php echo ADMIN_TASK_ACCEPT_PENDING_URL.'/'.$task_id;?>" class="btn btn-outline-success mr-1" title="Accept Task"> <i class="fa fa-check"></i>Accept</a>
                                            <?php } if($t_status!=0 && $user_type=='ADMIN')
                                            { ?>
                                                <a onclick="return confirm('Are you sure want to Reassign')" href="<?php echo ADMIN_TASK_ACCEPT_PENDING_URL.'/'.$task_id;?>" class="btn btn-outline-success mr-1" title="Reassign Task"> <i class="fa fa-undo"></i>Reassign</a>
                                            <?php } ?>

                                              </td>

                                            </tr>
                                        <?php } } ?>

                                           
                                            
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
