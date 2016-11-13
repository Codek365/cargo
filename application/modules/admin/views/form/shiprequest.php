<!DOCTYPE html>
<html>
<head>
	<title>Shipping request form</title>
	<link href="<?php echo base_url().'public/admin_layout/css/icons.css';?>" rel="stylesheet" />
</head>
<body>
<?php if($this->uri->segment(3) != "printForm") {
	$this->load->view('admin/form/jump');
	}
?>
<style type="text/css">
	.wrap{

		font: arial,verdana,serif;
		width: 900px;
		height: 1280px;
		margin-left: auto;
		margin-right: auto;
		padding: 20px;
		background: #FFF url(<?php echo base_url() ?>public/admin_layout/images/invoice.jpg) no-repeat center center;
		background-size: 80%;
	}
	.wrap2{
		font: arial,verdana,serif;
		width: 900px;
		margin-left: auto;
		margin-right: auto;
		padding: 0px;
		background: #FFF url(<?php echo base_url() ?>public/admin_layout/images/invoice.jpg) no-repeat center center;
		background-size: 80%;
	}

	.border {
		border: 1px solid #000;
	}

	.border-nl {
		border: 1px solid #000;
		border-left: none; 
	}

	.border-nt {
		border: 1px solid #000;
		border-top: none; 
	}

	.border-ntl {
		border: 1px solid #000;
		border-top: none;
		border-left: none; 
	}

	.border-b {

		border-bottom: 1px solid #000;

		

	}

	.border-bt {

		border-bottom: 1px solid #000;

		border-top: 1px solid #000;

	}

	.border-br {

		border-bottom: 1px solid #000;

		border-right: 1px solid #000;

	}

	.border-bl {

		border-bottom: 1px solid #000;

		border-left: 1px solid #000;

	}

	.border-l {

		border-left: 1px solid #000;		

	}

	.border-t {

		border-top: 1px solid #000;		

	}

	.border-r {

		border-right: 1px solid #000;		

	}

	.border-tr {

		border-top: 1px solid #000;	

		border-right: 1px solid #000;			

	}

	.border-tl {

		border-top: 1px solid #000;	

		border-left: 1px solid #000;			

	}

	.border-lr {

		border-right: 1px solid #000;	

		border-left: 1px solid #000;			

	}

	.tracking{

		height: 70px;

		/*width: 50%;*/

		/*margin-left: 250px;*/

		text-align: center;

		margin-top: -20px;

		right: 0 



	}

	.pl-left{

		padding-left: 10px;

	} 

	.under{

		text-decoration: underline;

	}

	.padding{

		padding: 5px;

	}

	.center{

		text-align: center;

	}

	.tleft{

		text-align: left;

	}

	.fluid{

		width: 100%;

	}

ul.a {list-style-type: circle;}

ul.b {list-style-type: square;}

ol.c {list-style-type: upper-roman;}

ol.d {list-style-type: lower-alpha;}

p{

	line-height: 20px !important;
	margin-top: 5px;
	margin-bottom:5px;

}



div.checker, div.checker span, div.checker input{

	/*width: 10px;*/

	height: 13px;

	margin-top: -5px

}

[class^="i-"], [class*=" i-"]{

	vertical-align: top;

}

ul,ol {

  margin: 0 0 0px 25px;

}

li {margin-bottom:0px;}

</style>

<meta charset="utf-8">



<div class="wrap" >

	<table border="0" cellpadding="0" cellspacing="0">

		<tr>

			<td colspan="2" width="100%">

				<table width="100%"   cellpadding="0" cellspacing="0">

					<tr>

						<td width="75%">

							<p style="font-size: 17px"><strong>A DONG CARGO</strong></p>

							<p>Office: 14822 Moran Street, suite B, Westminster, California 92683</p>

							<p>Service point:  9896 Bolsa Avenue, Westminster, California 92683</p>

							<!--p>Service point: 14924 Dillow Street, Westminster, California 92683</p-->

							<p>Toll-free: <strong>1(800) 651-3132 </strong>– Phone: <strong>1(714) 657-3132</strong> – Fax: <strong>1(866)-537-7579</strong></p>

						</td>

						<td>

							<div  class="border tracking">
							<span style="float:left; margin: 10px 10px 10px 25px">
							<b>Tracking Number</b><br>

							    <?php if(!empty($_GET['id'])) {
							    	echo $this->system->field('track_prefix').$_GET['id'].'</span>';} 
							    	if(!empty($id)){
							    		if(file_exists('./capcha/'.$id.'.png')){
							    			echo '<img style="float:right; margin-top:5px; " src="'.base_url().'capcha/'.$id.'.png" />';
							    		}
							    	}
							    ?>
							   <div style="clear:both"></div>
							</div>

						</td>

					</tr>

				</table>

			</td>

		</tr>

		<tr><td colspan="2">&nbsp;</td></tr>

		<tr>

			<td colspan="2" width="100%" >

				<table border="0" cellpadding="10" cellspacing="0" width="100%" >

					<tr>

						<td width="50%" class="border pl-left"><b>SENDER – NGƯỜI GỬI: <?php if(!empty($customer['customer_name'])) {echo $customer['customer_name'];} ?></b></td>

						<td width="50" class="border-nl pl-left" ><b>CONSIGNEE – NGƯỜI NHẬN: <?php if(!empty($consignee['consignee_name'])) {echo $consignee['consignee_name'];} ?></b></td>	

					</tr>

					<tr>

						<td  class="border-nt pl-left ">

							<span class="under">Address – Địa Chỉ:</span>

							<div class="border-b padding">&nbsp;
							<?php if(!empty($customer['customer_address'])) {echo $customer['customer_address'];} ?>
							</div>
							<div class="border-b padding">&nbsp;
							<?php if(!empty($customer['customer_address2'])) {echo $customer['customer_address2'];} ?>
							</div>
							
							<div class="border-b padding">&nbsp;
							<?php if(!empty($zone_customer['city'])) {echo $zone_customer['city'];} ?>
							<?php if(!empty($zone_customer['state'])) {echo ', '.$zone_customer['state'];} ?>
							<?php if(!empty($customer['customer_zipcode'])) {echo ', '.$customer['customer_zipcode'];} ?>
							<?php if(!empty($customer['customer_country_name'])) {echo ', '.$customer['customer_country_name'];} ?>
							</div><!-- States -->
							<br>
						</td>

						<td  class="border-ntl pl-left" >
							<span class="under">Address – Địa Chỉ:</span>
							<div class="border-b padding">&nbsp;
								<?php if(!empty($consignee['consignee_address'])) {echo $consignee['consignee_address'];} ?>
							</div><!-- Address  -->
							<div class="border-b padding">&nbsp;
								<?php if(!empty($consignee['consignee_address2'])) {echo $consignee['consignee_address2'];} ?>
							</div><!-- Address  -->

							<div class="border-b padding">&nbsp;
								<?php if(!empty($zone_consignee['city'])) {echo $zone_consignee['city'];} ?>
								<?php if(!empty($zone_consignee['state'])) {echo ', '.$zone_consignee['state'];} ?>
								<?php if(!empty($consignee['consignee_country_name'])) {echo ', '.$consignee['consignee_country_name'];} ?>
								<?php if(!empty($consignee['consignee_zipcode'])) {echo ', '.$consignee['consignee_zipcode'];} ?>
							</div><!-- States -->
							<br>
						</td>
						

					</tr>

					<tr>

						<td class="border-nt pl-left">

							<span class="under">Phone</span>:&nbsp<span><?php if(!empty($customer['customer_phone'])) {echo $customer['customer_phone'];} ?></span>

						</td>

						<td  class="border-ntl pl-left" >

							<span class="under">Phone</span>:&nbsp<span><?php if(!empty($consignee['consignee_phone'])) {echo $consignee['consignee_phone'];} ?></span>

						</td>	

					</tr>

				</table>

			</td>

		</tr>

		<tr>

			<td colspan="2" width="100%">

				<table border="0" cellpadding="10" cellspacing="0" width="100%">

					<tr>

						<td width="10%" class="border-nt pl-left center">

							<span >NO.</span>

						</td>

						<td width="100%" class="border-ntl pl-left center">

							<span >DESCRIPTION – KÊ KHAI HÀNG HÓA</span>

						</td>

						<td width="10%" class="border-ntl pl-left center">

							<span >TOTAL</span>

						</td>

					</tr>
<?php 
if (!empty($_GET['id'])) {
	
$order_detail_list=$this->m_form->loadOrderdetail($_GET['id'])?>
					<tr>

						<td  class="border-nt pl-left center">

							<span >1</span>

						</td>

						<td  class="border-ntl pl-left center">

							<span >
								<?php
									if(!empty($order_detail_list)){
										$c=0;
										$end=count($order_detail_list);
										foreach($order_detail_list as $item){
											if($c==0){
												echo $item['order_detail_description'].'('.$item['order_detail_quantity'].')';
											}else{
												if($c==$end-1){
													echo ', '.$item['order_detail_description'].'('.$item['order_detail_quantity'].')';	
												}else{
													echo ', '.$item['order_detail_description'].'('.$item['order_detail_quantity'].')';	
												}
											}
											$c++;
										}
									}
								?>
							</span>

						</td>

						<td class="border-ntl pl-left center">

							<span ></span>

						</td>

					</tr>
<?php }?>
<!--DESCRIPTION-->
	<tr>

				<td width="10%" class="border-nt pl-left center">

					<span >2</span>

				</td>

				<td width="100%" class="border-ntl pl-left center">

					<span ></span>

				</td>

				<td width="10%" class="border-ntl pl-left center">

					<span ></span>

				</td>

			</tr>
<!--DESCRIPTION-->
<!--DESCRIPTION-->
	<tr>

				<td width="10%" class="border-nt pl-left center">

					<span >3</span>

				</td>

				<td width="100%" class="border-ntl pl-left center">

					<span ></span>

				</td>

				<td width="10%" class="border-ntl pl-left center">

					<span ></span>

				</td>

			</tr>
<!--DESCRIPTION-->
<!--DESCRIPTION-->
	<tr>

				<td width="10%" class="border-nt pl-left center">

					<span >4</span>

				</td>

				<td width="100%" class="border-ntl pl-left center">

					<span ></span>

				</td>

				<td width="10%" class="border-ntl pl-left center">

					<span ></span>

				</td>

			</tr>
<!--DESCRIPTION-->

					
				</table>

			</td>

		</tr>

		<tr>

			<td width="50%">

				<table class="" width="100%" border="0" cellpadding="7" cellspacing="0">

					<tr>

						<td width="50%" class="border-nt  center">

							<span >NUMBER OF BOX (S)</span>

						</td>									

						<td width="50%" class="border-br center">

							<span >WEIGHT (LBS)</span>

						</td>

					</tr>

					<tr>

						<td class="border-nt center" style="border-bottom-color: #fff">

							&nbsp;<b><?php if(!empty($form['order_box'])) {echo $form['order_box'];} ?></b></td>

						<td class="border-r center">

							&nbsp;<b><?php if(!empty($form['order_ibs'])) {echo $form['order_ibs'];} ?></b></td>

					</tr>

					<tr>

						<td class="border-nt" >&nbsp;</td>

						<td class="border-br">&nbsp;</td>

					</tr>				

				</table>

			</td>

			<td width="50%">

				<table class="border-ntl" width="100%" border="0" cellpadding="7" cellspacing="0">

					<tr>

						<td width="100%" colspan="2" class="border-b pl-left center">

							<span >PACKAGE INFORMATION</span>

						</td>									

					</tr>

					<tr>

						<td width="50%" class="border-br tleft">DECLARED VALUE (USD)</td>

						<td class="border-b center">&nbsp; <b><?php if(!empty($form['order_declared_value'])) {echo $form['order_declared_value'];} ?></b></td>

					</tr>

					<tr>

						<td class="border-r tleft">SHIPPING RATE</td>

						<td class="center">&nbsp; <b><?php if(!empty($form['order_shipment_rate'])) {echo $form['order_shipment_rate'];} ?></b></td>

					</tr>

				</table>

			</td>

		</tr>

		<tr>

			<td colspan="2">

				<table class="border-nt" width="100%">

					<tr>

						<td>

							<p style="padding:10px 10px">“I CERTIFY THAT THIS CARGO DOES NOT CONTAIN ANY UNAUTHORIZED EXPLOSIVES, INCENDIARY, OR HAZARDOUS MATERIALS. I CONSENT TO A SEARCH OF THIS CARGO. I AM AWARE THAT THIS ENDORSEMENT AND ORIGINAL SIGNATURE, ALONG WITH OTHER SHIPPING DOCUMENTS, WILL BE RETAINED ON FILE FOR AT LEAST THIRTY DAYS”</p>
							<p style="padding:0 10px">“I AGREE THAT SHIPPING POLICY AT THE BACKSIDE AND A DONG’S STANDARD TERMS APPLY TO THIS SHIPMENT AND A DONG’S ABILITY FOR LOSS OR DAMAGE TO THIS CARGO IS LIMITTED TO ACTUAL VALUE NOT TO EXCEED U.S $100 IF THE VALUE OF THE SHIPMENT IS NOT DECLARED ABOVE. I AUTHORIZED A DONG TO COMPLETE ALL NECESSARY DOCUMENTS TO EXPORT THIS SHIPMENT. I AGREE TO PAY ALL CHARGES IF THE CONSIGNEE REFUSES TO PAY.”</p>
						</td>

					</tr>

				</table>

			</td>

		</tr>

		<tr>

			<td width="100%" colspan="2" >

				<table border="0" cellpadding="10" cellspacing="0" class="" width="100%">					

					<tr>

						<td width="252" class="border-l "></td>

						<td width="252" class="">&nbsp;</td>

						<td width="252" class=""></td>

						<td width="253" class="border-r">&nbsp;</td>

					</tr>

					<tr>

						<td class="border-l "></td>

						<td class="">&nbsp;</td>

						<td class=""></td>

						<td class="border-r">&nbsp;</td>

					</tr>

					<!-- <tr>

						<td class="border-l "></td>

						<td class="">&nbsp;</td>

						<td class=""></td>

						<td class="border-r">&nbsp;</td>

					</tr> -->

					<tr>

						<td class="border-l ">________________________</td>

						<td class="">________________</td>

						<td class="">________________________</td>

						<td class="border-r">________________</td>

					</tr>

					<tr>

						<td class="border-bl ">SHIPPER’S SIGNATURE</td>

						<td class="border-b">DATE</td>

						<td class="border-b ">AGENT’S SIGNATURE</td>

						<td class="border-br">DATE</td>

					</tr>

				</table>	

			</td>			

		</tr>

		

		<tr>

			<td >

				<table border="0" cellpadding="10" cellspacing="0" class="border-nt" width="100%">					

					<tr>

						<td  class="border-b" colspan="3"><center>PAYMENT TYPE</center> </td>					

					</tr>					

					<tr>					

						<td class="border-b">
						<?php if(!empty($form['type_payment_id'])){ ?>
							<?php if($form['type_payment_id']==1){ ?>
							<i class=" i-checkbox-checked-2" style="margin-left:10px"></i>
							<?php } ?>							
						<?php } ?>
						<?php if((empty($form['type_payment_id'])) || $form['type_payment_id']!=1){ ?>
							<i class="i-checkbox-unchecked" style="margin-left:0px"></i>
							<?php } ?>
						<span style="margin-right:0px">CASH</span>	
						</td>

						<td class="border-b">
						<?php if(!empty($form['type_payment_id'])){ ?>
							<?php if($form['type_payment_id']==2){ ?>
							<i class=" i-checkbox-checked-2" style="margin-left:-10px"></i>
							<?php } ?>							
						<?php } ?>
						<?php if((empty($form['type_payment_id'])) || $form['type_payment_id']!=2){ ?>
							<i class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
							<span style="margin-right:0px">CREDIT CARD</span>
						</td>

						<td class="border-b">
						<?php if(!empty($form['type_payment_id'])){ ?>
							<?php if($form['type_payment_id']==3){ ?>
							<i class=" i-checkbox-checked-2"></i>
							<?php } ?>							
						<?php } ?>
						<?php if((empty($form['type_payment_id'])) || $form['type_payment_id']!=3){ ?>
							<i class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
							<span>CHECK</span>
						</td>										

					</tr>							

					<tr>													

						<td><span style="margin-right:5px">SHIPMENT TYPE</span></td>
						<?php if(!empty($form['type_ship_id'])){ ?>
							<td>
							<?php if($form['type_ship_id']==2){ ?>
								<i class=" i-checkbox-checked-2" style="margin-left:-10px"></i>
							<?php } ?>
							<?php if($form['type_ship_id']!=2){ ?>
								<i class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
								<span style="margin-right:0px">AIR</span>
							</td>
							
							<td><?php if($form['type_ship_id']==1){ ?>
								<i class=" i-checkbox-checked-2" style="margin-left:-10px"></i>
							<?php } ?>
							<?php if($form['type_ship_id']!=1){ ?>
								<i class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
							<span>SEA</span>
							</td>
						<?php }else{ ?>
							<td>
								<i class="i-checkbox-unchecked" style="margin-left:-10px"></i><span style="margin-right:20px">AIR</span>
								
							</td>
							<td>
							<i class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<span style="margin-right:20px">SEA</span>
							</td>
						<?php } ?>

					</tr>		

					<tr>

						<td width="100%" class="border-bt" colspan="3">

							<center>DELIVERY TYPE</center>

						</td>			

					</tr>

					<tr>
						<?php if(!empty($form['type_delivery_id'])){?>
							<td>
							<?php if($form['type_delivery_id']==1) {?>
							<i  class="i-checkbox-checked-2" style="margin-left:0px"></i>
							<?php } else {?>
								<i  class="i-checkbox-unchecked" style="margin-left:10px"></i>
							<?php } ?>
							<span style="margin-right:0px">Door-to-Door</span></td>

							<td>
							<?php if($form['type_delivery_id']==2) {?>
							<i  class="i-checkbox-checked-2" style="margin-left:-10px"></i>
							<?php } else {?>
								<i  class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
							<span style="margin-right:0px">Airport Pick-up</span></td>

							<td>
							<?php if($form['type_delivery_id']==3) {?>
							<i  class="i-checkbox-checked-2" style="margin-left:-10px"></i>
							<?php } else {?>
								<i  class="i-checkbox-unchecked" style="margin-left:-10px"></i>
							<?php } ?>
							<span>Vietnam Office</span>
							</td>
						<?php }else{ ?>
							<td>
							<i class="i-checkbox-unchecked" style="margin-left:0px"></i><span style="margin-right:0px">Door-to-Door</span>
							</td>
							<td>
							<i class="i-checkbox-unchecked" style="margin-left:-10px"></i><span style="margin-right:0px">Airport Pick-up</span>
							</td>
							<td>
							<i class="i-checkbox-unchecked" style="margin-left:-10px"></i><span style="margin-right:0px">Vietnam Office</span>
							</td>
						<?php } ?>
					</tr>

				</table>	

			</td>

			<td >

				<table border="0" cellpadding="10" cellspacing="0" class="border-ntl" width="100%">					

					<tr>

						<td width="50%" class="border-br">SHIPMENT CHARGE</td>

						<td width="50%" class="border-b center"><b> <?php if(!empty($form['order_ship_charge'])) {echo $form['order_ship_charge'];} ?></b></td>							

					</tr>

					<tr>

						<td width="50%" class="border-br">INSURANCE 3% FEE</td>

						<td width="50%" class="border-b center"><b> <?php if(!empty($form['order_insurance_fee'])) {echo $form['order_insurance_fee'];} ?></b></td>							

					</tr>

					<tr>

						<td width="50%" class="border-br">OTHER CHARGE</td>

						<td width="50%" class="border-b center"><b> <?php if(!empty($form['order_other_charge'])) {echo $form['order_other_charge'];} ?></b></td>							

					</tr>

					<tr>

						<td width="50%" class="border-br">PACKING FEE</td>

						<td width="50%" class="border-b center"><b> <?php if(!empty($form['order_packing_fee'])) {echo $form['order_packing_fee'];} ?></b></td>							

					</tr>

					<tr>

						<td width="50%" class="border-r">

						<strong>TOTAL (USD)</strong>

						</td>

						<td width="50%" class="center"><b> <?php if(!empty($form['order_sum_price'])) {echo $form['order_sum_price'];} ?></b></td>							

					</tr>

					

				</table>	

			</td>

		</tr>

	</table>

</div><!-- End wrap-->

<br>

<div class="wrap2">
		<p class="center"><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium;text-align: center;font-size:25px;">QUY ĐỊNH GỬI HÀNG </span></strong></p>
		<br>
		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quy định chung về việc nhận gửi bưu phẩm, bưu kiện: </span></strong></p>

		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Hoạt động cung cấp dịch vụ chuyển phát của Á ĐÔNG CARGO (trực thuộc Á ĐÔNG, INC.) tuân thủ theo quy định của luật pháp Hoa Kỳ, nước sở tại, các nước nhận, các pháp lệnh bưu chính và thông lệ quốc tế. Á ĐÔNG CARGO không nhận vận chuyển những vật phẩm, hàng hóa mà nhà nước sở tại cấm lưu thông, cấm kinh doanh, cấm xuất khẩu, hay những vật phẩm, hàng hóa mà nước nhận cấm nhập khẩu.</span></p>



		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">II.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Những mặt hàng cấm gửi: </span></strong></p>
		<span style="margin-lef:0px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theo quy định của liên bang Hoa Kỳ, các loại hàng hóa sau thuộc diện cấm gửi </span>
		<ul>
			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"> Thuốc phiện, các hợp chất từ thuốc phiện, các chất ma túy, các chất kích thích thần kinh. </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Vũ khí, đạn dược, chất nổ, trang thiết bị quân sự.</span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Vật hoặc chất dễ nổ, dễ cháy và các chất gây nguy hiểm mất vệ sinh, gây ô nhiễm môi trường </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Các loại vật phẩm, ấn phẩm, hàng hóa, văn hóa phẩm mà nước nhận cấm lưu thông, cấm kinh doanh, cấm xuất nhập khẩu.</span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Sinh vật sống. 
			</span>
			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Tiền Mỹ Kim, Việt Nam, tiền của các quốc gia khác và các giấy tờ có giá trị như tiền; các loại thẻ chứa tiền. </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Thư trong bưu kiện (thư gửi kèm trong hàng hóa). </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Các loại kim khí quý (vàng bạc, bạch kim,…), các loại đá quý hay các sản phẩm khác chế tạo từ kim khí quý, đá quý. (cấm gửi kể cả gửi trong hàng hóa có khai giá). </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Kiện hàng chứa nhiều hàng hóa, gửi cho nhiều địa chỉ nhận khác nhau. </span>
			</li>
		</ul>
		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">III.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Những mặt hàng gửi có điều kiện:</span></strong></p>

		<ul >
			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Kiện hàng chứa hàng hóa để kinh doanh phải có chứng từ thuế và các chứng từ hợp lệ khác theo quy định của pháp luật.</span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Vật phẩm, hàng hóa xuất khẩu, nhập khẩu thuộc quản lý chuyên nghành phải thực hiện theo quy định của cơ quan quản lý chuyên nghành có thẩm quyền. </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Các vật phẩm, hàng hóa dễ hư hỏng, chất lỏng, chất bột đóng gói phải bảo đảm để không hư hỏng, ô nhiễm bưu phẩm, bưu kiện khác. </span>
			</li>

			<li>
			<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Vật phẩm, hàng hóa gửi trong kiện hàng chuyển qua đường hàng không phải tuân theo những quy định về an ninh hàng không </span>
			</li>
		</ul>


		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">IV.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quyền lợi và trách nhiệm của người gửi: </span></strong></p>
		<ul style="list-style-type:decimal">
			<li>
				<span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Người gửi phải khai báo đúng và đầy đủ thông tin lên mặt trước của phiếu gửi và cung cấp các giấy tờ liên quan. </span>
			</li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Đảm bảo tính hợp pháp của hàng hóa. </span></li>


			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Gói bọc bảo đảm an toàn cho hàng hóa. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Thanh toán đầy đủ mọi khoản cước phí theo quy định của Á ĐÔNG CARGO. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Người gửi có quyền khiếu nại và yêu cầu Á ĐÔNG CARGO bồi thường thiệt hại vật chất theo quy định của Á ĐÔNG CARGO. </span></li>
		</ul>
		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">V.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trách nhiệm của Á ĐÔNG CARGO: </span></strong></p>
		<ul style="list-style-type:decimal">
			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Kiểm tra tính hợp pháp của hàng hóa. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Có quyền từ chối phục vụ nếu phát hiện hàng hóa vi phạm pháp luật. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Bảo đảm tính an toàn của hàng hóa kể từ khi nhận gửi cho đến khi phát cho người có quyền nhận. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Giải quyết khiếu nại và bồi thường theo quy định. </span></li>

		</ul>

		<p><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium"><strong>VI.&nbsp;&nbsp;&nbsp;&nbsp; Miễn trừ trách nhiệm: </strong>Á ĐÔNG CARGO không chịu bồi thường trong các trường hợp sau </span></p>
		<ul style="list-style-type:decimal">

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Trường hợp bất khả kháng như thiên tai, chiến sự, hãng hàng không hoặc tàu bị trể hay hủy chuyến. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Hàng hóa bị hư hỏng, mất mát do các cơ quan nhà nước có thẩm quyền tịch thu. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Hàng hóa không phát được do lỗi của người gửi. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Khiếu nại quá thời hiệu quy định. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Những hàng hóa dễ vỡ, hàng hóa thuộc dạng chất lỏng, hóa chất; những hàng hóa bị hư hại do đặc tính tự nhiên của chúng. </span></li>

			<li><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">Những thiệt hại gián tiếp phát sinh do việc cung ứng dịch vụ không đảm bảo chất lượng gây ra. </span></li>

		</ul>

		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">VII.&nbsp;&nbsp;&nbsp;&nbsp;Quy định về việc phát và xử lý hàng hóa:</span></strong></p>



		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Nếu không có yêu cầu đặc biệt, hàng hóa chuyển phát sẽ được Á ĐÔNG CARGO phát trực tiếp tại địa chỉ người nhận, tối đa 2 lần. Mọi trường hợp không phát được do sai, thiếu thông tin về địa chỉ nhận mà người gửi không thể bổ sung thông tin chính xác trong 48 giờ sau khi đã được thông báo, Á ĐÔNG CARGO sẽ lưu hàng hóa tại kho và người nhận sẽ phải tự đến tại kho để nhận hàng này. </span></p>



		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Á ĐÔNG CARGO chỉ thực hiện việc đồng kiểm nội dung bên trong hàng hóa khi có thỏa thuận đặc biệt với người gửi hoặc khi hàng hóa có dấu hiệu bị móp méo, suy suyễn tại thời điểm phát hàng. Với dịch vụ thanh toán đầu nhận (người nhận trả phí khi nhận hàng), mặc định Á ĐÔNG CARGO sẽ thu cước người gửi trong trường hợp người nhận từ chối thanh toán cước phí này. </span></p>

		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Với dịch vụ thanh toán đầu nhận (người nhận trả phí khi nhận hàng), mặc định Á ĐÔNG CARGO sẽ thu cước người gửi trong trường hợp người nhận từ chối thanh toán cước phí này.</span></p>



		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">VIII.&nbsp;&nbsp;&nbsp;Quy định về khối lượng và kích thước: </span></strong></p>



		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Không giới hạn về trọng lượng, giữa trọng lượng thực và trọng lượng thể tích của hàng hóa, trọng lượng nào lớn hơn sẽ được chọn để tính cước. </span></p>



		<p><strong><span style="color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">IX. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quy định về việc khiếu nại và xử lý khiếu nại: </span></strong></p>



		<p style="margin-left:50px;"><span style="margin-left:10px;color:rgb(0, 0, 0); font-family:times new roman; font-size:medium">    Thời hiệu khiếu nại đối với hàng hóa chuyển về Việt Nam là 01 tháng. Với các dịch vụ gửi trong nước (có đầy đủ chứng nhận gửi), thời gian khiếu nại là tối đa là 6 tháng. Đối với hàng hóa quốc tế, Á ĐÔNG CARGO áp dụng thời hạn khiếu nại theo quy định của các dịch vụ vận chuyển mà Á ĐÔNG CARGO đang sử dụng. Mọi khiếu nại về việc mất mát, suy suyễn hay hư hỏng nội dung của hàng hóa chỉ được chấp nhận tại thời điểm phát hàng, kèm theo biên bản hiện trạng có xác nhận của nhân viên Á ĐÔNG CARGO. Sau khi hàng hóa đã được giao, Á ĐÔNG CARGO không chịu trách nhiệm về các khiếu nại phát sinh sau đó. Tất cả yêu cầu bồi thường phải được gửi bằng văn bản đến trụ sở hoặc văn phòng đại diện của Á ĐÔNG CARGO trong vòng 30 ngày kể từ ngày phát sinh sự việc.</span></p>
	

</div>
</body>
</html>

