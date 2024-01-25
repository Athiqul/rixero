<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rixero</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css"
        integrity="sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
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

    <div class="container addMarginNav">

        <div class="row">
            <div class="col-12 my-3">
                <h4>Lorem, ipsum.</h4>
            </div>
            <div class="col-12">
                <ul class="filterOption ">
                    <li class="active"><a href="#">All</a></li>
                    <li><a href="#">Social Media</a></li>
                    <li><a href="#">Logo Design</a></li>
                    <li><a href="#">Packaging</a></li>
                    <li><a href="#">Brochours</a></li>
                    <li><a href="#">Wedding Invite</a></li>
                </ul>
            </div>
            <div class="col-12">

                <div class="gallery" id="gallery">
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>
                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (1).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (2).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (3).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (4).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (5).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (6).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (7).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (8).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (9).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i> </a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (10).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i> </a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (11).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (12).png" alt="">
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="index.html">Link <i class="fa-solid fa-link"></i></a>
                            </div>

                            <img src="<?php echo ASSET_WEB_PATH;?>img/image (13).png" alt="">
                        </div>
                    </div>


                </div>
                <script>
                    var gallery = document.querySelector('#gallery');
                    var getVal = function (elem, style) { return parseInt(window.getComputedStyle(elem).getPropertyValue(style)); };
                    var getHeight = function (item) { return item.querySelector('.content').getBoundingClientRect().height; };
                    var resizeAll = function () {
                        var altura = getVal(gallery, 'grid-auto-rows');
                        var gap = getVal(gallery, 'grid-row-gap');
                        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
                            var el = item;
                            el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
                        });
                    };
                    gallery.querySelectorAll('#gallery img').forEach(function (item) {

                        item.addEventListener('load', function () {
                            var altura = getVal(gallery, 'grid-auto-rows');
                            var gap = getVal(gallery, 'grid-row-gap');
                            var gitem = item.parentElement.parentElement;
                            gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                            item.classList.remove('byebye');
                        });

                    });
                    window.addEventListener('resize', resizeAll());


                </script>
            </div>
        </div>
    </div>
    <footer id="footer">

    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"
        integrity="sha512-vyRAVI0IEm6LI/fVSv/Wq/d0KUfrg3hJq2Qz5FlfER69sf3ZHlOrsLriNm49FxnpUGmhx+TaJKwJ+ByTLKT+Yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="<?php echo ASSET_WEB_PATH;?>js/script.js"></script>

</body>

</html>