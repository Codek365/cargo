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
                  "SelectedValue"=>$data["user_gender"],
                  "Name"=>"gender",
            );
$this->load->library("Myformhelper",$Db_Arr_config);
?>
<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>News management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/user/profile';?>" enctype="multipart/form-data">
                    
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
                            echo '<p class="result_msg">'.$this->session->flashdata('notify').'</p>';
                            echo '</div>';
                        }
                    ?>
                  <div class="control-group">
                    <label class="control-label" for="normal">Fullname:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="fullname" value="<?php echo !empty($data['fullname'])?$data['fullname']:""; ?>" type="text"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Email:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="email" value="<?php echo !empty($data['email'])?$data['email']:""; ?>" type="text"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Image:</label>
                    <div class="controls controls-row">
                        <?php
                            if(empty($data['avatar'])){
                                echo '<img src="'.base_url().'uploads/thumb_noimage.png" />';
                            }else{
                                echo '<img src="'.base_url().'uploads/avatar/thumb_'.$data['avatar'].'" style="padding:3px; border:1px solid #ccc;" />';
                            }
                        ?>
                    </div>
                  </div>
                  
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Change Avatar:</label>
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
                         <?php echo $this->myformhelper->form_radio();?>
                    </div>
                  </div>
                    
                    <div class="form-actions">
                        <button type="submit" value="edit" name="edit" class="btn btn-primary">Save changes</button>
                            <a href="<?php echo base_url().'admin/user/changepassword' ?>">Change password</a>
                    </div>
                  </div>
                  
                  
                  
                  
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>