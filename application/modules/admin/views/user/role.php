<div class="row-fluid">
	<div class="span12"> 
	<form action="<?php echo base_url().'admin/user_action_role/addrole' ?>" method="get">
		<table class="table table-condensed table-hover" id="table"> 
			<thead> 
				<tr> 
					<th class="center">NO.</th> 
					<th class="center">User Name</th> 
					<th class="center">Default Link</th>
					<th class="center">Notes</th>
					
					<th class="center">Actions</th>
				</tr> 
			</thead> 
			<tbody> 				
				<?php foreach ($user_role as $key => $role) {?>
					<tr>
						<td class="center"><?php echo $key ?></td>
						<td class="center"><?php echo $role['user_position_name'] ?></td>
						<td class="center">
							<select id="router<?=$role['user_position_id'] ?>">
								<?php foreach ($routers as $key => $router){?>
									<option value="<?php echo $router['user_router_link'] ?>" <?php if($router['user_router_link'] == $role['default_router']) echo "selected" ?>
									><?=$router['user_router_name'] ?></option>
								<?php } ?>
							</select>
							<script type="text/javascript">							
								$("#router<?=$role['user_position_id'] ?>").on("change",function  () {
									$.ajax({
										url: '<?=base_url() ?>admin/user/routerA',
										type: 'GET',
										data: {router: $(this).val(),id: <?=$role['user_position_id'] ?>},
									})
									.done(function(data) {
										alert("Update success!!!")
									})								
								})	
							</script>
						</td>					
						<td class="center">
						<?php 
						if(empty($role['user_position_notes'])){
							echo 'none';
						} else {
						echo $role['user_position_notes']; 
						}?></td>
						<td class="center">
							<div class="btn-group">
								<!-- <a href="" class="btn"><i class="i-pencil-5"></i></a> -->
								<a href="<?php echo base_url().'admin/user_action_role/delete?id='.$role['user_position_id'] ?>" class="btn tip"  ><i class="icon16 i-remove"></i></a>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody> 
		</table> 
		<hr>
		<tr><td></td></tr>
		
	</form>
	</div>
</div>
<div class="row-fluid">
	<div class="span12"> 
		<div class="btn-group pull-right">
			<a  class="btn" id="addrow"><i class="i-plus-circle-2"></i> Add</a>
		</div>
	</div>
</div>

<script type="text/javascript">
$("#addrow").on("click",function () {
	$("#table").append(
		'<tr>'+
		'<td >' + '&nbsp;' + '</td>' +
		'<td class="center">' + '<input type="text" class="span10" name="name" required/>' + '</td>' +
		'<td class="center">' + '<textarea class="span12" name="note" ></textarea>' + '</td>' +
		'<td class="center">' + '<input type="submit" class="btn" value="add"/>' + '</td>' +
		'</tr>'
		)
	$("#addrow").hide();
	$("#cancel").show();
})

</script>