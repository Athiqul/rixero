<?php
$this->load->view('admin/header');
?>

<?php
//print_r($itemInfo); die();
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;            
$amount = (int)$amount;
$netAmount = (int)$amount*100;
$merchant_order_id =  strtoupper(substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 10));
$card_holder_name = (isset($user_details['first_name'])?$user_details['first_name']:'').' '.(isset($user_details['last_name'])?$user_details['last_name']:'');
$email = isset($user_details['email'])?$user_details['email']:'';
$phone = isset($user_details['phone'])?$user_details['phone']:'';
$name = APPLICATION_NAME;
$return_url = site_url().'admin/razorpay/callback';
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

 

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-6">
        <div class="card mb-4">
        <div class="multisteps-form mb-5">
    <div class="row match-height">
      <div class="col-md-12 ">
        <div class="card">
          
          <div class="card-content collapse show">
            <div class="card-body">
              
            
                <div class="form-body">
                  <h4 class="form-section">
                    Order Details</h4>
                    <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <h5>Name:</h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <h6><?php echo $card_holder_name;?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <h5>Email:</h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <h6><?php echo $email;?></h6>
                      </div>
                    </div>
                  </div><div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <h5>Mobile No: </h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <h6><?php echo $phone;?></h6>
                      </div>
                    </div>
                  </div><div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <h5>Order No:</h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <h6><?php echo $merchant_order_id;?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <h5>Amount:</h5>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <h6>₹&nbsp;<?php echo ($amount);?></h6>
                      </div>
                    </div>
                  </div>
                  

                 <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $netAmount; ?>"/>
  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $netAmount; ?>"/>
</form>

                  
                   <div class="row text-center">
        <div class="col-lg-12 text-right">
            <a style="margin-bottom: 10px" href="<?php print site_url();?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning"><i class="fa fa-mail-reply"></i> Back</a>
            <input style="margin-bottom: 10px" id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary" />
            <br>
        </div>
    </div>
                  
                </div>

               
             
            </div>
          </div>
        </div>
      </div>

      
    </div>

  


  
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>


    



<?php
$this->load->view('admin/footer');
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount:  document.getElementById('merchant_total').value,
    name: "<?php echo $name; ?>",
    description: "Order # <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
      // alert(transaction.razorpay_payment_id);
      // alert(transaction.razorpay_status);
      // alert(transaction.razorpay_order_id);

        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    // "theme": {
    //     "color": "red"
    // },
    
    "modal": {
        "ondismiss": function(transaction){
          //alert(transaction.razorpay_payment_id);
          window.location = "<?php echo ADMIN_TRANSACTION_HISTORY_URL.'/'.$merchant_order_id; ?>";
            //location.reload()
        }
    }
  };
var razorpay_submit_btn, razorpay_instance;
   rzp1 = new Razorpay(razorpay_options);
   rzp1.on('payment.failed', function (response){
      //alert();
        alert(response.error.code);
        
});
  

  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>
