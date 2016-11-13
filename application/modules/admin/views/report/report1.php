<style type="text/css">
	.table th,.table td{
	text-align: center !important;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<!-- <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> -->
  <script>
$(document).ready(function() {
	// $( ".selector" ).select(function() {
	$( "#select" ).change(function() {
		var selected = $( "#select" ).val();
		// alert(selected);
		var from = $("#from").val();
		var to = $("#to").val();
		var fromto = from+","+to+","+selected;
		if(from != "" && to != ""){
			 $.ajax({
            // url: "http://codek365.com/pj/cargo/admin/report/data",
            url: base_url+"admin/report/dataselect",
            type: "post",
            // data: "fromto="+"abc",
            data: "a="+fromto,
            async: true,
            success: function(result) {
                 $('.fromto').html(result);
                //alert(result);
            }
        	});
		}else{
			alert("Please select date");
		}
	  // alert( "Handler for .select() called." );

	});
/////////////////////////////////////////////////////////////////

	$( "#datepicker" ).datepicker({ 
		// dateFormat: "yy-mm-dd",s
		dateFormat: "MM dd.yy",
		 onSelect: function(datetext){
            //
            $.ajax({
            // url: "http://codek365.com/pj/cargo/admin/report/data",
            url: base_url+"admin/report/data",
            type: "post",
            data: "datetext="+datetext,
            async: true,
            success: function(result) {
                $('.today').html(result);
            }
        	});
        	return false;
          //   //
        }
	});
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
	// $( "#datepicker" ).datepicker( "option", "dateFormat", "MM dd.yy" );
	// $( "#datepicker" ).datepicker( "option", "dateFormat","yy-mm-dd" );

/////////////////////////////////////////////////////////////////
})

$(document).ready(function() {
  $( "#from" ).datepicker({
  	  // dateFormat: "yy-mm-dd",
  	  dateFormat: "MM dd.yy",
      defaultDate: "+1w",
      changeMonth: true,
      //numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      },
       onSelect: function(datetext){
       	// alert($("#to").val());
       	ajax_from_to();

       }
      
    });

    $( "#to" ).datepicker({
      // dateFormat: "yy-mm-dd",
      dateFormat: "MM dd.yy",
      defaultDate: "+1w",
      changeMonth: true,
      //numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      },
      onSelect: function(datetext){
       	ajax_from_to();
       }


    });
    function ajax_from_to() {
    	// var from = $("#from").val();
    	// var to = $("#to").val();
    	// var fromto = from+","+to;
    	var selected = $( "#select" ).val();
		var from = $("#from").val();
		var to = $("#to").val();
		var fromto = from+","+to+","+selected;
    	var dayfromto="<b>Date:</b> "+from+" <b>To</b> "+to;
    	if(from != "" && to != ""){
    		// $( "#select" ).val("0");

    		$('.dayfromto').html(dayfromto);
    		//
    		$.ajax({
            // url: "http://codek365.com/pj/cargo/admin/report/data",
            url: base_url+"admin/report/datafromto",
            type: "post",
            // data: "fromto="+"abc",
            data: "a="+fromto,
            async: true,
            success: function(result) {
                 $('.fromto').html(result);
                //alert(result);
            }
        	});
        	return false;
    		//
    	}

	}

    $("#from").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46,8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#to").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46,8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

})
  </script>
<!--  <div class="row-fluid">
	<div class="span12">
    <pre> -->
	    <?php //print_r($all_user_fromto);?>
<!-- 	    </pre> 
	</div>
</div> -->
<!-- <div class="row-fluid">
	<div class="span12"> -->

<!-- 	</div>
</div> -->
<div class="row-fluid">
	<div class="span12"> 
		<div class="" style="position:relative;" >
			<!-- <div class="widget-title">
				<i class="icon20 i-mail-send"></i>
				<h4>USERS</h4>
				<a href="#" class="minimize"></a> 
			</div> --><!-- End .widget-title --> 
			<div style="position:absolute;top:0px;right:0px;">Date: <input type="text" id="datepicker"></div>
		    <div class="widget-content today center" style="padding-top:0px;"> 
			<div class="page-header" style="text-align:left;padding-left:350px;">
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
					<td><?php echo "$ ".$item["total_insurance_charge"].".00"?></td> 
					<td><?php echo "$ ".$item["total_other_charge"].".00"?></td> 
					<td><?php echo "$ ".$item["total_packing_fee"].".00"?></td> 
					<td><?php echo "$ ".$item["total"].".000 $"?></td> 
					<td><a target="_blank" href="<?php echo base_url().'admin/report/detail/'.$item["user_id"]."/".$now;?>">Detail</a></td> 
				</tr> 
					<?php 
					}
					 ?>
				</tbody> 
				</table>
			</div><!-- End .widget-content -->
		  </div><!-- End .widget -->

			</div><!-- End .widget-content -->
		  </div><!-- End .widget -->
<hr/>
<!-- <div class="row-fluid">
	<div class="span3">
		From: <input type="text" id="from" name="from">
	</div>
	<div class="span3">
		To: <input type="text" id="to" name="to">
	</div>
</div> -->
<div class="row-fluid">
	<div class="span12">
		  <!-- <div class="widget plain"> -->
		  <div class="" style="position:relative;">
			<!-- <div class="widget-title">
				<i class="icon20 i-mail-send"></i>
				<h4>USERS</h4>
				<a href="#" class="minimize"></a> 
			</div> -->
			<div class="" style="position:absolute;top:0px;right:0px;">
					From: <input type="text" id="from" name="from">
					To: <input type="text" id="to" name="to">
			</div>
		    <!-- <div class="widget-content fromto center" style="padding-top:0px;">  -->
		    <div class="widget-content center" style="padding-top:0px;">
			<div class="page-header" style="text-align:left;padding-left:350px;" >
				<h2>Daily Report</h2>
			</div>
			<table class="table table-bordered" style="margin-bottom:0px;border-bottom:0px;">
				<tr> 
					<td style="text-align:left !important;width:280px;vertical-align:middle;">
						<!-- <div class="selector" style="width: 229px;"> -->
						<!-- <span style="width: 227px; -webkit-user-select: none;">Position</span> -->
						<select name="select" id="select">
	                        <option value="0" selected="selected">Position</option>
	                        <option value="-1" >All</option>
	                        <?php foreach($user_pos as $user_pos_item){
	                        	echo '<option value="'.$user_pos_item["user_position_id"].'">'.$user_pos_item["user_position_name"].'</option>';
	                         } ?>
                      </select>
                      <!-- </div> -->
					</td>

					<td class="dayfromto" style="vertical-align: middle;">Date: <?php echo $today;?></td> 
					
				</tr> 
			</table>
				<div class="fromto">
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
						echo $all_item["user_username"]." (".$user_pos_item["user_position_name"] .")";
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
					<td style="text-align:left !important;">Total</td>
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
			</div>
			</div>
		  </div>

		  <br/>
	 </div>
	</div>