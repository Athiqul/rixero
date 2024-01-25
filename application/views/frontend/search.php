     <?php $this->load->view('frontend/header');?>


    <div class="container addMarginNav">
        <div class="row">
            <div class="col-12 my-3">
                <h4>Design Style</h4>
            </div>
            <div class="col-12">
                <ul class="filterOption ">
                    <li class="active"><a href="#">All</a></li>
                    <?php if($listAr!='' && !empty($listAr))
                    {
                        foreach ($listAr as $key => $value) { ?>
                             <li><a href="<?php echo base_url('search/work_details/').$value['id'];?>"><?php echo $value['tag_name'];?></a></li>
                        <?php }
                    } ?>
                  
                    
                </ul>
            </div>
            <div class="col-12">

                <div class="gallery" id="gallery">
                     <?php if($workAr!='' && !empty($workAr))
                    {
                        foreach ($workAr as $key => $value) { ?>

                    <div class="gallery-item">
                        <div class="content">
                            <div class="link">
                                <a href="<?php echo base_url('search/work_details/').$value['id'];?>">Link <i class="fa-solid fa-link"></i></a>
                            </div>
                            <img src="<?php echo base_url('uploads/tags/').$value['images'];?>" alt="">
                        </div>
                    </div>
                <?php } } ?>
                    <!-- <div class="gallery-item">
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
                    </div> -->


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
     <?php $this->load->view('frontend/footer');?>


</body>

</html>