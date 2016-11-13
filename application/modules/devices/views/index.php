<?php $this->load->view('toolbar'); ?>
<div class="row-fluid"> 
	<div class="span6"> 
		<div class="page-header"><h4></h4></div> 
			<table class="table table-condensed"> 
			<thead> 
				<tr> 
					<th>ID</th> 
					<th>Devices ID</th> 
					<th>Devices Name</th> 
					<th></th>
				</tr> 
			</thead> 
			<tbody> 				
				<?php foreach ($devices as $key => $device) {?>
				<form action="<?=base_url()?>admin/devices/switchStatus" method="GET">
					<tr>
						<td><?=$device['id']?></td>					
						<td><?=$device['device_id']?></td>					
						<td><?=$device['device_name']?></td>
						<td><a href="<?=base_url()?>devices/del_device?id=<?=$device['device_id']?>"><i class = "icon16 i-remove-3 btn"></i></a></td>					
						
						
					</tr>
				</form>
				<?php } ?>
			</tbody> 
			</table> 

			<form class="form-horizontal span12" action="<?=base_url()?>devices/add_device" method="GET">
				<div class="input-append"> 
					<input name="id" type="text" class="span12" placeholder="Device ID"> 
					<input name="name" type="text" class="span7" placeholder="Device Name">
					<input type="submit" value="Active" class="btn btn-medium" >
				</div>
			</form>
	</div><!-- End .span6 --> 
	<div class="span6"> 

	</div>

</div>