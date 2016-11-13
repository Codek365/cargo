<div class="row-fluid">
<div class="span5">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-stack-checkmark"></i></div>
                <h4>Country</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content">
                <form id="validate" class="form-horizontal" action="<?php echo base_url();?>admin/state/states" method="post">
                <!--   <div class="control-group">
                    <label class="control-label" for="required">Required field</label>
                    <div class="controls controls-row">
                      <input type="text" id="required" name="required" class="required span8">
                    </div>
                  </div> -->
                    <div class="control-group">
						<label class="control-label" for="select">Country select</label>

						<div class="controls controls-row">
							<select name="country">
								<option selected="selected" value="us">USA</option>
								<option value="vn">VietNam</option>
							</select>
						</div>
						<div class="controls controls-row">
							<button type="submit" name="next" class="btn">Next</button>
						</div>
                  </div>

                  </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>