<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>News management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/news/edit/'.$id;?>" enctype="multipart/form-data">
                    
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
                    <label class="control-label" for="normal">Title:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="title" value="<?php echo !empty($data['title'])?$data['title']:""; ?>" type="text"/>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="normal">Title(en):</label>
                    <div class="controls controls-row">
                      <input class="span12" name="title_en" value="<?php echo !empty($data['title_en'])?$data['title_en']:""; ?>" type="text"/>
                    </div>
                  </div>
                    
                    <div class="control-group">
                    <label class="control-label" for="normal">Sort:</label>
                    <div class="controls controls-row">
                      <input class="span12" name="sort" value="<?php echo !empty($data['sort'])?$data['sort']:""; ?>" type="text" />
                    </div>
                  </div>
                    
                    <div class="control-group">
                    <label class="control-label" for="normal">Summary:</label>
                    <div class="controls controls-row">
                      <textarea id="summary" name="summary"><?php echo !empty($data['summary'])?$data['summary']:""; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Desciption:</label>
                    <div class="controls controls-row">
                      <textarea id="description" name="description"><?php echo !empty($data['description'])?$data['description']:""; ?></textarea>
                    </div>
                  </div>
                    
                  <div class="control-group">
                    <label class="control-label" for="normal">Image:</label>
                    <div class="controls controls-row">
                        <?php
                            if(empty($image)){
                                echo '<img src="'.base_url().'uploads/thumb_noimage.png" />';
                            }else{
                                echo '<img src="'.base_url().'uploads/news_image/thumb_'.$image.'" style="padding:3px; border:1px solid #ccc;" />';
                            }
                        ?>
                    </div>
                  </div>
                    
                  <div class="control-group">
                    <label class="control-label" for="normal">Change image:</label>
                    <div class="controls controls-row">
                      <div class="uploader">
                          <input type="file" name="image" />
                          <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                          <span class="action" style="-webkit-user-select: none;">Choose File</span></div>
                    </div>
                  </div>
                    
                  <div class="control-group">
                    <label class="control-label" for="normal">Page:</label>
                    <div class="controls controls-row">
                      <?php 
                        $this->load->library('Dropdown');
                        echo $this->dropdown->dropdown($page_data,'name','id',$data['page'],array("name"=>"page"));
                      ?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Category:</label>
                    <div class="controls controls-row">
                      <?php 
                        echo $this->dropdown->dropdown($category_data,'name','id',$data['category'],array("name"=>"category"));
                      ?>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="normal">Status:</label>
                    <div class="controls controls-row">
                      <?php
                        $status_data=array(
                            "0"=>array("Id"=>0,"Name"=>"Deactive"),
                            "1"=>array("Id"=>1,"Name"=>"Active")
                        );
                        echo $this->dropdown->dropdown($status_data,'Name','Id',$data['status'],array("name"=>"status"));
                      ?>
                    </div>
                  </div>
                  
                  <input type="hidden" name="pageurl" value="<?php echo !empty($pageurl)?$pageurl:""; ?>"/>
                  
                  <div class="form-actions">
                    <button type="submit" value="addmenu" name="editnews" class="btn btn-primary">Save changes</button>
                  </div>
                </form>

              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('summary',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            // enterMode: CKEDITOR.ENTER_BR,
            height:200,
            toolbar : [['Source','Bold','Italic','Underline','font','format','Strike','Styles','Format','Font','FontSize','TextColor','BGColor','Cut','Copy','Paste','PasteText','PasteFromWord','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']],
            })
    CKEDITOR.replace('description',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            // enterMode: CKEDITOR.ENTER_BR,
            height:400,
    })
 </script>