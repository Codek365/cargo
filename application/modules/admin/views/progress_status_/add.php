<?php $this->load->helper('form'); ?>
<div class="span8">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>Add process</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content">
                <form class="form-horizontal" action="<?php echo base_url().'admin/progress_status/add'; ?>" method="POST">
                  <?php if($this->session->flashdata('success')){ ?>
                      <div class="alert alert-success"> 
                          <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong><?php echo $this->session->flashdata('success'); ?></div>
                    <?php } ?>
                  <div class="control-group">
                    <label class="control-label" for="normal">Process name:</label>
                    <div class="controls controls-row">
                      <input type="text" style="width:250px;" name="order_status_name" value="<?php echo set_value('order_status_name'); ?>" id="normalField"><br />
                      <?php echo form_error('order_status_name','<span class="red">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="normal">Notes:</label>
                    <div class="controls controls-row">
                      <textarea class="span5" id="textarea" name="order_status_notes" rows="4"><?php echo set_value('order_status_notes'); ?></textarea><br />
                      <?php //echo form_error('order_status_notes', '<div class="alert alert-error">', '</div>'); ?>
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" name="save" value="save" class="btn btn-primary">Save changes</button>
                    <a href="<?php echo base_url()."admin/progress_status/index";?>" class="btn">Back</a>
                  </div>
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>