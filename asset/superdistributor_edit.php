<?php $this->load->view('admin/header'); ?>
<?php
$CI = & get_instance();
$CI->load->library('Encryptdecrypt'); // load encript decript api
$Encryptdecrypt = new Encryptdecrypt();
?>
<!--=========RIGHT SECTION PAGE=============-->
<style>
  .error{
    color:red;
  }
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
  margin-right: 2%;
}
</style>
<div id="page-wrapper">
  <div class="clearfix"></div>
    <div class="row m-top" style="margin-bottom: 20px;">
    <?php $this->load->view('admin/_topmessage'); ?>
    </div>
      <div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 useraddform">
    <div class="panel panel-default" style="margin-top:-30px">
      <div class="panel-heading">
        <b style="font-size:16px;">Super Distributor</b>
        <?php if($this->session->userdata('user_type')=='superadmin'){ ?>
        <a href="<?php echo site_url('index.php/superdistributors/add'); ?>" class="btn btn-warning pull-right">Add New Super Distributor</a>
        <?php } ?>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('index.php/superdistributors/update');?>" method="post" id="vender_addform">
    	    <div class="col-md-10 col-sm-10">
            <table class="table table-bordered tablesorter">
              <tbody>
                <tr>
                  <td><label class="control-label" for="requestid">Username</label></td>
                  <td><input type="text" name="username" id="username" value="<?php echo $user_detail['username']; ?>" class="form-control" required></td>
                </tr>
                <tr>
                  <td><label class="control-label" for="requestid">Password</label></td>
                  <td><input type="password" name="password" id="password" class="form-control" value="<?php echo $user_detail['userpassword']; ?>">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </td>
                </tr>
                
                <tr>
                  <td><label class="control-label" for="requestid">Name</label></td>
                  <td><input type="text" name="name" value="<?php echo $user_detail['name'] ?>" placeholder="Name" id="name" class="form-control"></td>
                </tr>
                <?php if($this->session->userdata('user_type')=="superadmin"){ ?>
                <tr>
                  <td><label class="control-label" for="requestid">Super Stockist</label></td>
                  <td>
                    <select name="masterdistributer" id="masterdistributer" class="form-control">
                      <option value="" selected="" disabled="">--Select--</option>
                      <?php foreach($masterDistributorArr as $masterDistributor){ ?>
                      <option value="<?php echo $masterDistributor->id; ?>" <?php echo $masterDistributor->id==$selectmasterdistributorArr[0]['id']?"selected":""; ?>><?php echo $masterDistributor->name; ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
              <?php } 
              if($this->session->userdata('user_type')=="superadmin" || $this->session->userdata('user_type')=="masterdistributor"){
              ?>
                <tr>
                  <td><label class="control-label" for="requestid">National Distributer</label></td>
                  <td>
                    <select name="nationdistributer" id="nationdistributer" class="form-control">
                      <option value="" selected="" disabled="">--Select--</option>
                      <?php foreach($nationDistributorArr as $nationdistributor){ ?>
                      <option value="<?php echo $nationdistributor->id; ?>" <?php echo $nationdistributor->id==$selectnationdistributorArr[0]['id']?"selected":""; ?>><?php echo $nationdistributor->name; ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <?php } ?>

                  

                
                <tr>
                  <td><label class="control-label" for="requestid">Company Name</label></td>
                  <td><input type="text" name="company_name" placeholder="Company Name" id="company_name" class="form-control" value="<?php echo $user_detail['companyname'] ?>"></td>
                </tr>
                <tr>
                  <td><label class="control-label" for="requestid">Email</label></td>
                  <td><input type="email" name="email" placeholder="Email Id" id="email" class="form-control" value="<?php echo $user_detail['email'] ?>"></td>
                </tr>
                <tr>
                  <td><label class="control-label" for="requestid">Mobile</label></td>
                  <td><input type="number" name="mobile" placeholder="Mobile Number" id="mobile" class="form-control" value="<?php echo $user_detail['phone'] ?>"></td>
                </tr>
                <tr>
                  <td><label class="control-label" for="requestid">Address</label></td>
                  <td>
                    <textarea class="form-control" name='address' id='address' placeholder="Address"><?php echo $user_detail['address'] ?></textarea>
                    <!-- <input type="email" name="email" placeholder="Email Id" id="email" class="form-control"> -->
                  </td>
                </tr>
                
                <tr>
                  <td><label class="control-label" for="requestid">State</label></td>
                  <td>
                      <select name='state' id='state' class="form-control">
                          <option value=''>Select State</option>
                          <?php
                            for($i=0;$i<count($state);$i++)
                            {
                                $selected = $user_detail['state'] == $state[$i]['id'] ? 'selected' : '';
                                echo "<option value='".$state[$i]['id']."' ".$selected."  >".$state[$i]['name']."</option>";
                            }                            
                          ?>
                      </select>                    
                  </td>
                </tr>
                
                <tr>
                  <td><label class="control-label" for="requestid">City</label></td>
                  <td>
                      <select name='city' id='city' class="form-control">
                          
                      </select>
                  </td>
                </tr>

                <!--<tr>-->
                <!--  <td><label class="control-label" for="requestid">City</label></td>-->
                <!--  <td><input type="text" name="city" placeholder="City" id="city" class="form-control" value="<?php echo $user_detail['city'] ?>"></td>-->
                <!--</tr>-->
                
                <tr>
                  <td><label class="control-label" for="requestid">GST Number</label></td>
                  <td><input type="text" name="gst_number" placeholder="GST Number" id="gst_number" class="form-control" value="<?php echo $user_detail['gst_number'] ?>" maxlength="15" minlength="15"  oninput="this.value = this.value.toUpperCase()"></td>
                </tr>
                
                <?php if($this->session->userdata('user_type')=="superadmin"){ ?>
                <tr>
                  <td><label class="control-label" for="requestid">Status</label></td>
                  <td>
                    <select name="userstatus" class="form-control" >
                      <option value="1" <?php echo $user_detail['userblock']==1?'selected':'';?>>Block</option>
                      <option value="0" <?php echo $user_detail['userblock']==0?'selected':'';?>>Unblock</option>
                    </select>
                  </td>
                </tr>
                <?php } ?>
                
                <tr>
                  <td colspan="2">
                    <div class="col-md-4 col-md-offset-5">
                      <input type="hidden" name="id" value="<?php echo $user_detail['id']; ?>">
                      <input type="hidden" name="stateid" id='stateid' value="<?php echo $user_detail['state']; ?>">
                      <input type="hidden" name="cityid" id='cityid' value="<?php echo $user_detail['city']; ?>">
                      <button type="submit" class="btn btn-success"  value="Submit" name="submit">Update </button>
                      <a href="<?php echo site_url('index.php/superdistributors/getlist'); ?>" class="btn btn-primary">Back </a>
                      <?php if($user_detail['login_attempts'] > 5 ){ ?>
                      <!--<a href="<?php //echo site_url('index.php/adminusers/unblockuser/'.$type.'/'.$user_detail['id']); ?>" class="btn btn-danger" >Unblock </a>-->
                        <?php } ?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
    		  </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->load->view('admin/footer'); ?>
<?php if(($this->session->userdata('user_type') == 'superadmin') AND ($type == 'agent')) {?>
<script type="text/javascript">
   $('#masterdistributer').on('change',function(){
   var st=$('#masterdistributer option:selected').val();
   console.log(st);
   $.ajax({
        dataType: 'json',
        url: "<?php echo site_url('index.php/adminusers/getChildUser'); ?>",
        type: 'post',
        data: {userid: st},
        success: function(result){
          //console.log(result['childUsers']);
          $('#nationdistributer').empty().append('<option value="" selected="" disabled="">--Select--</option>');
          if(result['childUsers'] != ""){
             $.each(result['childUsers'],function(key,val){
                $('#nationdistributer').append('<option value="'+result['childUsers'][key]['id']+'">'+result['childUsers'][key]['username']+'</option>');
             });
          }
        }
    });
});
$('#superdistributer').on('change',function(){
   var st=$('#superdistributer option:selected').val();
   //console.log(st);
   $.ajax({
        dataType: 'json',
        url: "<?php echo site_url('index.php/adminusers/getChildUser'); ?>",
        type: 'post',
        data: {userid: st},
        success: function(result){
          //console.log(result['childUsers']);
          $('#distributor').empty().append('<option value="" selected="" disabled="">--Select--</option>');
          if(result['childUsers'] != ""){
             $.each(result['childUsers'],function(key,val){
                $('#distributor').append('<option value="'+result['childUsers'][key]['id']+'">'+result['childUsers'][key]['username']+'</option>');
             });
          }
        }
    });
});
</script>
<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){

    var stateid = $('#stateid').val();
    var cityid = $('#cityid').val();
    // alert(cityid);
    // console.log(cityid);
    $.ajax({
        dataType: 'json',
        type:'post',
        url :"<?php echo site_url('index.php/agent/getCity');?>",
        data:{'state_id':stateid},
        success:function(result)
        {
          $('#city').empty().append('<option value="" selected="" disabled="">Select City</option>');
              if(result != "")
              {
                  console.log(result);
                  $.each(result['city'],function(key,val){
                      var selected = result['city'][key]['id'] == cityid ? 'selected' : '';
                      $('#city').append('<option value="'+result['city'][key]['id']+'" '+selected+'>'+result['city'][key]['city_name']+'</option>');
                  });
              }

        }
      });

    

    $('#state').change(function(){
      var state_id = $(this).val();
      // alert(state_id);
      $.ajax({
        dataType: 'json',
        type:'post',
        url :"<?php echo site_url('index.php/agent/getCity');?>",
        data:{'state_id':state_id},
        success:function(result)
        {
          $('#city').empty().append('<option value="" selected="" disabled="">Select City</option>');
              if(result != "")
              {
            // console.log(result);
                  $.each(result['city'],function(key,val){
                     $('#city').append('<option value="'+result['city'][key]['id']+'">'+result['city'][key]['city_name']+'</option>');
                  });
              }

        }
      });
    });

  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#vender_addform').validate({
            rules: {
                username:{
                    required:true
                },
                password : {
                    required : true
                }, 
                name : {
                    required : true
                }, 
                masterdistributer:{
                  required: true
                },
                company_name : {
                    required : true
                },
                email :{
                    required: true,
                    email : true
                },
                mobile :{
                    required: true,
                    minlength:10,
                    maxlength:10
                },
                state:{
                  required:true
                },
                city:{
                  required:true
                }                              
            },
            messages:{
                username :"Please enter username",
                password : "Please enter password",
                name : "Please enter your name",
                masterdistributer : "Please select master distributor",
                company_name : "Please enter your company name",
                email :"Please enter valid email id" ,
                state :"Please select state",
                city :"Please select city"                
            }
        });
    });
</script>
<script type="text/javascript">
   $(".toggle-password").click(function() 
   {
      // alert('sd');
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      var x = document.getElementById("password");
      if (x.type === "password") 
      {
         x.type = "text";
      } 
      else 
      {
         x.type = "password";
      }
   });
</script>

