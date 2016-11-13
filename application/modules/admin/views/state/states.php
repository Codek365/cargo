<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-stack-checkmark"></i></div>
                <h4><a href="<?php echo $link;?>">ADD NEW</a></h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->

                <div class="widget-content">
                 <div class="page-header"> <h4><a href="<?php echo base_url().'admin/state/index';?>">Country</a></h4> </div>
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
         
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">State code</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">State</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">Country</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"></th>
                  </tr>
               </thead>
               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
                  <?php foreach($info as $item) {?>
                  
                  <tr>
                      <td style="text-align:center"><a style="color:gray;text-decoration:none" href="<?php echo $linkdetail."/".$item["state_code"]; ?>"><?php echo $item["state_code"]; ?></a></td>
                      <td style="text-align:center"><a style="color:gray;text-decoration:none" href="<?php echo $linkdetail."/".$item["state_code"]; ?>"><?php echo $item["state"]; ?></a></td>
                      <td style="text-align:center"><?php if($country=='vn') echo "VN"; else echo "USA";?></td>
                      <td style="text-align:center">
                        <div class="btn-group">
                            <a class="btn" href="<?php echo $linkedit.'/'.$item['id'];?>"><i class="icon20 i-pencil-5"></i></a>&nbsp;&nbsp;
                            <a class="btn" accesskey="AL" href="<?php echo $linkdel.'/'.$item['id'];?>" onclick="return xacnhan('Are you sure?');"><i class="icon20 i-remove-2"></i></a>
                        </div>
                      </td>
                  </tr>

                  <?php }?>
                </tbody>
            </table>
<!-- <div class="dataTables_paginate paging_bootstrap pagination">
<ul>
<li class="prev disabled"><a href="#">← Previous</a></li>
<li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
<li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li>
<li class="next"><a href="#">Next → </a></li>
</ul>
</div> -->
<div class="dataTables_paginate paging_bootstrap pagination">
<ul>
        <?php
        echo $this->pagination->create_links();
        ?> 
</ul>
</div>
         </div>

              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div> 
</div>