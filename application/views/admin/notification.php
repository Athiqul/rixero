<?php $this->load->view('admin/header');?>



     <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">



 



  <div class="container-fluid py-4">

    <div class="row">

      <div class="col-12">

        <div class="multisteps-form mb-5">

        

<!--/ eCommerce statistic -->



    <div class="row">

        <div class="col-12">

            <div class="card">

               <div class="card-header">

                

               
            </div>

                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">

                        <?php $this->load->view('admin/component/dismissible_message');?>     

                        

                        <div class="table-responsive">

        <table class="table table-flush table align-items-center mb-0" id="datatable-search">

                            

                                <thead>

                                    <tr>

                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>Name</th>

                                        <th>Created Date</th>
                                        <th>Action</th>

                                        

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if($listAr!='' && !empty($listAr))
                                    {
                                        $i=0;
                                        foreach ($listAr as $key => $value) {
                                          $i++;
                                            ?>

                                    <tr>
                                        <td><?php echo $i;?> </td>
                                        <td><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['first_name'].'&nbsp;&nbsp;'.$value['last_name']; ?></td>
                                        <td><?php echo $value['created_on']; ?></td>
                                        <td>
                                          <a onclick="return confirm('Are you sure want to View')" href="<?php echo base_url($value['url']); ?>" class="btn btn-outline-danger mr-1" title="View "> <i class="fa fa-eye"></i></a>

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

