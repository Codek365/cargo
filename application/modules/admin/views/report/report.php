<div class="row-fluid">
	<div class="span12"> 
		<div class="widget plain">
			<div class="widget-title">
				<i class="icon20 i-mail-send"></i>
				<h4>USERS</h4>
				<a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
		    <div class="widget-content center" style="padding-top:0px;"> 
			<div class="page-header">
				<h2><?php echo $today;?></h2>
			</div>
				<table class="table table-condensed table-hover">
				<thead> 
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Total Order </th>
					<th>Total Shipment Charge </th>
					<th>Total Insurance Charge</th>
					<th>Total Other Charge</th>
					<th>Total Packing Fee</th>
					<th>Total</th> 
					</tr> 
				  </thead>
				<tbody>
				<?php $stt=1;?>
				<?php foreach($info as $item){?> 
				<tr> 
					<td class=><?php echo $stt;$stt++;?></td>
					<td><?php echo $item["user_username"]?></td> 
					<td><?php echo $item["total_order"]?></td> 
					<td><?php echo '$ '.$item["total_shipment_charge"].".00"?></td> 
					<td><?php echo '$ '.$item["total_insurance_charge"].".00"?></td> 
					<td><?php echo '$ '.$item["total_other_charge"].".00"?></td> 
					<td><?php echo '$ '.$item["total_packing_fee"].".00"?></td> 
					<td><?php echo '$ '.$item["total"].".00"?></td> 
				</tr> 
					<?php 
					}
					 ?>
				</tbody> 
				</table>
			</div><!-- End .widget-content -->
		  </div><!-- End .widget -->
		  <br/>
		  <div class="widget plain">
			<div class="widget-title">
				<i class="icon20 i-mail-send"></i>
				<h4>ALL USER</h4>
				<a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
		    <div class="widget-content center" style="padding-top:0px;"> 
			<div class="page-header">
				<h2>REPORT</h2>
			</div>
				<table class="table table-condensed table-hover">
				<thead> 
				<tr>
					<th>Day</th>
					<th>Total Order </th>
					<th>Total Shipment Charge </th>
					<th>Total Insurance Charge</th>
					<th>Total Other Charge</th>
					<th>Total Packing Fee</th>
					<th>Total</th> 
					</tr> 
				  </thead>
				<tbody>
				<tr> 
					<td><?php echo $yesterday;?></td> 
					<td><?php echo $all_user_yesterday["total_order"]?></td> 
					<td><?php echo '$ '.$all_user_yesterday["total_shipment_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_yesterday["total_insurance_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_yesterday["total_other_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_yesterday["total_packing_fee"].".00"?></td> 
					<td><?php echo '$ '.$all_user_yesterday["total"].".00"?></td> 
				</tr> 
				<tr> 
					<td><?php echo $today;?></td> 
					<td><?php echo $all_user_today["total_order"]?></td> 
					<td><?php echo '$ '.$all_user_today["total_shipment_charge"].".00 "?></td> 
					<td><?php echo '$ '.$all_user_today["total_insurance_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_today["total_other_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_today["total_packing_fee"].".00"?></td> 
					<td><?php echo '$ '.$all_user_today["total"].".000 $"?></td> 
				</tr> 
				<tr> 
					<td><?php echo $tomorrow;?></td> 
					<td><?php echo $all_user_tomorrow["total_order"]?></td> 
					<td><?php echo '$ '.$all_user_tomorrow["total_shipment_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_tomorrow["total_insurance_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_tomorrow["total_other_charge"].".00"?></td> 
					<td><?php echo '$ '.$all_user_tomorrow["total_packing_fee"].".00"?></td> 
					<td><?php echo '$ '.$all_user_tomorrow["total"].".00"?></td> 
				</tr> 
				</tbody> 
				</table>
			</div><!-- End .widget-content -->
		  </div>
	 </div>
	</div>