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

</head>

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
                 <?php  $user_id= $this->session->userdata('user_id');
       
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


    <div class="contactBanner">
        <div class="heading text-center">
            <h3>Reach Out to Us</h3>
            <img src="<?php echo ASSET_WEB_PATH;?>img/plane.png"  alt="">
        </div>
        <div class="contactFormdata">
            <div class="left">
                <h2>FAQ'S</h2>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               How do I get started?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Turn your vision into reality with Rixero. Get fully customised graphic designs at affordable prices! 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What if I don’t like the design?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               You can get up to 3 revisions for each design.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What are RixiCoins?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              RixiCoins are our in-platform tokens, which can be redeemed for various purposes


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              How soon will I get my designs?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                               Graphics will be delivered within 24 hours. Additional time will be taken for any changes that are required.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                             How do I pick a designer?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                             Rixero simplifies the process by matching you with the most suitable designer for your needs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <form class="d-flex flex-wrap contactForm">
                    <div class="col-12">

                        <h2>Send A message</h2>
                    </div>
                    <div class="col-md-6 col-12 my-3">
                        <label for="Fname">First Name</label>
                        <input type="text"  id="Fname" maxlength="20">
                    </div>
                    <div class="col-md-6 col-12 my-3">
                        <label for="Lname">Last Name</label>
                        <input type="text"  id="Lname" maxlength="20">
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <label for="Email">Email</label>
                        <input type="text"  id="Email" maxlength="50">
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <label for="Mono">Mobile Number</label>
                        <input type="text"  id="Mono" maxlength="10">
                    </div>
                    <div class="col-md-12 my-3 col-12">
                        <textarea  class="w-100" rows="5" placeholder="Write your message here"></textarea>
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-11 offset-md-1">

                <div class="carouselWork owl-carousel owl-theme">
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/insta2.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/insta1.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/insta3.png" alt="">
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

        $(".carouselWork").owlCarousel({
            loop:1,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                900: {
                    items: 4
                },
            }
        })
    </script>
    <script src="<?php echo ASSET_WEB_PATH;?>js/script.js"></script>
</body>

</html>