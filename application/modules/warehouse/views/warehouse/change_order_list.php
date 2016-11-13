<div class="row-fluid">
    <div class="span6">
      <div class="btn-group">
          <a href="<?php echo base_url().'/admin/warehouse/shipment_index' ?>" class="btn btn-info btn-large">
          <i class="icon20 i-arrow-left-5"></i>  Shipment List</a>
      </div>
    </div>
  </div>
<div class="row-fluid">
<!--===========================================================STORE IN=====================================================-->
<div class="span6">

   <div class="widget">

      <div class="widget-title">

         <div class="icon"><i class="icon20 i-table"></i></div>

         <h4>STORE IN - LIST</h4>

         <!--h4><a id="copy" href="#">COPY</a></h4-->

         <h4 id="wait"></h4>

         <a href="#" class="minimize"></a> 

      </div>

      <!-- End .widget-title --> 

      <div class="widget-content">

         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">

         

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">

               <thead>

                  <tr role="row">
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">NO</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">TRACKING ID</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">BOX</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">SHIPMENT TYPE</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">ACTIONS</th>

                  </tr>

               </thead>

               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
               <?php if(!empty($store_in_orders)){ ?>
               <?php $no=1; ?>
               <?php foreach($store_in_orders as $store_in_order){ ?>
               <tr class="gradeA odd" id="29">
                              <td class="center"><?php echo $no; ?></td>
                             <td class="left">
                                <?php
                                  echo $trackingcode['tracking_code_prefix'].$store_in_order['order_id']; 
                                ?></td>
                              <td class="center"><?php echo $store_in_order['order_box']; ?></td>
                             <td class="center">
                                <?php
                                    foreach($shipment_type as $value){
                                        if($store_in_order['type_ship_id']==$value['type_ship_id']){
                                            echo $value['type_ship_name'];
                                        }
                                    }
                                ?>
                             </td>

                             <td class="center">
                                <a data-original-title="Change to store out list" class="tip"  href="<?php echo base_url().'admin/warehouse_order/chageToStoreOut?order_id='.$store_in_order['order_id'].'&shipment_id='.$shipment_id.'&page='.$store_in_orders_page; ?>"><i class="icon20 i-arrow-right-4"></i></a>
                             </td>
                </tr>
                <?php $no+=1; } ?>
                <?php }else{ ?>
                    <tr><td colspan="4" class="center red">No Item in this page</td></tr>
                  <?php } ?>
               </tbody>

            </table>

         </div>

      </div>

      <!-- End .widget-content --> 
      <div class="row-fluid">
         <?php
                $this->load->library('pagination');
                $config['uri_segment'] = 5;
                $config['num_links'] = 8;
                $config['use_page_numbers'] = TRUE;
                $config['base_url'] = base_url().'admin/warehouse_order/addOrderToShipment/'.$shipment_id;
                $config['total_rows'] =$numStore_in_orders;
                $config['per_page'] = $per_page;
                $config['full_tag_open'] = '<ul style="border:none; margin-right:15px;">';
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
   </div>

   <!-- End .widget --> 

</div>
<!--===================================================###STORE IN###==================================================-->
<!--======================================================STORE OUT===========================================-->
    <div class="span6">

   <div class="widget">

      <div class="widget-title">

         <div class="icon"><i class="icon20 i-table"></i></div>

         <h4>STORE OUT - LIST</h4>

         <!--h4><a id="copy" href="#">COPY</a></h4-->

         <h4 id="wait"></h4>

         <a href="#" class="minimize"></a> 

      </div>

      <!-- End .widget-title --> 

      <div class="widget-content">

         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid" style="max-height:500px; overflow:auto">

         

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">

               <thead>

                  <tr role="row">
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">ACTIONS</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">NO.</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">TRACKING ID</th>

                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">SHIPMENT TYPE</th>

                     <!--th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">LBS</th-->

                  </tr>

               </thead>

               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">

               <?php if(!empty($store_out_orders)){ ?>
               <?php $no=1; ?>
               <?php foreach($store_out_orders as $store_out_order){ ?>
               <tr class="gradeA odd" id="29">

                          <td class="center">
                            <a data-original-title="Change to store in list" class="tip"  href="<?php echo base_url().'admin/warehouse_order/chageToStoreIn?order_id='.$store_out_order['order_id'].'&shipment_id='.$shipment_id.'&page='.$store_in_orders_page; ?>"><i class="icon20  i-arrow-left-3"></i></a>
                         </td>
                         <td class="center"><?php echo $no; ?></td>
                         <td class="left">
                         <?php
                         if($store_out_order['order_box'] <=1){
                            echo $trackingcode['tracking_code_prefix'].$store_out_order['order_id'];
                         }else{
                            echo $trackingcode['tracking_code_prefix'].$store_out_order['order_id']." (Box 1)";
                          }?>
                          </td>
                         <td class="center">
                            <?php
                                    foreach($shipment_type as $value){
                                        if($store_out_order['type_ship_id']==$value['type_ship_id']){
                                            echo $value['type_ship_name'];
                                        }
                                    }
                            ?>
                         </td>

                </tr>
                <?php
                    if($store_out_order['order_box'] > 1){
                        for($i=2;$i <= $store_out_order['order_box'];$i++){ ?>
                          <?php $no+=1; ?>
                          <tr class="gradeA odd" id="29">
                              <td></td>
                              <td class="center"><?php echo $no; ?></td>
                              <td><?php echo $trackingcode['tracking_code_prefix'].$store_out_order['order_id']." (Box ".$i.")" ?></td>
                              <td class="center">
                                  <?php
                                    foreach($shipment_type as $value){
                                        if($store_out_order['type_ship_id']==$value['type_ship_id']){
                                            echo $value['type_ship_name'];
                                        }
                                    }
                                ?>
                              </td>
                          </tr>
                  <?php
                        }
                    }
                ?>
                <?php $no+=1; }?>
                <?php }else{ ?>
                  <tr><td colspan="4" class="center red">No Item</td></tr>
                <?php } ?>
               </tbody>

            </table>

         </div>

      </div>

      <!-- End .widget-content --> 

   </div>

   <!-- End .widget --> 

</div>
<!--===================================================###STORE OUT###========================================-->
</div>