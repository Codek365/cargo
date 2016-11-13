<?php $this->load->library('Dropdown');
$this->load->helper('form');?>
<?php $this->load->view('toolbar'); ?>
<form id="f_order" action="<?php echo base_url().'admin/order/edit?order_id='.$order_id; ?>" method="POST">
<div class="row-fluid">
<div class="span12">
 <!-- Tool bar -->

     
<!-- End tool bar -->
<?php if($this->session->flashdata('success')){ ?>
          <div class="alert alert-success"> 
              <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong> The order has been updated successfully
          </div>
<?php } ?>
<?php if($this->session->flashdata('error')){ ?>
      <div class="alert"> 
         <button class="close" data-dismiss="alert">×</button> 
            <strong><i class="icon24 i-warning"></i> Warning!</strong>
            <?php echo $this->session->flashdata('error'); ?>
      </div>
<?php }?>
<?php if(!empty($error)){?>
  <div class="alert"> 
         <button class="close" data-dismiss="alert">×</button> 
            <strong><i class="icon24 i-warning"></i> Warning!</strong>
            <?php echo $error; ?>
  </div>
<?php } ?>
<div class="btn-group pull-right">
<!--<?php if($this->session->flashdata('order_id')){
        echo '<a href="'.base_url().'admin/form/printForm?id='.$this->session->flashdata('order_id').'&form=shiprequest'.'" class="btn" target="_blank" title="Print order"><i class="icon20 i-print-2"></i> Print order</a>';
} ?>-->
<?php if($this->session->flashdata('customer_id')){
        echo '<a href="'.base_url().'admin/form/printMemberShipForm?customer_id='.$this->session->flashdata('customer_id').'" class="btn" target="_blank" title="Print membership form"><i class="icon20 i-print-2"></i> Print membership</a>';
        echo '<a href="'.base_url().'admin/customer/view/'.$this->session->flashdata('customer_id').'" class="btn" target="_blank" title="View customer"><i class="icon20  i-search-4"></i> View customer</a>';
} ?>
   <!--input type="submit" name="save" value="Save change" class="btn"/-->
   <button class="btn" type="submit" name="save" value="Save change"><i class="icon20 i-checkmark-circle"></i> Save change</button>
   <a href="<?php echo base_url().'admin/order/index';?>" class="btn"><i class="icon20 i-close-4"></i> Cancel</a>
</div>
</div>
</div>

<div class="row-fluid">
<div class="span6">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="i-file-plus-2"></i></div>
         <h4>Create new order</h4>
         <a href="#" class="minimize"></a>
         <span class="pull-right" style="margin:5px">
            <a href="<?php echo base_url().'admin/order/add'; ?>" style="display:none" id="preview_membership" title="Preview membership form" class="btn"><i class="icon15 i-print-2"></i>Membership</a>
            <a href="<?php echo base_url().'admin/order/add'; ?>" id="preview_order" title="Preview order form" class="btn hidden"><i class="icon15 i-print-2"></i> Order</a>
         </span>
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content noPadding">
         <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#sender" data-toggle="tab">Sender</a></li>
            <li class=""><a href="#consignee" data-toggle="tab">Consignee</a></li>
            <li class=""><a href="#order2" data-toggle="tab">Order</a></li>
            <li class=""><a href="#member" data-toggle="tab">Membership</a></li>
            <li class=""><a href="#Messages" data-toggle="tab">Messages</a></li>
         </ul>
         <div class="tab-content">
            <!-- TAB SENDER-->
            <div class="tab-pane active fade in" id="sender">

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Fullname" maxlength="50" class="span12" type="text" name="customer_name" id="customer_name" value="<?php echo empty($info['customer_name'])?"":$info['customer_name'] ?>">
                <?php echo form_error('customer_name', '<div class="red">','</div>'); ?>
              </div>
            </div>

             <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Phone number" onkeypress="return isNumberKey(event)" class="span12" type="text" name="customer_phone" id="customer_phone" value="<?php echo empty($info['customer_phone'])?"":$info['customer_phone'] ?>">
                <?php echo form_error('customer_phone','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Email" maxlength="70" class="span12" type="text" name="customer_email" id="customer_email" value="<?php echo empty($info['customer_email'])?"":$info['customer_email'] ?>">
                <?php echo form_error('customer_email','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Address 1" maxlength="150" class="span12" type="text" name="customer_address" id="customer_address" value="<?php echo empty($info['customer_address'])?"":$info['customer_address'] ?>">
                <?php echo form_error('customer_address','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Address 2" maxlength="150" class="span12" type="text" name="customer_address2" id="customer_address2" value="<?php echo empty($info['customer_address2'])?"":$info['customer_address2'] ?>">
                <?php echo form_error('customer_address2','<div class="red">','</div>'); ?>
              </div>
            </div>


        <div class="row-fluid">
            <div class="span6">
                  <input placeholder="Zipcode" maxlength="15" onkeypress="return isNumberKey(event)" class="span12" type="text" name="customer_zipcode" id="customer_zipcode" value="<?php echo empty($info['customer_zipcode'])?"":$info['customer_zipcode'] ?>">
                  <?php echo form_error('customer_zipcode','<div class="red">','</div>'); ?>
            </div>
            <div class="span6">
                <?php
                    //$countries_data[]=array("country_code"=>"","country_name"=>"Please select country");
                    if(empty($info['customer_country'])){
                        //$countries_data[]=array("country_code"=>"","country_name"=>"Please select country");
                        $info['customer_country']='';
                    }
                    echo $this->dropdown->dropdown($countries_data,"country_name","country_code",$info['customer_country'],array("name"=>"customer_country","id"=>"customer_country"));
                    echo form_error('customer_country','<div class="red">','</div>');
                ?>
            </div>
        </div>

        <div class="row-fluid">
                <div class="span6">
                <?php
                    if(empty($info['customer_state'])){
                        $customer_states_data[]=array("state_code"=>"","state"=>"Please select state");
                        $info['customer_state']='';
                    }
                    echo $this->dropdown->dropdown($customer_states_data,"state","state_code",$info['customer_state'],array("name"=>"customer_state","id"=>"customer_state"));
                    echo form_error('customer_state','<div class="red">','</div>');
                ?>
                </div>
                <div class="span6">
                <?php
                    if(empty($info['customer_city'])){
                        $customer_cities_data[]=array("id"=>"","city"=>"Please select city");
                        $info['customer_city']='';
                    }
                    echo $this->dropdown->dropdown($customer_cities_data,"city","id",$info['customer_city'],array("name"=>"customer_city","id"=>"customer_city"));
                    echo form_error('customer_city','<div class="red">','</div>');
                ?>
                </div>
        </div>

            </div>
            <!--###TAB SENDER###-->
            <!-- TAB CONSIGNEE-->
            <div class="tab-pane fade in" id="consignee">
               <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Fullname" maxlength="50" class="span12" type="text" name="consignee_name" id="consignee_name" value="<?php echo empty($info['consignee_name'])?"":$info['consignee_name'] ?>">
                <?php echo form_error('consignee_name','<div class="red">','</div>'); ?>
              </div>
            </div>

             <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Phone number" onkeypress="return isNumberKey(event)" class="span12" type="text" name="consignee_phone" id="consignee_phone" value="<?php echo empty($info['consignee_phone'])?"":$info['consignee_phone'] ?>">
                <?php echo form_error('consignee_phone','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Email" maxlength="70" class="span12" type="text" name="consignee_email" id="consignee_email" value="<?php echo empty($info['consignee_email'])?"":$info['consignee_email'] ?>">
                <?php echo form_error('consignee_email','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Address 1" maxlength="150" class="span12" type="text" name="consignee_address" id="consignee_address" value="<?php echo empty($info['consignee_address'])?"":$info['consignee_address'] ?>">
                <?php echo form_error('consignee_address','<div class="red">','</div>'); ?>
              </div>
            </div>

            <div class="control-group">
              <div class="controls controls-row">
                <input placeholder="Address 2" maxlength="150" class="span12" type="text" name="consignee_address2" id="consignee_address2" value="<?php echo empty($info['consignee_address2'])?"":$info['consignee_address2'] ?>">
                <?php echo form_error('consignee_address2','<div class="red">','</div>'); ?>
              </div>
            </div>

          <div class="row-fluid">
                <div class="span6">
                  <input placeholder="Zipcode" class="span12" type="text" name="consignee_zipcode" onkeypress="return isNumberKey(event)" id="consignee_zipcode" value="<?php echo empty($info['consignee_zipcode'])?"":$info['consignee_zipcode'] ?>">
                  <?php echo form_error('consignee_zipcode','<div class="red">','</div>'); ?>
                </div>
                <div class="span6">
                <?php
                    if(empty($info['consignee_country'])){
                        $countries_data[]=array("country_code"=>"","country_name"=>"Please select country");
                        $info['consignee_country']='';
                    }
                    echo $this->dropdown->dropdown($countries_data,"country_name","country_code",$info['consignee_country'],array("name"=>"consignee_country","id"=>"consignee_country"));
                    echo form_error('consignee_country','<div class="red">','</div>');
                ?>
                </div>
          </div>

          <div class="row-fluid">
              <div class="span6">
                <?php
                    if(empty($info['consignee_state'])){
                        $consignee_states_data[]=array("state_code"=>"","state"=>"Please select state");
                        $info['consignee_state']='';
                    }
                    echo $this->dropdown->dropdown($consignee_states_data,"state","state_code",$info['consignee_state'],array("name"=>"consignee_state","id"=>"consignee_state"));
                    echo form_error('consignee_state','<div class="red">','</div>');
                ?>
              </div>
              <div class="span6">
              <?php
                  if(empty($info['consignee_city'])){
                        $consignee_cities_data[]=array("id"=>"","city"=>"Please select city");
                        $info['consignee_city']='';
                    }
                  echo $this->dropdown->dropdown($consignee_cities_data,"city","id",$info['consignee_city'],array("name"=>"consignee_city","id"=>"consignee_city"));
                  echo form_error('consignee_city','<div class="red">','</div>');
              ?>
              </div>
          </div>

            </div>
            <!--###TAB CONSIGNEE###-->
            <!-- TAB ORDER-->
            <div class="tab-pane fade in" id="order2">
            <div class="row-fluid">
                <div class="span6">
                  <?php
                     //array_unshift($type_shipment_data,array("type_ship_id"=>"","type_ship_name"=>"Select shipment method"));
                     if(empty($info['type_ship_id'])){$info['type_ship_id']="";}
                     echo $this->dropdown->dropdown($type_shipment_data,"type_ship_name","type_ship_id",$info['type_ship_id'],array("name"=>"type_ship_id","id"=>"type_ship_id"));
                     echo form_error('type_ship_id','<div class="red">','</div>');
                  ?>
                </div>
                <div class="span6"> 
                 <?php
                     //array_unshift($type_payment_data,array("type_payment_id"=>"","type_payment_name"=>"Select payment method"));
                     if(empty($info['type_payment_id'])){$info['type_payment_id']="";}
                     echo $this->dropdown->dropdown($type_payment_data,"type_payment_name","type_payment_id",$info['type_payment_id'],array("name"=>"type_payment_id","id"=>"type_payment_id"));
                     echo form_error('type_payment_id','<div class="red">','</div>');
                  ?>
                </div>
            </div>
            <div class="row-fluid">
              <div class="span6">   
                     <?php
                       //array_unshift($type_delivery_data,array("type_delivery_id"=>"","type_delivery_name"=>"Select delivery method"));
                       if(empty($info['type_delivery_id'])){$info['type_delivery_id']="";}
                       echo $this->dropdown->dropdown($type_delivery_data,"type_delivery_name","type_delivery_id",$info['type_delivery_id'],array("name"=>"type_delivery_id","id"=>"type_delivery_id"));
                       echo form_error('type_delivery_id','<div class="red">','</div>');
                    ?>
              </div>
              <!--div class="span6">
                    <input placeholder="Estimate completed date" class="span12" type="text" readonly="true" name="order_end_date" id="order_end_date" value="<?php echo empty($info['order_end_date'])?"":$info['order_end_date'] ?>">
                   <input type="hidden" id="timezone" name="timezone" value="">
                   <?php //echo form_error('order_end_date','<div class="red">','</div>'); ?>
              </div-->
              <div class="span6">
                  <div class="span6">
                      <input placeholder="Shipment rate" maxlength="10" class="span12" type="text" name="order_shipment_rate" id="order_shipment_rate" value="<?php echo empty($info['order_shipment_rate'])?"":$info['order_shipment_rate'] ?>">
                  </div>
                  <div class="span6">
                    <input placeholder="Declared value" maxlength="15" class="span12" type="text" name="order_declared_value" id="order_declared_value" value="<?php echo empty($info['order_declared_value'])?"":$info['order_declared_value'] ?>">
                  </div>
              </div>
            </div>

              <!--  <div class="control-group">
                 <div class="controls controls-row">
                   <?php
                     //array_unshift($unit_data,array("unit_id"=>"","unit_name"=>"Select unit"));
                     //if(empty($info['unit_id'])){$info['unit_id']="";}
                     //echo $this->dropdown->dropdown($unit_data,"unit_name","unit_id",$info['unit_id'],array("name"=>"unit_id","id"=>"unit_id"));
                     //echo form_error('unit_id','<div class="red">','</div>');
                  ?>
                 </div>
               </div>-->
              <div class="row-fluid">
                <div class="span3"> 
                  <input placeholder="Box(s)" maxlength="3" class="span12" type="text" name="order_box" id="order_box" onkeypress="return isNumberKey(event)" value="<?php echo empty($info['order_box'])?"":$info['order_box'] ?>">
                  <?php echo form_error('order_box','<div class="red span10">','</div>'); ?>
                </div>
                <div class="span3">
                  <input placeholder="LBS" class="span12" type="text" name="order_ibs" id="order_ibs" value="<?php echo empty($info['order_ibs'])?"":$info['order_ibs'] ?>">
                  <?php echo form_error('order_ibs','<div class="red span10">','</div>'); ?>
                </div>                
                <div class="span6">
                  <input placeholder="Packing fee" class="span12" type="text" id="order_packing_fee" name="order_packing_fee" value="<?php echo empty($info['order_packing_fee'])?"":$info['order_packing_fee'] ?>">
                   <?php echo form_error('order_packing_fee','<div class="red">','</div>'); ?>
                </div>   
              </div> 
              <!-- =================================     -->
              <div class="row-fluid">
                <div class="span6"> 
                 <input placeholder="Shipment charge" class="span12" type="text" id="order_ship_charge" name="order_ship_charge" value="<?php echo empty($info['order_ship_charge'])?"":$info['order_ship_charge'] ?>">
                   <?php echo form_error('order_ship_charge','<div class="red">','</div>'); ?>
                </div>
                <div class="span6">
                  <input placeholder="Insurance fee" class="span12" type="text" id="order_insurance_fee" name="order_insurance_fee" value="<?php echo empty($info['order_insurance_fee'])?"":$info['order_insurance_fee'] ?>">
                   <?php echo form_error('order_insurance_fee','<div class="red">','</div>'); ?> 
                </div>
              </div>              
              <div class="row-fluid">
                <div class="span6">
                  <input placeholder="Other charge" class="span12" type="text" id="other_charge" name="other_charge" value="<?php echo empty($info['other_charge'])?"":$info['other_charge'] ?>">
                   <?php echo form_error('other_charge','<div class="red">','</div>'); ?>
                </div>
                <div class="span6"> 
                  <input placeholder="Total"  class="span12" type="text" readonly="true" id="order_sum_price" name="order_sum_price" value="<?php echo empty($info['order_sum_price'])?"":$info['order_sum_price'] ?>" style="width:100%">
                   <?php echo form_error('order_sum_price','<br><div class="red">','</div>');?>
                </div>
              </div>                  

            </div>
            <!--###TAB ORDER###-->
            <!-- TAB ORDER-->
               <div class="tab-pane fade in" id="member">
               <div class="control-group" id="customer_remark">
                 <div class="controls controls-row">
                   <input placeholder="Remark" name="customer_remark" id="txt_customer_remark" maxlength="255" class="span12" value="<?php echo empty($info['customer_remark'])?"":$info['customer_remark'] ?>" type="text">
                   <?php echo form_error('customer_remark','<div class="red">','</div>');?>
                 </div>
               </div>

               <div class="control-group" id="customer_passcode">
                 <div class="controls controls-row">
                   <input placeholder="Passcode" maxlength="70" id="txt_customer_passcode" name="customer_passcode" class="span12" value="<?php echo empty($info['customer_passcode'])?"":$info['customer_passcode'] ?>" type="text">
                   <?php echo form_error('customer_passcode','<div class="red">','</div>');?>
                 </div>
               </div>

               <div class="control-group">
                 <div class="controls controls-row">
                 <?php
                      $customer_type_data=array(
                          "0"=>array("customer_type_id"=>"2","customer_type_name"=>"Membership register?"),
                          "1"=>array("customer_type_id"=>"1","customer_type_name"=>"Yes"),
                          "2"=>array("customer_type_id"=>"2","customer_type_name"=>"No")
                        );
                     if(empty($info['customer_type'])){$info['customer_type']="";}
                     echo $this->dropdown->dropdown($customer_type_data,"customer_type_name","customer_type_id",$info['customer_type'],array("name"=>"customer_type","id"=>"customer_type"));
                     echo form_error('unit_id','<div class="red">','</div>');
                  ?>
                   <!--select class="select2-container select2" name="customer_type" id="customer_type">
                     <option value="2">Register customer?</option>
                     <option value="1">Yes</option>
                     <option value="2">No</option>
                   </select-->
                 </div>
               </div>
         </div>
            <!--###TAB ORDER###-->
            <!--###TAB Messages###-->
            <div class="tab-pane fade in" id="Messages">
               <textarea placeholder="Message" id="txt_message" class="span12" maxlength="255" name="order_message" rows="4"><?php echo empty($info['order_message'])?"":$info['order_message'] ?></textarea>
              <?php echo form_error('order_message','<div class="red">','</div>');?>
            </div>
            <?php
              if(!empty($order_id)){
                  echo '<input type="hidden" name="order_id" id="order_id" value="'.$order_id.'">';
              }
              if(!empty($info['customer_id'])){
                echo '<input type="hidden" name="customer_id" id="customer_id" value="'.$info['customer_id'].'">'; 
              }
              if(!empty($info['consignee_id'])){
                echo '<input type="hidden" name="consignee_id" id="consignee_id" value="'.$info['consignee_id'].'">';  
              }
            ?>
            <!-- TAB Messages-->
         </div>
      </div>
      <!-- End .widget-content --> 
   </div>
   <!-- End .widget --> 
   </div>
</form>
   <div class="span6">
    
   <div class="widget">
   <div class="widget-title">
      <div class="icon"><i class=" i-file"></i></div>
      <h4>Description</h4>
      <a href="#" class="minimize"></a> 
   </div>
   <div class="widget-content">
      <!--DESCRIPTION-->
   <form id="f_order_description" action="<?php echo base_url().'admin/order/addDescription'; ?>" method="POST">
         <div class="control-group">
           <div class="controls controls-row">
             <input placeholder="Quantity" id="order_detail_quantity" onkeypress="return isNumberKey(event)" class="span12" type="text" name="order_detail_quantity" id="order_detail_quantity" value="<?php echo empty($order_detail_quantity)?"":$order_detail_quantity ?>">
             <?php echo form_error('order_detail_quantity','<div class="red">','</div>'); ?>
           </div>
         </div>

         <div class="control-group">
           <div class="controls controls-row">
             <textarea placeholder="Description" id="order_detail_description" maxlength="255" class="span12" rows="4" id="order_detail_description" name="order_detail_description"></textarea>
             <input type="hidden" name="order_detail_id" id="order_detail_id">
             <?php echo form_error('order_detail_description','<div class="red">','</div>'); ?>
           </div>
         </div>
         <div class="btn-group">
            <button id="add_description" class="btn"><i class="i-plus-circle-2"></i> Save Description</button>
            <button id="update_description" class="btn" style="display:none"><i class="i-plus-circle-2"></i> Update Description</button>
            <span id="loading" style="display:none"><img src="<?php echo base_url(); ?>public/admin_layout/images/preloaders/dark/1.gif" class="gap-right15"></span>
         </div>
         <?php
              if(!empty($order_id)){
                  echo '<input type="hidden" name="order_id" id="order_id" value="'.$order_id.'">';
              }
          ?>
   </form>
         <hr>
         <div>
         <table class="table">
         <thead>
            <tr>
               <th>Quantity</th>
               <th>Desciption</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody id="tbody">
         <?php if(!empty($order_detail_list)){ ?>
            <?php foreach ($order_detail_list as $value) {?>
               <tr id="<?php echo $value['order_detail_id'] ?>">
                  <td class="center vcenter"><?php echo $value['order_detail_quantity'] ?></td>
                  <td><?php echo $value['order_detail_description'] ?></td>
                  <td class="center vcenter">
                     <div class="btn-group">
                        <a class="edit_description" href="#" accesskey="<?php echo $value['order_detail_id'] ?>" class="btn tip" title="" data-original-title="Edit description"><i class="icon16 i-pencil" title="Edit"></i></a> 
                        <a class="delete_description" href="#" accesskey="<?php echo $value['order_detail_id'] ?>" class="btn tip" title="" data-original-title="Remove description"><i class="icon16 i-remove" title="Remove"></i></a>
                     </div>
                  </td>
               </tr>
            <?php }?>      
         <?php }else{?>
            <tr id="no_item"><td colspan="3" style="text-align:center">No Item</td></tr>
         <?php }?>
         </tbody>
         </table>
         </div>
      <!--END DESCRIPTION-->
   <!-- </div>End .widget-content
</div>   -->
<div id="dialog" title="Basic dialog" style="display:none"></div>
</div>
</div>
</div><!--End .row-fluid-->
<script type="text/javascript">
$(document).ready(function(){
    //SUM PRICE
  $("#order_insurance_fee,#order_packing_fee,#order_ship_charge,#other_charge").on("click keyup keydown blur focusout", function () {
    var total = 1*$("#order_ship_charge").val() + 1*$("#order_insurance_fee").val() + 1*$("#other_charge").val() + 1*$("#order_packing_fee").val();
    $("#order_sum_price").attr("value", total);
  });  
   //DELETE DESCRIPTION
   $(document).on("click",".delete_description",function(){
      $("#loading").show();
      var order_detail_id=$(this).parents('tr').attr('id');
      $.ajax({
         url: '<?php echo base_url();?>admin/order/deleteDescription',
         type: 'GET',
         data:{order_detail_id:order_detail_id},
         success:function(data){
            var obj = eval ("(" + data + ")");
            if(obj.error!=""){
               $("#dialog").html(obj.error);
               $("#dialog" ).dialog();
               $("#loading").hide();
            }else if(obj.success!=""){
               $("tr#"+order_detail_id).hide(300);
               $("#loading").hide();
            }
         }
      });
      return false;
   });
   //UPDATE DESCRIPTION
   $("#update_description").on("click",function(){
      $("#loading").show();
      var id=$("#order_detail_id").val();
      $.ajax({
         url: '<?php echo base_url();?>admin/order/updateDescription',
         type: 'POST',
         data:$("#f_order_description").serialize(),
         success:function(data){
            var obj = eval ("(" + data + ")");
            if(obj.error!=""){
               $("#dialog").html(obj.error);
               $("#dialog" ).dialog();
               $("#loading").hide();
            }else if(obj.success!=""){
               var str="";
               str+='<td class="center vcenter">'+$("#order_detail_quantity").val()+'</td>';
               str+='<td>'+$("#order_detail_description").val()+'</td>';
               str+='<td class="center vcenter">';
               str+='<div class="btn-group">';
               str+='<a class="edit_description" href="#" accesskey="'+id+'" class="btn tip" title="" data-original-title="Edit description"><i class="icon16 i-pencil" title="Edit"></i></a> ';
               str+='<a class="delete_description" href="#" accesskey="'+id+'" class="btn tip" title="" data-original-title="Edit description"><i class="icon16 i-remove" title="Remove"></i></a> ';
               str+='</div>';
               str+='</td>';
               $("tr#"+id).html(str);
               $("#order_detail_description").val("");
               $("#order_detail_quantity").val("");
               $("#order_detail_id").val("");
               $("#loading").hide();
               $("#update_description").hide();
            }
         }
      });
      return false;
   });
   //EDIT DESCRIPTION
   $(document).on('click','.edit_description',function(){
      var order_detail_id=$(this).parents('tr').attr('id');
      $("#loading").show();
      $.ajax({
         url: '<?php echo base_url();?>admin/order/getOrderDetailInfo',
         type: 'GET',
         data:{order_detail_id:order_detail_id},
         success:function(data){
            if(data!=""){
               var obj = eval ("(" + data + ")");
               $("#order_detail_quantity").val(obj.order_detail_quantity);
               $("#order_detail_description").val(obj.order_detail_description);
               $("#order_detail_id").val(obj.order_detail_id);
               $("#update_description").show(100);
               $("#loading").hide();
            }
         }
      });
      return false;
   });
   //ADD DESCRIPTION
   $("#add_description").on("click",function(){
      $("#loading").show();
      $.ajax({
         url: '<?php echo base_url();?>admin/order/editDescription',
         type: 'POST',
         data:$("#f_order_description").serialize(),
         success:function(data){
            var obj = eval ("(" + data + ")");
            if(obj.error!=""){
               $("#dialog").html(obj.error);
               $("#dialog" ).dialog();
               $("#loading").hide();
            }else if(obj.success!=""){
               var str="";
               str='<tr id="'+obj.success+'">';
               str+='<td class="center vcenter">'+$("#order_detail_quantity").val()+'</td>';
               str+='<td>'+$("#order_detail_description").val()+'</td>';
               str+='<td class="center vcenter">';
               str+='<div class="btn-group">';
               str+='<a class="edit_description" href="#" accesskey="'+obj.success+'" class="btn tip" title="" data-original-title="Edit description"><i class="icon16 i-pencil" title="Edit"></i></a> ';
               str+='<a class="delete_description" href="#" accesskey="'+obj.success+'" class="btn tip" title="" data-original-title="Edit description"><i class="icon16 i-remove" title="Remove"></i></a> ';
               str+='</div>';
               str+='</td>';
               str+='</tr>';
               $("tr#no_item").remove();
               $("#tbody").prepend(str);
               $("#order_detail_description").val("");
               $("#order_detail_quantity").val("");
               $("#loading").hide();
            }
         }
      });
      return false;
   });
   //CHOOSE CUSTOMER TYPE TO SHOW REGISTER MEMBER
   $(document).on("change","#customer_type",function(){
      var val=$(this).val();
      ShowRegisterMember(val);
   });
   //END CHOOSE CUSTOMER TYPE TO SHOW REGISTER MEMBER
   //LOAD STATE - COUNTRY
   $("#customer_country").on("change",function(){
         var country_name=$("#customer_country option:selected").val();
         loadState(country_name,"customer");
   });
   $("#customer_state").on("change",function(){
     var country_name=$("#customer_country option:selected").val();
     var states_code=$("#customer_state option:selected").val();
     loadCities(country_name,states_code,"customer");
   });
   $("#consignee_country").on("change",function(){
         var country_name=$("#consignee_country option:selected").val();
         loadState(country_name,"consignee");
   });
   $("#consignee_state").on("change",function(){
     var country_name=$("#consignee_country option:selected").val();
     var states_code=$("#consignee_state option:selected").val();
     loadCities(country_name,states_code,"consignee");
   });
//LOAD DELIVERY
   $("#type_ship_id").on("change",function(){
      var shipment_id=$(this).val();
      loadDelivery(shipment_id);
   });
   $("#gettrackingcode").on("click",function(){
      getTrackingCode();
      return false;
   });
   //HIDE SHOW PLACEHOLDER
   var remember="";
   $("input[type=text],textarea").on("focus",function(){
      remember=$(this).attr("placeholder");
      $(this).attr("placeholder","");
   });
    $("input[type=text],textarea").on("focusout",function(){
      $(this).attr("placeholder",remember);
      remember="";
   });
  //PREVIEW MEMBERSHIP FORM
  $("#preview_membership").on("click",function(){
      var customer_name=$("#customer_name").val();
      var customer_phone=$("#customer_phone").val();
      var customer_email=$("#customer_email").val();
      var customer_address=$("#customer_address").val();
      var customer_address2=$("#customer_address2").val();
      var customer_zipcode=$("#customer_zipcode").val();
      var customer_country=$("#customer_country").val();
      var customer_state=$("#customer_state").val();
      var customer_city=$("#customer_city").val();
      var customer_remark=$("#txt_customer_remark").val();
      var customer_passcode=$("#txt_customer_passcode").val();
      var customer_type=$("#customer_type").val();
      var url=base_url+"admin/form/PreviewMembership?customer_name="+customer_name+"&customer_phone="+customer_phone+"&customer_email="+customer_email+"&customer_address="+customer_address+"&customer_address2="+customer_address2+"&customer_zipcode="+customer_zipcode+"&customer_country="+customer_country+"&customer_state="+customer_state+"&customer_city="+customer_city+"&customer_remark="+customer_remark+"&customer_passcode="+customer_passcode+"&customer_type="+customer_type;
      $(this).attr("target","_blank");
      $(this).attr("href",url);
      return true;
  });
//PREVIEW SHIPPING REQUEST FORM
  $("#preview_order").on("click",function(){
    var customer_name=$("#customer_name").val();
    var customer_phone=$("#customer_phone").val();
    var customer_address=$("#customer_address").val();
    var customer_address2=$("#customer_address2").val();
    var customer_country=$("#customer_country").val();
    var customer_state=$("#customer_state").val();
    var customer_city=$("#customer_city").val();
    var consignee_name=$("#consignee_name").val();
    var consignee_phone=$("#consignee_phone").val();
    var consignee_address=$("#consignee_address").val();
    var consignee_address2=$("#consignee_address2").val();
    var consignee_country=$("#consignee_country").val();
    var consignee_state=$("#consignee_state").val();
    var consignee_city=$("#consignee_city").val();
    var order_box=$("#order_box").val();
    var order_ibs=$("#order_ibs").val();
    var order_declared_value=$("#order_declared_value").val();
    var order_shipment_rate=$("#order_shipment_rate").val();
    var type_ship_id=$("#type_ship_id").val();
    var type_payment_id=$("#type_payment_id").val();
    var type_delivery_id=$("#type_delivery_id").val();
    var order_ship_charge=$("#order_ship_charge").val();
    var order_insurance_fee=$("#order_insurance_fee").val();
    var order_packing_fee=$("#order_packing_fee").val();
    var other_charge=$("#other_charge").val();
    var order_sum_price=$("#order_sum_price").val();
    var order_id='ADC14822'+$("#order_id").val();
    url=base_url+"admin/form/PreviewEditOrder?customer_name="+customer_name+"&customer_phone="+customer_phone;
    url+="&customer_address="+customer_address+"&customer_address2="+customer_address2+"&consignee_name="+consignee_name;
    url+="&consignee_phone="+consignee_phone+"&consignee_address="+consignee_address+"&consignee_address2="+consignee_address2;
    url+="&order_box="+order_box+"&order_ibs="+order_ibs+"&order_declared_value="+order_declared_value;
    url+="&order_shipment_rate="+order_shipment_rate+"&type_ship_id="+type_ship_id+"&type_payment_id="+type_payment_id;
    url+="&type_delivery_id="+type_delivery_id+"&order_ship_charge="+order_ship_charge+"&order_insurance_fee="+order_insurance_fee;
    url+="&order_packing_fee="+order_packing_fee+"&other_charge="+other_charge+"&customer_country="+customer_country+"&customer_state="+customer_state+"&customer_city="+customer_city;
    url+="&consignee_country="+consignee_country+"&consignee_state="+consignee_state+"&consignee_city="+consignee_city+"&order_sum_price="+order_sum_price+"&order_id="+order_id;
    $(this).attr("target","_blank");
    $(this).attr("href",url);
    return true;
  });
//VALIDATE FORM   
   $("#f_order").validate({
      rules:{
                  customer_name: {
                        required: true,
                  },
                  customer_phone: {
                        required: true,
                        digits: true,
                        minlength: 9,
                        maxlength: 15
                  },
                  customer_address: {
                        required: true,
                  },
                  customer_zipcode: {
                        digits: true,
                        minlength: 5,
                        maxlength: 5
                  },
                  // customer_country: {
                  //        required: true,
                  // },
                  // customer_state: {
                  //       required: true,
                  // },
                  // customer_city: {
                  //       required: true,
                  // },
                  customer_email: {
                        email: true
                  },
                  consignee_name: {
                        required: true,
                  },
                  consignee_phone: {
                        required: true,
                        digits: true,
                        minlength: 9,
                        maxlength: 15
                  },
                  consignee_address: {
                        required: true,
                  },
                  consignee_zipcode: {
                        digits: true,
                        minlength: 5,
                        maxlength: 5
                  },
                  // consignee_country: {
                  //        required: true,
                  // },
                  // consignee_state: {
                  //       required: true,
                  // },
                  // consignee_city: {
                  //       required: true,
                  // },
                  consignee_email: {
                        email: true
                  },
                  order_box: {
                        required:true,
                        digits: true
                  },
                  order_ibs: {
                        required:true,
                        number: true
                  },
                  // order_end_date: {
                  //       required:true,
                  //       date: true
                  // },
                  // order_insurance_fee:{
                  //    required:true,
                  //    number:true
                  // },
                  // order_packing_fee:{
                  //    required:true,
                  //    number:true
                  // },
                  order_ship_charge:{
                     required:true,
                     number:true
                  },
                  // other_charge:{
                  //    number:true
                  // },
                  type_payment_id:{
                     required:true
                  },
                  type_ship_id:{
                     required:true
                  },
                  type_delivery_id:{
                     required:true
                  },
                  unit_id:{
                     required:true
                  },
                  customer_type:{
                     required:true
                  },
                  order_sum_price:{
                     required:true,
                     number:true
                  },
                  
      }
   });
   $("#f_order_description").validate({
		rule:{},
	});
   var offset=new Date();
   $( "#order_end_date").datepicker({
      minDate:offset,
      dateFormat: 'mm/dd/yy'
   });
   timezone=offset.getTimezoneOffset()
   $("#timezone").val((timezone/60)*(-1));
   //loadDelivery($("#type_ship_id").val());
   ShowRegisterMember($("#customer_type").val());
});
function loadState(country_name,type_load){
        if(country_name!="none"){
            $.ajax({
            url: '<?php echo base_url();?>admin/order/getStates',
            type: 'POST',
            data: {country_name: country_name},
            success:function(data){
               if(data!=null){
                  $("#"+type_load+"_state").html(data);
                  var states_name=$("#"+type_load+"_state"+" option:selected").text();
                  var states_code=$("#"+type_load+"_state option:selected").val();
               }else{
                  str='<option value="" selected="selected">Please select state</option>';
                  $("#"+type_load+"_state").html(str);
               }
               loadCities(country_name,states_code,type_load);
            }
          })
   }
}
function loadCities(country_name,states_code,type_load){
        if(states_code!="none"){
            $.ajax({
            url: '<?php echo base_url()?>admin/order/getCities',
            type: 'POST',
            data: "country_name=" + country_name + "&states_code=" + states_code,
            success:function(data){
               if(data!=null){
                  $("#"+type_load+"_city").html(data);
               }else{
                  str="";//'<option value="" selected="selected">Please select city</option>';
                  $("#"+type_load+"_city").html(str);
               }
            }
          })
        }
}
function loadDelivery(shipment_id){
   if(shipment_id!="" || shipment_id!="none"){
      $.ajax({
         url:'<?php echo base_url()?>admin/order/getDelivery',
         data: {"shipment_id":shipment_id},
         type: 'POST',
         success:function(data){
            str="";//'<option value="" selected="selected">Please select delivery method</option>';
            if(data!=""){
               str+=data;
            }
            $("#type_delivery_id").html(str);
         }
      });
   }
}
function getTrackingCode(){
    $.ajax({
         url:'<?php echo base_url()?>admin/order/getTrackingCode',
         type: 'GET',
         success:function(data){
            if(data!="" && data!='error'){
               $("#trackingcode_container").html(data);
               $("#trackingcode_container").css({"color":"red","font-size":"15px","font-weight":"bold"});
            }else{
               $("#dialog").html("Error");
               $("#dialog" ).dialog();
            }
         }
      });
}
function ShowRegisterMember(i){
  if(i==1){
     $("#customer_remark").show(300);
     $("#customer_passcode").show(300);
     $("#preview_membership").show();
  }else{
     $("#customer_remark").hide(300);
     $("#customer_passcode").hide(300);
  }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}  
</script>
<style>
  #uniform-consignee_country,#uniform-consignee_state,#uniform-consignee_city,
  #uniform-customer_country,#uniform-customer_state,#uniform-customer_city,
  #uniform-type_ship_id,#uniform-type_delivery_id,#uniform-type_payment_id
  {
    width:100% !important;
  }
</style>