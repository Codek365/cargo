
<div class="row-fluid">
<div class="span1"></div>
  <div class="span8">
      <div class="widget">             
        <div class="widget-content" style="display: block;">
          <hr>  
            <ul class="nav nav-pillspull-left">
              <li ><b>From:</b> <?php echo !empty($info["name"])?$info["name"]:""; ?> < <?php echo !empty($info["email"])?$info["email"]:""; ?> ></li>
              <li ><b>Subject:</b> <?php echo !empty($info["subject"])?$info["subject"]:""; ?></li>
            </ul> 
            <div class="btn-group pull-right">
              <a class="btn" href="<?php echo base_url().'admin/contact/reply/'.$info['id'];?>"><i class="icon20 i-reply"></i>Reply</a>                   
              <a href="<?php echo base_url().'admin/contact/email/'.$info['id'];?>" class="btn btn-danger" title="" data-original-title="Close this email"><i class="icon20 i-close-2"></i>Close</a>
            </div>                  
          <hr>                   
            <div class="control-group">
              <div class="controls controls-row">
                <label class="control-label" for="normal">Message:</label>
                <?php echo !empty($info["message"])?$info["message"]:""; ?> 
              </div>
            </div>                
        </div><!-- End .widget-content -->
      </div> <!-- End .widget -->
  </div>
</div>