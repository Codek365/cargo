<?php
//Cau hinh radio Gender
$Db_Arr_config=array(
                  "DbArr"=>array(
                              "2"=>array(
                                      "id"=>"0",
                                      "name"=>"Female",
                              ),
                               "1"=>array(
                                      "id"=>"1",
                                      "name"=>"Male",
                              ),
                  ),
                  "TextField"=>"name",
                  "ValueField"=>"id",
                  "SelectedValue"=>$info["gender"],
                  "Name"=>"gender",
            );
$this->load->library("Myformhelper",$Db_Arr_config);
?>
<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>Create User</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/user/add';?>" enctype="multipart/form-data">
                    
                    <label class="control-label" for="normal"></label>
                    <div class="controls controls-row">
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
                    ?>
                    </div>
                    <?php
                        if($this->session->flashdata('notify')){
                            echo '<label class="control-label" for="normal"></label>
                                        <div class="controls controls-row">';
                            echo '<p class="notify result_msg">'.$this->session->flashdata('notify').'</p>';
                            echo '</div>';
                        }
                    ?>
                  <div class="control-group">
                    <label class="control-label" for="normal">Full name:</label>
                    <div class="controls controls-row">
                      <input type="text" name="fullname" <?php if(!empty($info["fullname"])) echo 'value="'.$info["fullname"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">User name:</label>
                    <div class="controls controls-row">
                      <input type="text" name="username" <?php if(!empty($info["username"])) echo 'value="'.$info["username"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Password:</label>
                    <div class="controls controls-row">
                      <input type="password" name="password" <?php if(!empty($info["password"])) echo 'value="'.$info["password"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Re-Password:</label>
                    <div class="controls controls-row">
                       <input type="password" name="re_password" <?php if(!empty($re_password)) echo 'value="'.$re_password.'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Email:</label>
                    <div class="controls controls-row">
                       <input type="text" name="email" <?php if(!empty($info["email"])) echo 'value="'.$info["email"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Avatar:</label>
                    <div class="controls controls-row">
                      <div class="uploader">
                          <input type="file" name="avatar" />
                          <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                          <span class="action" style="-webkit-user-select: none;">Choose File</span></div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                    <label class="control-label" for="normal">Gender:</label>
                    <div class="controls controls-row">
                       <?php echo $this->myformhelper->form_radio()?>
                    </div>
                  </div>
                    
                  <div class="control-group">
                    <label class="control-label" for="normal">Role:</label>
                    <div class="controls controls-row">
                       <?php
                            if(!empty($role)){
                               foreach($role as $item){
                                    if(!empty($role_selected)){
                                        if(in_array($item["id"],$role_selected)){
                                            echo '<input type="checkbox" name="role[]" value="'.$item["id"].'" checked="checked">'.$item["name"].'  ';
                                        }else{
                                            echo '<input type="checkbox" name="role[]" value="'.$item["id"].'">'.$item["name"].'  ';
                                        }
                                    }else{
                                        echo '<input type="checkbox" name="role[]" value="'.$item["id"].'">'.$item["name"].'  ';
                                    }
                               }
                            }
                        ?>
                    </div>
                  </div>
                    
                    <div class="form-actions">
                        <button type="submit" value="btnAdd" name="btnAdd" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>