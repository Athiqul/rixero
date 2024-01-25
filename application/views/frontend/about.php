     <?php $this->load->view('frontend/header');?>

    <!-- banner  -->
    <div class="bannerSide w-100">
        <div class="d-flex flex-wrap h-100">
            <div class="col-md-5 ">
                <div class="topSide">
                    <h5 style="color:rgb(3, 252, 119);">How  It  Works</h5>
                   
                    <div class="imageLogo" style="position: relative;">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/logoBan.png" width="100%" alt="">
                    </div>
                </div>
                <div class="bottomText">
                <h5>Fix Your Graphic Design</h5>
                    <h5>Bottleneck,Guaranteed</h5>
                 
    <p>
        
Your connection to a network of highly skilled visual ideators and designers!
                      Your connection to a network of highly skilled visual ideators and designers!

We will work with you to create a strong brand identity, logo, and other visual assets that will help you achieve your goals without breaking the bank.

We know how important it is for your businesses to operate within its budget—which is why our impactful, aesthetic designs are available at affordable rates.
                    </p>
                    <a class="btn-site" style="max-width: 100%;" href="<?php echo base_url('form');?>">Click here to get started</a>

                </div>
            </div>
            <div class="col-md-7  h-100 position-relative">
                <img src="<?php echo ASSET_WEB_PATH;?>img/image-6.jpg" class="w-100 rightBannerImage" alt="">
            </div>
        </div>
    </div>
    <!-- banner  -->

    <!-- what we do  -->
    <div class="whatWeDo">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="col-lg-8 col-12">
                <h5 style="color:rgb(3, 252, 119);">How IT WORKS</h5>
                <h4 style="color:black">Fix Your Graphic Design</h4>
                    <h4 style="color:black">Bottleneck,Guaranteed</h4>
                <p>It’s simple! Set up tasks. Share your requirements. Get your designs within 24 hours.<br>

                Our graphic designers are hand picked to ensure that you get the best bang for your buck. No hack jobs—just stunning, evocative graphics that will help you cut through the noise!
</p>
                    <br>
            </div>
            <div class="col-12">
                <div class="owl-carousel owl-theme wedoCarousel">
                    <?php //print_r($designAr); 

                    if($designAr!='' && !empty($designAr))
                    {
                        foreach ($designAr as $key => $value) {
                            $banner_id=$value['banner_id'];
                            $id=$value['id'];
                           ?> 
                    <div class="item"><a href="<?php echo base_url('form/index/?banner_id='.$id) ?>">
                        <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" class="w-100" alt="">
                        <h5><?php echo isset($value['page_type'])?$value['page_type']:'';?> </h5></a>
                    </div>
                <?php } } ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- steps  -->
    <div class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>How It Works</h3>
                    <ol >
                        <li style="font-size:20px;">Search for the service you want</li>
                        <li style="font-size:20px;">Make the payment</li>
                        <li style="font-size:20px;">Get assigned a designer</li>
                        <li style="font-size:20px;">Get your final graphics</li>
                        </ol>
                </div>
                <div class="col-md-3 col-12">
                   <a href="<?php echo base_url('about_us');?>"> <img src="<?php echo ASSET_WEB_PATH;?>img/image1.png" alt="" class="w-100"></a>
                </div>
                <div class="col-md-3 col-12">
                     <a href="<?php echo base_url('form');?>"><img src="<?php echo ASSET_WEB_PATH;?>img/image2.png" alt="" class="w-100"></a>
                </div>
                <div class="col-md-3 col-12">
                     <a href="<?php echo base_url('about_us');?>"><img src="<?php echo ASSET_WEB_PATH;?>img/image3.png" alt="" class="w-100"></a>
                </div>
                <div class="col-md-3 col-12">
                     <a href="<?php echo base_url('search');?>"><img src="<?php echo ASSET_WEB_PATH;?>img/image4.png" alt="" class="w-100"></a>
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="text-center">Testimonials</h3>
    <!-- testimonail  -->
    <div class="testimonaials bggreen">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-10 bgWhite pt-4 px-0">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-6 py-lg-4 px-2">
                            <div class="carouselImage">
                                <img src="<?php echo ASSET_WEB_PATH;?>img/image-1.jpg" alt="">
                                <img src="<?php echo ASSET_WEB_PATH;?>img/image-2.jpg" alt="">
                                <img src="<?php echo ASSET_WEB_PATH;?>img/image-4.jpg" alt="">
                                <img src="<?php echo ASSET_WEB_PATH;?>img/images-3.jpg" class="active" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 py-lg-4">
                            <div class="testimonial1">

                                <h2>
                                    Masnoon Kherani 1
                                </h2>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsa
                                    voluptates voluptatum, pariatur accusantium cupiditate, suscipit adipisci explicabo
                                    aliquid dolore numquam rerum quasi nisi vero eos qui. Nihil, minus facilis? Odit
                                    impedit, culpa, ad assumenda veniam animi quis similique veritatis quibusdam modi
                                    temporibus repudiandae cupiditate illum totam molestiae saepe obcaecati!
                                </p>
                                <div class="number">
                                    <p>1</p>
                                </div>
                            </div>
                            <div class="testimonial1">

                                <h2>
                                    Masnoon Kherani 2
                                </h2>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsa
                                    voluptates voluptatum, pariatur accusantium cupiditate, suscipit adipisci explicabo
                                    aliquid dolore numquam rerum quasi nisi vero eos qui. Nihil, minus facilis? Odit
                                    impedit, culpa, ad assumenda veniam animi quis similique veritatis quibusdam modi
                                    temporibus repudiandae cupiditate illum totam molestiae saepe obcaecati!
                                </p>
                                <div class="number">
                                    <p>1</p>
                                </div>
                            </div>
                            <div class="testimonial1">

                                <h2>
                                    Masnoon Kherani 3
                                </h2>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsa
                                    voluptates voluptatum, pariatur accusantium cupiditate, suscipit adipisci explicabo
                                    aliquid dolore numquam rerum quasi nisi vero eos qui. Nihil, minus facilis? Odit
                                    impedit, culpa, ad assumenda veniam animi quis similique veritatis quibusdam modi
                                    temporibus repudiandae cupiditate illum totam molestiae saepe obcaecati!
                                </p>
                                <div class="number">
                                    <p>1</p>
                                </div>
                            </div>
                            <div class="testimonial1 active">

                                <h2>
                                    Masnoon Kherani 4
                                </h2>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem ipsa
                                    voluptates voluptatum, pariatur accusantium cupiditate, suscipit adipisci explicabo
                                    aliquid dolore numquam rerum quasi nisi vero eos qui. Nihil, minus facilis? Odit
                                    impedit, culpa, ad assumenda veniam animi quis similique veritatis quibusdam modi
                                    temporibus repudiandae cupiditate illum totam molestiae saepe obcaecati!
                                </p>
                                <div class="number">
                                    <p>1</p>
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
        

        $(".wedoCarousel").owlCarousel({
            margin: 20,
            autoplay:true,
            autoplayTimeout:5000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                900: {
                    items: 6
                },
            }
        })
    </script>
    <script>
        $(".carouselImage img:nth-child(1)").click(function(){
            $(this).siblings('img').removeClass('active')
            $(this).addClass('active')
            $(".testimonial1").removeClass('active')
            $(".testimonial1:nth-child(1)").addClass('active')
        })
        $(".carouselImage img:nth-child(2)").click(function(){
            $(this).siblings('img').removeClass('active')
            $(this).addClass('active')
            $(".testimonial1").removeClass('active')
            $(".testimonial1:nth-child(2)").addClass('active')
        })
        $(".carouselImage img:nth-child(3)").click(function(){
            $(this).siblings('img').removeClass('active')
            $(this).addClass('active')
            $(".testimonial1").removeClass('active')
            $(".testimonial1:nth-child(3)").addClass('active')
        })
        $(".carouselImage img:nth-child(4)").click(function(){
            $(this).siblings('img').removeClass('active')
            $(this).addClass('active')
            $(".testimonial1").removeClass('active')
            $(".testimonial1:nth-child(4)").addClass('active')
        })
    </script>
</body>

</html>