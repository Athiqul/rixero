<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rixero</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
        integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="<?php echo ASSET_WEB_PATH;?>css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
   <?php //$this->load->view('navigation');?>
<body>
     <nav class="nav"  id="NavBar1">
       <div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-3">
            <a href="index.html" class="logoNavbar"><img src="img/logo.png" width="150px" alt=""></a>
        </div>
        <div class="col-9 text-end hamburgerMenu">
            <i class="fa-solid fa-bars" id="MenuIcon"></i>
        </div>
        <div class="col-9">
            <ul class="navigationArea">
                <li><a href="<?php echo base_url('search');?>">Our Work</a></li>
                <li><a href="<?php echo base_url('login');?>">Our Services</a></li>
                <li><a href="#">Inspiration</a></li>
                <li><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
                 <?php echo $user_id= $this->session->userdata('user_id');
       
        if($user_id>0)
        { ?>
                <li><a href="<?php echo base_url('admin/dashboard');?>" class="loginButton">CRM</a></li>

        <?php } else { ?>
                <li><a href="<?php echo base_url('login');?>" class="loginButton">Login</a></li>
            <?php } ?>
                <li><a href="#"><i class="fa-solid fa-wallet"></i> <span>Wallet</span></a></li>
                <li><a href="#"><i class="fa-solid fa-bell"></i> <span>Notification</span></a></li>
            </ul>
        </div>
    </div>
</div>
    </nav>
 
    <!-- banner  -->
    <div class="bannerSide w-100">
        <div class="d-flex flex-wrap h-100">
            <div class="col-md-5 ">
                <div class="topSide">
                    <h3>Who <br> We <br> Are</h3>
                    <div class="imageLogo">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/logoBan.png" width="100%" alt="">
                    </div>
                </div>
                <div class="bottomText">
                    <p>

                       Your connection to a network of highly skilled visual ideators and designers!</p>
<p>
We will work with you to create a strong brand identity, logo, and other visual assets that will help you achieve your goals without breaking the bank.
</p><p>
We know how important it is for your businesses to operate within its budget—which is why our impactful, aesthetic designs are available at affordable rates. Click here to view our pricing plans.
                    </p>

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
                <h3>What We Do</h3>
                <p>
Design on demand. It’s simple! Set up tasks. Share your requirements. Get your designs within 24 hours.
Our graphic designers are hand picked to ensure that you get the best bang for your buck. No hack jobs—just stunning, evocative graphics that will help you cut through the noise!
</p>
                    <br>
            </div>
            <div class="col-12">
                <div class="owl-carousel owl-theme wedoCarousel">
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-1.png" class="w-100" alt="">
                        <h5><a href="#">Logo Design</a></h5>
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-2.png" class="w-100" alt="">
                        <h5><a href="#">Post</a></h5>
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-3.png" class="w-100" alt="">
                        <h5><a href="#">Stories</a></h5>
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-4.png" class="w-100" alt="">
                        <h5><a href="#">Menu</a></h5>
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-5.png" class="w-100" alt="">
                        <h5><a href="#">Brochure</a></h5>
                    </div>
                    <div class="item">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/icon-6.png" class="w-100" alt="">
                        <h5><a href="#">Envelope</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- steps  -->
    <div class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Design in</h3>
                </div>
                <div class="col-md-3 col-12">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/image1.png" alt="" class="w-100">
                </div>
                <div class="col-md-3 col-12">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/image2.png" alt="" class="w-100">
                </div>
                <div class="col-md-3 col-12">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/image3.png" alt="" class="w-100">
                </div>
                <div class="col-md-3 col-12">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/image4.png" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="text-center">Testimonial</h3>
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


    <footer id="footer">
     
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script src="<?php echo ASSET_WEB_PATH;?>js/script.js"></script>
</body>

</html>