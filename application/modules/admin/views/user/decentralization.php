<div class="row-fluid">
	<div class="span6"> 
		<div class="row-fluid">
			<div class="span10">
			<select id="group">
				<option>---- none ----</option>
				<?php foreach ($user_groups as $key => $user_group) {?>	
					<option value="<?php echo $user_group['user_position_id'] ?>" <?php if($user_group['user_position_id'] == $this->session->userdata('usergroup')) echo "selected";?>><?php echo $user_group['user_position_name'] ?></option>
				<?php } ?>
			</select>
			
			</div>
			<?php if ($user_E == 1 || $user==1) {?>
			<div class="btn-group pull-right span2">
				<a class="btn" id="edit"><i class=" i-pencil-3" style="font-size:25px"></i>&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>	
			</div>	
			<?php } ?>	
		</div>
		<div class="widget"> 
			<div class="widget-title"> 
			<div class="icon"><i class="icon20 i-cube"></i></div> 
			<h4>Accept View</h4> <a href="#" class="minimize"></a> 
			</div><!-- End .widget-title --> 
			<div class="widget-content"> 
				<div class="scroll" style="margin-top:10px;"> 
					
					<ul class="unstyled" id="result">
						<?php foreach ($routers as $key => $router) {?>	
							<li><i class="icon20  i-checkmark"></i> <span><?php echo $router['user_router_name'] ?></span></li>
						<?php } ?>				
					</ul>
				</div> 
			</div><!-- End .widget-content --> 
		</div><!-- End .widget --> 
	</div>
</div>
<script type="text/javascript">
	$("#group").on('change',function  () {
		
		$.ajax({
		url: '<?php echo base_url()."admin/user_action_role/loadRoleById" ?>',
		type: 'POST',
		data: {id: $(this).val()},
		})
		.done(function(data) {			
			var obj = eval ("(" + data + ")");
			text="";
			$.each(obj,function(i,value){
				text +='<li><i class="icon20  i-checkmark"></i><span> ' +  obj[i].user_router_link + '</span></li>';
			});
			$("#result").html(text);
		})
		
	})	
	$("#edit").on("click",function  () {
		window.location.href = '<?php echo base_url()."admin/user/decentralization_edit?id=" ?>' + $("#group").val();
	})
</script>