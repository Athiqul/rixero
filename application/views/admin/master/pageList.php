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
                
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="<?php echo ADMIN_PAGES_ADD_URL;?>">Add New</a>
                        </li>
                    </ul>
                </div>
            </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                           <?php $this->load->view('admin/component/dismissible_message');?>     
                        <div class="table-responsive">
        <table class="table table-flush table align-items-center mb-0" id="datatable-search">
                            
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                       
                                        <th>Price (Rixi Coin)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($pageAr!='' && !empty($pageAr))
                                    {
                                        $i=0;
                                        foreach ($pageAr as $key => $value) {
                                          $i++;
                                          $status=$value['status'];
                                         
                                          $id=$value['id'];
                                          $statusdesc='';
                                          if($status==1)
                                          {
                                            $statusdesc='<span class="badge badge-sm bg-gradient-success">Active</span>';
                                          }else
                                          {
                                            $statusdesc='<span class="badge badge-sm bg-gradient-danger">Inactive</span>';

                                          }

                                            ?>
                                         
                                    <tr>
                                        <td><?php echo $i;?> </td>
                                        <td><img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon']?>" width="70" height="70"></td>
                                       
                                        
                                        <td><?php echo $value['page_type']; ?></td>
                                        <td><?php echo $value['cost']; ?></td>
                                        <td><?php echo $statusdesc; ?></td>
                                        <td>
                                          <a href="<?php echo ADMIN_PAGES_ADD_URL.'/'.$id;?>" class="btn btn-outline-success mr-1" title="update Details"> <i class="fa fa-edit"></i></a>
                                          <a onclick="return confirm('Are you sure want to Delete')" href="<?php echo ADMIN_PAGES_DELETE_URL.'/'.$id;?>" class="btn btn-outline-danger mr-1" title="Delete Banner "> <i class="fa fa-trash"></i></a>

                                          <?php if($status==1) { ?>
                                             <a onclick="return confirm('Are you sure want to Publish')" href="<?php echo ADMIN_PAGES_DETAILS_UPDATE_STATUS_URL.'/'.$id.'/0';?>" class="btn btn-outline-danger mr-1" title="Unpublish User"> <i class="fa fa-lock"></i></a>
                                           <?php } else { ?>
                                             <a onclick="return confirm('Are you sure want to UnPublish')" href="<?php echo ADMIN_PAGES_DETAILS_UPDATE_STATUS_URL.'/'.$id.'/1';?>" class="btn btn-outline-danger mr-1" title="UnPublish User"> <i class="fa fa-unlock"></i></a>
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
