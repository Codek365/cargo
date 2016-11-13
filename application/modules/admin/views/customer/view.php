<?php $this->load->library('Dropdown'); ?>
<div class="row-fluid">
<div class="span4">
    <div class="widget">
        <div class="widget-title">
            <div class="icon"><i class="icon20 i-menu-6"></i></div>
            <h4>Sender</h4>
            <!-- <a href="#" class="minimize"></a> --> </div>
        <!-- End .widget-title -->
        <div class="widget-content" style="display: block;">
            <div class="btn-group">
                <a href="<?php echo base_url() . 'admin/customer/index'; ?>" class="btn "><i class="icon20 i-arrow-left-3 "></i> Back</a>                
                <a class="btn" id="edit"><i class="icon20  i-pencil-5"></i> Edit</a>
                <a class="btn" id="done" style="display:none"><i class="icon20 i-checkmark-3"></i> Save</a>
                <a target="_blank" href="<?php echo base_url() . 'admin/order/addbysender?sender=' . $data['customer_id'] ?>"
                   class="btn"><i class="icon20  i-stack-plus"></i> Create New Order</a>                
            </div>
            <form id="form_customer" class="form-horizontal" method="post"
                  action="<?php echo base_url() . 'admin/customer/index'; ?>" enctype="multipart/form-data">
                <br>
                <label class="control-label" for="normal">Full name:</label>

                <div class="controls controls-row">
                    <input id="fullname" class="span12" style="border: none; background: none;" name="fullname"
                           value="<?php echo !empty($data['customer_name']) ? $data['customer_name'] : ""; ?>"
                           disabled/>
                </div>
                <label class="control-label" for="normal">Address:</label>

                <div class="controls controls-row">
                    <input id="address" class="span12" style="border: none; background: none;" name="address"
                           value="<?php echo !empty($data['customer_address']) ? $data['customer_address'] : ""; ?>"
                           disabled/>
                </div>
                <label class="control-label" for="normal">Country:</label>

                <div class="controls controls-row">
                    <!--                        <input class="span12" style="border: none; background: none;" name="country" value="-->
                    <?php //echo !empty($data['customer_country'])?$data['customer_country']:""; ?><!--" disabled />-->
                    <?php echo ($data['customer_country']=='vn') ? 'Việt Nam' : ""; echo ($data['customer_country']=='us') ? 'USA' : ""; ?>
                    <input type="hidden" id="receiver_country" value="<?php echo !empty($data['customer_country']) ? $data['customer_country'] : ""; ?>">
                </div>
                <label class="control-label" for="normal">State:</label>

                <div class="controls controls-row">                   
                    <?php echo $this->dropdown->dropdown($listState, 'state', 'state_code', $data['customer_state'], array("name" => "receiver_states", "class" => "span12", "id" => "receiver_states")) ?>
                </div>
                <label class="control-label" for="normal">City:</label>

                <div class="controls controls-row">                   
                    <?php echo $this->dropdown->dropdown($listCity, 'city', 'id', $data['customer_city'], array("name" => "receiver_city_id", "class" => "span12", "id" => "receiver_cities")) ?>
                </div>
                <label class="control-label" for="normal">Zipcode:</label>

                <div class="controls controls-row">
                    <input id="zipcode" class="span12" style="border: none; background: none;" name="zipcode"
                           value="<?php echo !empty($data['customer_zipcode']) ? $data['customer_zipcode'] : ""; ?>"
                           disabled/>
                </div>

                <label class="control-label" for="normal">Email:</label>

                <div class="controls controls-row">
                    <input id="email" class="span12" style="border: none; background: none;" name="email"
                           value="<?php echo !empty($data['customer_email']) ? $data['customer_email'] : ""; ?>"
                           disabled/>
                </div>
                <label class="control-label" for="normal">Phone:</label>

                <div class="controls controls-row">
                    <input id="phone" class="span12" style="border: none; background: none;" name="phone"
                           value="<?php echo !empty($data['customer_phone']) ? $data['customer_phone'] : ""; ?>"
                           disabled/>
                </div>

                <label class="control-label" for="normal">Creation Date:</label>

                <div class="controls controls-row">
                    <span
                        class="control-label"><?php echo !empty($data['customer_date']) ? date('d/m/Y', $data['customer_date']) : ""; ?></span>
                </div>

            </form>

        </div>
        <!-- End .widget-content -->
    </div>
    <!-- End .widget -->
</div>
<?php if(!empty($receiver_list)){ ?>
<div class="span8">
    <div class="page-header"><h4>History</h4></div>
    <?php foreach ($receiver_list as $key => $data1) { ?>
    <!--TABLE CONTAINER-->
    <?php $order_info=$this->m_customer->getOrderById1($data1['consignee_id']);?>
    <div class="row-fluid">
                <div class="btn-group">
                                <a target="_blank" href="<?php echo base_url() . 'admin/order/addonly?sender=' . $this->uri->segment(4) . '&consignee=' . $data1['consignee_id'] ?>"
                           class="btn"><i class="icon20  i-stack-plus"></i> Create New Order For This Consignee</a>
                                 <a  href="<?php echo base_url() . 'admin/customer/editreceiver?sender=' . $this->uri->segment(4) . '&receiver=' . $data1['consignee_id'] ?>"
                           class="btn"><i class="icon20 i-pencil-2"></i> Edit This Consignee</a>                                
                                <a target="_blank" href="<?php echo base_url().'admin/order/edit?order_id='.$order_info[0]['order_id']; ?>" class="btn" id="edit_order"><i class="icon20  i-pencil-3"></i>Edit This Order</a>

                               
                        </div> 
                      
                        <div class="btn-group pull-right">
                            
                              <?php if ($user_E == 1 || $user==1) {?>
                              <a href="<?php echo base_url().'admin/customer/deleteConsignee?sender='.$this->uri->segment(4). '&receiver=' . $data1['consignee_id'] ?>" class="btn"><i class="icon20  i-remove-5"></i>Delete This Consignee</a>    
                              <?php } ?>                             
                        </div> 
                        
    </div>       
    <div class="row-fluid">
        <div class="span12">                  
            <table class="table table-bordered">                
                <tr>               
                <td><h4><span class="red">Consignee Name:</span> <?= $data1['consignee_name'] ?></h4></td>
                <td><h4><span class="red">Phone:</span> <?= $data1['consignee_phone'] ?></h4></td>
                <td><h4><span class="red">Address:</span> <?= $data1['consignee_address'] ?></h4></td>
                <td><h4><span class="red">Country:</span> <?php echo ($data1['consignee_country']=='vn') ? 'Việt Nam' : ""; echo ($data1['consignee_country']=='us') ? 'USA' : ""; ?></h4></td>
                </tr>
                <tr>
                    <td>
                        <h4>
                        <span class="red">States:</span> 
                        <?= $this->m_customer->getStateByCode($data1['consignee_state'], $data1['consignee_country']); ?>
                        </h4>
                    </td>
                    <td>
                        <h4>
                        <span class="red">City:</span>  
                        <?php echo $this->m_customer->getCityByIdCountry($data1['consignee_city'], $data1['consignee_country']); ?>
                        </h4>
                    </td>
                    <td>
                        <h4><span class="red">Zipcode:</span> <?= $data1['consignee_zipcode'] ?></h4>
                    </td>
                    <td>
                        <h4><span class="red">Email:</span> <?php echo $data1['consignee_email']; ?></h4>
                    </td>
                </tr>
            </table>
            </div><!--DIV #SPAN6-->
    </div>
    <div class="row-fluid">
            <div class="span12">
                    <?php foreach ($order_info as $num => $order) { ?>                                         
                        <!--TABLE CHARGE-->
                        <table class="table table-bordered">
                            
                            <tbody> 
                            <tr>
                                <th>Tracking Number</th>
                                <th>Box(s)</th>
                                <th>LBS</th>
                                <th>Total</th>
                                <th colspan="2">Status</th>
                            </tr>
                             <tr>
                                <td class="center">
                                <a target="_blank" class="tip" data-original-title="Tooltip on top" title="Print Order" href="<?php echo base_url().'admin/form/printForm?id='.$order['order_id'].'&form=shiprequest'; ?>"><i class="icon32 i-print-2"></i></a>
                                <?php echo $this->system->field('track_prefix').$order['order_id'] ?></td>
                                <td id="order_box" class="center"><?php echo $order['order_box'] ?></td>
                                <td id="order_ibs" class="center"><?php echo $order['order_ibs'] ?></td>
                                <td id="order_sum_price" class="center"><?php echo $order['order_sum_price'] ?></td>
                                <td id="order_status_id" class="center" colspan="2"><?php if ($order['order_status_id'] == 0) {
                                        echo "stock";
                                    } else {
                                        echo $this->m_customer->getOrderStatusById($order['order_status_id']);
                                    } ?></td>
                            </tr>
                             <tr>
                                <th >Shipment Type</th>
                                <th >Payment Type</th>
                                <th >Shipment Charge</th>
                                <th >Insurance 3% Fee</th>
                                <th >Other Charge</th>
                                <th >Packing Fee</th>
                            </tr>                           
                            <tr>
                                <td id="type_ship_id" class="center">                                    
                                        <?php echo $this->m_customer->getShipmethod($order['type_ship_id']) ?></td>
                                <td id="type_payment_id" class="center">
                                    
                                        <?php echo $this->m_customer->getPaymethod($order['type_payment_id']) ?></td>
                                <td id="type_ship_id" class="center">
                                    
                                        <?php echo $order['type_ship_id'] ?></td>
                                <td id="order_insurance_fee" class="center">
                                    
                                        <?php echo $order['order_insurance_fee'] ?></td>
                                <td id="order_other_charge" class="center">
                                    
                                        <?php echo $order['order_other_charge'] ?></td>
                                <td id="order_packing_fee" class="center">
                                     
                                        <?php echo $order['order_packing_fee'] ?></td>
                            </tr>
                            <tr>
                                <th colspan="6">Message</th>
                            </tr>
                            <tr>
                                <td class="center" colspan="6"><?php echo $order['order_message'] ?></td>
                            </tr>
                            <tr>
                                   <th>Quantity</th>
                                   <th colspan="5">Desciption</th>
                                </tr>
                            <?php $order_detail_list=$this->m_customer->getOrderDetailByOrderId($order['order_id']); ?>    
                            <?php if(!empty($order_detail_list)){ ?>
                                <?php foreach ($order_detail_list as $value) {?>
                                   <tr id="<?php echo $value['order_detail_id'] ?>">
                                      <td class="center vcenter"><?php echo $value['order_detail_quantity'] ?></td>
                                      <td colspan="5"><?php echo $value['order_detail_description'] ?></td>
                                   </tr>
                                <?php }?>      
                             <?php }else{?>
                                <tr id="no_item"><td colspan="6" style="text-align:center">No Item</td></tr>
                             <?php }?>
                        </table>
                        <!--TABLE CHARGE-->
                        
                        <input type="hidden" id="order_id" name="order_id" value="<?php echo $order['order_id'] ?>">
                       
                    <?php } ?>
        </div><!--SPAN4-->
      </div><!--Row fluid-->
        <!--TABLE CONTAINER-->
        <hr>
    <?php } ?>
</div>
<?php } ?>
</div>
<!--MODEL-->
<!-- Button to trigger modal -->
<!-- Modal -->
<!-- Button to trigger modal -->

<!-- Modal -->

<!--MODEL-->

<script type="text/javascript">
    $(document).ready(function () {
        $("#uniform-receiver_states").addClass("select1");
        $("#uniform-receiver_cities").addClass("select1");

        $("#edit").on("click", function () {
            $("input[class*='span']").prop("disabled", false);
            $("input[class*='span']").css("border", "1px solid #ccc");
            $("#uniform-receiver_states").removeClass("select1");
            $("#uniform-receiver_cities").removeClass("select1");
            $("#done").show();
        });
        $("#done").on("click", function () {
            var fullname = $("#fullname").val();
            var address = $("#address").val();
            var zipcode = $("#zipcode").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var id = $("#id_customer").val();
            var state = $("#receiver_states option:selected").val();
            var city = $("#receiver_cities option:selected").val();
            $.ajax({
                url: '<?php echo base_url().'admin/customer/editajax2/'.$id;?>',
                data: {fullname: fullname, address: address, zipcode: zipcode, email: email, phone: phone, state: state, city: city},
                type: "POST",
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if ($.trim(obj.error) != "") {
                        $("#dialog").html(obj.error);
                        $("#dialog").dialog();
                    } else if ($.trim(obj.result) != "") {
                        $("#dialog").html(obj.result);
                        $("#dialog").dialog();
                    }
                }
            });
            $("input[class*='span']").prop("disabled", true);
            $("input[class*='span']").css("border", "0");
            $(".selector").css("border", "none");
            $("#done").hide();
        });
        $("#receiver_states").change("change click", function () {
            var country_name = $("#receiver_country").val();
            var states_code = $("#receiver_states option:selected").val();
            loadCities(country_name, states_code);
        });
        function loadCities(country_name, states_code) {
            if (states_code != "none") {
                $.ajax({
                    url: '<?php echo base_url()?>admin/order/getCities',
                    type: 'POST',
                    data: "country_name=" + country_name + "&states_code=" + states_code,
                })
                    .done(function (data) {
                        $("#receiver_cities").html(data);
                        var cities_name = $("#receiver_cities option:selected").text();
                        $("#uniform-receiver_cities span").text(cities_name);
                    })
            }
        }
    });
</script>
<style type="text/css">
    .form-horizontal .control-label {
        width: 100px;
        text-align: left;
    }

    .form-horizontal .controls {
        margin-left: 100px
    }

    .select1 {
        border: 0px solid #FFFFFF !important;
        background: #FFFFFF !important;
    }

    .select1 span {
        cursor: not-allowed !important;
    }

    .select1 select {
        pointer-events: none;
        cursor: default;
    }
</style>