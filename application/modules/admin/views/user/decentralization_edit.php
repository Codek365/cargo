<form action="" method="get">
<div class="row-fluid">
	<div class="span6">
	<label>User Group:</label>
	<select id="group">
		<option>---- none ----</option>
		<?php foreach ($user_groups as $key => $user_group) {?>	
			<option value="<?php echo $user_group['user_position_id'] ?>"  <?php if($user_group['user_position_id'] == $_GET['id']) echo "selected";?>><?php echo $user_group['user_position_name'] ?></option>
		<?php } ?>
	</select>	
	</div>	
</div>
<div class="row-fluid">	
	<div class="span4"> 
		<div class="widget"> 
			<div class="widget-title"> 
			<div class="icon"><i class="icon20 i-cube"></i></div> 
			<h4>Accept List</h4> <a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
			<div class="widget-content"> 
				<div class="scroll" style="margin-top:10px;"> 
					
					<ul class="unstyled" id="result">
						<?php foreach ($routers as $key => $router) {?>	
							<li  >
							<a  class="dark" href="<?php echo base_url().'admin/user/decentralization_edit?id='.$_GET['id'].'&line='.$router['user_router_id']; ?>">
							(<?php echo $router['user_router_id'] ?>) 
							<span ><?php echo $router['user_router_name'] ?></span> 
							<i class="icon20 i-arrow-right-4 pull-right"></i>
							</a>
							</li>
						<?php } ?>				
					</ul>
				</div> 
			</div><!-- End .widget-content --> 
		</div><!-- End .widget --> 
	</div>
	
	<div class="span4"> 
		<div class="widget"> 
			<div class="widget-title"> 
			<div class="icon"><i class="icon20 i-cube"></i></div> 
			<h4>Accept View</h4> <a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
			<div class="widget-content"> 
				<div class="scroll" style="height:250px; overflow-y:scroll; margin-top:10px;"> 
					
					<ul class="unstyled">
						<?php foreach ($routersId as $key => $router) {?>	
							<li >
							<a  class="dark" href="<?php echo base_url().'admin/user/decentralization_edit?id='.$_GET['id'].'&delline='.$router['id']; ?>">
							<span><?php echo $router['user_router_name'] ?></span> 
							<i class="icon20 red i-cancel-circle-2 pull-right	"></i>
							</a>
							</li>
						<?php } ?>				
					</ul>
				</div> 
			</div><!-- End .widget-content --> 
		</div><!-- End .widget --> 
	</div>
</div>
</form>
<script type="text/javascript">
	
	$("#group").on('change',function  () {
		window.location.href = '<?php echo base_url()."admin/user/decentralization_edit?id=" ?>' + $("#group").val();
	})
</script>