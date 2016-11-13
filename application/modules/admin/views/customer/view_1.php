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
    #uniform-receiver_states
    {
        width: 210px !important;
    }
    #uniform-receiver_cities
    {
        width: 210px !important;
    }
</style>
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
                <a href="<?php echo base_url() . 'admin/customer/index'; ?>" class="btn ">Back</a>
                <a href="<?php echo base_url() . 'admin/order/addbysender?sender=' . $data['customer_id'] ?>"
                   class="btn">Create New Order</a>
                <a class="btn" id="edit">Edit</a>
                <a class="btn" id="done" style="display:none">Save</a>
                <!-- <a title="Delete" href="<?php echo base_url() . 'admin/customer/delete/' . $this->uri->segment(4); ?>"  class="btn" onclick="return alert(\'Are You Sure?\');">delete</a>     -->
            </div>
            <form id="form_customer" class="form-horizontal" method="post"
                  action="<?php echo base_url() . 'admin/customer/index'; ?>" enctype="multipart/form-data">
                <!--  <label class="control-label" for="normal">Username:</label>
                    <div class="controls controls-row">
                      <input class="span12" style="border: none; background: none;" name="username" value="<?php echo !empty($data['username']) ? $data['username'] : ""; ?>" type="text"/>
                    </div>
                    <label class="control-label" for="normal">Password:</label>
                    <div class="controls controls-row">
                      <input class="span12" style="border: none; background: none;" name="username" value="******" type="text"/>
                    </div> -->
                <br>
                <label class="control-label" for="normal">Full name:</label>

                <div class="controls controls-row">
                    <input id="fullname" class="span12" style="border: none; background: none;" name="fullname" maxlength="50"
                           value="<?php echo !empty($data['customer_name']) ? $data['customer_name'] : ""; ?>"
                           disabled/>
                    <p id="fullnameerror" style="color:red"></p>
                </div>
                <label class="control-label" for="normal">Address:</label>

                <div class="controls controls-row">
                    <input id="address" class="span12" style="border: none; background: none;" name="address" maxlength="150"
                           value="<?php echo !empty($data['customer_address']) ? $data['customer_address'] : ""; ?>"
                           disabled/>
                    <p id="addresserror" style="color:red"></p>
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
                    <!--                        --><?php // echo $this->m_customer->getStateByCode($data['customer_state'],$data['customer_country']); ?>
                    <!-- <input class="span12" style="border: none; background: none;" name="username" value="<?php // echo !empty($data['states'])?$data['states']:""; ?>" disabled /> -->
                    <?php echo $this->dropdown->dropdown($listState, 'state', 'state_code', $data['customer_state'], array("name" => "receiver_states", "class" => "span12", "id" => "receiver_states")) ?>
                </div>
                <label class="control-label" for="normal">City:</label>

                <div class="controls controls-row">
                    <!--                      --><?php // if($data['customer_city'] == 0){echo "none";} else {echo $this->m_customer->getCityById($data['customer_city'],$data['customer_country']);} ?>
                    <!-- <input class="span12" style="border: none; background: none;" name="username" value="<?php //echo !empty($data['city_id'])?$data['city_id']:""; ?>" disabled /> -->
                    <?php echo $this->dropdown->dropdown($listCity, 'city', 'id', $data['customer_city'], array("name" => "receiver_city_id", "class" => "span12", "id" => "receiver_cities")) ?>
                </div>
                <label class="control-label" for="normal">Zipcode:</label>

                <div class="controls controls-row">
                    <input id="zipcode" class="span12" style="border: none; background: none;" name="zipcode" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                           value="<?php echo !empty($data['customer_zipcode']) ? $data['customer_zipcode'] : ""; ?>"
                           disabled/>
                    <p id="zipcodeerror" style="color:red"></p>
                </div>

                <label class="control-label" for="normal">Email:</label>

                <div class="controls controls-row">
                    <input id="email" class="span12" style="border: none; background: none;" name="email" maxlength="70"
                           value="<?php echo !empty($data['customer_email']) ? $data['customer_email'] : ""; ?>"
                           disabled/>
                    <p id="emailerror" style="color:red"></p>
                </div>
                <label class="control-label" for="normal">Phone:</label>

                <div class="controls controls-row">
                    <input id="phone" class="span12" style="border: none; background: none;" name="phone" maxlength="20" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                           value="<?php echo !empty($data['customer_phone']) ? $data['customer_phone'] : ""; ?>"
                           disabled/>
                    <p id="phoneerror" style="color:red"></p>
                </div>

                <label class="control-label" for="normal">Create Date:</label>

                <div class="controls controls-row">
                    <span
                        class="control-label"><?php echo !empty($data['customer_date']) ? date('d/m/Y', $data['customer_date']) : ""; ?></span>
                </div>

                <!--  <label class="control-label" for="normal">Status:</label>
                    <div class="controls controls-row">
                      <input class="span12" style="border: none; background: none;" name="username" value="<?php echo !empty($data['name']) ? $data['name'] : ""; ?>" type="text"/>
                    </div> -->

                <!-- <div class="control-group">
                    <label class="control-label" for="normal">Avatar:</label>
                    <div class="controls controls-row">
                        <?php
                if (empty($data['avatar'])) {
                    echo '<img src="' . base_url() . 'uploads/thumb_noimage.png" />';
                } else {
                    echo '<img src="' . base_url() . 'uploads/avatar/thumb_' . $data['avatar'] . '" style="padding:3px; border:1px solid #ccc;" />';
                }
                ?>
                    </div>
                  </div>
                   -->

            </form>

        </div>
        <!-- End .widget-content -->
    </div>
    <!-- End .widget -->
</div>
<div class="span8">
    <div class="page-header"><h4>History</h4></div>
    <?php foreach ($receiver_list as $key => $data1) { ?>
        <table width="100%">
            <tr>
                <td colspan="2"><a
                        href="<?php echo base_url() . 'admin/customer/deleteConsignee?sender=' . $this->uri->segment(4) . '&receiver=' . $data1['consignee_id'] ?>"
                        class="btn"><i class="icon20  i-remove-5"></i>Delete This Consignee</a></td>
            </tr>
            <tr>
                <td width="50%" >
                    <div >
                        <ul>
                            <li><h4><span class="red">Consignee Name:</span> <?= $data1['consignee_name'] ?></h4></li>
                            <li><h4><span class="red">Phone:</span> <?= $data1['consignee_phone'] ?></h4></li>
                            <li><h4><span class="red">Address:</span> <?= $data1['consignee_address'] ?></h4></li>
                            <li><h4><span class="red">Country:</span> <?php echo ($data1['consignee_country']=='vn') ? 'Việt Nam' : ""; echo ($data1['consignee_country']=='us') ? 'USA' : ""; ?></h4></li>
                            <li><h4><span
                                        class="red">States:</span> <?= $this->m_customer->getStateByCode($data1['consignee_state'], $data1['consignee_country']); ?>
                                </h4></li>
                            <li><h4><span
                                        class="red">City:</span>  <?php echo $this->m_customer->getCityByIdCountry($data1['consignee_city'], $data1['consignee_country']); ?>
                                </h4></li>
                            <li><h4><span class="red">Zipcode:</span> <?= $data1['consignee_zipcode'] ?></h4></li>

                            <li><h4><span class="red">Email:</span> <?php echo $data1['consignee_email']; ?></h4></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <!-- <a href="<?php echo base_url() . 'admin/customer/index'; ?>" class="btn ">Back</a> -->
                        <a href="<?php echo base_url() . 'admin/order/addonly?sender=' . $this->uri->segment(4) . '&consignee=' . $data1['consignee_id'] ?>"
                           class="btn">Create New Order For This Consignee</a>
                        <a href="<?php echo base_url() . 'admin/customer/editreceiver?sender=' . $this->uri->segment(4) . '&receiver=' . $data1['consignee_id'] ?>"
                           class="btn">Edit</a>

                        <!-- <a href="<?php echo base_url() ?>admin/order/make" class="btn">Edit</a>  -->
                        <!-- <a title="Delete" href="<?php echo base_url() . 'admin/customer/delete/' . $this->uri->segment(4); ?>"  class="btn" onclick="return alert(\'Are You Sure?\');">delete</a>     -->
                    </div>
                </td>
                <td >
                    <?php foreach ($this->m_customer->getOrderById1($data1['consignee_id']) as $num => $order) { ?>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Box(s)</th>
                                <th>LBS</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="center"><?php echo $order['order_id'] ?></td>
                                <td class="center"><?php echo $order['order_box'] ?></td>
                                <td class="center"><?php echo $order['order_ibs'] ?></td>
                                <td class="center"><?php echo $order['order_sum_price'] ?></td>
                                <td class="center"><?php if ($order['order_status_id'] == 0) {
                                        echo "stock";
                                    } else {
                                        echo $this->m_customer->getOrderStatusById($order['order_status_id']);
                                    } ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Shipment Type</th>
                                <th>Payment Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="center"><?php echo $this->m_customer->getShipmethod($order['type_ship_id']) ?></td>
                                <td class="center"><?php echo $this->m_customer->getPaymethod($order['type_payment_id']) ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Shipment Charge</th>
                                <th>Insurance 3% Fee</th>
                                <th>Other Charge</th>
                                <th>Packing Fee</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="center"><?php echo $order['type_ship_id'] ?></td>
                                <td class="center"><?php echo $order['order_insurance_fee'] ?></td>
                                <td class="center"><?php echo $order['order_other_charge'] ?></td>
                                <td class="center"><?php echo $order['order_packing_fee'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Descriptions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="center"><?php echo $order['order_message'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <!--                        <table class="table table-bordered"> -->
                        <!--                        <thead> -->
                        <!--                        <tr> -->
                        <!--                          <th>Note</th>            -->
                        <!--                        </tr> -->
                        <!--                        </thead> -->
                        <!--                          <tbody> -->
                        <!--                            <tr>-->
                        <!--                              <td class="center">--><?php //echo $order['note'] ?><!--</td>                                    -->
                        <!--                            </tr>-->
                        <!--                          </tbody> -->
                        <!--                        </table>   -->
                    <?php } ?>
                </td>
            </tr>
        </table>
        <hr>
    <?php } ?>
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
            if(checkvalidate(fullname,address,zipcode,email,phone))
            {
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
            }
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

        function checkvalidate(fullname,address,zipcode,email,phone)
        {
            var txtfullname='';
            var txtaddress='';
            var txtzipcode='';
            var txtemail='';
            var txtphone='';
            var error=0;
            if(fullname=="")
            {
                txtfullname='Fullname is required.';
                error+=1;
            }
            if(address=="")
            {
                txtaddress='Address is required.';
                error+=1;
            }
            if(zipcode=="")
            {
                txtzipcode='Zipcode is required.';
                error+=1;
            }
            if(email!="")
            {
                var re = /\S+@\S+\.\S+/;
                if (re.test(email)==false) {
                    txtemail='Not a valid e-mail address';
                    error+=1;
                }
            }
            if(phone=="")
            {
                txtphone='Phone is required.';
                error+=1;
            }
            $("#fullnameerror").text(txtfullname);
            $("#addresserror").text(txtaddress);
            $("#zipcodeerror").text(txtzipcode);
            $("#emailerror").text(txtemail);
            $("#phoneerror").text(txtphone);
            if(error>0)
            {
                return false;
            }
            return true;
        }
    });
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>