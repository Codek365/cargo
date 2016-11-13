
<div class="row-fluid">
<div class="1"></div>
<div class="span11">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>Email Management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">
              <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/contact/reply/'.$id;?>" enctype="multipart/form-data">
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
                    <label class="control-label" for="normal">Subject:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="subject" value="<?php echo !empty($data['subject'])?$data['subject']:""; ?>" type="text"/>
                    </div>
                  </div>
                    
                  <div class="control-group">
                    <label class="control-label" for="normal">Message:</label>
                    <div class="controls controls-row">
                      <textarea name="message"><?php echo !empty($data['message'])?$data['message']:""; ?></textarea>
                    </div>
                  </div>
                  
                  <input type="hidden" name="id" value="<?php echo !empty($id)?$id:""; ?>"/>
                  
                  <div class="form-actions">
                    <button type="submit" value="reply" name="reply" class="btn btn-primary">Send Mail</button>
                  </div>
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('message',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            // height:300,
            })
</script>