<div class="row-fluid">
<div class="span6">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-stack-checkmark"></i></div>
                <h4><a href="#">ADD NEW</a></h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->

                <div class="widget-content">
                 <div class="page-header"> <h4><a href="<?php echo $linkback;?>">List State</a></h4> </div>
                 <!-- báo thành công -->
                 <?php if($success!=""){?>
                 <div class="alert alert-success"> 
                 <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong>
                    <?php echo $success;?>
                 </div>
                 <?php } ?>
                 <!--  báo thành công -->
            <form id="validate" class="form-horizontal" action="<?php echo $link;?>" method="post">
                 <div class="control-group">
                 <div class="controls controls-row">
                      <h3>USA Country</h3>
                  </div>
                  <label class="control-label" for="normal">State</label>
                  <div class="controls controls-row">
                    <input type="text" name="state" value="<?php echo set_value('state'); ?>" id="normalField">
                    <?php echo form_error('state','<p style="color:red">', '</p>'); ?>
                  </div>
                  <label class="control-label" for="normal">State Code</label>
                  <div class="controls controls-row">
                    <input type="text" name="statecode" value="<?php echo set_value('statecode'); ?>" id="normalField">
                    <?php echo form_error('statecode','<p style="color:red">', '</p>'); ?>
                  </div>
                  <div class="controls controls-row">
                      <button type="submit" name="add" class="btn">ADD NEW</button>
                  </div>
                  </div>
                </div>
            </form>

              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>