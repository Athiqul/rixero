 <?php $this->load->view('frontend/header');?>

    <div class="contactBanner">
        <div class="heading text-center">
            <h3>Reach Out to Us</h3>
            <img src="<?php echo ASSET_WEB_PATH;?>img/plane.png"  alt="">
        </div>
        <div class="contactFormdata">
            <div class="left">
                <h2>FAQs</h2>
                <div class="accordion" id="accordionExample">
                    <?php if($faqAr!='' && !empty($faqAr))
                    {
                        $i=0;
                    foreach ($faqAr as $key => $faqAr) {
                        $i++;
                        ?>
                      
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                             <?php echo isset($faqAr['question'])?$faqAr['question']:'';?>
                            </button>
                        </h2>
                        <div id="collapseOne<?php echo $i;?>" class="accordion-collapse collapse <?php if($i==1){ echo 'show';} ?>" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo isset($faqAr['answer'])?$faqAr['answer']:'';?>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
                    
                </div>
            </div>
            <div class="right">
                <form action="<?php echo base_url('Contact/sendmsg');?>" method="post" class="d-flex flex-wrap contactForm">
                    <div class="col-12">

                        <h2>Send A message</h2>
                    </div>
                    <div class="col-md-6 col-12 my-3">
                        <label for="Fname">First Name</label>
                        <input type="text" name="name"  id="Fname" maxlength="20">
                    </div>
                    <div class="col-md-6 col-12 my-3">
                        <label for="Lname">Last Name</label>
                        <input type="text" name="lname"  id="Lname" maxlength="20">
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <label for="Email">Email</label>
                        <input type="text" name="email"  id="Email" maxlength="50">
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <label for="Mono">Mobile Number</label>
                        <input type="text" name="mobile"  id="Mono" maxlength="10">
                    </div>
                    <div class="col-md-12 my-3 col-12">
                        <textarea  class="w-100" rows="5" name="msg" placeholder="Write your message here"></textarea>
                    </div>
                    <div class="col-md-6 my-3 col-12">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <div
  loading="lazy"
  data-mc-src="fa4dc3e3-0f26-4b30-ac4d-456ed1edb5e0#instagram"></div>
        
<script 
  src="https://cdn2.woxo.tech/a.js#63b93e29509f09afa9c1df10" 
  async data-usrc>
</script>
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
    <?php $this->load->view('frontend/footer');?>
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
 
</body>

</html>