<?php $this->load->view('admin/header');
$user_type=$this->session->userdata('user_type');

?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- BEGIN: Content-->
     <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">
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
                                                    <th>Order</th>
                                                    <th>Banner Type</th>
                                                    <th>Amount</th>
                                                    <th>Posted Date</th>
                                                    <th>Status</th>
                                                    <th>Is_Published</th>
                                             
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <input type="hidden" name="totalRow" id="totalRow" value="<?php echo count($taskAr);?>">
                                            <?php if($taskAr!='' && !empty($taskAr))
                                            {
                                                $i=0;
                                                foreach ($taskAr as $key => $value) {
                                                    $i++;
                                                     $task_id=$value['task_id'];
                                                     $is_approved=$value['is_approved'];
                                                    $t_status=$value['t_status'];
                                                     $is_publish=$value['is_publish'];
                                                    $statusdesc='';
                                                    if($t_status==1)
                                                    {
                                                        $statusdesc='<span class="badge badge-sm bg-gradient-success" >Accept</span>';
                                                    }else if($t_status==4)
                                                    {
                                                        $statusdesc='<span class="badge badge-sm bg-gradient-info" >Inprocess</span>';

                                                    }else if($t_status==3)
                                                    {
                                                        $statusdesc='<span class="badge badge-sm bg-gradient-danger" >Reject</span>';

                                                    }else if($t_status==5)
                                                    {
                                                        $statusdesc='<span class="badge badge-sm bg-gradient-primary" >Completed</span>';

                                                    }else
                                                    {
                                                        $statusdesc='<span class="badge badge-sm bg-gradient-warning" >Pending</span>';

                                                    }

                                                   
                                                   
                                                ?>
                                            <tr id="rownumer<?php echo $i;?>">
                                                <td><?php echo $i;?></td>
                                               
                                              <td><a href="<?php echo base_url('admin/task/invoice').'/'.$task_id;?>" style="color: blue"><?php echo 'RXCU00'.$task_id;?></a></td>
                                            
                                                
                                              
                                           <!--    <td><?php //echo isset($value['t_size'])?$value['t_size']:'';?></td> -->
                                               <td><?php echo isset($value['measure_in'])?$value['measure_in']:'';?></td>
                                               <td><?php echo isset($value['price'])?$value['price']:'';?></td>

                                             <!--  <td><?php //echo isset($value['t_duration'])?$value['t_duration']:'';?>&nbsp;days</td> -->
                                              <td><?php echo isset($value['created_on'])?date('d-M-Y',strtotime($value['created_on'])):''; ?></td>
                                              <td><?php echo $statusdesc; ?></td>
                                               <?php 
                                                     if($is_publish==0)
                                              {?>
                                              <td><button class="btn btn-sm btn-outline-danger round" type="button">NO</button></td>
                                              <?php } else { ?>
                                              <td><button class="btn btn-sm btn-outline-success round" type="button">YES</button></td>

                                              <?php }  ?>

                                               <td>  

                                                <?php 
                                                if($is_publish==1) { ?>
                                             <a onclick="return confirm('Are you sure want to Unpublish')" href="<?php echo ADMIN_TASK_UPDATE_STATUS_URL.'/'.$task_id.'/0';?>" class="btn btn-outline-danger mr-1" title="Unpublish Task"> <i class="fa fa-lock"></i></a>
                                           <?php } else { ?>
                                             <a onclick="return confirm('Are you sure want to publish')" href="<?php echo ADMIN_TASK_UPDATE_STATUS_URL.'/'.$task_id.'/1';?>" class="btn btn-outline-danger mr-1" title="Publish Task"> <i class="fa fa-unlock"></i></a>
                                           <?php }   ?>


                                                    <a href="<?php echo ADMIN_TASK_DETAILS_URL.'/'.$task_id;?>" class="btn btn-outline-primary " title="View Details"  ><i class="fa fa-info-circle"></i> </a>
                                                    <?php if($value['assign_to']<=0)
                                                    {?>
                                                        <a href="<?php echo base_url('admin/task/updateTaskStatus').'/'.$task_id.'/3';?>" class="btn btn-outline-danger " title="Cancel"  ><i class="fa fa-close"></i> </a>

                                                <?php } if($user_type=='CUSTOMER' && $t_status==5 && $is_approved==0)
                                                    { ?>
                                                      <a onclick="approveTask('<?php echo $task_id;?>');" class="btn btn-outline-success mr-1" title="Approved"> <i class="fa fa-check"></i></a>

                                                   <?php  }

                                                 if($t_status!=0 && $user_type=='DESIGNER')
                                              { ?>
                                                    <button type="button" class="btn btn-outline-info " title="Update Work Progress" onclick="updateProgress('<?php echo $task_id;?>');" ><i class="fa fa-upload"></i> </button>

                                                   
                                           
                                            <?php } if($t_status!=0 && $user_type=='ADMIN' && $t_status!=5)
                                            { ?>
                                                <a onclick="reassignTask('<?php echo $task_id;?>');" class="btn btn-outline-success mr-1" title="Reassign Task"> <i class="fa fa-undo"></i></a>
                                            <?php } ?>

                                             <a  class="btn btn-outline-info " title="Activity History" onclick="view_activity('<?php echo $task_id;?>');" ><i class="fa fa-code-fork"></i> </a>

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" ></script>

<script >
   
  function view_activity(task_id)
    {
      $.fancybox.open({
          src: '<?php echo ADMIN_TASK_ACTIVITY_URL.'/'; ?>'+task_id,
          type: 'iframe',
          opts: {
              toolbar: false,
              smallBtn: true,
              clickSlide: false,
              afterClose: function (instance, current) {
                  $('.select2-search__field').val("");
              },
              iframe: {
                 css : {
                            width : '600px',
                            height:'500px'
                        },
                  preload: true,
              }
          }
      });
  }
  parent.jQuery.fancybox.close();


   
</script>