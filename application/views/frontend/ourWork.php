     <?php $this->load->view('frontend/header');?>
 <link rel="stylesheet" href="<?php echo ASSET_WEB_PATH;?>/style.css">




    <div class="container addMarginNav">

        
    <div class="work-banner working-2">
        <div class="container">
            <div class="row">
                <div class="col-12 ">

                    <div class="top-side">
                        <div class="box-1 active">
                            <div class="icon">
                              <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Brochures.png" alt="">
                            </div>
                            <h4>Printable</h4>
                        </div>
                        <div class="box-2 ">
                            <div class="icon">
                              <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Greeting Cards.png" alt="">

                            </div>
                            <h4>Non-Printable</h4>
                        </div>
                        <div class="box-3">
                            <div class="icon">

                              <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/social media posts, banners.png" alt="">
                            </div>
                            <h4>Social Media</h4>
                        </div>
                        <div class="box-4">
                            <div class="icon">
                              <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/online menu.png" alt="">

                            </div>
                            <h4>Website</h4>
                        </div>
                    </div>
                    <div class="bottom-side my-4">
                        <div class="bottom-box-1 d-flex flex-wrap align-items-center active printable">

                            <div class=" col-12">
                                <div class="d-flex flex-wrap ">
                                     <?php if($printableAr!='' && !empty($printableAr))
                                    {
                                        foreach ($printableAr as $key => $value) {
                                            
                                        ?>
                                    <div class="col-md-4 col-12">
                                        <div class="card-box">
                                          <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">
                                            <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                             <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"><h4 style="text-align: center;color: black;"><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>

                                    </div>

                                      <?php }
                                    } ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-2 d-flex flex-wrap align-items-center ">


                            <div class=" col-12">
                                <div class="d-flex flex-wrap ">
                                      <?php if($nonprintableAr!='' && !empty($nonprintableAr))
                                    {
                                        foreach ($nonprintableAr as $key => $value) {
                                            
                                        ?>
                                    <div class="col-md-4 col-12">
                                        <div class="card-box">
                                         <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"> <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"> <h4><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>

                                    </div>
  <?php } }?>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-3 d-flex flex-wrap align-items-center">

                            <div class=" col-12">
                                <div class="d-flex flex-wrap ">
                                    <?php if($socialAr!='' && !empty($socialAr))
                                    {
                                        foreach ($socialAr as $key => $value) {
                                            
                                        ?>
                                    <div class="col-md-4 col-12">
                                        <div class="card-box">
                                           <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>"><img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                            <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>"> <h4><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                            <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>
                                    </div>
                                    <?php }
                                    } ?>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-4 d-flex flex-wrap align-items-center">

                            <div class=" col-12">
                                <div class="d-flex flex-wrap  justify-content-between">
                                     <?php if($websiteAr!='' && !empty($websiteAr))
                                    {
                                        foreach ($websiteAr as $key => $value) {
                                            
                                        ?>

                                    <div class="col-md-4 col-12">
                                        <div class="card-box">
                                          <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt="">
                                            <h4><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p> 
                                            <a href="<?php echo base_url('form/index/1') ?>">
                                                →
                                            </a>
                                        </div>
                                    </div>
                                     <?php }
                                    } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>    

     <?php $this->load->view('frontend/footer');?>

<script>
        $('.non-printable').owlCarousel({
            items: 1,
            autoplay: true,

        })

        document.querySelector(`.box-1`).addEventListener('click', () => {
            document.querySelector(`.box-1`).classList.add('active')
            document.querySelector(`.box-2`).classList.remove('active')
            document.querySelector(`.box-3`).classList.remove('active')
            document.querySelector(`.box-4`).classList.remove('active')

            document.querySelector(`.bottom-box-1`).classList.add("active")
            document.querySelector(`.bottom-box-2`).classList.remove("active")
            document.querySelector(`.bottom-box-3`).classList.remove("active")
            document.querySelector(`.bottom-box-4`).classList.remove("active")
        })


        document.querySelector(`.box-2`).addEventListener('click', () => {
            document.querySelector(`.box-2`).classList.add('active')
            document.querySelector(`.box-1`).classList.remove('active')
            document.querySelector(`.box-3`).classList.remove('active')
            document.querySelector(`.box-4`).classList.remove('active')

            document.querySelector(`.bottom-box-2`).classList.add("active")
            document.querySelector(`.bottom-box-1`).classList.remove("active")
            document.querySelector(`.bottom-box-3`).classList.remove("active")
            document.querySelector(`.bottom-box-4`).classList.remove("active")
        })


        document.querySelector(`.box-3`).addEventListener('click', () => {
            document.querySelector(`.box-1`).classList.remove('active')
            document.querySelector(`.box-2`).classList.remove('active')
            document.querySelector(`.box-3`).classList.add('active')
            document.querySelector(`.box-4`).classList.remove('active')

            document.querySelector(`.bottom-box-1`).classList.remove("active")
            document.querySelector(`.bottom-box-2`).classList.remove("active")
            document.querySelector(`.bottom-box-3`).classList.add("active")
            document.querySelector(`.bottom-box-4`).classList.remove("active")
        })


        document.querySelector(`.box-4`).addEventListener('click', () => {
            document.querySelector(`.box-1`).classList.remove('active')
            document.querySelector(`.box-2`).classList.remove('active')
            document.querySelector(`.box-3`).classList.remove('active')
            document.querySelector(`.box-4`).classList.add('active')

            document.querySelector(`.bottom-box-1`).classList.remove("active")
            document.querySelector(`.bottom-box-2`).classList.remove("active")
            document.querySelector(`.bottom-box-3`).classList.remove("active")
            document.querySelector(`.bottom-box-4`).classList.add("active")
        })



    </script>



</body>



</html>