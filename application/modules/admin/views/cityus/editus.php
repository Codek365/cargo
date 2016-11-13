<div class="row-fluid">
<div class="span6">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-stack-checkmark"></i></div>
                <h4>EDIT CITY</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->

                <div class="widget-content">
                 <div class="page-header"> <h4><a href="<?php echo $linkback;?>">List City</a></h4> </div>
                 <!-- báo thành công -->
                 <?php if(isset($success) && $success!=""){?>
                 <div class="alert alert-success"> 
                 <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong>
                    <?php echo $success;?>
                 </div>
                 <?php } ?>
                 <!--  báo thành công -->
            <form id="validate" class="form-horizontal" action="<?php echo base_url().'admin/cityus/editus/'.$id;?>" method="post">
                 <div class="control-group">
                 <div class="controls controls-row">
                      <h3>USA City</h3>
                  </div>
                  <label class="control-label" for="normal">State Code</label>
                  <div class="controls controls-row">
                    <select name="state_code">
                    <?php foreach($info1 as $item){
                      if ($info[0]["state_code"]==$item["state_code"]) {
                       echo '<option value="'. $item["state_code"].'" selected>'. $item["state_code"].'</option>';
                      }
                      else{
                      echo '<option value="'. $item["state_code"].'">'. $item["state_code"].'</option>';
                      }
                       }?>
                    </select>
                  </div>
                  <label class="control-label" for="normal">City</label>
                  <div class="controls controls-row">
                    <input type="text" name="city" value="<?php if(isset($info)) echo $info[0]["city"];?>" id="normalField">
                    <?php echo form_error('city','<p style="color:red">', '</p>'); ?>
                  </div>
                  <div class="controls controls-row">
                      <button type="submit" name="add" class="btn">EDIT</button>
                  </div>

                  </div>
                </div>
            </form>

              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>