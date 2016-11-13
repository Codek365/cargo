<form id="form_customer">
<?php  $this->load->library('Dropdown'); ?>
<div class="row-fluid">
<div class="span6"> 
<div class="widget"> 
<div class="widget-title"> 
<div class="icon"><i class="icon20 i-settings"></i></div> 
<h4>Consignee Edit</h4> <a href="#" class="minimize"></a> 
</div><!-- End .widget-title --> 
<div class="widget-content"> 
 
  <label class="control-label" for="normal">Name Of Consignee:</label>
    <div class="controls controls-row">
    <?php if(!empty($info["consignee_name"])) {?>
      <input type="text" name="receiver_name" maxlength="50"  value="<?=$info["consignee_name"]?>" class="span12" />
    <?php } ?> 
    </div>
  <label class="control-label" for="normal">Address 1:</label>
    <div class="controls controls-row">
    <?php if(!empty($info["consignee_address"])) {?>
      <input type="text" name="receiver_address" maxlength="150" value="<?= $info["consignee_address"]?>" class="span12" />
    <?php } ?> 
    </div>
  <label class="control-label" for="normal">Email:</label>
    <div class="controls controls-row">
      <input type="text" name="receiver_email" maxlength="70" value="<?php echo $info["consignee_email"];?>" class="span12" />
    </div>
  <label class="control-label" for="normal">Phone:</label>
    <div class="controls controls-row">
    <?php if(!empty($info["consignee_phone"])) {?>
      <input type="text" name="receiver_phone"   value="<?=$info["consignee_phone"]?>" class="span12"  maxlength="20" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/>
    <?php } ?> 
    </div>
</div><!-- End .widget-content --> 
</div><!-- End .widget --> 
</div>
<div class="span3"> 
  <div class="widget"> 
    <div class="widget-title"> 
    <div class="icon"><i class="icon20 i-settings"></i></div> 
    <h4>&nbsp;</h4> <a href="#" class="minimize"></a> 
    </div><!-- End .widget-title --> 
      <div class="widget-content"> 
        <label class="control-label" for="normal">Country:</label>
          <div class="controls controls-row">
<!--          --><?php //echo $this->dropdown->dropdown($listCountry,'country_name','country_id',$info['receiver_country'],array("name"=>"receiver_country_id","class"=>"span12","id"=>"receiver_country")) ?>
<!--              <div class="selector" id="uniform-receiver_country" style="width: 286px;">-->
<!--                  <span style="width: 284px; -webkit-user-select: none;">Vietnam</span>-->
                  <select name="receiver_country_id" class="span12" id="receiver_country">
                      <option value="vn" <?php if($info['consignee_country']=='vn'){echo 'selected=selected';} ?> >Vietnam</option>
                      <option value="us" <?php if($info['consignee_country']=='us'){echo 'selected=selected';} ?>>USA</option>
                  </select>
<!--              </div>-->
          </div>
        <label class="control-label" for="normal">States:</label>
          <div class="controls controls-row">
          <?php echo  $this->dropdown->dropdown($listState,'state','state_code',$info['consignee_state'],array("name"=>"receiver_states","class"=>"span12","id"=>"receiver_states")) ?>
          </div>
        <label class="control-label" for="normal">City:</label>
          <div class="controls controls-row">
          <?php echo  $this->dropdown->dropdown($listCity,'city','id',$info['consignee_city'],array("name"=>"receiver_city_id","class"=>"span12","id"=>"receiver_cities")) ?>
          </div>
        <label class="control-label" for="normal">Zipcode:</label>
          <div class="controls controls-row">
          <?php if(!empty($info["consignee_zipcode"])) {?>
            <input type="text" name="receiver_zipcode"   value="<?=$info["consignee_zipcode"]?>" class="span12" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" />
          <?php } else { ?> 
          <input type="text" name="receiver_zipcode"   value="" class="span12" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/>
          <?php } ?>
          </div>
        <?php 
            if(!empty($sender_id)){
            echo '<input type="hidden" name="sender_id" id="sender_id" value="'.$sender_id.'"/>';
          }
          if(!empty($receiver_id)){
            echo '<input type="hidden" name="receiver_id" id="receiver_id" value="'.$receiver_id.'"/>';
          }
         ?>
         <div class="btn-group">
         <a  href="<?php echo base_url().'admin/customer/view/'. $_GET['sender'] ?>" class="btn"><i class="icon20   i-arrow-left-11">Back</i></a>
        <button type="submit" value="btnAdd" id="btnAdd" name="btnAdd" class="btn"><i class="icon20  i-arrow-up-right-6">Save</i></button>
        </div>
      </div>
      </div><!-- End .widget-content --> 
  </div><!-- End .widget --> 
</div>
</div>
</div>
</form>
<!-- <form id="form_customer">
<div class="row-fluid">
  <div class="span6">
<?php
 
      echo '<ul id="myTab" class="nav nav-tabs">';
        echo '<li><a href="#Consignee" data-toggle="tab">Consignee Form</a></li></li> 
              </ul>';
      echo '<div class="tab-content">';
        echo '<div class="tab-pane fade in active';
        echo '" id="Consignee">';
        echo '<label class="control-label" for="normal">Name Of Consignee:</label><div class="controls controls-row">
                <input type="text" name="receiver_name"';
                if(!empty($info["consignee_name"])) echo 'value="'.$info["consignee_name"].'"';
        echo  'style="width: 100%;"/>
              </div>';
        echo '<label class="control-label" for="normal">Address 1:</label>
              <div class="controls controls-row">
                <input type="text" name="receiver_address"'; if(!empty($info["consignee_address"])) echo 'value="'.$info["consignee_address"].'"'; echo 'style="width: 100%;"/>
              </div>';
        echo '<label class="control-label" for="normal">Email:</label>
              <div class="controls controls-row">
                <input type="text" name="email" maxlength="70" name="sender_email"'; if(!empty($info["consignee_email"])) echo 'value="'.$info["consignee_email"].'"';echo 'style="width: 100%;"/>
              </div>';
        echo '<label class="control-label" for="normal">Phone:</label>
              <div class="controls controls-row">
                <input type="text" maxlength="20" onkeypress="return isNumberKey(event)" name="receiver_phone"';if(!empty($info["consignee_phone"])) echo 'value="'.$info["consignee_phone"].'"';echo 'style="width: 100%;"/>
              </div>';  

        echo '</div><div class="span6">';
        echo '<label class="control-label" for="normal">Country:</label>
                  <div class="controls controls-row">';
//                    echo $this->dropdown->dropdown($listCountry,'country_name','country_id',$info['receiver_country'],array("name"=>"receiver_country_id","style"=>"width:220px","id"=>"receiver_country"));

        echo '<i class=" i-arrow-down-3" style="margin-left:-30px;position:relative"></i>
                  </div>  ';
        echo '<label class="control-label" for="normal">States:</label>
              <div class="controls controls-row">';
              echo $this->dropdown->dropdown($listState,'state','state_code',$info['consignee_states'],array("name"=>"consignee_states","style"=>"width:220px","id"=>"receiver_states"));
                echo '<i class=" i-arrow-down-3" style="margin-left:-30px;position:relative"></i>
              </div>';
        echo '<label class="control-label" for="normal">City:</label>
              <div class="controls controls-row">';
                  echo $this->dropdown->dropdown($listCity,'city','city_id',$info['receiver_city'],array("name"=>"receiver_cities","style"=>"width:220px","id"=>"receiver_cities"));
                echo'<i class=" i-arrow-down-3" style="margin-left:-30px;position:relative"></i>
              </div>';
        echo '<label class="control-label" for="normal">Zipcode:</label>
              <div class="controls controls-row">
                  <input type="text" name="receiver_zipcode"'; if(!empty($info["receiver_zipcode"])) echo 'value="'.$info["receiver_zipcode"].'"';echo 'style="width: 230px"/>
              </div>';
      if(!empty($sender_id)){
        echo '<input type="hidden" name="sender_id" id="sender_id" value="'.$sender_id.'"/>';
      }
      if(!empty($receiver_id)){
        echo '<input type="hidden" name="receiver_id" id="receiver_id" value="'.$receiver_id.'"/>';
      }
      echo '<br /><button type="submit" value="btnAdd" id="btnAdd" name="btnAdd" class="btn"><i class="icon20  i-arrow-up-right-6">Save</i></button>';
      echo '</div>';
      echo "</div></div> <br/>";
?>
  </div>
</div>
</form> -->
<ul id="dialog" title="Notification" class="ui-dialog-content ui-widget-content" style="border:none">
</ul>
<script type="text/javascript">
    $( document ).ready(function() {
      $("#receiver_country").change("change click",function(){
        var country_name=$("#receiver_country option:selected").val();
        alert(country_name);
        loadState(country_name);
      });
       function loadState(country_name){
        if(country_name!="none"){
            $.ajax({
            url: '<?php echo base_url()?>admin/order/getStates',
            type: 'POST',
            cache: false,
            data: {country_name: country_name}
          })
          .done(function(data) {
            $("#receiver_states").html(data);
            var states_name=$("#receiver_states option:selected").text();
            $("#uniform-receiver_states span").text(states_name);
            // check load city as country have change
            var states_code=$("#receiver_states option:selected").val();
            loadCities(country_name,states_code);
          })
        }
      }
      $("#receiver_states").change("change click",function(){
        var country_name=$("#receiver_country option:selected").val();
        var states_code=$("#receiver_states option:selected").val();
        loadCities(country_name,states_code);
    });
    function loadCities(country_name,states_code){
        if(states_code!="none"){
            $.ajax({
            url: '<?php echo base_url()?>admin/order/getCities',
            type: 'POST',
            data: "country_name=" + country_name + "&states_code=" + states_code,
          })
          .done(function(data) {
            $("#receiver_cities").html(data);
            var cities_name=$("#receiver_cities option:selected").text();
            $("#uniform-receiver_cities span").text(cities_name);
          })
        }
    }
     $(document).on('click',"#btnAdd",function(){
        $.ajax({
            type: 'POST', 
            url: '<?php echo base_url();?>admin/customer/updatereceiver',
            data: $("#form_customer").serialize(),
            success: function(data) {
               var obj=jQuery.parseJSON(data);
               if($.trim(obj.error)!=""){
                    $("#dialog").html(obj.error);
                    $("#dialog").dialog();
                }else if($.trim(obj.result)!="")
                {
                   $("#dialog").html("Editing successful Consignee !!!<p><a href='"+base_url+"admin/customer/view/"+$("#sender_id").val()+"'><i class='icon i-cancel-circle'>Close</i></a></p>");                  
                   $("#dialog").dialog();
                }
            }
        });
        return false;
    });
    });
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>