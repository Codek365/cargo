<form action="<?php echo base_url()."customer/forgotpassword"?>" method="post" style="width: 650px; margin: 50px auto;">
            <fieldset>
                 <?php 
                    if(!empty($error)){
                        echo '<ul class="error_msg">';
                        if(is_array($error)){
                            foreach($error as $err){
                                echo '<li>'.$err.'</li>';
                            }
                        }else{
                            echo '<li>'.$error.'<li>';
                        }
                        echo '</ul>';
                    }
                 ?>
                <table>
                    <tr>
                        <td class="login_img"></td>
                        <td>
                            <span class="form_label">
                                Username:
                            </span>
                            <span class="form_item">
                                <input type="text" name="username" <?php if(!empty($info["username"])) echo 'value="'.$info["username"].'"';?> class="textbox" />
                            </span><br />
                            <span class="form_label">
                                Email:
                            </span>
                            <span class="form_item">
                                <input type="text" name="email" <?php if(!empty($info["email"])) echo 'value="'.$info["email"].'"';?> class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span>
                                <input type="submit" name="receivepassword" class="button" value="Receive password" />
                            </span><br />

                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>