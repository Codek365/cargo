<div class="row-fluid">

<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>Informations Management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/contact/info';?>" enctype="multipart/form-data">
                    
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
                    <div class="row-fluid">
                      <div class="span6">
                        <div class="control-group">
                          <label class="control-label" for="normal">Phone:</label>
                          <div class="controls controls-row">
                            <textarea name="phone" id="phone"><?php echo !empty($data['phone'])?$data['phone']:""; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="span6">
                        <div class="control-group">
                          <label class="control-label" for="normal">Email:</label>
                          <div class="controls controls-row">
                            <textarea name="email" id="email"><?php echo !empty($data['email'])?$data['email']:""; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-fluid">
                      <div class="span12">
                        <div class="control-group">
                          <label class="control-label" for="normal">Address:</label>
                          <div class="controls controls-row">
                            <textarea name="address" id="address"><?php echo !empty($data['address'])?$data['address']:""; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="control-group">
                    <label class="control-label" for="normal">Infomation:</label>
                    <div class="controls controls-row">
                      <textarea name="info" id="info"> <?php echo !empty($data['info'])?$data['info']:""; ?></textarea>
                    </div>
                  </div>
                    
                  <div class="form-actions">
                    <button type="submit" value="addmenu" name="addinfo" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('phone',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:100,
            // width:200,
            toolbar : [['Source','Bold','Italic','Underline','font','Styles','Font','FontSize','TextColor','BGColor']],
            })
    CKEDITOR.replace('email',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:100,
            // width:250,
            toolbar : [['Source','Bold','Italic','Underline','font','Styles','Font','FontSize','TextColor','BGColor']],
            })
    CKEDITOR.replace('address',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:100,
            // width:500,
            toolbar : [['Source','Bold','Italic','Underline','font','Styles','Font','FontSize','TextColor','BGColor']],
            })
    CKEDITOR.replace('info',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:200,
            toolbar : [['Source','Bold','Italic','Underline','font','Styles','Font','FontSize','TextColor','BGColor']],
            })
 </script>