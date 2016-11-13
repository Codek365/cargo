<?php $this->load->view('toolbar'); ?>
<div class="row-fluid"> 
	<div class="span12"> 
		<div class="page-header"> 
		<h4></h4> </div> 
			<table class="table table-condensed"> 
			<thead> 
				<tr> 
					<th>Created date</th> 
					<th>Devices ID</th> 
					<th>Token</th> 
					<th>User Name</th>
					<!-- <th>Action</th> -->
				</tr> 
			</thead> 
			<?php foreach ($history as $data) {?>
				<tr>
					<td><?=$data['create_date']?></td>
					<td><?=$data['device_id']?></td>
					<td><?=$data['token']?></td>
					<td><?=$data['user_name']?></td>
					<!-- <td><a href="<?php echo base_url().'admin/devices/history?del='.$data['id'] ?>" class="btn icon20 i-close-4 left"></a></td> -->
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>

	
