<?php
if($this->session->flashdata('success')!='')
{

?>
  <div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
<?php           
}

if($this->session->flashdata('failed')!='')
{

?>
  <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <span><?php echo $this->session->flashdata('failed'); ?></span>
        </div>
    <?php
  
}
?>