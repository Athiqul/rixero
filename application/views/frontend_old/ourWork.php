     <?php $this->load->view('frontend/header');?>
 <link rel="stylesheet" href="<?php echo ASSET_WEB_PATH;?>/style.css">




    <div class="container addMarginNav">

        <div class="work-banner">
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
                            <div class="col-md-3 offset-md-1 col-12">
                                <div class="owl-carousel owl-theme non-printable">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-1 col-12">
                                <div class="d-flex flex-wrap verticle-scroll">

                                    <?php if($printableAr!='' && !empty($printableAr))
                                    {
                                        foreach ($printableAr as $key => $value) {
                                            
                                        ?>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                             <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">  <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                             <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"><h4 style="text-align: center;color: black;"><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                             
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>
                                      
                                    </div>

                                    <?php }
                                    } ?>
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/billboards.png" alt="">
                                            <h4>Billboards</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Book covers.png" alt="">
                                            <h4>Book covers</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                  
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Catalogs.png" alt="">
                                            <h4>Catalogs</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Comic books.png" alt="">
                                            <h4>Comic books</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Exhibitions Creatives.png" alt="">
                                            <h4>Exhibitions Creatives</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Hoarding.png" alt="">
                                            <h4>Hoarding</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Invitation Cards.png" alt="">
                                            <h4>Invitation Cards</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Journals.png" alt="">
                                            <h4>Journals</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/letterhead.png" alt="">
                                            <h4>Letterhead</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Logo Design.png" alt="">
                                            <h4>Logo Design</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/magzine ads.png" alt="">
                                            <h4>Magzine Ads</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Menus.png" alt="">
                                            <h4>Menus</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Merchandise Graphics.png" alt="">
                                            <h4>Merchandise Graphics</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Newsletters.png" alt="">
                                            <h4>Newsletters</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/newspaper.png" alt="">
                                            <h4>Newspaper</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Packaging Design.png" alt="">
                                            <h4>Packaging Design</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/pamphlet.png" alt="">
                                            <h4>Pamphlet</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Posters.png" alt="">
                                            <h4>Posters</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Standees.png" alt="">
                                            <h4>Standees</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Stickers.png" alt="">
                                            <h4>Stickers</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/T-shirt design.png" alt="">
                                            <h4>T-shirt design</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/tags.png" alt="">
                                            <h4>Tags</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/tent card.png" alt="">
                                            <h4>Tent Card</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/trade show displays.png" alt="">
                                            <h4>Trade Show Displays</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/Transit ads.png" alt="">
                                            <h4>Transit Ads</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/visiting card.png" alt="">
                                            <h4>Visiting Card</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-2 d-flex flex-wrap align-items-center ">
                            <div class="col-md-3 offset-md-1 col-12">
                                <div class="owl-carousel owl-theme non-printable">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                </div>
                            </div>

                            <div class="col-md-7 offset-md-1 col-12">
                                <div class="d-flex flex-wrap verticle-scroll">
                                     <?php if($nonprintableAr!='' && !empty($nonprintableAr))
                                    {
                                        foreach ($nonprintableAr as $key => $value) {
                                            
                                        ?>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"> <img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>"> <h4><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                            <a href="<?php echo base_url('form/index/?banner_id=') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                <?php } }?>

                                    <!-- <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/Brochures.png" alt="">
                                            <h4>Brochures</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/Digital Menus.png" alt="">
                                            <h4>Digital Menus</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/e book.png" alt="">
                                            <h4>E book</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/email banners.png" alt="">
                                            <h4>Email Banners</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/flyers.png" alt="">
                                            <h4>Flyers</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/Greeting Cards.png" alt="">
                                            <h4>Greeting Cards</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/infographics.png" alt="">
                                            <h4>Infographics</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/Invitation Cards.png" alt="">
                                            <h4>Invitation Cards</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/logo design.png" alt="">
                                            <h4>Logo Design</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                 
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/posts.png" alt="">
                                            <h4>Posts</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/presentations.png" alt="">
                                            <h4>Presentations</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/product.png" alt="">
                                            <h4>Product</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/Stationary.png" alt="">
                                            <h4>Stationary</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/non printable/stories.png" alt="">
                                            <h4>Stories</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                       
                                    </div> -->
                                  
                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-3 d-flex flex-wrap align-items-center">
                            <div class="col-md-3 offset-md-1 col-12">
                                <div class="owl-carousel owl-theme non-printable">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-1 col-12">
                                <div class="d-flex flex-wrap verticle-scroll">
                                    <?php if($socialAr!='' && !empty($socialAr))
                                    {
                                        foreach ($socialAr as $key => $value) {
                                            
                                        ?>

                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                             <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>"><img src="<?php echo ADMIN_ICON_DISPLAY_PATH_NAME.$value['icon'];?>" alt=""></a>
                                            <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>"> <h4><?php echo isset($value['page_type'])?$value['page_type']:'';?></h4></a>
                                            <a href="<?php echo base_url('form/index/') ?><?php echo $value['id'];?>">
                                                →
                                            </a>
                                        </div>
                                      
                                    </div>
                                </div>

                                    <?php }
                                    } ?>
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/icons/printable/tags.png" alt="">
                                            <h4>Tags</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/printable/newspaper.png" alt="">
                                            <h4>Newspaper</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>

                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="bottom-box-4 d-flex flex-wrap align-items-center">
                            <div class="col-md-3 offset-md-1 col-12">
                                <div class="owl-carousel owl-theme non-printable">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-1 col-12">
                                <div class="d-flex flex-wrap verticle-scroll">
                                    <?php if($websiteAr!='' && !empty($websiteAr))
                                    {
                                        foreach ($websiteAr as $key => $value) {
                                            
                                        ?>

                                    <div class="col-md-6 col-12">
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
                                    <!-- <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/icons/printable/Posters.png" alt="">
                                            <h4>Posters</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/icons/printable/Stickers.png" alt="">
                                            <h4>Stickeer</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/icons/printable/tags.png" alt="">
                                            <h4>Tags</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>
                                        <div class="card-box">
                                            <img src="<?php echo ASSET_WEB_PATH;?>img/icons/printable/newspaper.png" alt="">
                                            <h4>Newspaper</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quos.</p>
                                            <a href="">
                                                →
                                            </a>
                                        </div>

                                    </div> -->
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