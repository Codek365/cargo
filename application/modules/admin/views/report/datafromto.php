<table class="table table-bordered " style="border-collapse:collapse">
	<thead> 
	<tr>
		<th rowspan="2">Position</th>
		<th colspan="4">Sub-Total</th>
		<th rowspan="2">Total charge (USD)</th>
		<th colspan="2">Package Info</th>
	</tr> 
	<tr>
		
		<th>Shipment charge</th>
		<th>Insurance fee</th>
		<th>Other charge</th>
		<th>Packing fee</th>
		<th>Box(s)</th>
		<th>Weight (lbs)</th>
	</tr> 
	  </thead>
	<tbody>
	 <?php foreach($all as $all_item){?> 
	<tr> 
		<td style="text-align:left !important;"><?php 
		foreach($user_pos as $user_pos_item){
			if($user_pos_item["user_position_id"] == $all_item["user_position"])
			echo $user_pos_item["user_position_name"];
		}
		 ?></td>
		<td><?php echo "$ ".$all_item["total_ship_charge"].".00";?></td> 
		<td><?php echo "$ ".$all_item["total_insurance_charge"].".00"?></td> 
		<td><?php echo "$ ".$all_item["total_other_charge"].".00"?></td> 
		<td><?php echo "$ ".$all_item["total_packing_fee"].".00"?></td> 
		<td><?php echo "$ ".$all_item["total"].".00"?></td> 
		<td><?php echo $all_item["order_box"]?></td> 
		<td><?php echo $all_item["order_ibs"]?></td> 
	</tr> 
	<?php 
		}
		 ?>
	<?php if(!is_null($all_user_fromto["total_ship_charge"])){?>
	<tr class="blue"> 
		<td style="text-align:left !important;;">Total</td>
		<td><?php echo "$ ".$all_user_fromto["total_ship_charge"].".00";?></td>
		<td><?php echo "$ ".$all_user_fromto["total_insurance_charge"].".00";?></td>
		<td><?php echo "$ ".$all_user_fromto["total_other_charge"].".00";?></td>
		<td><?php echo "$ ".$all_user_fromto["total_packing_fee"].".00";?></td>
		<td><?php echo "$ ".$all_user_fromto["total"].".00";?></td>
		<td><?php echo $all_user_fromto["order_box"];?></td>
		<td><?php echo $all_user_fromto["order_ibs"];?></td>
	</tr>
	<?php }?>
	</tbody> 
	</table>