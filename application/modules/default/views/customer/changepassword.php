<form style="width: 550px;" action="<?php echo base_url().'customer/changepassword'?>" method="post" enctype="multipart/form-data">
<fieldset>
        <?php 
            if(!empty($error)){
                echo '<ul class="error_msg">'.$error.'</ul>';
            }
            if($this->session->flashdata("notify")){
                echo '<p style="color:green" class="notify result_msg">'.$this->session->flashdata("notify").'</p>';
            }
            ?>
            <br />
    <span class="form_label">Old password:</span>
    <span class="form_item">
        <input type="password" name="oldpassword" class="textbox"/>
    </span><br />
    
    <span class="form_label">New password:</span>
    <span class="form_item">
        <input type="password" name="newpassword" class="textbox"/>
    </span><br />
    
    <span class="form_label">Re-password:</span>
    <span class="form_item">
        <input type="password" name="repassword" class="textbox"/>
    </span><br />
    
    <span class="form_label"></span>
    <span class="form_item">
        <input type="submit" name="btnChange" class="button" value="Change Password"/>
    </span><br />
</fieldset>
</form>