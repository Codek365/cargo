<?php echo $view ?>
<div class="row-fluid">
	<div class="span3">
		<select  class="select2 select2-offscreen" id="jumplist">
			<option>----- Please select form-----</option>
			<option value="shiprequest" >Shipping Request Form</option>
			<option value="membership" >Membership Form</option>
		</select>
	</div>	
	<div class="ui-widget span4">
	<?php if($view != 'form/index') {?>
  <input type="text" id="tags" placeholder="Please enter order's number">
  <?php } ?>
  <div class="face hide" id="result">
  </div>

<style type="text/css">
	.face{
		position: absolute;
		z-index: 999;
		/*top:0;*/
		/*left:0;*/
		margin-top: -10px;
		/*border: 1px solid #ccc;*/
		max-width: 200px;
		max-height: 100px;
		overflow-x: none;
	}
	.result-list a{
		display: block;
		position: relative;
	  	background-color: #e6e6e6;
	  	background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
	  	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
	  	background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
	  	background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
	  	background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
	  	background-repeat: repeat-x;
		min-width: 200px;
		height: 30px;
		text-align: left;
		padding-left: 15px;
		padding-top: 5px;

	}
</style>
</div>
 	<?php if(!empty($_GET['form'])){ $form=$_GET['form']?>

 	<div class="span2">
		<a href="<?php echo base_url().'admin/form/printForm?id='.$_GET['id'].'&form='.$form ?>" class="btn" target="_blank"><i class="icon20 i-print-2"></i> Print</a>
	</div>
 	<?php }else{$form=$this->uri->segment(4);}?>
	
</div>
<hr>
 
<script type="text/javascript">
	$("#jumplist").on("change",function  () {
		$(location).attr('href','<?php echo base_url() ?>admin/form/strap/' + $(this).val());
	})
</script>
<script type="text/javascript">
$("#tags").on("keyup",function() {
	// alert("of");
	$("#result").removeClass("hide");
	$.ajax({
		url: '<?php echo base_url() ?>admin/form/prints',
		type: 'GET',
		//dataType: 'json',
		data: {id: $(this).val()},
	})
	.done(function(data) {
		var obj = eval ("(" + data + ")");
		text="";
		$.each(obj,function(i,value){
			text +="<span class='result-list'><a href='<?php echo base_url().'admin/form/loadForm?form='.$form.'&id='?>" + obj[i].order_id +"'>" +  "ADC14822" +obj[i].order_id + "</a></span>";
		});
		$("#result").html(text);
	})	
});
</script>