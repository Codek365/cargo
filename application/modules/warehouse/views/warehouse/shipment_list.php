<div class="row-fluid">
<!--===========================================================STORE IN=====================================================-->
<div class="span12">

<?php if($this->session->flashdata('success')){ ?>

          <div class="alert alert-success"> 

              <button type="button" class="close" data-dismiss="alert">×</button>

                  <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong> <?php echo $this->session->flashdata('success'); ?> 

          </div>

<?php } ?>

<?php if($this->session->flashdata('error')){ ?>

      <div class="alert"> 

         <button class="close" data-dismiss="alert">×</button> 

            <strong><i class="icon24 i-warning"></i> Warning!</strong>

            <?php echo $this->session->flashdata('error'); ?>

      </div>

<?php }?>
  <a href="<?php echo base_url().'admin/warehouse/addShipment'; ?>" style="font-size:16px" class="btn right"><i class=" i-stack-plus"></i> Create Shipment</a><br><br>

   <div class="widget">

      <div class="widget-title">

         <div class="icon"><i class="icon20 i-table"></i></div>

         <h4>SHIPMENT - LIST</h4>

         <!--h4><a id="copy" href="#">COPY</a></h4-->
         <a href="#" class="minimize"></a> 
         <h4 class="pull-right" style="margin-right:30px">
            
          </h4>

      </div>

      <!-- End .widget-title --> 

      <div class="widget-content">


         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">        
  
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">

               <thead>

                  <tr role="row">

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">SHIPMENT ID</th>

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">TOTAL ORDERS</th>

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">TOTAL BOX</th>

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">DATE</th>

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">ACTIONS</th>

                  </tr>

               </thead>

               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
               <?php if(!empty($shipments)){ ?>
               <?php foreach($shipments as $shipment){ ?>
               <tr class="gradeA odd" id="29">

                       <td class="center"><?php echo $shipment['shipment_name'] ?></td>

                       <td class="center"><?php echo $shipment['numOrder'] ?></td>

                       <td class="center"><?php echo $shipment['numBox']?$shipment['numBox']:"0" ?></td>
                       <td class="center"><?php echo $shipment['current_date_formated'] ?></td>
                       <td class="center btn-group">
                          <a class="tip btn" title="Add Orders" href="<?php echo base_url().'admin/warehouse_order/addOrderToShipment/'.$shipment['id']; ?>" title="Add more order"><i class="icon20 i-folder-plus-2"></i></a>
                          <a class="tip view-order btn" title="View orders" href="#" accesskey="<?php echo $shipment['id']; ?>"><i class="icon20 i-search-2"></i></a>
                          <a class="tip btn" title="Delete shipment" onClick="return xacnhan('Are you sure?');" href="<?php echo base_url().'admin/warehouse/deleteShipment/'.$shipment['id']; ?>"><i class="icon20  i-close-4"></i></a>
                          
                       </td>
                </tr>
                <?php } ?>
                <?php }else{ ?>
                  <tr>
                    <td colspan="5" class="center">No Shipment</td>
                  </tr>
                <?php }?>
               </tbody>

            </table>
         </div>

      </div>

      <!-- End .widget-content --> 
   </div>

         <div class="row-fluid">
         <?php
                $this->load->library('pagination');
                $config['uri_segment'] = 4;
                $config['num_links'] = 8;
                $config['use_page_numbers'] = TRUE;
                $config['base_url'] = base_url().'admin/warehouse/shipment_index';
                $config['total_rows'] = $total_rows;
                $config['per_page'] = $per_page;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['cur_tag_open'] = '<li><a style="color:black">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['next_link'] = '&gt;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&lt;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                /*khoa addmore*/
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                echo '<div class="span12">';
                echo '<div class="pull-right" >';
                echo '<div class="dataTables_paginate paging_bootstrap pagination">';
                echo $this->pagination->create_links();
                echo '</div>';
                echo '</div>';
                echo '</div>';
            ?>
        </div>
   <!-- End .widget --> 

</div>
</div>
<!--========================================================MODAL==================================================-->
<!-- Modal -->

                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <h3 id="myModalLabel">Orders of shipment</h3>

                  </div>

                  <div class="modal-body">

                    <p id="modal_content">

                    <!--TABLE-->

                      <table class="table">

                         <thead>

                            <tr>

                               <th>TRACKING ID</th>

                               <th>BOX</th>

                               <th>LBS</th>

                            </tr>

                         </thead>

                         <tbody id="listOrders">

                         </tbody>

                      </table>
                   </p>

                  </div>

                  <div class="modal-footer">

                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                    <!--button class="btn btn-primary">Save changes</button-->

                  </div>

                </div>

<!--================================================VIEW ORDER OF SHIPMENT=========================================-->
<div id="dialog" title="Basic dialog" style="display:none"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".view-order").on("click",function(){
        var id=$(this).attr('accesskey');
        $.ajax({
            url:base_url+"admin/warehouse/getOrderByShipmentId",
            type:"POST",
            data:{"order_id":id},
            success:function(data){
                var obj = eval ("(" + data + ")");
                if(obj.orders!=""){
                    str="";
                    $.each(obj.orders,function(key,val){
                        str+="<tr>";
                          str+="<td>"+obj.trackingcode+val.order_id+"</td>";
                          str+="<td>"+val.order_box+"</td>";
                          str+="<td>"+val.order_ibs+"</td>";
                        str+="<tr>";
                    });
                    $("#listOrders").html(str);
                    $("#myModal").modal('show');
                }else{
                    alert("No order");
                }
            }
        });
        return false;
    });
  });
</script>
<!--=============================================###VIEW ORDER OF SHIPMENT###======================================-->