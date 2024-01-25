
</div>
<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                POWERED BY
                <a href="#" class="font-weight-bold" target="_blank">ALL STARS DIGITAL</a>
              </div>
            </div>
            <div class="col-lg-6">
             
            </div>
          </div>
        </div>
      </footer>
    </div>
</main>

<?php $user_id=$this->session->userdata('user_id');
$this->db->select();
        $this->db->where('user_id',$user_id);
        $walletAr= $this->db->get('tbl_wallet')->row_array();
        ?>
<div class="fixed-plugin">
    <a href="https://flnew.mcops.in/chatSystem/backend/login.php?user_id=<?php echo $user_id;?>" target="_blank" class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-comments-o py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>

        </div>
     
        <div class="card-body pt-sm-3 pt-0">

           

            <div class="mt-3">
                <h6 class="mb-1">RIXI WALLET</h6>
            </div>
            <div class="d-flex">
                <a class="btn bg-gradient-dark w-100"  style="font-size: 20px;"><img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt="">&nbsp;&nbsp; <?php echo isset($walletAr['amount'])?$walletAr['amount']:'00';?></a>
            </div>
            <hr>
               <div class="mt-0">
                <p class="mb-0">Add Coin</p>
            </div>
            <div class="d-flex">
                <a href="<?php echo base_url('admin/Razorpay/checkout/500');?>" class="btn bg-gradient-primary w-100 px-3 mb-2 " data-class="bg-transparent" onclick="sidebarType(this)"><img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt=""> 500</a>
                <a href="<?php echo base_url('admin/Razorpay/checkout/400');?>" class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-transparent" onclick="sidebarType(this)"><img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt="">400</a>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

           
           
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" href=""><i class="fa fa-phone"></i> Request A call</a><!-- 
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a> -->
            <div class="w-100 text-center">
              
                <h6 class="mt-3">Follow us!</h6>
                <a href="" class="btn bg-gradient-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="" class="btn bg-gradient-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>



<script src="<?php echo ASSETPATH;?>/js/core/popper.min.js"></script>
<script src="<?php echo ASSETPATH;?>/js/core/bootstrap.min.js"></script>
<script src="<?php echo ASSETPATH;?>/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo ASSETPATH;?>/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php echo ASSETPATH;?>/js/plugins/chartjs.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script async defer src="<?php echo ASSETPATH;?>buttons.js"></script>


<script src="<?php echo ASSETPATH;?>js/plugins/datatables.js"></script>

<script src="<?php echo ASSETPATH;?>js/plugins/dragula/dragula.min.js"></script>
<script src="<?php echo ASSETPATH;?>js/plugins/jkanban/jkanban.js"></script>
<script src="<?php echo ASSETPATH;?>js/toastr.init.js"></script>
<script src="<?php echo ASSETPATH;?>js/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-search').dataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" 
href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" 
href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">

<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

<script src="<?php echo ASSETPATH;?>/js/soft-ui-dashboard.minc924.js?v=1.0.6"></script>
<script>
  const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
    searchable: false,
    fixedHeight: true
  });

  
</script>

</div>
</body>

</html>