<?php $this->load->view('admin/header');
$user_type=$this->session->userdata('user_type');
?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<style>
.checked {
  color: orange;
}
</style>
 

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
                                                  

                                                    <?php if($user_type!='DESIGNER')
                                                    {?> <th>  Name</th><?php } ?>
                                                       <th>Task Name</th>
                                                    <th>Rating</th>
                                                    <th>Feedback</th>
                                                   
                                                    
                                                </tr>
                                            </thead>
                                            <?php if($rateAr!='' && !empty($rateAr))
                                            {
                                                $i=0;
                                                foreach ($rateAr as $key => $value) {
                                                    $i++;
                                                  $rating=isset($value['rating'])?$value['rating']:'';



                                                    
                                                ?>
                                            <tr>
                                              <td><?php echo $i;?></td>
                                              <?php if($user_type!='DESIGNER')
                                                    {?>  <td><?php echo isset($value['first_name'])?$value['first_name']:'';?>&nbsp;&nbsp;<?php echo isset($value['last_name'])?$value['last_name']:'';?></td><?php } ?>
                                              
                                              <td><?php echo isset($value['t_name'])?$value['t_name']:'';?></td>
                                              <td><?php for ($j=0; $j <5 ; $j++) { if($j<$rating) {
                                                  ?><span class="fa fa-star checked"></span><?php } else { ?><span class="fa fa-star"></span><?php } } ?></td>
                                              
                                              <td><?php echo isset($value['feedback'])?$value['feedback']:'';?></td>
                                             
                                              

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
