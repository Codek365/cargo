<?php $this->load->library('Dropdown');

$this->load->helper('form');?>

<form id="f_order" action="<?php echo base_url().'admin/order/addonly'; ?>" method="POST">

<div class="row-fluid">

<div class="span12">

<div class="btn-group">

   <div id="trackingcode_container" style="margin-bottom:5px;">

      <?php

         if($this->session->flashdata('trackingcode')){

            echo '<span style="font-size:15px; color:red; font-weight:bold">'.$this->session->flashdata('trackingcode').'</span>';

         } 

         if($this->session->userdata('trackingcode')){

            echo '<span style="font-size:15px; color:red; font-weight:bold">'.$this->session->userdata('trackingcode').'</span>';

         }else{

            echo '<a href="#" class="btn" id="gettrackingcode"><i class="icon20 i-download-7"></i> Get Tracking Code</a>';   

         }

      ?>

   </div>

</div>

<?php if($this->session->flashdata('success')){ ?>

          <div class="alert alert-success"> 

              <button type="button" class="close" data-dismiss="alert">×</button>

                  <strong><i class="icon24 i-checkmark-circle"></i> Well done!</strong> Your order has been added successfully, Your tracking number is <span style="color:red; font-weight:bold"><?php echo $this->session->flashdata('success'); ?></span></div>

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

<?php if($this->session->flashdata('order_id')){

        echo '<a href="'.base_url().'admin/form/printForm?id='.$this->session->flashdata('order_id').'&form=shiprequest'.'" class="btn" target="_blank" title="Print order"><i class="icon20 i-print-2"></i> Print order</a>';

} ?>

<?php if($this->session->flashdata('customer_id')){

        echo '<a href="'.base_url().'admin/form/printForm?id='.$this->session->flashdata('customer_id').'&form=membership'.'" class="btn" target="_blank" title="Print membership form"><i class="icon20 i-print-2"></i> Print membership</a>';

        echo '<a href="'.base_url().'admin/customer/view/'.$this->session->flashdata('customer_id').'" class="btn" target="_blank" title="View customer"><i class="icon20  i-search-4"></i> View customer</a>';

} ?>

  <button class="btn" type="submit" name="save" value="Save change"><i class="icon20 i-checkmark-circle"></i> Save change</button>

   <a href="<?php echo base_url().'admin/order/deleteCurrentOrder';?>" class="btn"><i class="icon20 i-close-4"></i> Cancel</a>

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

            <!-- <a href="<?php echo base_url().'admin/order/add'; ?>" id="preview_order" title="Preview order form" class="btn"><i class="icon15 i-print-2"></i> Order</a> -->

         </span> 

      </div>

      <!-- End .widget-title --> 

      <div class="widget-content noPadding">

         <ul id="myTab" class="nav nav-tabs">

            <li class="active"><a href="#order" data-toggle="tab">Order</a></li>

            <li><a href="#message" data-toggle="tab">Message</a></li>

         </ul>

         <div class="tab-content">

            <!-- TAB ORDER-->

            <div class="tab-pane fade active in" id="order">



               <div class="row-fluid">

                 <div class="control-group">

                   <div class="controls controls-row">

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

                 </div>

              </div>



              <div class="row-fluid">

                      <div class="span6">

                       <?php

                         if(empty($info['type_delivery_id'])){$info['type_delivery_id']="";}

                         echo $this->dropdown->dropdown($type_delivery_data,"type_delivery_name","type_delivery_id",$info['type_delivery_id'],array("name"=>"type_delivery_id","id"=>"type_delivery_id"));

                         echo form_error('type_delivery_id','<div class="red">','</div>');

                      ?>

                      </div>

                      <!-- <div class="span6">

                            <input placeholder="Estimate completed date" class="span12" type="text" readonly="true" name="order_end_date" id="order_end_date" value="<?php echo empty($info['order_end_date'])?"":$info['order_end_date'] ?>">

                            <input type="hidden" id="timezone" name="timezone" value="">

                            <?php //echo form_error('order_end_date','<div class="red">','</div>'); ?>

                    </div> -->

                      <div class="span6">

                        <div class="span6">

                            <input placeholder="Shipment rate" maxlength="10" class="span12" type="text" name="order_shipment_rate" id="order_shipment_rate" value="<?php echo empty($info['order_shipment_rate'])?"":$info['order_shipment_rate'] ?>">

                        </div>

                        <div class="span6">

                          <input placeholder="Declared value" maxlength="15" class="span12" type="text" name="order_declared_value" id="order_declared_value" value="<?php echo empty($info['order_declared_value'])?"":$info['order_declared_value'] ?>">

                        </div>

                      </div>



              </div>



              <div class="row-fluid">

                <div class="span6">

                    <div class="span6">

                        <input placeholder="Box(s)"  maxlength="3" onkeypress="return isNumberKey(event)" class="span12" type="text" name="order_box" id="order_box" value="<?php echo empty($info['order_box'])?"":$info['order_box'] ?>">

                        <?php echo form_error('order_box','<div class="red">','</div>'); ?>

                    </div>

                    <div class="span6">

                        <input placeholder="LBS" class="span12" type="text" name="order_ibs" id="order_ibs" value="<?php echo empty($info['order_ibs'])?"":$info['order_ibs'] ?>">

                        <?php echo form_error('order_ibs','<div class="red">','</div>'); ?>

                    </div>

                </div>

                <div class="span6">

                    <input placeholder="Packing fee" class="span12" type="text" id="order_packing_fee" name="order_packing_fee" value="<?php echo empty($info['order_packing_fee'])?"":$info['order_packing_fee'] ?>">

                   <?php echo form_error('order_packing_fee','<div class="red">','</div>'); ?>

                </div>

              </div>



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

                   <input placeholder="Total"  type="text" readonly="true" id="order_sum_price" name="order_sum_price" value="<?php echo empty($info['order_sum_price'])?"":$info['order_sum_price'] ?>" style="width:100%">

                           <?php echo form_error('order_sum_price','<br><div class="red">','</div>');?>

                </div>

              </div>



               <?php if(!empty($customer_id)){ ?>

                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id ?>">

               <?php } ?>

               <?php if(!empty($consignee_id)){ ?>

                    <input type="hidden" name="consignee_id" id="consignee_id" value="<?php echo $consignee_id ?>">

               <?php } ?>

            </div>

            <!--###TAB ORDER###-->

            <div class="tab-pane fade in" id="message">

                      <!-- End .widget-title --> 

                      <div class="widget-content">

                            <!-- End .control-group --> 

                                  <div class="control-group">

                                    <div class="controls controls-row">

                                      <textarea placeholder="Message" class="span12" id="txt_message" name="order_message" rows="4"><?php echo empty($info['order_message'])?"":$info['order_message'] ?></textarea>

                                      <?php echo form_error('order_message','<div class="red">','</div>');?>

                                    </div>

                                  </div>

                            <!-- End .control-group --> 

                      </div>

                      <!-- End .widget-content --> 

            </div>







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

             <input placeholder="Quantity" class="span12" onkeypress="return isNumberKey(event)" type="text" name="order_detail_quantity" id="order_detail_quantity" value="<?php echo empty($order_detail_quantity)?"":$order_detail_quantity ?>">

             <?php echo form_error('order_detail_quantity','<div class="red">','</div>'); ?>

           </div>

         </div>



         <div class="control-group">

           <div class="controls controls-row">

             <textarea placeholder="Description" maxlength="255" class="span12" rows="4" id="order_detail_description" name="order_detail_description"></textarea>

             <input type="hidden" name="order_detail_id" id="order_detail_id">

             <?php echo form_error('order_detail_description','<div class="red">','</div>'); ?>

           </div>

         </div>

         <div class="btn-group">

            <button id="add_description" class="btn"><i class="i-plus-circle-2"></i> Save Description</button>

            <button id="update_description" class="btn" style="display:none"><i class="i-plus-circle-2"></i> Update Description</button>

            <span id="loading" style="display:none"><img src="<?php echo base_url(); ?>public/admin_layout/images/preloaders/dark/1.gif" class="gap-right15"></span>

         </div>

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

         url: '<?php echo base_url();?>admin/order/addDescription',

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

   var remember="";

   $("input[type=text],textarea").on("focus",function(){

      remember=$(this).attr("placeholder");

      $(this).attr("placeholder","");

   });

    $("input[type=text],textarea").on("focusout",function(){

      $(this).attr("placeholder",remember);

      remember="";

   });

  //PREVIEW SHIPPING REQUEST FORM

$("#preview_order").on("click",function(){

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

    var customer_id=$("#customer_id").val();

    var consignee_id=$("#consignee_id").val();

    url=base_url+"admin/form/PreviewOrder2?";

    url+="order_box="+order_box+"&order_ibs="+order_ibs+"&order_declared_value="+order_declared_value;

    url+="&order_shipment_rate="+order_shipment_rate+"&type_ship_id="+type_ship_id+"&type_payment_id="+type_payment_id;

    url+="&type_delivery_id="+type_delivery_id+"&order_ship_charge="+order_ship_charge+"&order_insurance_fee="+order_insurance_fee;

    url+="&order_packing_fee="+order_packing_fee+"&other_charge="+other_charge+"&order_sum_price="+order_sum_price+"&customer_id="+customer_id+"&consignee_id="+consignee_id;

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

   <?php

      if($this->session->userdata('trackingcode')){

          echo '$("#preview_order").show();'; 

      }else{

        echo '$("#preview_order").hide();';

      }

   ?>

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

    $("#preview_order").show();

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