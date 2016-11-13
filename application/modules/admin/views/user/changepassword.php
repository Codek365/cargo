<div class="row-fluid">
<div class="span6">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>News management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/user/changepassword';?>" enctype="multipart/form-data">
                    
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
                    <label class="control-label" for="normal">Old password:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="old" value="<?php echo !empty($data['old'])?$data['old']:""; ?>" type="password"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">New password:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="new" value="<?php echo !empty($data['new'])?$data['new']:""; ?>" type="password"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Confirm password:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="renew" value="<?php echo !empty($data['renew'])?$data['renew']:""; ?>" type="password"/>
                    </div>
                  </div>
                    
                    <div class="form-actions">
                        <button type="submit" value="edit" name="edit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                  
                  
                  
                  
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>