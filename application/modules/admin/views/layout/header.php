<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>News management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/layout/header';?>" enctype="multipart/form-data">
                    
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
                    <div>
                        <label class="control-label" for="normal"></label>
                        <div class="controls controls-row">
                            <img src="
                            <?php
                                if(empty($info['logo'])){
                                    echo base_url().'uploads/logo/nologo.png';
                                }else{
                                    echo base_url().'uploads/logo/'.$info['logo']; 
                                }?>"/>
                        </div>
                    </div><br />
                    <label class="control-label" for="normal">Change logo <span style="font-size: 10px; font-weight: lighter; color: red;">(230x26)</span></label>
                    <div class="controls controls-row">
                      <div class="uploader">
                          <input type="file" name="logo" />
                          <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                          <span class="action" style="-webkit-user-select: none;">Choose File</span></div>
                    </div>
                  </div>
                    
                    
                  <div class="control-group">
                    <div>
                        <label class="control-label" for="normal"></label>
                        <div class="controls controls-row">
                            <div style="padding: 18px 60px 0;background: #e17329;width:250px; height:90px;">
                                <p style="font-size: 12px;font-weight: normal;text-transform: uppercase;color: #fff;padding-bottom: 19px;">
                                <?php
                                    if(empty($info['header_info'])){
                                        echo 'Please enter some text';
                                    }else{
                                        echo $info['header_info'];
                                    }
                                ?>
                                </p>
                            </div>
                        </div>
                    </div><br />
                    <label class="control-label" for="normal">Change info:</label>
                    <div class="controls controls-row">
                      <textarea name="info_header" style="padding: 18px 60px 0;background: #e17329;width:250px; height:90px;">
                        <?php
                            if(empty($info['header_info'])){
                                echo 'Please enter some text';
                            }else{
                                echo $info['header_info'];
                            }
                        ?>
                      </textarea>
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" value="save" name="add" class="btn btn-primary">Save changes</button>
                  </div>
                </form>

              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('info_header',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:90,
            width:250,
            toolbar : [['Bold','Italic','Underline']],
            });
 </script>