<?php
if($this->session->flashdata('success')!='')
{

?>
  <div class="alert alert-success">
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
<?php           
}

if($this->session->flashdata('failed')!='')
{

?>
  <div class="alert alert-danger">
            <span><?php echo $this->session->flashdata('failed'); ?></span>
        </div>
    <?php
  
}
?>