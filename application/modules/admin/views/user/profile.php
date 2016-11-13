<?php $this->load->library('Dropdown');
$this->load->helper('form');
$this->load->library('Radio');?>
<form id="f_order" action="<?php echo base_url().'admin/user/profile'; ?>" method="POST" enctype="multipart/form-data">
<div class="row-fluid">
<div class="span12">
  <div class="row-fluid">
  <div class="span6">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="i-file-plus-2"></i></div>
         <h4>Edit profile</h4>
         <a href="#" class="minimize"></a>
      </div>
      <div class="widget-content">
      <?php
        if(!empty($error)){
            echo '<div class="alert"> <button class="close" data-dismiss="alert">×</button> <strong><i class="icon24 i-warning"></i> Warning!</strong> '.$error.' </div>';
        }
      ?>
        <div class="control-group">
          <div class="controls controls-row">
            <input placeholder="Fullname" class="span12" type="text" name="user_fullname" id="user_fullname" value="<?php echo empty($info['user_fullname'])?"":$info['user_fullname'] ?>">
            <?php echo form_error('user_fullname','<div class="red">','</div>'); ?>
          </div>
        </div>

        <div class="control-group">
          <div class="controls controls-row">
            <input placeholder="Email" class="span12" type="text" name="user_email" id="user_email" value="<?php echo empty($info['user_email'])?"":$info['user_email'] ?>">
            <?php echo form_error('user_email','<div class="red">','</div>'); ?>
          </div>
        </div>

        <div class="control-group">
          <div class="controls controls-row">
          <div class="row-fluid">
          <div class="span6">
            <div class="control-group">
                <div class="controls controls-row">
                  <input type="file" name="user_avatar" class="span12">
                </div>
            </div>

              <div class="control-group">
                <div class="controls controls-row">
                    <?php
                      $gender_data=array(
                        "0"=>array("id"=>"1","name"=>"Male"),
                        "1"=>array("id"=>"0","name"=>"Female"),
                      );
                      echo $this->radio->radio($gender_data,"name","id",$info['user_gender'],"user_gender");
                    ?>
                </div>
            </div>

          </div>
          <div class="span6">
              <img src="<?php
                if(empty($info['user_avatar'])){
                  echo base_url().'uploads/avatar/thumb_noavatar.png'; 
                }else{
                  echo base_url().'uploads/avatar/'.$info['user_avatar']; 
                }
              ?>" style="width:120px; height:120px; padding:3px; border:1px solid #ccc;"/>
          </div>
          </div><!--ROW FLUID-->
          </div>
        </div>

        

        <div class="form-actions">
            <button type="submit" name="save" value="save" class="btn">Save changes</button>
            <a href="<?php echo base_url().'admin/dashboard/index'; ?>" type="button" class="btn">Cancel</a>
        </div>

      </div>
  </div>
</div>
</div><!--span12-->
</div><!--row-fluid-->
</form>