<div class="page-header">
	<h2>Daily Report: <?php echo $today;?></h2>
</div>
<table class="table table-bordered">
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
					<th>#</th> 
					</tr> 
				  </thead>
				<tbody>
				<?php $stt=1;?>
				<?php foreach($info as $item){?> 
				<tr> 
					<td class=><?php echo $stt;$stt++;?></td>
					<td><?php echo $item["user_fullname"]?></td> 
					<td><?php echo $item["total_order"]?></td> 
					<td><?php echo "$ ".$item["total_shipment_charge"].".00"?></td> 
					<td><?php echo "$ ".$item["total_insurance_charge"].".0"?></td> 
					<td><?php echo "$ ".$item["total_other_charge"].".00"?></td> 
					<td><?php echo "$ ".$item["total_packing_fee"].".00"?></td> 
					<td><?php echo "$ ".$item["total"].".00"?></td>
					<td><a target="_blank" href="<?php echo base_url().'admin/report/detail/'.$item["user_id"]."/".$other_day;?>">Detail</a></td> 
				</tr> 
					<?php 
					}
					 ?>
				</tbody> 
				</table>