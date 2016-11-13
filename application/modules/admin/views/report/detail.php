<style type="text/css">
	.table th,.table td{
	text-align: center !important;
}
</style>
<?php $this->load->view('toolbar'); ?>
<div class="row-fluid">
	<div class="span12">
		  <div class="widget plain">
			<div class="widget-title">
				<h4>
				<?php if ($user_E == 1 || $user==1) {?>
				<a href="<?php echo $link_back;?>" class="btn" style="color:#686866;margin-left:15px;padding-left:0px;">
				<i class="icon20 i-arrow-left-6"></i> BACK TO MAIN REPORT
				</a>
				<?php } ?>
				</h4>
				<a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
		    <div class="widget-content otherday center" style="padding-top:0px;"> 
			<div class="page-header">
				<h2>Daily Report</h2>
			</div>
				<table class="table table-bordered" >
				<tr> 
					<td>User: <?php echo $user_day[0]["user_username"]; ?></td>
					<?php foreach($user_pos as $user_pos_item){
							if($user_pos_item["user_position_id"] == $user_day[0]["user_position"])
								echo '<td>Position: '.$user_pos_item["user_position_name"].'</td> ';
					 }?>
					<!-- <td>Date: September 24.2014</td>  -->
					<td>Date: <?php echo $today;?></td>
					
				</tr> 
				</table>
				<table class="table table-bordered" >
				
				<thead> 
				<tr>
					<th colspan="5">Sub-Total</th>
					<th rowspan="2">Total charge (USD)</th>
					<th colspan="2">Package Info</th>
					<th rowspan="2">Payment type</th> 
					<th rowspan="2">Shipment Type</th>
					<th rowspan="2">Service Type</th>
				</tr> 
				<tr>
					<th>Order number</th>
					<th>Shipment charge</th>
					<th>Insurance fee</th>
					<th>Other charge</th>
					<th>Packing fee</th>
					<th>Box(s)</th>
					<th>Weight (lbs)</th>
				</tr> 
				  </thead>
				<tbody>
				<?php foreach($user_day as $item){?> 
				<tr> 
					<td><?php echo $system["tracking_code_prefix"].$item["order_id"]?></td>
					<td><?php echo "$ ".$item["order_ship_charge"].".00";?></td> 
					<td><?php echo "$ ".$item["order_insurance_fee"].".00"?></td> 
					<td><?php echo "$ ".$item["order_other_charge"].".00"?></td> 
					<td><?php echo "$ ".$item["order_packing_fee"].".00"?></td> 
					<td><?php echo "$ ".$item["total"].".00"?></td> 
					<td><?php echo $item["order_box"]?></td> 
					<td><?php echo $item["order_ibs"]?></td> 
					<td><?php 
					foreach($type_payment as $type_payment_item){
					if($type_payment_item["type_payment_id"] == $item["type_payment_id"])
						echo $type_payment_item["type_payment_name"];
					}
					?></td> 
					<td><?php 
					foreach($type_ship as $type_ship_item){
					if($type_ship_item["type_ship_id"] == $item["type_ship_id"])
						echo $type_ship_item["type_ship_name"];
					}
					?></td> 
					<td><?php 
					foreach($type_delivery as $type_delivery_item){
					if($type_delivery_item["type_delivery_id"] == $item["type_delivery_id"])
						echo $type_delivery_item["type_delivery_name"];
					}
					?></td>
				</tr> 
				<?php 
					}
					 ?>
				<tr class="blue"> 
					<td>Grand total</td>
					<td><?php echo "$ ".$user_day_sum["total_shipment_charge"].".00";?></td>
					<td><?php echo "$ ".$user_day_sum["total_insurance_charge"].".00";?></td>
					<td><?php echo "$ ".$user_day_sum["total_other_charge"].".00";?></td>
					<td><?php echo "$ ".$user_day_sum["total_packing_fee"].".00";?></td>
					<td><?php echo "$ ".$user_day_sum["total"].".00";?></td>
					<td><?php echo $user_day_sum["order_box"];?></td>
					<td><?php echo $user_day_sum["order_ibs"];?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				</tbody> 
				</table>
			</div><!-- End .widget-content -->
			<h4>
			<?php if ($user_E == 1 || $user==1) {?>
				<a href="<?php echo $link_back;?>" class="btn" style="color:#686866;margin-left:15px;padding-left:0px;">
				<i class="icon20 i-arrow-left-6"></i> BACK TO MAIN REPORT
				</a>
				<?php } ?>
			</h4>
		  </div>

		  <br/>
	 </div>
	</div>