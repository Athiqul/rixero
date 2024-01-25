<?php $this->load->view('admin/header');

  $user_type=$this->session->userdata('user_type');

$sql="SELECT (COUNT(assign_id)) as changes FROM `tbl_assign_task_acivity` WHERE `task_id` = '".$task_id."' AND `is_changes` = '1'";

$changes=$this->db->query($sql)->row_array();

$sql="SELECT * FROM `tbl_assign_task_acivity` WHERE `task_id` = '".$task_id."' AND `is_changes` = '1'";

$changesList=$this->db->query($sql)->result_array();

//print_r($changes);

 $noOfChanges=isset($changes['changes'])?$changes['changes']:0;





?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />





    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">



 



  <div class="container-fluid py-4">

    <div class="row">

      <div class="col-12">

        <div class="card mb-4">

        <div class="multisteps-form mb-5">

				<div class="row">

             <?php $this->load->view('admin/component/dismissible_message');?>     

    <div class="col-sm-12 col-xl-8">

      <div class="media d-flex m-1 ">

        

        <div class="media-body text-left  mt-1">

          <h3 class="font-large-1 white"><?php echo isset($details['cfname'])?$details['cfname']:'';?>&nbsp;&nbsp;<?php echo isset($details['clname'])?$details['clname']:0;?>

         

          </h3>

          

          

        </div>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="col-xl-3 col-lg-4 col-md-12">

      <div class="card">

        <div class="card-header pb-0">

          <div class="card-title-wrap bar-primary">

            <div class="card-title"></div>

<?php



              $t_status=isset($details['t_status'])?$details['t_status']:0;

 $this->db->select();

            $this->db->where('task_id',$task_id);

            $this->db->where('is_changes','1');

            $this->db->order_by('assign_id','desc');

            $update_status=$this->db->get('tbl_assign_task_acivity')->row_array();

             if($update_status!='' && !empty($update_status))

             {

                if($update_status['status']==0)

                {

                  $status1='Pending';

                }else

                {

                  $status1='Solve';

                }

              

             }else{

              $status1='';

             }



            ?>

            <span>No Of Changes: <?php echo $noOfChanges;?>&nbsp;&nbsp;<?php echo $status1;?></span><br>

            <?php if($user_type=='CUSTOMER')

            {?>

            <a <?php if($status1!='Pending' && $t_status>4){?> onclick="reassignTask('<?php echo $task_id;?>');" <?php }else { echo 'style="cursor: not-allowed;" ';}?> class="btn btn-outline-success mr-1" title="Changes Task" > <i class="fa fa-check"></i>Upadte Changes</a>

          <?php }else{ 

            if($changesList!='' && !empty($changesList))

            {

              foreach ($changesList as $key => $value) {

                ?>

           <ul>

             <li><?php echo $value['desc'].' - '. date('d-M-Y',strtotime($value['created_on'])) ;?></li>

           </ul>







          <?php  }

            } } ?>

            <hr>

          </div>

        </div>

        <div class="card-content">

          <div class="card-body p-0 pt-0 pb-1">

            <ul>

              <li>

                <strong><?php echo isset($details['work_progress'])?$details['work_progress']:0;?> %</strong>

                complete 

              </li>

              <?php

              $user_type=$this->session->userdata('user_type');

              $statusdesc='';

              if($t_status==1)

              {

                  $statusdesc='<span class="btn btn-sm btn-outline-success round" >Accept</span>';

              }else if($t_status==4)

              {

                  $statusdesc='<span class="btn btn-sm btn-outline-info round" >Inprocess</span>';



              }else if($t_status==3)

              {

                  $statusdesc='<span class="btn btn-sm btn-outline-danger round" >Reject</span>';



              }else if($t_status==5)

              {

                  $statusdesc='<span class="btn btn-sm btn-outline-primary round" >Completed</span>';



              }

              ?>

              <li>

                <strong>Status </strong> <?php echo $statusdesc;?>

                <li>

                  <strong><?php echo isset($details['accepted_date'])?date('d-M-Y',strtotime($details['accepted_date'])):'';?> </strong> Accepted Date</li>

               <!--  <li>

                  <strong>26</strong> Jobs</li> -->



            </ul>

          </div>

        </div>



      </div>

      <div class="card">

        <div class="card-header pb-0">

          <div class="card-title-wrap bar-primary">

            <div class="card-title">Download File</div>

            <hr>

          </div>

        </div>

        <div class="card-content">

          <div class="card-body p-0 pt-0 pb-1">

          	<?php if($t_status==5)

          	{

          		$originfile=isset($details['originfile'])?$details['originfile']:'';

          		$printablefile=isset($details['printablefile'])?$details['printablefile']:'';

          		?>

            <ul>

                 <?php if($user_type!='DESIGNER')

              {?>

              <li>

                <strong>Printable File: </strong>

               <li><a href="<?php echo ADMIN_BANNER_DISPLAY_PATH_NAME.'/'.$printablefile;?>" class="mr-1 mb-1 btn btn-outline-primary btn-min-width" download><i class="fa fa-download"></i> Download Now</a>

              </li>

               <li><a href="<?php echo base_url('admin/task/sentOnEmail').'/'.$task_id;?>" class="mr-1 mb-1 btn btn-outline-primary btn-min-width" download><i class="fa fa-envelope"></i> Sent mail</a>

              </li>

              <?php } if($user_type=='ADMIN')

              {?>

              <li>

                <strong>Original File </strong> 

                <li>

                 <a href="<?php echo ADMIN_BANNER_DISPLAY_PATH_NAME.'/'.$originfile;?>" class="mr-1 mb-1 btn btn-outline-info btn-min-width" download><i class="fa fa-download"></i> Download Now</a></li>

               <?php } ?>



            </ul>

          <?php } ?>

          </div>

        </div>



      </div>

      <div class="card">

        <div class="card-header">

          <h4 class="card-title"><?php echo isset($taskAr[0]['title'])?$taskAr[0]['title']:'';?></h4>          

          <div class="heading-elements">

            <ul class="list-inline d-block mb-0">

              <li>                

                <i class="ft-bar-chart font-large-1 danger"></i>

              </li>

            </ul>

          </div>

        </div>


        <div class="card-content  show">

          <div class="card-body pt-0 pb-1">
       <?php   if($t_status!=0 && $user_type=='DESIGNER')

{ ?>


          <button type="button" class="btn btn-outline-info " title="Update Work Progress" onclick="updateProgress('<?php echo $task_id;?>');" ><i class="fa fa-upload"></i> Update</button>


          <?php }?> 

           

      </div>

    </div>


        <div class="card-content  show">

          <div class="card-body pt-0 pb-1">

            <h6 class="text-bold-600"> Task Lavel:

              <span><?php echo isset($details['work_progress'])?$details['work_progress']:0;?> %</span>

            </h6>

            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">

              <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?php echo isset($details['work_progress'])?$details['work_progress']:0;?>%" aria-valuenow="<?php echo isset($details['work_progress'])?$details['work_progress']:0;?> " aria-valuemin="0"

                aria-valuemax="100"></div>

            </div>

            <!-- <div class="media d-flex">

              <div class="align-self-center">

                <h6 class="text-bold-600 mt-2"> Client:

                  <span class="info">Xeon Inc.</span>

                </h6>

                <h6 class="text-bold-600 mt-1"> Deadline:

                  <span class="blue-grey"><?php echo isset($details['assign_date'])?date('d-M-Y',strtotime($details['assign_date'])):'';?></span>

                </h6>

              </div>

              

            </div> -->



          </div>

        </div>

      </div>

    </div>

    <div class="col-xl-4 col-lg-4 col-md-12">

     

            <div class="card h-100">

                <div class="card-header pb-0">

                    <h6>Orders overview</h6>

                    

                </div>

                <div class="card-body p-3">

                    <div class="timeline timeline-one-side">

                      <?php if($taskAr!='' && !empty($taskAr))

                    {

                      foreach ($taskAr as $key => $value) {

                        $color='';

                        if(['$work_type']=='ACCEPT')

                        {

                          $color='info';

                        }elseif(['$work_type']=='INPROGRESS')

                        {

                          $color='primary';

                        }elseif(['$work_type']=='COMPLETE')

                        {

                          $color='success';

                        }else

                        {

                          $color='warning';

                        }

                        $imagefile=$value['imagefile']



                        ?>

                        <div class="timeline-block mb-3">

                            <span class="timeline-step">

                                <i class="fa fa-arrow-down text-success text-gradient"></i>

                            </span>

                            <div class="timeline-content">

                                <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo isset($value['desc'])?$value['desc']:'';?>, <?php echo isset($value['work_type'])?$value['work_type']:'';?>

                                  <?php if($imagefile!='')

                                  {?>

                                    <a href="<?php echo ADMIN_BANNER_DISPLAY_PATH_NAME.'/'.$imagefile;?>" download style="color: blue;">download</a>



                                  <?php } ?>





                                </h6>



                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo isset($value['assign_date'])?date('d-M-Y',strtotime($value['assign_date'])):'';?>, <small class="text-muted">

                            <?php echo isset($value['workdays'])?$value['workdays']:'';?> days ago

                            </small></p>

                            </div>

                        </div>

                        <?php } } ?>

                    </div>

                </div>

            </div>

        </div>



        <div class=" col-lg-4 col-md-12">

     

            <div class="card h-100">

                

                <div class="card-body p-3">

                    <div class="timeline timeline-one-side">

                       <li>
                        <?php //echo "<pre>"; print_r($details); ?>

                       <strong>No. Of Pages : </strong>  <?php echo isset($details['pages_no'])?$details['pages_no']:'0';?>

                      </li>
                      <li>

                       <strong>Design  :</strong><?php if($details['banner_id']==1){ echo "Printable"; }else { echo "Non-Prinntable";} ?>&nbsp;&nbsp;->&nbsp;&nbsp;  <?php echo isset($details['printable_type'])?$details['printable_type']:'NaN';?>

                      </li>
                     
                      <li>

                      <strong>Color :</strong> 
                      <?php $ss=$details['color'];
                      if($ss!='')
                      {
                        $ss_new=  explode(', rgb',$ss);
                        for ($i=1; $i < sizeof($ss_new); $i++) { ?>
                           <span class="badge badge-sm " style="
    color: rgb<?php echo $ss_new[$i];?>;
    background-color: rgb<?php echo $ss_new[$i];?>;
"><?php echo $i;?>st</span>
                      <?php  }
                      }
                   
                      ?>
                       
                       
                      
                     

                      </li>

                        <li>

                       <strong>Orientation  :</strong>  <?php echo isset($details['orientation'])?$details['orientation']:'NaN';?>

                      </li>
                      <li>

<strong>Description  :</strong>  <?php echo isset($details['t_desc'])?$details['t_desc']:'NaN';?>

</li>


                     <li>

                      <?php if($details['t_file']!='')

                      {

                        $img=ADMIN_TASK_DOCUMENT_DISPLAY_PATH_NAME.'/'.$details['t_file'];

                      }else

                      {

                        $img=BLANK_IMAGE;

                      }

                      ?>



                       <strong>References Logo </strong><a class="badge badge-sm badge-success" style="background-color:green" href="<?php echo $img;?>" download>Download  </a><br><img src="<?php echo $img;?>" width="100" style="margin-left:30px">

                    </li>



                      <li>

                      <?php if($details['uploadLogoInput']!='')

                      {

                        $uploadlogo=ADMIN_TASK_DOCUMENT_DISPLAY_PATH_NAME.'/'.$details['uploadLogoInput'];

                      }else

                      {

                        $uploadlogo=BLANK_IMAGE;

                      }

                      ?>



                       <strong> Logo </strong><a class="badge badge-sm badge-success" style="background-color:green" href="<?php echo $uploadlogo;?>" download>Download</a><br> <img src="<?php echo $uploadlogo;?>" width="100"  style="margin-left:30px">

                    </li>



                      <li>

                      <?php if($details['specificuploadlogo']!='')

                      {

                        $specificuploadlogo=ADMIN_TASK_DOCUMENT_DISPLAY_PATH_NAME.'/'.$details['specificuploadlogo'];

                      }else

                      {

                        $specificuploadlogo=BLANK_IMAGE;

                      }

                      ?>



                       <strong> Specific Logo </strong> <a class="badge badge-sm badge-success" style="background-color:green" href="<?php echo $specificuploadlogo;?>" download> Download</a><br><img src="<?php echo $specificuploadlogo;?>" width="100"  style="margin-left:30px">

                    </li>

                    

                

            



            </ul>

                    </div>

                </div>

            </div>

        </div>

      <!--Project Timeline div ends-->

    </div>

  </div>

</div>

			</div>

		</div>



		

	</div>



	





	

	</div>

</section>

<!-- // Basic form layout section end -->

        </div>

      </div>

    </div>

    <!-- END: Content-->



<?php $this->load->view('admin/footer');?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" ></script>

<script>

  

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

  function reassignTask(task_id)

    {

      $.fancybox.open({

          src: '<?php echo ADMIN_TASK_CHANGES_URL.'/'; ?>'+task_id,

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

              }

          }

      });

  }

   parent.jQuery.fancybox.close();

</script>