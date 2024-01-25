<?php $this->load->view('admin/header');
$user_type=$this->session->userdata('user_type');
?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

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
                                                  
                                                    <th>Name</th>
                                                    <th>User Type</th>
                                                    <th>Amount</th>
                                                    <th>Transaction No</th>
                                                    <th>Status</th>
                                                    <th>date</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php if($taxtAr!='' && !empty($taxtAr))
                                            {
                                                $i=0;
                                                foreach ($taxtAr as $key => $value) {
                                                    $i++;
                                                   



                                                    
                                                ?>
                                            <tr>
                                              <td><?php echo $i;?></td>
                                              <td><?php echo isset($value['first_name'])?$value['first_name']:'';?>&nbsp;&nbsp;<?php echo isset($value['last_name'])?$value['last_name']:'';?></td>
                                              
                                              <td><?php echo isset($value['user_type'])?$value['user_type']:'';?></td>
                                              <td><?php echo isset($value['txt_amount'])?$value['txt_amount']:'';?></td>
                                              <td><?php echo isset($value['txt_order_no'])?$value['txt_order_no']:'';?></td>
                                              <td><?php echo isset($value['txt_status'])?$value['txt_status']:'';?></td>
                                              <td><?php echo isset($value['created_on'])?$value['created_on']:'';?></td>
                                             
                                              

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
