<form style="width: 550px;" action="<?php echo base_url().'customer/myaccount'?>" method="post" enctype="multipart/form-data">
<fieldset>
    <?php
            if($this->session->flashdata('notify')){
                echo '<p class="result_msg">'.$this->session->flashdata('notify').'</p>';
            }
            if(!empty($error)){
                echo '<ul class="error_msg">';
                if(is_array($error)){
                    foreach($error as $item){
                        echo '<li>'.$item.'</li>';
                    }
                }else{
                    echo $error;
                }
                echo '</ul>';
            }
    ?>
    <span class="form_label">Username:</span>
    <span class="form_item">
        <span><b><?php if(!empty($info["username"])) echo $info["username"];?></b></span>
    </span><br />
    
     <span class="form_label">Phone:</span>
    <span class="form_item">
        <input type="text" name="phone" <?php if(!empty($info["phone"])) echo 'value="'.$info["phone"].'"';?> class="textbox"/>
    </span><br />
    
     <span class="form_label">Address:</span>
    <span class="form_item">
        <input type="text" name="address" <?php if(!empty($info["address"])) echo 'value="'.$info["address"].'"';?> class="textbox"/>
    </span><br />
    
    <span class="form_label">Fullname:</span>
    <span class="form_item">
        <input type="text" name="fullname" <?php if(!empty($info["fullname"])) echo 'value="'.$info["fullname"].'"';?> class="textbox"/>
    </span><br />
    
    <span class="form_label">Avatar:</span>
    <span class="form_item">
        <img style="border: 1px solid #ccc; padding:3px;" src="<?php if(!empty($info["avatar"])){echo base_url().'uploads/avatar/thumb_'.$info['avatar'];} else {echo base_url().'uploads/avatar/thumb_noavatar.png';}?>"/>
    </span><br />
    
    <span class="form_label">Change Avatar:</span>
    <span class="form_item">
        <input type="file" name="avatar"/>
    </span><br />
    
    <span class="form_label"></span>
    <span class="form_item">
        <input type="submit" class="btn btn-success" name="update" value="Update"/>
    </span><br />
</fieldset>
</form>