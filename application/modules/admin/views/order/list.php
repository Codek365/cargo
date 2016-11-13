<!-- Khoa Add More -->
  <style type="text/css">
  .store-1{background: #f2825b; /* Old browsers */
background: -moz-linear-gradient(top,  #f2825b 0%, #e55b2b 50%, #f07146 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f2825b), color-stop(50%,#e55b2b), color-stop(100%,#f07146)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #f2825b 0%,#e55b2b 50%,#f07146 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #f2825b 0%,#e55b2b 50%,#f07146 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #f2825b 0%,#e55b2b 50%,#f07146 100%); /* IE10+ */
background: linear-gradient(to bottom,  #f2825b 0%,#e55b2b 50%,#f07146 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2825b', endColorstr='#f07146',GradientType=0 ); /* IE6-9 */
}
  .store-2{}
  .store-3{}
  .store-4{}
  .store-5{}
  .store-6{}
  .store-7{}
  .store-8{}
  .store-9{}
  
  </style>
<!-- End -->
<?php $this->load->library('Dropdown');?>
<?php $this->load->view('toolbar'); ?>
<form method="POST" action="<?php echo base_url().'admin/order/search'; ?>">
         <input type="text" style="margin:5px; width:250px" placeholder="Find Order by customer's phone" name="customer_phone" />
         <input type="text" style="margin:5px; width:250px" placeholder="Find Order by consignee's phone" name="consignee_phone" />
         <input type="text" style="margin:5px; width:250px" placeholder="Find Order by tracking number" name="tracking" />
         <button class="btn" value="search" name="search" style="padding:6px 10px;"><i class="icon20  i-search-5"></i>SEARCH</button>
        </form>
<div class="row-fluid">
<div class="span12">

   <div class="widget">
      <div class="widget-title b ">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <h4><a id="add" href="#">&nbsp;</a></h4>         
         <!-- <a href="#" class="minimize"></a>  -->
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content noPadding">
        <?php if ($user_E == 1 || $user==1) {?>
         <div class="table-toolbar btn-toolbar">
               <a id="checkall" href="#" class="btn btn-mini select-all"> <i class="icon12 i-checkbox-checked-2"></i> Check All</a> 
               <a id="uncheckall" href="#" class="btn btn-mini deselect-all"><i class="icon12 i-checkbox-unchecked-3"></i> Uncheck All</a> 
               <a id="delete" href="#" class="btn btn-mini btn-danger"><i class="icon12 i-remove"></i> Delete</a>
         </div>
         <?php } ?>
         <table class="table table-bordered checkAll">
            <thead>
               <tr>
                  <th></th> 
                  <th>Tracking ID</th>
                  <th>Departure - Destination</th> 
                  <th class="span1">Total</th> 
                  <th class="span1">LBS</th> 
                  <th class="span1">Box(s)</th> 
                  <th class="span1">Shipment Type</th>
                  <th class="span1">Payment Type</th> 
                  <th>Message</th> 
                  <th class="span4">Status</th>
                  <th>Print</th>
                  <th>Edit</th> 
               </tr>
            </thead>
            <tbody>
            <?php foreach ($info as $value) {?>
               <tr id="<?php echo $value['order_id'] ?>" 
               <?php  if($value['order_status_id'] == NULL ){
                    echo "class='error'";
                 } 
                  if($value['order_status_id'] ==  1 ) {
                    echo "class='store-1'";
                 }
                  if($value['order_status_id'] == 2 ) {
                    echo "class='store-2'";
                 } 
                  if($value['order_status_id'] == 3 ) {
                    echo "class='store-3'";
                 } 
                  if($value['order_status_id'] == 4 ) {
                    echo "class='store-4'";
                 } 
                  if($value['order_status_id'] == 5 ) {
                    echo "class='store-5'";
                 } 
                  if($value['order_status_id'] == 6 ) {
                    echo "class='store-6'";
                 } 
                  if($value['order_status_id'] == 7 ) {
                    echo "class='store-7'";
                 } 
                  if($value['order_status_id'] == 8 ) {
                    echo "class='store-8'";
                 } 
               ?>
               >
                  <td class="center">
                     <div class="checker"><span><input type="checkbox" class="chk_item" class="checkIt"></span></div>
                  </td>
                  <td class="center"><?php echo $this->system->field('track_prefix').$value['order_id']; ?>
                      <br />
                      <span style="font-size:11px;color:#DB605F">
                      <?php
                        foreach ($all_users as $user) {
                            if($user['user_id']==$value['user_id']){
                                echo "Created by ".$user['user_username'];
                            }
                        }
                      ?>
                      </span>
                  </td>
                  <td class="center"><?php
                            foreach($countries_data as $country){
                                if($country['country_code']==$value['customer_country']){
                                    echo $country['country_name'];
                                }
                            }
                            echo '-';
                            foreach($countries_data as $country){
                                if($country['country_code']==$value['consignee_country']){
                                    echo $country['country_name'];
                                }
                            }
                        ?></td>
                  <td class="center"><?php echo $value['order_sum_price']; ?></td>
                  <td class="center "><?php echo $value['order_ibs']; ?></td>
                  <td class="center"><?php echo $value['order_box']; ?></td>
                  <td class="center"><?php echo $value['type_ship_name']; ?></td>
                  <td class="center"><?php echo $value['type_payment_name']; ?></td>
                  <td class="center"><a href="#" class="gap-right10 tip" title="" data-original-title="<?php echo $value['order_message']; ?>"><i class="icon32 i-bubble"></i></a>
                 </td>
                  <td class="center">
                      <?php
                        echo $this->dropdown->dropdown($order_status_data,"order_status_name","order_status_id",$value['order_status_id'],array("class"=>"order_status",'style'=>'width:50px'));;
                      ?></td>
                  <td class="center"><a target="_blank" href="<?php echo base_url().'admin/form/printForm?id='.$value['order_id'].'&form=shiprequest'; ?>"><i class="icon20 i-print-2"></i></a></td>
                  <td><a class="editOrder" title="<?php echo $value['order_id']; ?>"  href="<?php echo base_url().'admin/order/edit?order_id='.$value['order_id']; ?>"><i class="icon20  i-pencil-3"></i></a></td>
               </tr>
            <?php } ?>
            </tbody>           
         </table>         
      </div>
      <!-- End .widget-content --> 
   </div>
   <!-- End .widget --> 
   <div class="row-fluid">
         <?php
                $this->load->library('pagination');
                $config['uri_segment'] = 4;
                $config['num_links'] = 8;
                $config['use_page_numbers'] = TRUE;
                $config['base_url'] = base_url().'admin/order/index';
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
   <div id="dialog" title="Basic dialog" style="display:none;top:30%"></div>
</div>
</div>
<script type="text/javascript">
   //CHECK ALL
           $('#checkall').click(function() {
                $(':checkbox').prop('checked',"checked");
           });
    //UNCHECK ALL
           $('#uncheckall').click(function() {
                $(':checkbox').prop('checked',"");
           });
    //DELETE
            $("#delete").on('click',function(){
            var count_item=0;
            var id_arr=new Array();
            $("input.chk_item").each(function(){
                if($(this).is(":checked")){
                    var id=$(this).parents('tr').attr('id');
                    id_arr.push(id);
                }else{
                    count_item+=1;
                }
            });
            if(count_item==$("input.chk_item").length){
                 $("#dialog").html('<span class="red">Please choose orders to delete!!!</span>');
                  $("#dialog" ).dialog();
            }
            var JsonString = JSON.stringify(id_arr);
            //XU LY AJAX DE XOA
            if(JsonString!=""){
                $.ajax({
                    url:base_url+"admin/order/deleteAjax?id="+JsonString,
                    type:"get",
                    success:function(res){
                        if(res==1){
                          $("#dialog").html('<span class="red">No item to delete!!!</span>');
                          $("#dialog" ).dialog();
                        }
                        else{
                            $("input.chk_item").each(function(){
                                if($(this).is(":checked")){
                                    $(this).parents('tr').fadeOut(500);
                                }
                            });
                        }
                    }
                });
            }
            return false;
        });
        $(".order_status").on("change",function(){
          var status_id=$(this).val();
          var order_id=$(this).parents('tr').attr('id');
          $.ajax({
              url:base_url+"admin/order/updateOrderStatus",
              type:"GET",
              data:{status_id:status_id,order_id:order_id},
              success:function(data){
                if(data==1){
                  $("#dialog").html('<span class="red">Order or status is empty!!!</span>');
                  $("#dialog" ).dialog();
                }else{
                  $("#dialog").html('<span class="green">Updating is successful!!!</span>');
                  $("#dialog" ).dialog();
                }
              }
          });
        });
          var remember="";
          $("input[type=text],textarea").on("focus",function(){
            remember=$(this).attr("placeholder");
            $(this).attr("placeholder","");
         });
        $("input[type=text],textarea").on("focusout",function(){
            $(this).attr("placeholder",remember);
            remember="";
         });
        //======================================BỔ SUNG(10/12/2014)=====================================
          $('a.editOrder').on('click',function(){
              var order_id=$(this).attr('title');
              var flag=0;
              $.ajax({
                url:base_url+"admin/order/checkAddedUser?order_id="+order_id,
                type:"GET",
                success:function(res){
                   if(res==1){
                      return true;
                   }else{
                      $("#dialog").html("<span class='red'>You can't edit this order!!!</span>");
                      $("#dialog" ).dialog();
                      
                      return false;
                   }
                }
              });
          });
        //======================================###BỔ SUNG(10/12/2014)###===============================
</script>