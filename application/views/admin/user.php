<?php $this->load->view('admin/header');?>
<section id="middle">
	<!-- page title -->
	<header id="page-header">
		<h1><i class="fa fa-send"></i> Notification</h1>
		<ol class="breadcrumb">
			<li><a href="#">Notification</a></li>
			<li class="active">Send</li>
		</ol>
	</header>
	<!-- /page title -->
	<div id="content" class="padding-20">
		<div class="row">
			<div class="col-md-12">
				<!-- ------ -->
				<div class="panel panel-default">
					<div class="panel-heading panel-heading-transparent">
						<strong>Notification</strong>
					</div>
					<div class="panel-body">
							<form action="<?php echo  base_url('Send_notification/saveNotification'); ?> " method="post"  enctype="multipart/form-data">
								<fieldset>

									<div class="row">
										<div class="form-group">
											<div class="col-md-7 col-sm-7">
												<label> Select User </label>
												<select name="user_id" id="user_id" class="form-control pointer required select2" onchange="createUsernameDDL();">
													<option value="">--- Select ---</option>
													<?php
													if($userAr!='' && !empty($userAr))
													{
														foreach ($userAr as $key => $userAr) {
															if($userAr['user_Id']!=''){
															

													 ?>
													<option value="<?php echo $userAr['user_Id']; ?>"> &nbsp; <?php echo $userAr['user_name']; ?></option>
														<?php } } } ?>

													
												</select>
											</div>
											

										</div>
									</div>
									

									

									

								</fieldset>
								
					</div>
					<div class="panel-body" id="panelbody">
							<!-- HTML DATATABLE -->
						<table class="table table-striped table-bordered table-hover" id="datatable_sample">
							<thead>
								<tr>
									<th>#</th>

									<th>Name</th>
									<th>Notification Type</th>
									<th>Message</th>
									<th>Status</th>
									
								</tr>
							</thead>

							<tbody id="table_id"> 
								
							</tbody>
						</table>
					</div>

				</div>
				<!-- /----- -->
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('admin/footer'); ?>


	
<script>
	$('#panelbody').hide();


function createUsernameDDL()
	  {
	  	$('#panelbody').show();

	      var user_id = $("#user_id").val(); 
	      var parameters="user_id="+user_id;
	      $.ajax({
	          type: "POST",
	          url: "<?php echo base_url('Send_notification/createUsernameDDL'); ?>",
	          data: parameters,
	          cache: false,
	          success:function(responseData)
	          {    

	              $("#table_id").html(''); 
	              $("#table_id").html(responseData); 
	          }   
	      });
	  }



		</script>