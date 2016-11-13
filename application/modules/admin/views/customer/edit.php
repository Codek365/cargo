<?php $this->load->library('Dropdown'); ?>
<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>Customer Management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form id="form_customer" class="form-horizontal" method="post" action="<?php echo base_url().'admin/customer/edit/'.$id;?>" enctype="multipart/form-data">
                    
                    <label class="control-label" for="normal"></label>
                    <div class="controls controls-row">
                    <?php
                        if(!empty($error)){
                            echo '<ul class="error_msg">';
                            if(is_array($error)){
                                foreach($error as $item){
                                    echo '<li>'.$item.'</li>';
                                }
                            }else{
                                echo $error;
                            }
                            echo '</ul>';
                        }
                    ?>
                    </div>
                    <?php
                        if($this->session->flashdata('notify')){
                            echo '<label class="control-label" for="normal"></label>
                                        <div class="controls controls-row">';
                            echo '<p class="notify result_msg">'.$this->session->flashdata('notify').'</p>';
                            echo '</div>';
                        }
                    ?>
                  <div class="control-group">
                    <label class="control-label" for="normal">Full name:</label>
                    <div class="controls controls-row">
                      <input type="text" name="fullname" id="fullname" <?php if(!empty($info["fullname"])) echo 'value="'.$info["fullname"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Email:</label>
                    <div class="controls controls-row">
                      <input type="text" id="email" name="email" <?php if(!empty($info["email"])) echo 'value="'.$info["email"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Phone:</label>
                    <div class="controls controls-row">
                      <input type="text" id="phone" name="phone" <?php if(!empty($info["phone"])) echo 'value="'.$info["phone"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Address:</label>
                    <div class="controls controls-row">
                      <input type="text" id="address" name="address" <?php if(!empty($info["address"])) echo 'value="'.$info["address"].'"';?> style="width: 100%;"/>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Country:</label>
                    <div class="controls controls-row">
                      <?php
                        echo $this->dropdown->dropdown($listCountry,'country_name','country_id',$info["country_id"],array("name"=>"country_id","id"=>"country","style"=>"width:220px"));?>
                    </div>
                  </div>
                  
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">States:</label>
                    <div class="controls controls-row">
                      <?php
                        echo $this->dropdown->dropdown($listState,'state','state_code',$info["states"],array("name"=>"states","id"=>"states","style"=>"width:220px"));?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">City:</label>
                    <div class="controls controls-row">
                      <?php
                        echo $this->dropdown->dropdown($listCity,'city','city_id',$info["city_id"],array("name"=>"city_id","id"=>"cities","style"=>"width:220px"));?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="normal">Customer type:</label>
                    <div class="controls controls-row">
                      <?php
                        echo $this->dropdown->dropdown($listCustomerType,'name','customer_type_id',$info["customer_type"],array("name"=>"customer_type","id"=>"customer_type","style"=>"width:220px"));?>
                    </div>
                  </div>
                  
                    <div class="form-actions">
                        <input type="submit" value="Save change" name="btnEdit" id="btnEdit" class="btn btn-primary" />
                        <a href="<?php echo base_url().'admin/customer/index/';?>" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
<ul id="dialog" title="Notification">      
</ul>
<script type="text/javascript">
    $(document).on('click',"#btnEdit",function(){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url().'admin/customer/editajax/'.$id;?>',
            data: $("#form_customer").serialize(),
            success: function(data) {
                var obj=jQuery.parseJSON(data);
                if($.trim(obj.error)!=""){
                    $("#dialog").html(obj.error);
                    $("#dialog").dialog();
                }else if($.trim(obj.result)!=""){
                   $("#dialog").html(obj.result);
                   $("#dialog").dialog();
                }
            }
        });
        return false;
    })
    $("#country").on("change",function(){
        var contry_id=$(this).val();
        loadState(contry_id);
    });
    function loadState(contry_id){
        if(contry_id!="none"){
            $.ajax({
            url: '<?php echo base_url()?>admin/order/getStates',
            type: 'POST',
            data: {contry_id: contry_id},
          })
          .done(function(data) {
            $("#states").html(data);        
          })
        }
    }
    
    $("#states").on("change",function(){
        var contry_id=$("#country").val();
        var states_code=$(this).val();
        loadCities(contry_id,states_code);
    });
     function loadCities(contry_id,states_code){
        if(states_code!="none"){
            $.ajax({
            url: '<?php echo base_url()?>admin/order/getCities',
            type: 'POST',
            data: "contry_id=" + contry_id + "&states_code=" + states_code,
          })
          .done(function(data) {
            $("#cities").html(data);           
          })
        }
    }
</script>