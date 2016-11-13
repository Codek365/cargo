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
 

<div class="span8">
    <div class="page-header"><h4>History</h4></div>
<!--========================================================================================================-->
<?php if(!empty($listOrder)){ ?>
    <?php foreach ($listOrder as $order) { ?>
        <!--TABLE CONTAINER-->
        <div class="row-fluid">
                <a target="_blank" href="<?php echo base_url() . 'admin/order/addonly?sender='.$order['customer_id'].'&consignee='.$order['consignee_id'] ?>" class="btn"><i class="icon20  i-stack-plus"></i> Create New Order For This Consignee</a>
                <a  href="<?php echo base_url() . 'admin/customer/editreceiver?sender='.$order['customer_id'].'&receiver='.$order['consignee_id']; ?>" class="btn"><i class="icon20 i-pencil-2"></i> Edit This Consignee</a>                                
                <a target="_blank" href="<?php echo base_url().'admin/order/edit?order_id='.$order['order_id'].'&flag=true'; ?>" class="btn" id="edit_order"><i class="icon20  i-pencil-3"></i>Edit This Order</a>
        </div>       
    <div class="row-fluid">
        <div class="span12">                  
            <table class="table table-bordered">
                <tbody>
                  <tr>
                     <td><h4><span class="red">Consignee Name:</span> <?php if(!empty($order['consignee_name'])) echo $order['consignee_name'] ?></h4></td>
                     <td><h4><span class="red">Phone:</span> <?php if(!empty($order['consignee_phone'])) echo $order['consignee_phone'] ?></h4></td>
                     <td><h4><span class="red">Country:</span> <?php if(!empty($order['consignee_country'])){ if(strtolower($order['consignee_country'])=="vn") echo "Việt Nam"; if(strtolower($order['consignee_country'])=="us") echo "USA";} ?></h4></td>
                     <td rowspan="2" style="text-align:center;vertical-align: middle">
                         <a class="view_consignee_detail" accesskey="<?php echo $order['consignee_id']; ?>" title="View consignee detail" href="#"><i class="icon24 i-clipboard-4"></i><a/>
                     </td>
                  <tr>
                    <td><h4><span class="red">Address:</span> <?php if(!empty($order['consignee_address'])) echo $order['consignee_address']; ?></h4></td>
                     <td><h4><span class="red">Zipcode:</span> <?php if(!empty($order['consignee_zipcode'])) echo $order['consignee_zipcode'] ?></h4></td>
                     <td><h4><span class="red">Email:</span> <?php if(!empty($order['consignee_email'])) echo $order['consignee_email'] ?></h4></td>
                  </tr>
                </tbody>
                </table>

            </div><!--DIV #SPAN6-->
    </div>
    <div class="row-fluid">
            <div class="span12">
                                                             
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
                         <td class="center"><a target="_blank" class="tip" data-original-title="Print Order" title="" href="<?php echo base_url().'admin/form/printForm?id='.$order['order_id'].'&amp;form=shiprequest'; ?>"><i class="icon32 i-print-2"></i></a>ADC14822<?php echo $order['order_id']; ?></td>
                         <td id="order_box" class="center"><?php if(!empty($order['order_box'])) echo $order['order_box']; ?></td>
                         <td id="order_ibs" class="center"><?php if(!empty($order['order_ibs'])) echo $order['order_ibs']; ?></td>
                         <td id="order_sum_price" class="center"><?php if(!empty($order['order_sum_price'])) echo $order['order_sum_price']; ?></td>
                         <td id="order_status_id" class="center" colspan="2"><?php if(!empty($order['order_status_name'])) echo $order['order_status_name']; ?></td>
                      </tr>
                      <tr>
                         <th>Shipment Type</th>
                         <th>Payment Type</th>
                         <th>Shipment Charge</th>
                         <th>Insurance 3% Fee</th>
                         <th>Other Charge</th>
                         <th>Packing Fee</th>
                      </tr>
                      <tr>
                         <td id="type_ship_id" class="center"><?php if(!empty($order['type_ship_name'])) echo $order['type_ship_name']; ?></td>
                         <td id="type_payment_id" class="center"><?php if(!empty($order['type_payment_name'])) echo $order['type_payment_name']; ?></td>
                         <td id="type_ship_id" class="center"><?php if(!empty($order['order_ship_charge'])) echo $order['order_ship_charge']; ?></td>
                         <td id="order_insurance_fee" class="center"><?php if(!empty($order['order_insurance_fee'])) echo $order['order_insurance_fee']; ?></td>
                         <td id="order_other_charge" class="center"><?php if(!empty($order['order_other_charge'])) echo $order['order_other_charge']; ?></td>
                         <td id="order_packing_fee" class="center"><?php if(!empty($order['order_packing_fee'])) echo $order['order_packing_fee']; ?></td>
                      </tr>
                      <tr>
                        <th colspan="6">Message</th>
                      </tr>
                      <tr>
                         <td class="center" colspan="6"><?php if(!empty($order['order_message'])) echo $order['order_message']; ?></td>
                      </tr>
                      <tr>
                         <th>Quantity</th>
                         <th colspan="5">Desciption</th>
                      </tr>
                      <?php if(!empty($descriptions)){ ?>
                      <?php
                            $$order['order_id']=0;
                            foreach ($descriptions as $description) {
                                if($description['order_id']==$order['order_id']){
                                    echo "<tr><td style='text-align:center'>".$description['order_detail_quantity']."</td><td style='text-align:center' colspan='5'>".$description['order_detail_description']."</td></tr>";
                                    $$order['order_id']+=1;
                                }
                            }
                            if($$order['order_id']==0){
                                echo '<tr id="no_item"><td colspan="6" style="text-align:center">No Item</td></tr>';
                            }
                      ?>
                      <?php }else{
                            echo '<tr id="no_item"><td colspan="6" style="text-align:center">No Item</td></tr>';
                        } //END IF?>
                   </tbody>
                </table>

                <!--TABLE CHARGE-->
                       
            </div><!--SPAN4-->
      </div><!--Row fluid-->
        <!--TABLE CONTAINER-->
        <hr>
    <?php }//END FOREACH ?>
<?php }//END IF ?>
        <!--========================================================================================================-->
        <!--==========================================================MODAL=========================================-->
        <!-- Modal -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Order infomation</h3>
                  </div>
                  <div class="modal-body">
                    <p id="modal_content">
                    <!--TABLE-->

                     <table class="table">
                         <thead>
                            <tr>
                               <th>#</th>
                               <th></th>
                               <th>Consignee infomation</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>1</td>
                               <td>Fullname:</td>
                               <td><span id="consignee_fullname"></span></td>
                            </tr>
                            <tr>
                               <td>2</td>
                               <td>Phone number:</td>
                               <td><span id="consignee_phone"></span></td>
                            </tr>
                            <tr>
                               <td>3</td>
                               <td>Address 1:</td>
                               <td><span id="consignee_address"></span></td>
                            </tr>
                            <tr>
                               <td>4</td>
                               <td>Address 2:</td>
                               <td><span id="consignee_address2"></span></td>
                            </tr>
                            <tr>
                               <td>5</td>
                               <td>City:</td>
                               <td><span id="consignee_city"></span></td>
                            </tr>
                            <tr>
                               <td>8</td>
                               <td>State:</td>
                               <td><span id="consignee_state"></span></td>
                            </tr>
                            <tr>
                               <td>6</td>
                               <td>Country:</td>
                               <td><span id="consignee_country"></span></td>
                            </tr>
                            <tr>
                               <td>9</td>
                               <td>Zipcode:</td>
                               <td><span id="consignee_zipcode"></span></td>
                            </tr>
                            <tr>
                               <td>10</td>
                               <td>Email:</td>
                               <td><span id="consignee_email"></span></td>
                            </tr>
                         </tbody>
                      </table>

                    <!--TABLE-->
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <!--button class="btn btn-primary">Save changes</button-->
                  </div>
                </div>
        <!--=======================================================###MODAL###===================================-->
    </div>
</div>

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
        //VIEW CONSIGNEE DETAIL
        $(".view_consignee_detail").on('click',function(){
            var consignee_id=$(this).attr('accesskey');
            $.ajax({
                url:base_url+'admin/customer/getConsigneeInfo',
                type:"POST",
                data:{"consignee_id":consignee_id},
                success:function(res){
                    if(res!=""){
                        var obj = eval ("(" + res + ")");
                        $("#consignee_fullname").html(obj.consignee_name);
                        $("#consignee_phone").html(obj.consignee_phone);
                        $("#consignee_address").html(obj.consignee_address);
                        $("#consignee_address2").html(obj.consignee_address2);
                        $("#consignee_city").html(obj.city);
                        $("#consignee_state").html(obj.state);
                        $("#consignee_country").html(obj.country_name);
                        $("#consignee_zipcode").html(obj.consignee_zipcode);
                        $("#consignee_email").html(obj.consignee_email);
                         $("#myModal").modal('show');
                    }
                }
            });
        });
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