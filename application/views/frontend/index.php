  <?php $this->load->view('frontend/header');?>

    <!-- banner home  -->
    <div class="bannerHome">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-6">
                    <h2>Find the best design talent for your project</h2>
                    <p  >
                       Connect with brilliant creative minds through our design management platform, and receive high
quality designs within just 24 hours!

                    </p>
               <div style="margin-bottom: 20px;">
               <strong>Quick. Convenient. Hassle-free.</strong>
               </div> 
                       <?php  $user_id= $this->session->userdata('user_id'); 
                        if($user_id<=0)
                        { ?>
                    <a href="<?php echo CUSTOMER_LOGIN_URL; ?>" class="greenButton" >Login Now</a>
                <?php } ?>
                    <a href="<?php echo FRONTEND_FORM_URL; ?>" class="transparentButton">Request a creative</a>
                </div>
                <div class="col-lg-6">
                    <div class="rightBoxImageSection">
                        <div class="girlWithLaptop">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/Human.png" class="img-fluid" alt="">
                        </div>
                        <div class="productSide">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/BannerProduct.png" alt="">
                            <p >Packaging designed for <br> 500 rixi coins</p>
                        </div>
                        <div class="pinkCircle">

                        </div>
                        <div class="yellowCircle">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner home  -->


    <!-- what we do  -->
<!-- removed -->
    <!-- steps  -->

    <!-- demandedProfession  -->
    <div class="demandedProfessional">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <h4>Professional Design Services </h4>
                    <p >Top design talent, ready to tackle your most important projects</p>
                </div>
                <div class="col-md-3 col-12 text-end">
                    <button class="viewAll">View All</button>
                </div>
            </div>
            <div class="row DemandedService">
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" class="w-100" alt="">
                        <p >Build the face of your business</p>
                        <h6 >Brand Identity</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image002.png" class="w-100" alt="">
                        <p >Extend your reach globally</p>
                        <h6  >Social Media</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" class="w-100" alt="">
                        <p  >Create memorable experiences</p>
                        <h6  >Events & Planners</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image002.png" class="w-100" alt="">
                        <p  >Crack the business pitch with </p>
                        <h6  >PPT Presentations</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image001.png" class="w-100" alt="">
                        <p  >Build the face of your business</p>
                        <h6  >Brand Identity</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image002.png" class="w-100" alt="">
                        <p  >Extend your reach globally</p>
                        <h6  >Social Media</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image003.png" class="w-100" alt="">
                        <p  >Create memorable experiences</p>
                        <h6  >Events & Planners</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <a href="#">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/Image002.png" class="w-100" alt="">
                        <p  >Crack the business pitch with </p>
                        <h6  >PPT Presentations</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- demandedProfession  -->

    <!-- <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 text-center">
                <h4>
                    Trusted by leading brands and startups
                </h4>
            </div>
            <div class="col-md-10 my-4">
                <div class="owl-carousel owl-theme testimonials">
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo1.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo2.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo3.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo4.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo5.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo1.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo2.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo3.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo4.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo5.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo1.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo2.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo3.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo4.png" alt="">
                    </div>
                    <div class="items">
                        <img src="<?php echo ASSET_WEB_PATH;?>img/PartnerLogo5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- demandedProfession  -->


   
    


    <div class="container-fluid text-center" style="color: white;">
  
      <div id="projectFacts" class="sectionClass">
        <div class="fullWidth eight columns">
            <div class="projectFactsWrap ">
                <div class="item wow fadeInUpBig animated animated" data-number="12" style="visibility: visible;">
                    <i class="fa fa-briefcase"></i>
                    <p id="number1" class="number">12</p>
                    <span></span>
                    <p>Projects done</p>
                </div>
                <div class="item wow fadeInUpBig animated animated" data-number="55" style="visibility: visible;">
                    <i class="fa fa-smile"></i>
                    <p id="number2" class="number">55</p>
                    <span></span>
                    <p>Happy clients</p>
                </div>
                <div class="item wow fadeInUpBig animated animated" data-number="359" style="visibility: visible;">
                    <i class="fa fa-coffee"></i>
                    <p id="number3" class="number">359</p>
                    <span></span>
                    <p>Cups of coffee</p>
                </div>
                <div class="item wow fadeInUpBig animated animated" data-number="246" style="visibility: visible;">
                    <i class="fa fa-camera"></i>
                    <p id="number4" class="number">246</p>
                    <span></span>
                    <p>Photos taken</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="processSection add_bg_dark">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <h4 style="font-size:21px;"><b>Outsourcing your design requirements has been easier</b> </h4>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/RightMatchLady.png" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- four section  -->
    <div class="fourSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="boxGray">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/outsourcing/book.png" alt="">
                    </div>
                    <h4 style="font-size: 16px;"><b>Request a creative</b></h4>
                    <p >
                       Submitting graphic design requests is simple. Enter all the relevant details in our form, such as
file sizes, formats, preferred colours, references, text and more to begin the process.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="boxGray">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/outsourcing/design.png" alt="">

                    </div>
                    <h4 style="font-size: 16px;"><b>Design work begins</b></h4>
                    <p >
                       You will be automatically matched with the best designer for your needs. The designer will work
on your creative based on the details mentioned in the form.

                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="boxGray">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/outsourcing/google-analytics.png" alt="">
                    
                </div>
                <h4 style="font-size: 16px;"><b>Receive the design</b></h4>
                <p >
                    The design will be shared with you (visible on your dashboard) within 24 hours.
                    Like the design? That’s great!
                    
                </p>
            </div>
            
            <div class="col-lg-3 col-md-6 col-12">
                <div class="boxGray">
                    
                    <img src="<?php echo ASSET_WEB_PATH;?>img/outsourcing/rixi-coin.png" alt="">
                    </div>
                    <h4 style="font-size: 16px;"><b>Don’t?</b></h4>
                    <p >
                        Request a change! Once the request is received, the modified design will be shared with you
within 24 hours.

                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- four section  -->

    <!-- top freelancer  -->
    <div class="container topFreelancer">
        <div class="row">
            <div class="col-12 text-center">
                <h4 ><b>
                    Top Freelance categories</b>
                </h4>
                <p  >
                    Top business, design, and technology talent, ready to tackle your most important initiatives
                </p>
            </div>
            <div class="col-12">
                <?php if($topCatAr!='' && !empty($topCatAr))
                {
                    foreach ($topCatAr as $key => $value) { ?>

                     <div >
                        <a href="<?php echo base_url('form/index/').$value['id'];?> " style="color:black">
                    <input type="checkbox" id="<?php echo $value['cat_name'];?>">
                    <label for="brandDesign" style="font-weight: 1px;"><?php echo $value['cat_name'];?> </label></a>
                </div>
                        
                <?php    }
                } ?>
               
                

            </div>
        </div>
    </div>
    <!-- Why rixero  -->
    <div class="whyRixero mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo ASSET_WEB_PATH;?>img/WhyRixero.png" class="w-100" alt="">
                </div>
                <div class="col-md-6 whyRixeroRight">
                    <h4 ><b>Why Organizations Choose Rixerio</b></h4>
                    <div class="d-flex my-3">
                        <div class=" col-1">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/ProofQuality.png" alt="">
                        </div>
                        <div class=" col-11 ps-3">
                            <h5><b>High Quality Designs</b></h5>
                            <p  >Designers are thoroughly vetted to ensure that you have a pool of highly skilled freelancers at
your disposal.</p>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class=" col-1">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/MakeMoreManageLess.png" alt="">
                        </div>
                        <div class=" col-11 ps-3">
                            <h5><b>Effortless Process</b></h5>
                            <p  >Simply fill in our form with your requirements and a designer will deliver the finished creative to
you within 24 hours.</p>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class=" col-1">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/SafeSecure.png" alt="">
                        </div>
                        <div class=" col-11 ps-3">
                            <h5><b>Affordable Rates</b></h5>
                            <p  >Reasonable rates for world class designs. No hidden costs.</p>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class=" col-1">
                            <img src="<?php echo ASSET_WEB_PATH;?>img/SafeSecure.png" alt="">
                        </div>
                        <div class=" col-11 ps-3">
                            <h5><b>Manage Tasks With Ease</b></h5>
                            <p  >Monitor tasks, manage design files, and send feedback to your designers, all through one
dashboard.</p>
                        </div>
                    </div>
                    <button class="greenButton">Register Now</button>
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


        $.fn.jQuerySimpleCounter = function( options ) {
        var settings = $.extend({
            start:  0,
            end:    100,
            easing: 'swing',
            duration: 400,
            complete: ''
        }, options );

        var thisElement = $(this);

        $({count: settings.start}).animate({count: settings.end}, {
            duration: settings.duration,
            easing: settings.easing,
            step: function() {
                var mathCount = Math.ceil(this.count);
                thisElement.text(mathCount);
            },
            complete: settings.complete
        });
    };


$('#number1').jQuerySimpleCounter({end: 12,duration: 3000});
$('#number2').jQuerySimpleCounter({end: 55,duration: 3000});
$('#number3').jQuerySimpleCounter({end: 359,duration: 2000});
$('#number4').jQuerySimpleCounter({end: 246,duration: 2500});



    /* AUTHOR LINK */
     $('.about-me-img').hover(function(){
            $('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
        }, function(){
            $('.authorWindowWrapper').stop().fadeOut('fast').find('p').removeClass('trans');
        });



        function inVisible(element) {
  //Checking if the element is
  //visible in the viewport
  var WindowTop = $(window).scrollTop();
  var WindowBottom = WindowTop + $(window).height();
  var ElementTop = element.offset().top;
  var ElementBottom = ElementTop + element.height();
  //animating the element if it is
  //visible in the viewport
  if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
    animate(element);
}

function animate(element) {
  //Animating the element if not animated before
  if (!element.hasClass('ms-animated')) {
    var maxval = element.data('max');
    var html = element.html();
    element.addClass("ms-animated");
    $({
      countNum: element.html()
    }).animate({
      countNum: maxval
    }, {
      //duration 5 seconds
      duration: 5000,
      easing: 'linear',
      step: function() {
        element.html(Math.floor(this.countNum) + html);
      },
      complete: function() {
        element.html(this.countNum + html);
      }
    });
  }

}

//When the document is ready
$(function() {
  //This is triggered when the
  //user scrolls the page
  $(window).scroll(function() {
    //Checking if each items to animate are 
    //visible in the viewport
    $("h2[data-max]").each(function() {
      inVisible($(this));
    });
  })
});




        $(".testimonials").owlCarousel({
            margin: 30,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 5

                }
            }
        })
    </script>
</body>

</html>