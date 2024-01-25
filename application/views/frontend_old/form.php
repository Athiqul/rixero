
  <?php $this->load->view('frontend/header');?>
    <?php  $user_id= $this->session->userdata('user_id'); ?>

    
        <div class="row container addMargin">
            <div class="col-md-8">
                <div class="namesSteps">
                    <div> <i class="fa-solid fa-user"></i> </div>
                    <div><i class="fa-solid fa-print"></i></div>
                    <div><i class="fa-solid fa-droplet"></i></div>
                    <div><i class="fa-solid fa-upload"></i></div>
                    <div><i class="fa-solid fa-check"></i></div>
                </div>
                <div id="steps">
                    <div class="step <?php if($user_id>0){ echo 'done';}else{ echo 'active'; }?> " data-desc="Listing information">1</div>
                    <div class="step <?php if($user_id>0){ echo 'active';} ?>" data-desc="Photos & Details">2</div>
                    <div class="step " data-desc="Review & Post">3</div>
                    <div class="step" data-desc="Your order">4</div>
                    <div class="step" data-desc="Overview">5</div>
                </div>

            </div>
        </div>
    <?php
       
        if($user_id>0)
        {
            $this->db->select();
            $this->db->where('user_id',$user_id);
            $res=$this->db->get('tbl_mst_users')->row_array();
           // print_r($res);
        }else
        {
             $res=array();
        }
        ?>

        <div class="row">
            <div class=" col-xl-9 p-3">

                <div class="boxWrap">

                    <div class="boxDetaile boxDetaile1 activeSlide" <?php if($user_id>0){ ?> style="display: none" <?php }?>>
                  
                        <div class="centerSide">
                            <div class="col-md-12 col-12 position-relative overflow-hidden" style="width: 62%;margin-left: 32%;">
                 <form action="<?php echo base_url('login/checkuserlogin'); ?>" class="container addMargin" method="post">

                    <div class="loginForm login" >
                        <div>
                            <h3> Login</h3>
                            <p>
                                Hey, Enter your details to sign in <br>
                                to your account
                            </p>
                            <p><?php $this->load->view('frontend/component/dismissible_message.php'); ?></p>
                        </div><div class="my-3">
                            <input type="email" placeholder="Email" name="email" value="<?php if(isset ($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required="required">
                        </div>
                        <div class="my-3">
                            <input type="password" name="password" placeholder="Password" value="<?php if(isset ($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label for="rememberme">
                                <input type="checkbox" name="remember_me" id="remember_me" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?>>  Remember me
                            </label>
                            <div>
                                <a href="#">Forgot Password</a>
                            </div>
                        </div>
                        <div>
                            <button type="Submit">Sign in</button>
                        </div>
                        <div>
                            <button class="google"><img src="<?php echo ASSET_WEB_PATH;?>img/google.png" alt="Google"> Sign in with Google</button>
                        </div>
                        <br>
                        <div class="dontHaveAcc">
                            <p>
                                Don’t have an account? <a href="#aaaa" id="signupFormToggle">Sign up</a>
                            </p>
                        </div>
                    </div>



                </form>
               <form action="<?php echo CUSTOMER_SAVE_REGISTRATION_URL;?>" method='post'>
                    <div class="loginForm signup">
                        <div class="dontHaveAcc">
                            <p>
                                Already have an account? <a href="#" id="loginTarget">Sign in</a>
                            </p>
                        </div>
                        <div>
                            <h3>
                                Register
                            </h3>
                            <p>
                                Hey, Enter your details to Register <br>
                                your account
                            </p>
                        </div>
                       <div class="my-3">
                            <input type="text" name="first_name" placeholder="First Name">
                        </div>
                        <div class="my-3">
                            <input type="text" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="my-3">
                            <input type="tel" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" placeholder="Enter 10 digit mobile number" minlength="10" maxlength="10" name="phone">
                        </div>
                        <div class="my-3">
                            <input type="email"  name="email" placeholder="Email">
                        </div>
                        <div class="my-3">
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        <div>
                            <button type="Submit">Register</button>
                        </div>
                        <div>
                            <button class="google"><img src="<?php echo ASSET_WEB_PATH;?>img/google.png" alt="Google"> Sign up with Google</button>
                        </div>
                        <br>
                       
                    </div>

                    <div style="display:none">
                        <div class="col-12 my-3">
                                    <input type="text" placeholder="Name" class="inputfield" id="firstName" name="name" value="<?php echo isset($res['first_name'])?$res['first_name']:''; ?>">
                                </div>
                                <div class="col-3 my-3">

                                    <select class="selectTab">
                                        <option data-countryCode="IN" value="91" selected>+91</option>
                                        <!-- <option value="+91">+91</option> -->
                                        <option data-countryCode="DZ" value="213">+213</option>
                                        <option data-countryCode="AD" value="376">+376</option>
                                        <option data-countryCode="AO" value="244">+244</option>
                                        <option data-countryCode="AI" value="1264">+1264</option>
                                        <option data-countryCode="AG" value="1268">+1268</option>
                                        <option data-countryCode="AR" value="54">+54</option>
                                        <option data-countryCode="AM" value="374">+374</option>
                                        <option data-countryCode="AW" value="297">+297</option>
                                        <option data-countryCode="AU" value="61">+61</option>
                                        <option data-countryCode="AT" value="43">+43</option>
                                        <option data-countryCode="AZ" value="994">+994</option>
                                        <option data-countryCode="BS" value="1242">+1242</option>
                                        <option data-countryCode="BH" value="973">+973</option>
                                        <option data-countryCode="BD" value="880">+880</option>
                                        <option data-countryCode="BB" value="1246">+1246</option>
                                        <option data-countryCode="BY" value="375">+375</option>
                                        <option data-countryCode="BE" value="32">+32</option>
                                      


                                    </select>
                                </div>
                                <div class="col-9 my-3">
                                    <input type="text" placeholder="Contact No." minlength="6" class="inputfield"
                                        name="number" maxlength="12" id="personalContact" value="<?php echo isset($res['phone'])?$res['phone']:''; ?>" 
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                </div>
                                <div class="col-12 my-3">
                                    <input type="text" placeholder="Email Id" class="inputfield" id="mailContact"
                                        name="email" value="<?php echo isset($res['email'])?$res['email']:''; ?>">
                                </div>
                                 <?php if($user_id<=0)
                                 { ?>
                                <div class="col-12 my-3">
                                    <input type="text" placeholder="Password" class="inputfield" id="password"
                                        name="password"  >
                                    <p></p>
                                </div>

                            <?php } ?>
                                <div class="col-12 my-3">
                                    <input type="text" placeholder="Company Name" class="inputfield" id="companyName"
                                        name="companyName" value="<?php echo isset($res['company_name'])?$res['company_name']:''; ?>" >
                                    <p>(optional)</p>
                                </div>
                    </div>

                
            </div>
                        </div>
                        <div class="rightSide">
                            <button type="button" id="next1" style="display: none;">Next</button>
                        </div>
                    </div></form>
                    <form action="<?php echo base_url('form/saveData');?>" method="post" class="container addMargin" enctype="multipart/form-data">
                    <div class="boxDetaile boxDetaile2 <?php if($user_id>0){ echo 'activeSlide unset';  }?>" >
                        <div class="leftSide">
                            <button id="prev2" type="button" style="display: none;">Previous</button>
                        </div>
                        <div class="centerSide">
                            <div action="#" class="d-flex flex-wrap align-items-center printable">
                                <div class="col-12">
                                    <h4>Design Type</h4>
                                </div>
                                <div class="col-12 my-3">
                                    <select id="Papersize" onchange="createPagenameDDL();" name="banner_id" required>
                                        <option value="">-Select-</option>
                                        <?php 
                                        $selectedBanner=isset($selectedData['banner_id'])?$selectedData['banner_id']:'';
                                        $selectedBannerpage=isset($selectedData['id'])?$selectedData['id']:'';

                                        if($listAr!='' && !empty($listAr))
                                        {
                                        foreach ($listAr as $key => $value) {
                                            $selected='';
                                            if($selectedBanner==$value['banner_id'])
                                            {
                                                $selected='selected';   
                                            }
                                            ?>
                                        <option value="<?php echo $value['banner_id'];?>" <?php echo $selected;?>><?php echo $value['b_name'];?></option>
                                      <?php } } ?>
                                    </select>
                                </div>

                                <div class="col-12 my-3">
                                    <select id="type_id" name="t_size_type_id" onchange="showprice()" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col-12 my-3 hidecolumn" id="ssc">
                                    <select id="printable_type" name="printable_type" onchange="showprice()"  >
                                       <option value="Front">Front</option>
                                         <option value="Front && Back" >Front & Back</option>
                                    </select>
                                </div>
                                 <div class="col-12 my-3 ">
                                    <input type="text" placeholder="No of pages" class="inputfield" id="pages_no"
                                        name="pages_no" value="1" required>
                                  
                                </div>

                                <div class="col-12 my-3 hideThis ">

                                    <input type="text" placeholder="Custom Size" name="custom_size" id="customSize" readonly>
                                </div>

                                <div class="col-md-6 col-12 my-3 pe-4 hideThis">
                                    <input type="number" placeholder="Width" name="customWidth" id="customWidth">
                                </div>
                                <div class="col-md-6 hideThis">
                                    <div class="buttonsSize">
                                        <div>
                                            <input type="radio" name="widthSize" id="px" checked>
                                            <label for="px">px</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="widthSize" id="inch">
                                            <label for="inch">inch</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="widthSize" id="per">
                                            <label for="per">%</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 my-3 pe-4 hideThis">
                                    <input type="number" placeholder="Height" name="customHeight" id="customHeight">
                                </div>
                                <div class="col-md-6 hideThis">
                                    <div class="buttonsSize">
                                        <div>
                                            <input type="radio" name="heightSize" id="px1" checked>
                                            <label for="px1">px</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="heightSize" id="inch1">
                                            <label for="inch1">inch</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="heightSize" id="per1">
                                            <label for="per1">%</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 my-3 hidecolumn ">
                                    <input type="radio" name="orientation" id="width" value="Vertical">
                                    <label for="width" class="widthOrientation">
                                        <span>

                                        </span>
                                        <span>
                                            Vertical
                                        </span>
                                    </label>
                                </div>

                                <div class="col-lg-6 col-12 my-3 hidecolumn">
                                    <input type="radio" name="orientation" id="height" value="Horizontal">
                                    <label for="height" class="heightOrientation">
                                        <span>

                                        </span>
                                        <span>
                                            Horizontal
                                        </span>
                                    </label>
                                </div>
                                  <div class="errorPersonalDeatils .col-12">

                                </div>
                            </div>
                        </div>
                        <div class="rightSide">
                            <button id="next2" type="button">Next</button>
                        </div>
                    </div>

                    <div class="boxDetaile boxDetaile3  "  >
                        <div class="leftSide">
                            <button id="prev3" type="button">Previous</button>
                        </div>
                        <div class="centerSide">
                            
                                <h4>PREFFERED COLOURS</h4>
                                <div class="col-12">

                                    <div class="prefColor">

                                        <label for="color1">
                                            <input type="radio" name="color_scheme[]" id="color1">
                                            <span class="activeColor">

                                            </span>

                                        </label>
                                        <label for="color2">
                                            <input type="radio" name="color_scheme[]" id="color2">
                                            <span>

                                            </span>

                                        </label>
                                        <label for="color3">
                                            <input type="radio" name="color_scheme[]" id="color3">
                                            <span>

                                            </span>

                                        </label>
                                        <label for="color4">
                                            <input type="radio" name="color_scheme[]" id="color4">
                                            <span>

                                            </span>

                                        </label>
                                        <label for="color5">
                                            <input type="radio" name="color_scheme[]" id="color5">
                                            <span>

                                            </span>

                                        </label>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">

                                    <div class="colorPicker">
                                        <img src="<?php echo ASSET_WEB_PATH;?>img/img_colormap.gif" id='selectedhexagon' alt="" usemap="#colormap">
                                        <div class="hexaGonDiv"></div>
                                        <!-- map  -->
                                        <map id='colormap' name='colormap' onmouseout='mouseOutMap()'>
                                            <area style='cursor:pointer' shape='poly'
                                                coords='63,0,72,4,72,15,63,19,54,15,54,4'
                                                onclick='clickColor("#003366",-200,54)'
                                                onmouseover='mouseOverColor("#003366")' alt='#003366' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,0,90,4,90,15,81,19,72,15,72,4'
                                                onclick='clickColor("#336699",-200,72)'
                                                onmouseover='mouseOverColor("#336699")' alt='#336699' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,0,108,4,108,15,99,19,90,15,90,4'
                                                onclick='clickColor("#3366CC",-200,90)'
                                                onmouseover='mouseOverColor("#3366CC")' alt='#3366CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,0,126,4,126,15,117,19,108,15,108,4'
                                                onclick='clickColor("#003399",-200,108)'
                                                onmouseover='mouseOverColor("#003399")' alt='#003399' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,0,144,4,144,15,135,19,126,15,126,4'
                                                onclick='clickColor("#000099",-200,126)'
                                                onmouseover='mouseOverColor("#000099")' alt='#000099' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,0,162,4,162,15,153,19,144,15,144,4'
                                                onclick='clickColor("#0000CC",-200,144)'
                                                onmouseover='mouseOverColor("#0000CC")' alt='#0000CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,0,180,4,180,15,171,19,162,15,162,4'
                                                onclick='clickColor("#000066",-200,162)'
                                                onmouseover='mouseOverColor("#000066")' alt='#000066' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,15,63,19,63,30,54,34,45,30,45,19'
                                                onclick='clickColor("#006666",-185,45)'
                                                onmouseover='mouseOverColor("#006666")' alt='#006666' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,15,81,19,81,30,72,34,63,30,63,19'
                                                onclick='clickColor("#006699",-185,63)'
                                                onmouseover='mouseOverColor("#006699")' alt='#006699' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,15,99,19,99,30,90,34,81,30,81,19'
                                                onclick='clickColor("#0099CC",-185,81)'
                                                onmouseover='mouseOverColor("#0099CC")' alt='#0099CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,15,117,19,117,30,108,34,99,30,99,19'
                                                onclick='clickColor("#0066CC",-185,99)'
                                                onmouseover='mouseOverColor("#0066CC")' alt='#0066CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,15,135,19,135,30,126,34,117,30,117,19'
                                                onclick='clickColor("#0033CC",-185,117)'
                                                onmouseover='mouseOverColor("#0033CC")' alt='#0033CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,15,153,19,153,30,144,34,135,30,135,19'
                                                onclick='clickColor("#0000FF",-185,135)'
                                                onmouseover='mouseOverColor("#0000FF")' alt='#0000FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,15,171,19,171,30,162,34,153,30,153,19'
                                                onclick='clickColor("#3333FF",-185,153)'
                                                onmouseover='mouseOverColor("#3333FF")' alt='#3333FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,15,189,19,189,30,180,34,171,30,171,19'
                                                onclick='clickColor("#333399",-185,171)'
                                                onmouseover='mouseOverColor("#333399")' alt='#333399' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='45,30,54,34,54,45,45,49,36,45,36,34'
                                                onclick='clickColor("#669999",-170,36)'
                                                onmouseover='mouseOverColor("#669999")' alt='#669999' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,30,72,34,72,45,63,49,54,45,54,34'
                                                onclick='clickColor("#009999",-170,54)'
                                                onmouseover='mouseOverColor("#009999")' alt='#009999' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,30,90,34,90,45,81,49,72,45,72,34'
                                                onclick='clickColor("#33CCCC",-170,72)'
                                                onmouseover='mouseOverColor("#33CCCC")' alt='#33CCCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,30,108,34,108,45,99,49,90,45,90,34'
                                                onclick='clickColor("#00CCFF",-170,90)'
                                                onmouseover='mouseOverColor("#00CCFF")' alt='#00CCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,30,126,34,126,45,117,49,108,45,108,34'
                                                onclick='clickColor("#0099FF",-170,108)'
                                                onmouseover='mouseOverColor("#0099FF")' alt='#0099FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,30,144,34,144,45,135,49,126,45,126,34'
                                                onclick='clickColor("#0066FF",-170,126)'
                                                onmouseover='mouseOverColor("#0066FF")' alt='#0066FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,30,162,34,162,45,153,49,144,45,144,34'
                                                onclick='clickColor("#3366FF",-170,144)'
                                                onmouseover='mouseOverColor("#3366FF")' alt='#3366FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,30,180,34,180,45,171,49,162,45,162,34'
                                                onclick='clickColor("#3333CC",-170,162)'
                                                onmouseover='mouseOverColor("#3333CC")' alt='#3333CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='189,30,198,34,198,45,189,49,180,45,180,34'
                                                onclick='clickColor("#666699",-170,180)'
                                                onmouseover='mouseOverColor("#666699")' alt='#666699' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='36,45,45,49,45,60,36,64,27,60,27,49'
                                                onclick='clickColor("#339966",-155,27)'
                                                onmouseover='mouseOverColor("#339966")' alt='#339966' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,45,63,49,63,60,54,64,45,60,45,49'
                                                onclick='clickColor("#00CC99",-155,45)'
                                                onmouseover='mouseOverColor("#00CC99")' alt='#00CC99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,45,81,49,81,60,72,64,63,60,63,49'
                                                onclick='clickColor("#00FFCC",-155,63)'
                                                onmouseover='mouseOverColor("#00FFCC")' alt='#00FFCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,45,99,49,99,60,90,64,81,60,81,49'
                                                onclick='clickColor("#00FFFF",-155,81)'
                                                onmouseover='mouseOverColor("#00FFFF")' alt='#00FFFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,45,117,49,117,60,108,64,99,60,99,49'
                                                onclick='clickColor("#33CCFF",-155,99)'
                                                onmouseover='mouseOverColor("#33CCFF")' alt='#33CCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,45,135,49,135,60,126,64,117,60,117,49'
                                                onclick='clickColor("#3399FF",-155,117)'
                                                onmouseover='mouseOverColor("#3399FF")' alt='#3399FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,45,153,49,153,60,144,64,135,60,135,49'
                                                onclick='clickColor("#6699FF",-155,135)'
                                                onmouseover='mouseOverColor("#6699FF")' alt='#6699FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,45,171,49,171,60,162,64,153,60,153,49'
                                                onclick='clickColor("#6666FF",-155,153)'
                                                onmouseover='mouseOverColor("#6666FF")' alt='#6666FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,45,189,49,189,60,180,64,171,60,171,49'
                                                onclick='clickColor("#6600FF",-155,171)'
                                                onmouseover='mouseOverColor("#6600FF")' alt='#6600FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='198,45,207,49,207,60,198,64,189,60,189,49'
                                                onclick='clickColor("#6600CC",-155,189)'
                                                onmouseover='mouseOverColor("#6600CC")' alt='#6600CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='27,60,36,64,36,75,27,79,18,75,18,64'
                                                onclick='clickColor("#339933",-140,18)'
                                                onmouseover='mouseOverColor("#339933")' alt='#339933' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='45,60,54,64,54,75,45,79,36,75,36,64'
                                                onclick='clickColor("#00CC66",-140,36)'
                                                onmouseover='mouseOverColor("#00CC66")' alt='#00CC66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,60,72,64,72,75,63,79,54,75,54,64'
                                                onclick='clickColor("#00FF99",-140,54)'
                                                onmouseover='mouseOverColor("#00FF99")' alt='#00FF99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,60,90,64,90,75,81,79,72,75,72,64'
                                                onclick='clickColor("#66FFCC",-140,72)'
                                                onmouseover='mouseOverColor("#66FFCC")' alt='#66FFCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,60,108,64,108,75,99,79,90,75,90,64'
                                                onclick='clickColor("#66FFFF",-140,90)'
                                                onmouseover='mouseOverColor("#66FFFF")' alt='#66FFFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,60,126,64,126,75,117,79,108,75,108,64'
                                                onclick='clickColor("#66CCFF",-140,108)'
                                                onmouseover='mouseOverColor("#66CCFF")' alt='#66CCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,60,144,64,144,75,135,79,126,75,126,64'
                                                onclick='clickColor("#99CCFF",-140,126)'
                                                onmouseover='mouseOverColor("#99CCFF")' alt='#99CCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,60,162,64,162,75,153,79,144,75,144,64'
                                                onclick='clickColor("#9999FF",-140,144)'
                                                onmouseover='mouseOverColor("#9999FF")' alt='#9999FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,60,180,64,180,75,171,79,162,75,162,64'
                                                onclick='clickColor("#9966FF",-140,162)'
                                                onmouseover='mouseOverColor("#9966FF")' alt='#9966FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='189,60,198,64,198,75,189,79,180,75,180,64'
                                                onclick='clickColor("#9933FF",-140,180)'
                                                onmouseover='mouseOverColor("#9933FF")' alt='#9933FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='207,60,216,64,216,75,207,79,198,75,198,64'
                                                onclick='clickColor("#9900FF",-140,198)'
                                                onmouseover='mouseOverColor("#9900FF")' alt='#9900FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='18,75,27,79,27,90,18,94,9,90,9,79'
                                                onclick='clickColor("#006600",-125,9)'
                                                onmouseover='mouseOverColor("#006600")' alt='#006600' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='36,75,45,79,45,90,36,94,27,90,27,79'
                                                onclick='clickColor("#00CC00",-125,27)'
                                                onmouseover='mouseOverColor("#00CC00")' alt='#00CC00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,75,63,79,63,90,54,94,45,90,45,79'
                                                onclick='clickColor("#00FF00",-125,45)'
                                                onmouseover='mouseOverColor("#00FF00")' alt='#00FF00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,75,81,79,81,90,72,94,63,90,63,79'
                                                onclick='clickColor("#66FF99",-125,63)'
                                                onmouseover='mouseOverColor("#66FF99")' alt='#66FF99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,75,99,79,99,90,90,94,81,90,81,79'
                                                onclick='clickColor("#99FFCC",-125,81)'
                                                onmouseover='mouseOverColor("#99FFCC")' alt='#99FFCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,75,117,79,117,90,108,94,99,90,99,79'
                                                onclick='clickColor("#CCFFFF",-125,99)'
                                                onmouseover='mouseOverColor("#CCFFFF")' alt='#CCFFFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,75,135,79,135,90,126,94,117,90,117,79'
                                                onclick='clickColor("#CCCCFF",-125,117)'
                                                onmouseover='mouseOverColor("#CCCCFF")' alt='#CCCCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,75,153,79,153,90,144,94,135,90,135,79'
                                                onclick='clickColor("#CC99FF",-125,135)'
                                                onmouseover='mouseOverColor("#CC99FF")' alt='#CC99FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,75,171,79,171,90,162,94,153,90,153,79'
                                                onclick='clickColor("#CC66FF",-125,153)'
                                                onmouseover='mouseOverColor("#CC66FF")' alt='#CC66FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,75,189,79,189,90,180,94,171,90,171,79'
                                                onclick='clickColor("#CC33FF",-125,171)'
                                                onmouseover='mouseOverColor("#CC33FF")' alt='#CC33FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='198,75,207,79,207,90,198,94,189,90,189,79'
                                                onclick='clickColor("#CC00FF",-125,189)'
                                                onmouseover='mouseOverColor("#CC00FF")' alt='#CC00FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='216,75,225,79,225,90,216,94,207,90,207,79'
                                                onclick='clickColor("#9900CC",-125,207)'
                                                onmouseover='mouseOverColor("#9900CC")' alt='#9900CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='9,90,18,94,18,105,9,109,0,105,0,94'
                                                onclick='clickColor("#003300",-110,0)'
                                                onmouseover='mouseOverColor("#003300")' alt='#003300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='27,90,36,94,36,105,27,109,18,105,18,94'
                                                onclick='clickColor("#009933",-110,18)'
                                                onmouseover='mouseOverColor("#009933")' alt='#009933' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='45,90,54,94,54,105,45,109,36,105,36,94'
                                                onclick='clickColor("#33CC33",-110,36)'
                                                onmouseover='mouseOverColor("#33CC33")' alt='#33CC33' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,90,72,94,72,105,63,109,54,105,54,94'
                                                onclick='clickColor("#66FF66",-110,54)'
                                                onmouseover='mouseOverColor("#66FF66")' alt='#66FF66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,90,90,94,90,105,81,109,72,105,72,94'
                                                onclick='clickColor("#99FF99",-110,72)'
                                                onmouseover='mouseOverColor("#99FF99")' alt='#99FF99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,90,108,94,108,105,99,109,90,105,90,94'
                                                onclick='clickColor("#CCFFCC",-110,90)'
                                                onmouseover='mouseOverColor("#CCFFCC")' alt='#CCFFCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,90,126,94,126,105,117,109,108,105,108,94'
                                                onclick='clickColor("#FFFFFF",-110,108)'
                                                onmouseover='mouseOverColor("#FFFFFF")' alt='#FFFFFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,90,144,94,144,105,135,109,126,105,126,94'
                                                onclick='clickColor("#FFCCFF",-110,126)'
                                                onmouseover='mouseOverColor("#FFCCFF")' alt='#FFCCFF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,90,162,94,162,105,153,109,144,105,144,94'
                                                onclick='clickColor("#FF99FF",-110,144)'
                                                onmouseover='mouseOverColor("#FF99FF")' alt='#FF99FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,90,180,94,180,105,171,109,162,105,162,94'
                                                onclick='clickColor("#FF66FF",-110,162)'
                                                onmouseover='mouseOverColor("#FF66FF")' alt='#FF66FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='189,90,198,94,198,105,189,109,180,105,180,94'
                                                onclick='clickColor("#FF00FF",-110,180)'
                                                onmouseover='mouseOverColor("#FF00FF")' alt='#FF00FF' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='207,90,216,94,216,105,207,109,198,105,198,94'
                                                onclick='clickColor("#CC00CC",-110,198)'
                                                onmouseover='mouseOverColor("#CC00CC")' alt='#CC00CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='225,90,234,94,234,105,225,109,216,105,216,94'
                                                onclick='clickColor("#660066",-110,216)'
                                                onmouseover='mouseOverColor("#660066")' alt='#660066' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='18,105,27,109,27,120,18,124,9,120,9,109'
                                                onclick='clickColor("#336600",-95,9)'
                                                onmouseover='mouseOverColor("#336600")' alt='#336600' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='36,105,45,109,45,120,36,124,27,120,27,109'
                                                onclick='clickColor("#009900",-95,27)'
                                                onmouseover='mouseOverColor("#009900")' alt='#009900' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,105,63,109,63,120,54,124,45,120,45,109'
                                                onclick='clickColor("#66FF33",-95,45)'
                                                onmouseover='mouseOverColor("#66FF33")' alt='#66FF33' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,105,81,109,81,120,72,124,63,120,63,109'
                                                onclick='clickColor("#99FF66",-95,63)'
                                                onmouseover='mouseOverColor("#99FF66")' alt='#99FF66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,105,99,109,99,120,90,124,81,120,81,109'
                                                onclick='clickColor("#CCFF99",-95,81)'
                                                onmouseover='mouseOverColor("#CCFF99")' alt='#CCFF99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,105,117,109,117,120,108,124,99,120,99,109'
                                                onclick='clickColor("#FFFFCC",-95,99)'
                                                onmouseover='mouseOverColor("#FFFFCC")' alt='#FFFFCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,105,135,109,135,120,126,124,117,120,117,109'
                                                onclick='clickColor("#FFCCCC",-95,117)'
                                                onmouseover='mouseOverColor("#FFCCCC")' alt='#FFCCCC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,105,153,109,153,120,144,124,135,120,135,109'
                                                onclick='clickColor("#FF99CC",-95,135)'
                                                onmouseover='mouseOverColor("#FF99CC")' alt='#FF99CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,105,171,109,171,120,162,124,153,120,153,109'
                                                onclick='clickColor("#FF66CC",-95,153)'
                                                onmouseover='mouseOverColor("#FF66CC")' alt='#FF66CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,105,189,109,189,120,180,124,171,120,171,109'
                                                onclick='clickColor("#FF33CC",-95,171)'
                                                onmouseover='mouseOverColor("#FF33CC")' alt='#FF33CC' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='198,105,207,109,207,120,198,124,189,120,189,109'
                                                onclick='clickColor("#CC0099",-95,189)'
                                                onmouseover='mouseOverColor("#CC0099")' alt='#CC0099' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='216,105,225,109,225,120,216,124,207,120,207,109'
                                                onclick='clickColor("#993399",-95,207)'
                                                onmouseover='mouseOverColor("#993399")' alt='#993399' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='27,120,36,124,36,135,27,139,18,135,18,124'
                                                onclick='clickColor("#333300",-80,18)'
                                                onmouseover='mouseOverColor("#333300")' alt='#333300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='45,120,54,124,54,135,45,139,36,135,36,124'
                                                onclick='clickColor("#669900",-80,36)'
                                                onmouseover='mouseOverColor("#669900")' alt='#669900' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,120,72,124,72,135,63,139,54,135,54,124'
                                                onclick='clickColor("#99FF33",-80,54)'
                                                onmouseover='mouseOverColor("#99FF33")' alt='#99FF33' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,120,90,124,90,135,81,139,72,135,72,124'
                                                onclick='clickColor("#CCFF66",-80,72)'
                                                onmouseover='mouseOverColor("#CCFF66")' alt='#CCFF66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,120,108,124,108,135,99,139,90,135,90,124'
                                                onclick='clickColor("#FFFF99",-80,90)'
                                                onmouseover='mouseOverColor("#FFFF99")' alt='#FFFF99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,120,126,124,126,135,117,139,108,135,108,124'
                                                onclick='clickColor("#FFCC99",-80,108)'
                                                onmouseover='mouseOverColor("#FFCC99")' alt='#FFCC99' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,120,144,124,144,135,135,139,126,135,126,124'
                                                onclick='clickColor("#FF9999",-80,126)'
                                                onmouseover='mouseOverColor("#FF9999")' alt='#FF9999' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,120,162,124,162,135,153,139,144,135,144,124'
                                                onclick='clickColor("#FF6699",-80,144)'
                                                onmouseover='mouseOverColor("#FF6699")' alt='#FF6699' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,120,180,124,180,135,171,139,162,135,162,124'
                                                onclick='clickColor("#FF3399",-80,162)'
                                                onmouseover='mouseOverColor("#FF3399")' alt='#FF3399' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='189,120,198,124,198,135,189,139,180,135,180,124'
                                                onclick='clickColor("#CC3399",-80,180)'
                                                onmouseover='mouseOverColor("#CC3399")' alt='#CC3399' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='207,120,216,124,216,135,207,139,198,135,198,124'
                                                onclick='clickColor("#990099",-80,198)'
                                                onmouseover='mouseOverColor("#990099")' alt='#990099' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='36,135,45,139,45,150,36,154,27,150,27,139'
                                                onclick='clickColor("#666633",-65,27)'
                                                onmouseover='mouseOverColor("#666633")' alt='#666633' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,135,63,139,63,150,54,154,45,150,45,139'
                                                onclick='clickColor("#99CC00",-65,45)'
                                                onmouseover='mouseOverColor("#99CC00")' alt='#99CC00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,135,81,139,81,150,72,154,63,150,63,139'
                                                onclick='clickColor("#CCFF33",-65,63)'
                                                onmouseover='mouseOverColor("#CCFF33")' alt='#CCFF33' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,135,99,139,99,150,90,154,81,150,81,139'
                                                onclick='clickColor("#FFFF66",-65,81)'
                                                onmouseover='mouseOverColor("#FFFF66")' alt='#FFFF66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,135,117,139,117,150,108,154,99,150,99,139'
                                                onclick='clickColor("#FFCC66",-65,99)'
                                                onmouseover='mouseOverColor("#FFCC66")' alt='#FFCC66' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,135,135,139,135,150,126,154,117,150,117,139'
                                                onclick='clickColor("#FF9966",-65,117)'
                                                onmouseover='mouseOverColor("#FF9966")' alt='#FF9966' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,135,153,139,153,150,144,154,135,150,135,139'
                                                onclick='clickColor("#FF6666",-65,135)'
                                                onmouseover='mouseOverColor("#FF6666")' alt='#FF6666' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,135,171,139,171,150,162,154,153,150,153,139'
                                                onclick='clickColor("#FF0066",-65,153)'
                                                onmouseover='mouseOverColor("#FF0066")' alt='#FF0066' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,135,189,139,189,150,180,154,171,150,171,139'
                                                onclick='clickColor("#CC6699",-65,171)'
                                                onmouseover='mouseOverColor("#CC6699")' alt='#CC6699' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='198,135,207,139,207,150,198,154,189,150,189,139'
                                                onclick='clickColor("#993366",-65,189)'
                                                onmouseover='mouseOverColor("#993366")' alt='#993366' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='45,150,54,154,54,165,45,169,36,165,36,154'
                                                onclick='clickColor("#999966",-50,36)'
                                                onmouseover='mouseOverColor("#999966")' alt='#999966' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,150,72,154,72,165,63,169,54,165,54,154'
                                                onclick='clickColor("#CCCC00",-50,54)'
                                                onmouseover='mouseOverColor("#CCCC00")' alt='#CCCC00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,150,90,154,90,165,81,169,72,165,72,154'
                                                onclick='clickColor("#FFFF00",-50,72)'
                                                onmouseover='mouseOverColor("#FFFF00")' alt='#FFFF00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,150,108,154,108,165,99,169,90,165,90,154'
                                                onclick='clickColor("#FFCC00",-50,90)'
                                                onmouseover='mouseOverColor("#FFCC00")' alt='#FFCC00' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,150,126,154,126,165,117,169,108,165,108,154'
                                                onclick='clickColor("#FF9933",-50,108)'
                                                onmouseover='mouseOverColor("#FF9933")' alt='#FF9933' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,150,144,154,144,165,135,169,126,165,126,154'
                                                onclick='clickColor("#FF6600",-50,126)'
                                                onmouseover='mouseOverColor("#FF6600")' alt='#FF6600' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,150,162,154,162,165,153,169,144,165,144,154'
                                                onclick='clickColor("#FF5050",-50,144)'
                                                onmouseover='mouseOverColor("#FF5050")' alt='#FF5050' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,150,180,154,180,165,171,169,162,165,162,154'
                                                onclick='clickColor("#CC0066",-50,162)'
                                                onmouseover='mouseOverColor("#CC0066")' alt='#CC0066' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='189,150,198,154,198,165,189,169,180,165,180,154'
                                                onclick='clickColor("#660033",-50,180)'
                                                onmouseover='mouseOverColor("#660033")' alt='#660033' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='54,165,63,169,63,180,54,184,45,180,45,169'
                                                onclick='clickColor("#996633",-35,45)'
                                                onmouseover='mouseOverColor("#996633")' alt='#996633' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='72,165,81,169,81,180,72,184,63,180,63,169'
                                                onclick='clickColor("#CC9900",-35,63)'
                                                onmouseover='mouseOverColor("#CC9900")' alt='#CC9900' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='90,165,99,169,99,180,90,184,81,180,81,169'
                                                onclick='clickColor("#FF9900",-35,81)'
                                                onmouseover='mouseOverColor("#FF9900")' alt='#FF9900' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='108,165,117,169,117,180,108,184,99,180,99,169'
                                                onclick='clickColor("#CC6600",-35,99)'
                                                onmouseover='mouseOverColor("#CC6600")' alt='#CC6600' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='126,165,135,169,135,180,126,184,117,180,117,169'
                                                onclick='clickColor("#FF3300",-35,117)'
                                                onmouseover='mouseOverColor("#FF3300")' alt='#FF3300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='144,165,153,169,153,180,144,184,135,180,135,169'
                                                onclick='clickColor("#FF0000",-35,135)'
                                                onmouseover='mouseOverColor("#FF0000")' alt='#FF0000' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='162,165,171,169,171,180,162,184,153,180,153,169'
                                                onclick='clickColor("#CC0000",-35,153)'
                                                onmouseover='mouseOverColor("#CC0000")' alt='#CC0000' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='180,165,189,169,189,180,180,184,171,180,171,169'
                                                onclick='clickColor("#990033",-35,171)'
                                                onmouseover='mouseOverColor("#990033")' alt='#990033' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='63,180,72,184,72,195,63,199,54,195,54,184'
                                                onclick='clickColor("#663300",-20,54)'
                                                onmouseover='mouseOverColor("#663300")' alt='#663300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='81,180,90,184,90,195,81,199,72,195,72,184'
                                                onclick='clickColor("#996600",-20,72)'
                                                onmouseover='mouseOverColor("#996600")' alt='#996600' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='99,180,108,184,108,195,99,199,90,195,90,184'
                                                onclick='clickColor("#CC3300",-20,90)'
                                                onmouseover='mouseOverColor("#CC3300")' alt='#CC3300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='117,180,126,184,126,195,117,199,108,195,108,184'
                                                onclick='clickColor("#993300",-20,108)'
                                                onmouseover='mouseOverColor("#993300")' alt='#993300' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='135,180,144,184,144,195,135,199,126,195,126,184'
                                                onclick='clickColor("#990000",-20,126)'
                                                onmouseover='mouseOverColor("#990000")' alt='#990000' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='153,180,162,184,162,195,153,199,144,195,144,184'
                                                onclick='clickColor("#800000",-20,144)'
                                                onmouseover='mouseOverColor("#800000")' alt='#800000' /><area
                                                style='cursor:pointer' shape='poly'
                                                coords='171,180,180,184,180,195,171,199,162,195,162,184'
                                                onclick='clickColor("#993333",-20,162)'
                                                onmouseover='mouseOverColor("#993333")' alt='#993333' />
                                        </map>
                                        <script>
                                            var thistop = "-35";
                                            var thisleft = "135";
                                        </script>


                                        <!-- map  -->

                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div>
                                        <div id="ColorHover">

                                        </div>
                                        <!-- <input type="color" id="html5colorpicker" onchange="clickColor(0, -1, -1, 5)"
                                            value="#ff0000" style="width:85%;" colorpick-eyedropper-active="true"> -->
                                        <label for="selectColor">Select Colour</label>
                                        <div id="gradientColor">
                                            <input type="range" id="slideRed" name="slideRed" min="0" max="9">
                                        </div>

                                    </div>
                                    <div>
                                        <label for="entercolor">Enter Color</label>
                                        <input type="text" name="enterColor" id="entercolor"
                                            pattern="#[0-9a-fA-F]{3}([0-9a-fA-F]{3})?">
                                    </div>
                                    <div class="errorColour">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6>Design References</h6>
                                    <div class="dropDragFile dropZone">
                                        <div class="uploadborder">

                                        </div>
                                        <h6>
                                            Drop Your File
                                        </h6>
                                        <label for="fileSelect">
                                            <input type="file" class="d-none dropZoneInput" name="preffered_logo" id="fileSelect" multiple
                                                data-no="0">
                                            Select File
                                        </label>
                                        <p>(upto 10 MB)</p>
                                    </div>
                                </div>

                        </div>
                        <div class="rightSide">
                            <button id="next3" type="button">Next</button>
                        </div>
                    </div>

                    <div class="boxDetaile boxDetaile4">
                        <div class="leftSide">
                            <button id="prev4" type="button">Previous</button>
                        </div>
                        <div class="centerSide">
                        
                                <div>
                                    <h4>Logo</h4>
                                    <div class="dragDrop dropZone">
                                        <div class="uploadborder"></div>
                                        <h6>Drop Files To Upload</h6>
                                        <label for="uploadLogoInput">
                                            <input type="file" name="uploadlogo" id="uploadLogoInput"     class="dropZoneInput" data-no="0">
                                            Select Files
                                        </label>
                                        <p>
                                            Upto 10mb
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <h4>Any Specific vector</h4>
                                    <p>file eg. (Mascot, Doodle)</p>
                                    <div class="dragDrop dropZone">
                                        <div class="uploadborder"></div>
                                        <h6>Drop Files To Upload</h6>
                                        <label for="uploadspecific">
                                            <input type="file" name="specificuploadlogo" id="uploadspecific" 
                                                class="dropZoneInput" data-no="0">
                                            Select Files
                                        </label>
                                        <p>
                                            Upto 10mb
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <h4>Specific Description</h4>
                                    <div class="normalInput">
                                        <textarea class="w-100" rows="3" name="desc" id="specificDescription"></textarea>
                                    </div>
                                </div>
                          
                        </div>
                        <div class="rightSide">
                            <button id="next4" type="button">Next</button>
                        </div>
                    </div>
                    <div class="boxDetaile boxDetaile5">
                        <div class="leftSide">
                            <button id="prev5" type="button">Edit</button>
                        </div>
                        <div class="centerSide">
                           
                                <h6>Personal Details</h6>
                                <div class="d-flex flex-wrap w-100">
                                    <div class="col-md-6 pe-3 my-2">
                                        <input type="text" placeholder="XYZ" id="dataName" value="<?php echo isset($res['first_name'])?$res['first_name']:''; ?>" readonly>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap w-100">
                                    <div class="col-md-6 pe-3 my-2">
                                        <input type="text" placeholder="+91 00000 00000" value="<?php echo isset($res['phone'])?$res['phone']:'';?>" id="mobileNumberFinal"
                                            readonly>
                                    </div>

                                    <div class="col-md-6 pe-3 my-2">
                                        <input type="email" placeholder="xyz@mail.com" value="<?php echo isset($res['email'])?$res['email']:''; ?>" id="mailIdField" readonly>
                                    </div>

                                </div>
                                <h6>
                                    Printable
                                </h6>
                                <div class="d-flex flex-wrap w-100">
                                    <div class="col-md-6 pe-3 my-2">
                                        <input type="text" placeholder="Size A4" readonly id="paperSizeOutput">
                                    </div>
                                </div>
                                <h6>
                                    Selected Colours
                                </h6>
                                <div class="d-flex flex-wrap w-100 finalColourOutput">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <input type="text" id="AllcoloursInput" class="d-none" name="allColours">
                                <h6>
                                    Logo
                                </h6>
                                <div class="dragDrop">
                                    <h5>
                                        <span id="logoUploadedNumber">1</span> file, Upload
                                    </h5>
                                </div>
                                <h6>
                                    Any Specific vector
                                </h6>
                                <div class="dragDrop">
                                    <h5>
                                        <span class="specificUploadedNumber">1</span> file, Upload
                                    </h5>
                                </div>
                                <h6>
                                    Specific Description
                                </h6>
                                <div class="dragDrop">
                                    <p id="specificData">
                                        No data found
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </div>

            </div>
            <div class=" col-xl-3 p-3">
                <div class="price">
                    <h4 class="text-center">Price</h4>
                    <table>
                        <tr>
                            <td> </td>
                            <td><img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt="">  </td>
                            <td>  TOTAL</td>
                        </tr>
                        <tr>
                            <td>Post Design </td>
                            <td> ₹</td>
                            <td> <span id="costvaluep">0</span> </td>
                        </tr>
                        <tr>
                            <td> No of Pages </td>
                            <td> </td>
                            <td>  <span id="pageNumer">0</span></td>
                        </tr>
                    </table>
                    <div class="coupencode">
                        <div class="top">
                            <p>Have a Coupon?</p>
                            <a href="#" id="openCode">Click Here</a>
                        </div>
                        <div class="bottom d-none" id="coupenField">
                            <input type="text" placeholder="Coupon code">
                            <button id="submitbutton">Apply</button>
                        </div>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td> Sub Total    </td>
                                <td>  ₹  </td>
                                <td> <span id="costvalue"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    Discount
                                </td>
                                <td>  ₹ </td>
                                <td> 0.00 </td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> Total </th>
                                <th>  ₹ </th>
                                <th> <span id="total">0</span></th>
                            </tr>
                            <tr>
                                <th>
                                    <span class="badge bg-secondary" id="showRixicoin"> Show in rixi coin </span>
                                </th>
                                <th class="rixicoin">
                                    <img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt="">
                                </th>
                                <th class="rixicoin">
                                   <span id="coinrupees"></span>
                                </th>
                            </tr>
                        </tfoot>
                        <input type="hidden" name="finalAmount" id="finalAmount" value="">
    <input type="hidden" name="mastercoin" id="mastercoin" value="<?php echo isset($coinvalueAr['coin_value'])?$coinvalueAr['coin_value']:0;?>">
                    </table>
                    <input type="hidden" name="totalamount" id="totalamount" value="">
                    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id;?>">
                    <input type="hidden" name="selectedBannerpage" id="selectedBannerpage" value="<?php echo $selectedBannerpage;?>">
                    <div class="paybutton">
                        <button><img src="<?php echo ASSET_WEB_PATH;?>img/rixicoin.png" width="30px" alt=""> Pay With Rixi Coin</button>
                        <button type="submit"><img src="<?php echo ASSET_WEB_PATH;?>img/Razorpay.png" class="w-50" alt="razerpay"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="errorShow"></div>


      <?php $this->load->view('frontend/footer');?>

    <script>


        $(document).ready(function () {
            //$("#Papersize").change(function () {

               // alert();
   var banner_id=$('#Papersize option:selected').val();


               // var banner_id = $("#Papersize").val(); 
                var cat_id = $("#cat_id").val(); 
                var selectedBannerpage = $("#selectedBannerpage").val(); 
                //alert(pack_id);
                var parameters="banner_id="+banner_id;
                if(banner_id==2)
                {

                    $('.hidecolumn').css("display", "none");
                }else
                {
                     $('.hidecolumn').css("display", "block");
                }
                $.ajax({
                    type: "POST",
                    url: "<?php echo FRONTEND_FORM_DDL_URL; ?>",
                    data: {banner_id:banner_id,cat_id:cat_id,selectedBannerpage:selectedBannerpage},
                    cache: false,
                    success:function(responseData)
                    {      


                        $("#type_id").html(''); 
                        $("#type_id").html(responseData); 

                        showprice();

                        if(banner_id==2){
                            showstep3();
                        }
                    }   
                });


                     
                // });
            });


        function showstep3(){
            $("#steps .step:nth-child(2)").addClass("done")
            $("#steps .step:nth-child(3)").addClass("active")
            $("#steps .step:nth-child(2)").removeClass("active")

            $(".boxDetaile3").addClass("activeSlide")
            setTimeout(() => {
                $(".boxDetaile3").addClass("unset")
                $(".boxDetaile2").hide()

            }, 1000);
        }




            




        $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
       
        $("#signupFormToggle").click(function () {

            $(".signup").addClass("hidden")
            setTimeout(() => {
                
                $(".login").addClass("hidden")
                $(".signup").addClass("unset")
            }, 1000);
        })
        $("#loginTarget").click(function () {

            $(".signup").removeClass("unset")
            $(".login").removeClass("hidden")
            $(".signup").removeClass("hidden")
            setTimeout(() => {
                
            }, 1000);
        })
  


        $('input[name=pages_no]').on('keyup', function() { 

        var coinvalue = $("#mastercoin").val(); 
        var type_id = $("#type_id").val(); 
        var printable_type = $("#printable_type").val(); 
        var pages_no = $("#pages_no").val(); 
        //alert(pack_id);
        var parameters="type_id="+type_id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('form/getprice'); ?>",
            data: {type_id:type_id,printable_type:printable_type,pages_no:pages_no},
            cache: false,
            success:function(responseData)
            {   
          //  alert(responseData); 
         obj = JSON.parse(responseData);  


    document.getElementById('costvaluep').innerHTML=obj.cost;
  //  document.getElementById('total').innerHTML=(obj.cost*pages_no);
    document.getElementById('totalamount').value=obj.cost;
    document.getElementById('paperSizeOutput').value=obj.title;
    document.getElementById('pageNumer').innerHTML=pages_no;
    if(printable_type=='Front')
    {
        //alert(printable_type);
        document.getElementById('costvalue').innerHTML=obj.cost*pages_no;
        document.getElementById('total').innerHTML=(obj.cost*pages_no);
        document.getElementById('finalAmount').value=(obj.cost*pages_no);
        document.getElementById('coinrupees').innerHTML=obj.cost*pages_no*coinvalue;
    }else
    {
       // alert('hii');

        document.getElementById('costvalue').innerHTML=obj.cost*pages_no*2;
        document.getElementById('finalAmount').value=(obj.cost*pages_no*2);
        document.getElementById('total').innerHTML=(obj.cost*pages_no*2);
        document.getElementById('coinrupees').innerHTML=obj.cost*pages_no*2*coinvalue;

    }

              
            }   
        }); 


 });

     


    function createPagenameDDL()
    {
//alert();
    
        var banner_id = $("#Papersize").val(); 
        var cat_id = $("#cat_id").val(); 
        var selectedBannerpage = $("#selectedBannerpage").val(); 
        //alert(pack_id);
        var parameters="banner_id="+banner_id;
        if(banner_id==2)
        {

            $('.hidecolumn').css("display", "none");
        }else
        {
             $('.hidecolumn').css("display", "block");
        }
        $.ajax({
            type: "POST",
            url: "<?php echo FRONTEND_FORM_DDL_URL; ?>",
            data: {banner_id:banner_id,cat_id:cat_id,selectedBannerpage:selectedBannerpage},
            cache: false,
            success:function(responseData)
            {      


                $("#type_id").html(''); 
                $("#type_id").html(responseData); 

                document.getElementById('costvaluep').innerHTML='0.00';
                document.getElementById('costvalue').innerHTML='0.00';
                document.getElementById('total').innerHTML='0.00';
              //  document.getElementById('total').innerHTML=(obj.cost*pages_no);
                document.getElementById('totalamount').value='0';
                document.getElementById('finalAmount').value='0';
                document.getElementById('paperSizeOutput').value='';
                document.getElementById('pageNumer').innerHTML='1';
            }   
        });
    }
    function showprice()
    {

    
        var coinvalue = $("#mastercoin").val(); 
        var type_id = $("#type_id").val(); 
        var printable_type = $("#printable_type").val(); 
        var pages_no = $("#pages_no").val(); 
        //alert(pack_id);
        var parameters="type_id="+type_id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('form/getprice'); ?>",
            data: {type_id:type_id,printable_type:printable_type,pages_no:pages_no},
            cache: false,
            success:function(responseData)
            {   
          //  alert(responseData); 
         obj = JSON.parse(responseData);  


    document.getElementById('costvaluep').innerHTML=obj.cost;
  //  document.getElementById('total').innerHTML=(obj.cost*pages_no);
    document.getElementById('totalamount').value=obj.cost;
    document.getElementById('paperSizeOutput').value=obj.title;
    document.getElementById('pageNumer').innerHTML=pages_no;
    if(printable_type=='Front')
    {
        //alert(printable_type);
        document.getElementById('costvalue').innerHTML=obj.cost*pages_no;
        document.getElementById('total').innerHTML=(obj.cost*pages_no);
        document.getElementById('finalAmount').value=(obj.cost*pages_no);
        document.getElementById('coinrupees').innerHTML=obj.cost*pages_no*coinvalue;
    }else
    {
       // alert('hii');

        document.getElementById('costvalue').innerHTML=obj.cost*pages_no*2;
        document.getElementById('finalAmount').value=(obj.cost*pages_no*2);
        document.getElementById('total').innerHTML=(obj.cost*pages_no*2);
        document.getElementById('coinrupees').innerHTML=obj.cost*pages_no*2*coinvalue;

    }

              
            }   
        });
    }


        $(".carouselWork").owlCarousel({
            loop: 1,
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
        $("#openCode").click(function () {
            $("#coupenField").toggleClass("d-none")
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-min.js"></script>
    <script src="<?php echo ASSET_WEB_PATH;?>js/script.js"></script>
    <script>

        // first slide 
        $("#next1").click(function () {
            
             email = $('#mailContact').val();
            user_id = $('#user_id').val();
             $.ajax({
            type: "POST",
            url: "<?php echo base_url('form/checkmail'); ?>",
            data: {email:email,user_id:user_id},
            cache: false,
            success:function(datares)
            { 
                if(datares=='notexit')
                {
          
                        $(".errorPersonalDeatils").html("")
                        $("#steps .step:nth-child(1)").addClass("done")
                        $("#steps .step:nth-child(2)").addClass("active")
                        $("#steps .step:nth-child(1)").removeClass("active")
        
                        $(".boxDetaile2").addClass("activeSlide")
                        setTimeout(() => {
                            $(".boxDetaile2").addClass("unset")
                            $(".boxDetaile1").hide()
        
                        }, 1000);
                        
                }
                else
                {
                     $(".errorPersonalDeatils").html("<p class='text-danger'>Email Already exist</p>")
                }
}   
        });
           
        })
        // second slide 
        $("#prev2").click(function () {
            $(".boxDetaile2").removeClass("unset")
            $(".boxDetaile1").show()
            $(".boxDetaile2").removeClass("activeSlide")
            $("#steps .step:nth-child(1)").removeClass("done")
            $("#steps .step:nth-child(2)").removeClass("active")
            $("#steps .step:nth-child(1)").addClass("active")


        })
        $("#next2").click(function () {
            if ($("#type_id").val() && $("#Papersize").val() ) {

            $("#steps .step:nth-child(2)").addClass("done")
            $("#steps .step:nth-child(3)").addClass("active")
            $("#steps .step:nth-child(2)").removeClass("active")

            $(".boxDetaile3").addClass("activeSlide")
            setTimeout(() => {
                $(".boxDetaile3").addClass("unset")
                $(".boxDetaile2").hide()

            }, 1000);
        }
         else {
                $(".errorPersonalDeatils").html("<p class='text-danger'>Please fill requires fields</p>")
            }

        })
        // third slide 
        $("#prev3").click(function () {

            $("#steps .step:nth-child(2)").removeClass("done")
            $("#steps .step:nth-child(3)").removeClass("active")
            $("#steps .step:nth-child(2)").addClass("active")

            $(".boxDetaile3").removeClass("unset")
            $(".boxDetaile2").show()
            $(".boxDetaile3").removeClass("activeSlide")


        })
        $("#next3").click(function () {
            if (true) {
                $("#steps .step:nth-child(3)").addClass("done")
                $("#steps .step:nth-child(4)").addClass("active")
                $("#steps .step:nth-child(3)").removeClass("active")

                $(".boxDetaile4").addClass("activeSlide")
                setTimeout(() => {
                    $(".boxDetaile4").addClass("unset")
                    $(".boxDetaile3").hide()

                }, 1000);
                $(".errorColour").html("")
            }
            else {
                $(".errorColour").html("<p class='text-danger'>Please select colour</p>")
            }
        })
        // fourth slide 
        $("#prev4").click(function () {
            $("#steps .step:nth-child(3)").removeClass("done")
            $("#steps .step:nth-child(4)").removeClass("active")
            $("#steps .step:nth-child(3)").addClass("active")
            $(".boxDetaile4").removeClass("unset")
            $(".boxDetaile3").show()
            $(".boxDetaile4").removeClass("activeSlide")

        })
        $("#next4").click(function () {
            $("#steps .step:nth-child(4)").addClass("done")
            $("#steps .step:nth-child(5)").addClass("active")
            $("#steps .step:nth-child(4)").removeClass("active")
            $(".boxDetaile5").addClass("activeSlide")
            setTimeout(() => {
                $(".boxDetaile5").addClass("unset")
                $(".boxDetaile4").hide()

            }, 1000);
            let allColors = document.querySelectorAll('.prefColor span')
            // console.log(allColors)
            let allColours = []
            allColors.forEach((e, index) => {
                // console.log(e.style.background)
                // console.log(index)
                document.querySelectorAll('.finalColourOutput span')[index].style.background = e.style.background
                allColours = allColours + " , " + e.style.background
            })

            $("#AllcoloursInput").val(allColours)
            // console.log(allColors)
            // console.log(allColors)

            $("#logoUploadedNumber").html(document.getElementById("uploadLogoInput").getAttribute("data-no"))
            // Document.getElementById("logoUploadedNumber")
            // $("#specificUploadedNumber")
            $(".specificUploadedNumber").html(document.getElementById("uploadspecific").getAttribute("data-no"))
            $(".paybutton ").show()
        })
        // fifth slide 
        $("#prev5").click(function () {
            $("#steps .step:nth-child(4)").removeClass("done")
            $("#steps .step:nth-child(5)").removeClass("active")
            $("#steps .step:nth-child(4)").addClass("active")
            $(".paybutton ").hide()

            $(".boxDetaile5").removeClass("unset")
            $(".boxDetaile4").show()
            $(".boxDetaile5").removeClass("activeSlide")

        })

    </script>
    <script>
        function hexToRgbA(hex) {
            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return [(c >> 16) & 255, (c >> 8) & 255, c & 255];
            }
            throw new Error('Bad Hex');
        }


        function clickColor(a, b, c) {
            // console.log(a)
            // console.log(b)
            // console.log(c)
            $('.prefColor input:checked ~ span').css({ "background": a })
            $('.prefColor input:checked').val(a)
            $('#entercolor').val(a)
            $('#gradientColor').css({ 'backgroundImage': `linear-gradient(to right , ${a} , #fff)` })
            // console.log('clicked')
            $('.hexaGonDiv').css({
                'top': b + "px",
                'left': c + "px",
            })

        }
        function mouseOverColor(a, b, c) {
            $('#ColorHover').css({ "backgroundColor": a })
            // console.log(a)
            // console.log(b)
            // console.log(c)
            // console.log('mousehover')
        }
        function mouseOutMap(a, b, c) {

            // console.log('mouseout')
            // console.log(a)
            // console.log(b)
            // console.log(c)
        }
        $('#slideRed').on('input', function () {

            let rgbaCol = hexToRgbA($('.prefColor input:checked').val())
            $('.prefColor input:checked ~ span').css({ 'background': `rgba( ${rgbaCol[0]} , ${rgbaCol[1]} , ${rgbaCol[2]} , 0.${this.value})` })
            // console.log(this.value)
            // console.log("hello")
            $('#entercolor').val(`rgba( ${rgbaCol[0]} , ${rgbaCol[1]} , ${rgbaCol[2]} , 0.${this.value})`)


        })
        $("#entercolor").on('input', function () {
            $('.prefColor input:checked ~ span').css({ 'background': `#${this.value}` })
        })
    </script>
    <script>
        let selectedValue = document.querySelector('#type_id')
        selectedValue.addEventListener('input', function () {
            let selectedValueOption = document.querySelector('#type_id').value
         //   alert(selectedValueOption);
            if (selectedValueOption === '6') {
                // console.log(selectedValueOption)

                $(".hideThis").css({ 'display': 'block' })
            } else {
                // console.log("other than custom")
                $(".hideThis").css({ 'display': 'none' })
                $("#paperSizeOutput").val(selectedValueOption)
                // console.log(selectedValueOption)

            }
        })
    </script>
    <!-- upload file  -->
    <!-- <script>
        let referenceDocs = document.getElementById('uploadReference')
        referenceDocs.addEventListener('dragover',function(){
            this.classList.add('dragHover')
            console.log('dragged')
        })
        referenceDocs.addEventListener('dragleave',function(){
            this.classList.remove('dragHover')
            console.log('dragged')
        })
    </script> -->
    <script>
        document.getElementById('customWidth').addEventListener('input', function () {
            // console.log(this.value)
            function customwidth() {
                if (document.getElementById('customWidth').value) {
                    return document.getElementById('customWidth').value
                } else {
                    return 0
                }

            }
            function customheight() {
                if (document.getElementById('customHeight').value) {
                    return document.getElementById('customHeight').value
                } else {
                    return 0
                }

            }
            let width = customwidth();
            let height = customheight();
            document.querySelector('#customSize').value = width + '*' + height
            document.querySelector('#paperSizeOutput').value = width + '*' + height

        })
        document.getElementById('customHeight').addEventListener('input', function () {
            // console.log(this.value)
            function customwidth() {
                if (document.getElementById('customWidth').value) {
                    return document.getElementById('customWidth').value
                } else {
                    return 0
                }

            }
            function customheight() {
                if (document.getElementById('customHeight').value) {
                    return document.getElementById('customHeight').value
                } else {
                    return 0
                }

            }
            let width = customwidth();
            let height = customheight();
            document.querySelector('#customSize').value = width + '*' + height
            document.querySelector('#paperSizeOutput').value = width + '*' + height
        })
        document.querySelector('#color1').addEventListener('input', e => {
            document.querySelector(".finalColourOutput span:nth-child(1)").style.backgroundColor = document.querySelector('#color1').value
        })
        $("#showRixicoin").click(function () {
            $(".rixicoin").toggle(".rixicoin")
        })





    </script>

</body>

</html>