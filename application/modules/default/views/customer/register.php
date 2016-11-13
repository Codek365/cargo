<form style="width: 550px;" action="<?php echo base_url().'customer/register'?>" method="post" enctype="multipart/form-data">
<fieldset>
    <?php
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
        if($this->session->flashdata('notify')){
            echo '<p class="result_msg" style="color:green">'.$this->session->flashdata('notify').'</p>';
        }
    ?>
    <br />
    <span class="form_label">Username:</span>
    <span class="form_item">
        <input type="text" name="username" <?php if(!empty($info["username"])) echo 'value="'.$info["username"].'"';?> class="textbox"/>
    </span><br />
    
    <span class="form_label">Password:</span>
    <span class="form_item">
        <input type="password" name="password" <?php if(!empty($info["password"])) echo 'value="'.$info["password"].'"';?> class="textbox"/>
    </span><br />
    
    <span class="form_label">Re-password:</span>
    <span class="form_item">
        <input type="password" name="repassword" <?php if(!empty($info["repassword"])) echo 'value="'.$info["repassword"].'"';?> class="textbox"/>
    </span><br />
    
    <span class="form_label">Email:</span>
    <span class="form_item">
        <input type="text" name="email" <?php if(!empty($info["email"])) echo 'value="'.$info["email"].'"';?> class="textbox"/>
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
        <input type="file" name="avatar"/>
    </span><br />
    
    <span class="form_label"></span>
    <span class="form_item">
        <input type="submit" class="btn " name="register" value="Register"/>
    </span><br />
</fieldset>
</form>