<div class="row-fluid">   
   <div class="span7">
    <div class="widget">
        <div class="widget-title">
            <div class="icon"><i class="icon20 i-cube"></i>
            </div>
            <h4>Tabs in widget box</h4> 
            <a href="#" class="minimize"></a>
        </div>
        <!-- End .widget-title -->
        <div class="widget-content noPadding">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home1" data-toggle="tab">System Field</a>
                </li><li><a href="#profile1" data-toggle="tab">Router</a></li>
                <!-- <li class="dropdown last-child"> <a href="#dropdown1" data-toggle="tab" data-toggle="dropdown">Dropdown </a>  -->
                   
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home1">               	 	
                    <div class="row-fluid">
                    	<div class="span6">
                    		<?php foreach ($sfield as $key => $data) {?>
		                    <form action="<?php echo base_url().'admin/system/update' ?>" method="GET" multiple="yes">
		                    <h4 class="red">[ <span class="blue"><?=$data['field_name']?></span> ]</h4>
		                    <div class="controls-row">                     
		                    		<input type="hidden" name="id" value="<?=$data['id']?>" >
		                    		<?php if($data['id'] != 1 && $data['id'] != 2) {?>
		                    		<a href="<?php echo base_url().'admin/system/delete?id='.$data['id'] ?>" class=" span2"><i class="icon26  i-close-3 btn"></i></a>
		                    		<?php } ?>
							   		<input class="span5" type="text" name="value" value="<?=$data['field_value']?>" class="span6">
									<button class="btn" type="submit" ><i class="icon26 i-disk"></i>Save</button>
							</div>
							</form>   		
							<?php } ?>		
                    	</div>
                    	<div class="span6">
                    		<h4>How to use?</h4>
                    		<pre class="pre-scrollable prettyprint linenums prettyprinted">
                    		<ol class="linenums"><li class="L0"><span class="blue">$this->system->field('field_name')</span></li></ol>
                    		</pre>
                    	</div>
                    </div>			
					<hr>
					<h3>Add System Field</h3>
					<form action="<?php echo base_url().'admin/system/insert' ?>" method="GET" multiple="yes">
					<div class="controls-row"> 
					<input class="span3" type="text" name="name" placeholder="Field Name" required> 
					<input class="span3" type="text" name="value" placeholder="Field Value" required> 
					<button class="btn span2" type="submit"><i class="icon26   i-plus-circle-2"></i></button> 
					</div>
					</form>   		
                </div>
                <div class="tab-pane fade" id="profile1">
                    <p>Cum, quibusdam, iste, accusamus impedit et modi cumque iure itaque harum neque consequuntur animi nesciunt delectus beatae eum expedita nobis numquam odit?</p>
                </div>
                <div class="tab-pane fade" id="dropdown1">
                    <p>Eligendi, quos, adipisci, impedit nisi minima vero cupiditate quia beatae necessitatibus atque asperiores cumque earum ex corrupti aspernatur consequuntur voluptas quidem sunt id nam delectus debitis pariatur fugiat repudiandae facilis deleniti ad dignissimos.</p>
                </div>
                <div class="tab-pane fade" id="dropdown2">
                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master.</p>
                </div>
            </div>
        </div>
        <!-- End .widget-content -->
    </div>
</div>
<script type="text/javascript">
$("#addrow").on("click",function () {
	
})
</script>