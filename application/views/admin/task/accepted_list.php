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
                                                    <th>Order</th>
                                                    <th>Title</th>
                                                    <th>Customer Name</th>
                                                    <th>Assign to</th>
                                                    <th>Banner Type</th>
                                                <!--     <th>Size(height,width)</th> -->
                                                    <th>size In</th>
                                                  <!--   <th>Duration</th> -->
                                                    <th>Posted Date</th>
                                                    <th>Status</th>
                                              <!--       <th>worked days</th> -->
                                                    <th>Remaining Time(in minutes)</th>
                                                    <th>Time(in minutes)</th>
                                                    <th>work Progress(%)</th>
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

                                                    }

                                                   $remainingtime= isset($value['remainingtime'])?$value['remainingtime']:'00';
                                                   $finalremainingtime=round($remainingtime/60,'2');
                                                   
                                                ?>
                                            <tr id="rownumer<?php echo $i;?>">
                                                <input type="hidden" name="countervalue" id="countervalue<?php echo $i;?>" value="<?php echo $value['remainingtime']>0?$value['remainingtime']:'';?>" >
                                              <td><a href="<?php echo ADMIN_TASK_DETAILS_URL.'/'.$task_id;?>"><?php echo 'RXCU'.$task_id;?></a></td>
                                              <td><?php echo isset($value['t_name'])?$value['t_name']:'';?></td>
                                               <td><?php echo isset($value['first_name'])?$value['first_name']:'';?>&nbsp;&nbsp;<?php echo isset($value['last_name'])?$value['last_name']:'';?></td>
                                                <td><?php echo isset($value['assign_fname'])?$value['assign_fname']:'';?>&nbsp;&nbsp;<?php echo isset($value['assign_lname'])?$value['assign_lname']:'';?></td>
                                              <td><?php echo isset($value['banner_type'])?$value['banner_type']:'';?></td>
                                           <!--    <td><?php //echo isset($value['t_size'])?$value['t_size']:'';?></td> -->
                                               <td><?php echo isset($value['measure_in'])?$value['measure_in']:'';?></td>

                                             <!--  <td><?php //echo isset($value['t_duration'])?$value['t_duration']:'';?>&nbsp;days</td> -->
                                              <td><?php echo isset($value['created_on'])?date('d-M-Y',strtotime($value['created_on'])):''; ?></td>
                                              <td><?php echo $statusdesc; ?></td>
                                            <!--   <td><?php echo isset($value['no_of_days_worked'])?$value['no_of_days_worked']:'';?></td> -->
                                                <td><?php echo $finalremainingtime>0?$finalremainingtime:'00.00';?></td>
                                                <td id="countdown<?php echo $i;?>"></td>
                                                <td><?php echo isset($value['work_progress'])?$value['work_progress']:'';?></td>
                                                <td>  

                                                    <a href="<?php echo ADMIN_TASK_DETAILS_URL.'/'.$task_id;?>" class="btn btn-outline-primary " title="View Details"  ><i class="fa fa-info-circle"></i> View</a>
                                                <?php if($user_type=='CUSTOMER' && $t_status==5 && $is_approved==0)
                                                    { ?>
                                                      <a onclick="approveTask('<?php echo $task_id;?>');" class="btn btn-outline-success mr-1" title="Approved"> <i class="fa fa-check"></i>Approved</a>

                                                   <?php  }

                                                 if($t_status!=0 && $user_type=='DESIGNER')
                                              { ?>
                                                    <button type="button" class="btn btn-outline-info " title="Update Work Progress" onclick="updateProgress('<?php echo $task_id;?>');" ><i class="fa fa-upload"></i> Update</button>

                                                   
                                           
                                            <?php } if($t_status!=0 && $user_type=='ADMIN' && $t_status!=5)
                                            { ?>
                                                <a onclick="reassignTask('<?php echo $task_id;?>');" class="btn btn-outline-success mr-1" title="Reassign Task"> <i class="fa fa-undo"></i>Reassign</a>
                                            <?php } ?>

                                             <a  class="btn btn-outline-info " title="Activity History" onclick="view_activity('<?php echo $task_id;?>');" ><i class="fa fa-code-fork"></i>Activity </a>

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
    var totalRow=document.getElementById('totalRow').value;
    console.log(totalRow);
    if(totalRow>0)
    {
        <?php for ($i=1; $i <=count($taskAr) ; $i++) { ?>
           
       
        // for(var i=1;i<=totalRow;i++)
        // {
    // var seconds = 300;
    var seconds<?php echo $i;?>=document.getElementById("countervalue<?php echo $i;?>").value;
    console.log(seconds<?php echo $i;?>);
    //alert(seconds);
    var remainTime=seconds<?php echo $i;?>;
    if(remainTime>0)
    {

      function secondPassed<?php echo $i;?>() {
          var minutes = Math.round((seconds<?php echo $i;?> - 30)/3600),
              remainingSeconds = seconds<?php echo $i;?> % 3600;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }
          // if(i=1)
          // { 
            document.getElementById('countdown<?php echo $i;?>').innerHTML = minutes + ":" + remainingSeconds;
            if(minutes>600)
            {
                 $('#rownumer<?php echo $i;?>').css({
                    'color': 'white',
                    'background-color':'rgb(149 195 144)'
                  });
            }else if(minutes>300 && minutes<600){
             $('#rownumer<?php echo $i;?>').css({
                    'color': 'white',
                    'background-color':'rgb(240 211 112)'
                  });

            }else if(minutes<300)
            {
                 $('#rownumer<?php echo $i;?>').css({
                    'color': 'white',
                    'background-color':'rgb(249 195 144)'
                  });
            }
        // } if(i=2)
        // {
        //     document.getElementById('countdown2').innerHTML = minutes + ":" + remainingSeconds;
        // }
          if (seconds<?php echo $i;?> == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name
            //document.form1.submit();
          } else {
              seconds<?php echo $i;?>--;
              console.log(seconds<?php echo $i;?>);
          }
      }
      var countdownTimer = setInterval('secondPassed<?php echo $i;?>()', 1000);
        }
        else{
            document.getElementById('countdown<?php echo $i;?>').innerHTML='00.00';
             $('#rownumer<?php echo $i;?>').css({
                    'color': 'white',
                    'background-color':'#c39090'
                  });
        }
  <?php } ?>
  }




    function reassignTask(task_id)
    {
      $.fancybox.open({
          src: '<?php echo ADMIN_TASK_REASSIGN_URL.'/'; ?>'+task_id,
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

  function approveTask(task_id)
    {
      $.fancybox.open({
          src: '<?php echo base_url('admin/Task/ratingTask').'/'; ?>'+task_id,
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



    function updateProgress(task_id)
    {
      $.fancybox.open({
          src: '<?php echo ADMIN_TASK_UPDATE_WORK_URL.'/'; ?>'+task_id,
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