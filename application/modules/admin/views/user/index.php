<div class="row-fluid">
	<div class="span12"> 
	<!-- <div class="page-header"> 
	<h4>Condensed table</h4> 
	</div>  --> 
		<table class="table table-condensed table-hover" id="myTable"> 
			<thead> 
				<tr> 
					<th class="center">NO.</th> 
					<th class="center">User Name</th> 
					<th class="center">Email</th> 
					<!-- <th class="center">Registration Date</th>  -->
					<!-- <th class="center">Last Login</th> -->
					<th class="center">Position</th>
					<th class="center">Actions</th>
				</tr> 
			</thead> 
			<tbody> 				
				<?php foreach ($user_list as $key => $user) {?>
					<tr>
						<td class="center">
						<img src="<?php if(empty($user['user_avatar'])) echo base_url().'uploads/avatar/thumb_noavatar.png'; else echo base_url().'uploads/avatar/thumb_'.$user['user_avatar']; ?>" style="width:120px; height:120px; padding:3px; border:1px solid #ccc;">
						</td>
						<td class="center"><?php echo $user['user_username'] ?></td>
						<td class="center"><?php echo $user['user_email'] ?></td>
						<!-- <td class="center"><?php echo $user['user_registration_date'] ?></td> -->
						<!-- <td class="center"><?php echo $user['user_last_login'] ?></td> -->
						<td class="center">
							<select id="role<?php echo $user['user_id'] ?>">
								<?php foreach ($user_role as $key => $role) {?>
									<option value="<?php echo $role['user_position_id'] ?>" <?php if($user['user_position_id'] == $role['user_position_id']) echo "selected" ?>
									><?php echo $role['user_position_name'] ?></option>			
								<?php } ?>
							</select>
							<script type="text/javascript">							
								$("#role<?php echo $user['user_id'] ?>").on("change",function  () {
									$.ajax({
										url: '<?php echo base_url() ?>admin/user/roleA',
										type: 'GET',
										data: {role: $(this).val(),id: <?php echo $user['user_id'] ?>},
									})
									.done(function(data) {
										alert("Update success!!!")
									})								
								})	
							</script>
						</td>
						<td class="center">
								<a href="" class="btn"><i class="i-pencil-5"></i></a>
								<a href="<?php echo base_url().'admin/user/delete?id='.$user['user_id'] ?>" class="btn tip"  ><i class="icon16 i-remove"></i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody> 
		</table> 
		
	</div>
</div>
<hr>
<form action="<?php echo base_url().'admin/user/adduser' ?>" method="get"  id="validate" class="form-horizontal">
<div class="row-fluid">
	<div class="row-fluid">
		<div class="span12"> 
			<label>Add New User</label>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12"> 
			<div class="span3">		
				<input type="text" placeholder="user name" name="username" class="required span12" required/>
			</div>
			<div class="span3">		
				<input type="text" placeholder="full name" name="fullname" class="required span12" required/>
			</div>
			<div class="span3">
				<select name="gender">
					<option value="1">Male</option>	
					<option value="0">Female</option>			
				</select>		
			</div>
			
			
			
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12"> 
			<div class="span3">
				<input type="text" placeholder="password" name="pass" class="required span12" required/>
			</div>
			<div class="span3">
				<input type="text" placeholder="email"  name="email" class="required email span12" required/>
			</div>
			<div class="span3">
				<select name="role">
					<?php foreach ($user_role as $key => $role) {?>
					<option value="<?php echo $role['user_position_id'] ?>"><?php echo $role['user_position_name'] ?></option>			
					<?php } ?>
				</select>		
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">		
			<div class="btn-group">
				<!-- <a class="btn" id="addrow"><i class="i-plus-circle-2"></i> Add</a> -->
				<button type="submit" class="btn"><i class="i-plus-circle-2"></i>Add</button>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
$("#addrow").on("click",function () {
	
})
</script>