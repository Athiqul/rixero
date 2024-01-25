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
                                    
                                     <div id="timeline">
								        <div class="card">
								          <div class="card-body">
								            <div class="card-block">
								              <div class="timeline">
								                <h4 style="font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;text-align: center;"><?php echo isset($taskAr[0]['title'])?$taskAr[0]['title']:'';?></h4>
								                <hr>
								                <ul class="list-unstyled base-timeline activity-timeline mt-3">
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

								                			?>
								                		
								                  <li>
								                    <div class="timeline-icon bg-<?php echo $color;?>">
								                      <i class="fa fa-arrow-down font-medium-1" style="margin-top: 8px;"></i>
								                    </div>
								                    <div class="act-time"><?php echo isset($value['assign_date'])?date('d-M-Y',strtotime($value['assign_date'])):'';?></div>
								                    <div class="base-timeline-<?php echo $color;?>">
								                      <a href="#" class="text-primary text-uppercase line-height-2"><?php echo isset($value['work_type'])?$value['work_type']:'';?></a>
								                      <span class="d-block"><?php echo isset($value['desc'])?$value['desc']:'';?>. </span>
								                    </div>
								                    <small class="text-muted">
								                      <?php echo isset($value['workdays'])?$value['workdays']:'';?> days ago
								                    </small>
								                    <!-- <ul class="base-timeline-sub list-unstyled users-list m-0">
								                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
								                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-14.png" alt="Avatar">
								                      </li>
								                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
								                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-13.png" alt="Avatar">
								                      </li>
								                      <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
								                        <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-12.png" alt="Avatar">
								                      </li>
								                    </ul> -->
								                  </li>
								              <?php } } ?>
								                  
								                </ul>

								                <br>

								                
								              </div>
								            </div>
								          </div>
								        </div>
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

<?php $this->load->view('admin/footer_new');?>
