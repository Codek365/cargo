<div class="row-fluid">
<div class="span12">
            <div class="widget">
              <div class="widget-title">
                <div class="icon"><i class="icon20 i-menu-6"></i></div>
                <h4>News management</h4>
                <a href="#" class="minimize"></a> </div>
              <!-- End .widget-title -->
              <div class="widget-content" style="display: block;">

                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/layout/footer'; ?>" enctype="multipart/form-data">
                    
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
                            echo '<p class="result_msg">'.$this->session->flashdata('notify').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="control-group">
                    <label class="control-label" for="normal"></label>
                    <div class="controls controls-row">
                        <div id="DIV_1">
                        	<div id="DIV_2">
                        		<div id="DIV_3">
                        			<div id="DIV_4">
                        				<div id="DIV_5">
                        					 <?php
                                                if(!empty($footer['data'])){
                                                    echo $footer['data'];
                                                }
                                             ?>
                        				</div>
                        				<div id="DIV_10">
                        					<div id="DIV_11">
                        						<ul id="UL_12">
                        							<li id="LI_13">
                        								<a href="#" title="Facebook" id="A_14">Facebook</a>
                        							</li>
                        							<li id="LI_15">
                        								<a href="#" title="Twitter" id="A_16">Twitter</a>
                        							</li>
                        							<li id="LI_17">
                        								<a href="#" title="Pinterest" id="A_18">Pinterest</a>
                        							</li>
                        							<li id="LI_19">
                        								<a href="#" title="Google +" id="A_20">Google +</a>
                        							</li>
                        						</ul>
                        					</div>
                        				</div>
                        				<div id="DIV_21">
                        					 <a href="#" id="A_22"> <span id="SPAN_23">Back to desktop version</span> <span id="SPAN_24">Back to mobile version</span></a>
                        				</div>
                        				<!-- {%FOOTER_LINK} -->
                        
                        			</div>
                        		</div>
                        	</div>
                        </div>
                    </div>
                  </div>
                  <style>
                    #DIV_1 {
    color: rgb(106, 106, 106);
    height: 86px;
    position: relative;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1349px;
    z-index: 1;
    perspective-origin: 674.5px 43px;
    transform-origin: 674.5px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    margin: -1px 0px 0px;
    outline: rgb(106, 106, 106) none 0px;
    overflow: hidden;
}/*#DIV_1*/

#DIV_2 {
    color: rgb(106, 106, 106);
    height: 86px;
    max-width: 1156px;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1156px;
    perspective-origin: 578px 43px;
    transform-origin: 578px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    margin: 0px 96.5px;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_2*/

#DIV_2:after {
    clear: both;
    color: rgb(106, 106, 106);
    display: table;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1px;
    perspective-origin: 0.5px 0px;
    transform-origin: 0.5px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_2:after*/

#DIV_2:before {
    color: rgb(106, 106, 106);
    display: table;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1px;
    perspective-origin: 0.5px 0px;
    transform-origin: 0.5px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_2:before*/

#DIV_3 {
    color: rgb(106, 106, 106);
    height: 86px;
    position: relative;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1116px;
    perspective-origin: 578px 43px;
    transform-origin: 578px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
    padding: 0px 20px;
}/*#DIV_3*/

#DIV_3:after {
    clear: both;
    color: rgb(106, 106, 106);
    display: table;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1px;
    perspective-origin: 0.5px 0px;
    transform-origin: 0.5px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_3:after*/

#DIV_3:before {
    color: rgb(106, 106, 106);
    height: 1px;
    left: 20px;
    position: absolute;
    right: 20px;
    text-decoration: none solid rgb(106, 106, 106);
    top: 0px;
    width: 1116px;
    perspective-origin: 558px 0.5px;
    transform-origin: 558px 0.5px;
    content: '';
    background: rgb(222, 222, 222) none repeat scroll 0% 0% / auto padding-box border-box;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_3:before*/

#DIV_4 {
    color: rgb(106, 106, 106);
    height: 86px;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1152px;
    perspective-origin: 576px 43px;
    transform-origin: 576px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    margin: 0px 0px 0px -36px;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_4*/

#DIV_4:after {
    clear: both;
    color: rgb(106, 106, 106);
    display: table;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1px;
    perspective-origin: 0.5px 0px;
    transform-origin: 0.5px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_4:after*/

#DIV_4:before {
    color: rgb(106, 106, 106);
    display: table;
    text-decoration: none solid rgb(106, 106, 106);
    width: 1px;
    perspective-origin: 0.5px 0px;
    transform-origin: 0.5px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/0px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_4:before*/

#DIV_5 {
    box-sizing: border-box;
    color: rgb(117, 117, 117);
    float: left;
    height: 72px;
    min-height: 30px;
    text-decoration: none solid rgb(117, 117, 117);
    text-transform: uppercase;
    width: 863.984375px;
    perspective-origin: 431.984375px 36px;
    transform-origin: 431.984375px 36px;
    border: 0px none rgb(117, 117, 117);
    font: normal normal normal 12px/normal Arial, Helvetica, sans-serif;
    outline: rgb(117, 117, 117) none 0px;
    padding: 37px 0px 20px 36px;
}/*#DIV_5*/

#SPAN_6, #SPAN_7 {
    color: rgb(117, 117, 117);
    text-decoration: none solid rgb(117, 117, 117);
    text-transform: uppercase;
    border: 0px none rgb(117, 117, 117);
    font: normal normal normal 12px/normal Arial, Helvetica, sans-serif;
    outline: rgb(117, 117, 117) none 0px;
}/*#SPAN_6, #SPAN_7*/

#SPAN_8 {
    color: rgb(117, 117, 117);
    text-decoration: none solid rgb(117, 117, 117);
    text-transform: uppercase;
    border: 0px none rgb(117, 117, 117);
    font: normal normal normal 12px/normal Arial, Helvetica, sans-serif;
    outline: rgb(117, 117, 117) none 0px;
}/*#SPAN_8*/

#A_9 {
    color: rgb(117, 117, 117);
    display: inline-block;
    height: 15px;
    text-decoration: none solid rgb(117, 117, 117);
    text-transform: uppercase;
    width: 96px;
    perspective-origin: 48px 7.5px;
    transform-origin: 48px 7.5px;
    border: 0px none rgb(117, 117, 117);
    font: normal normal normal 12px/normal Arial, Helvetica, sans-serif;
    outline: rgb(117, 117, 117) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_9*/

#DIV_10 {
    box-sizing: border-box;
    color: rgb(106, 106, 106);
    float: left;
    height: 86px;
    min-height: 30px;
    text-decoration: none solid rgb(106, 106, 106);
    width: 287.984375px;
    perspective-origin: 143.984375px 43px;
    transform-origin: 143.984375px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
    padding: 0px 0px 0px 36px;
}/*#DIV_10*/

#DIV_10:after {
    clear: both;
    color: rgb(106, 106, 106);
    text-decoration: none solid rgb(106, 106, 106);
    width: 251.984375px;
    perspective-origin: 125.984375px 0px;
    transform-origin: 125.984375px 0px;
    content: '';
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_10:after*/

#DIV_11 {
    color: rgb(106, 106, 106);
    height: 86px;
    text-decoration: none solid rgb(106, 106, 106);
    width: 251.984375px;
    perspective-origin: 125.984375px 43px;
    transform-origin: 125.984375px 43px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
}/*#DIV_11*/

#UL_12 {
    color: rgb(106, 106, 106);
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(106, 106, 106);
    width: 251.984375px;
    perspective-origin: 125.984375px 43px;
    transform-origin: 125.984375px 43px;
    background: rgb(225, 115, 41) none repeat scroll 0% 0% / auto padding-box border-box;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    margin: 0px;
    outline: rgb(106, 106, 106) none 0px;
    padding: 25px 0px 21px;
}/*#UL_12*/

#LI_13, #LI_15, #LI_17, #LI_19 {
    color: rgb(106, 106, 106);
    display: inline-block;
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(106, 106, 106);
    width: 40px;
    perspective-origin: 20px 20px;
    transform-origin: 20px 20px;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    list-style: none outside none;
    margin: 0px 5px 0px 4px;
    outline: rgb(106, 106, 106) none 0px;
}/*#LI_13, #LI_15, #LI_17, #LI_19*/

#A_14 {
    color: rgb(255, 255, 255);
    display: inline-block;
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    vertical-align: top;
    width: 40px;
    perspective-origin: 20px 20px;
    transform-origin: 20px 20px;
    border: 0px none rgb(255, 255, 255);
    border-radius: 38px 38px 38px 38px;
    font: normal normal 300 0px/24px 'Open Sans', sans-serif;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_14*/

#A_14:before {
    color: rgb(255, 255, 255);
    display: block;
    height: 42px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    width: 40px;
    perspective-origin: 20px 21px;
    transform-origin: 20px 21px;
    content: '';
    border: 0px none rgb(255, 255, 255);
    font: normal normal normal 22px/42px FontAwesome;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
}/*#A_14:before*/

#A_16 {
    color: rgb(255, 255, 255);
    display: inline-block;
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    vertical-align: top;
    width: 40px;
    perspective-origin: 20px 20px;
    transform-origin: 20px 20px;
    border: 0px none rgb(255, 255, 255);
    border-radius: 38px 38px 38px 38px;
    font: normal normal 300 0px/24px 'Open Sans', sans-serif;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_16*/

#A_16:before {
    color: rgb(255, 255, 255);
    display: block;
    height: 42px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    width: 40px;
    perspective-origin: 20px 21px;
    transform-origin: 20px 21px;
    content: '';
    border: 0px none rgb(255, 255, 255);
    font: normal normal normal 22px/42px FontAwesome;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
}/*#A_16:before*/

#A_18 {
    color: rgb(255, 255, 255);
    display: inline-block;
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    vertical-align: top;
    width: 40px;
    perspective-origin: 20px 20px;
    transform-origin: 20px 20px;
    border: 0px none rgb(255, 255, 255);
    border-radius: 38px 38px 38px 38px;
    font: normal normal 300 0px/24px 'Open Sans', sans-serif;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_18*/

#A_18:before {
    color: rgb(255, 255, 255);
    display: block;
    height: 42px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    width: 40px;
    perspective-origin: 20px 21px;
    transform-origin: 20px 21px;
    content: '';
    border: 0px none rgb(255, 255, 255);
    font: normal normal normal 22px/42px FontAwesome;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
}/*#A_18:before*/

#A_20 {
    color: rgb(255, 255, 255);
    display: inline-block;
    height: 40px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    vertical-align: top;
    width: 40px;
    perspective-origin: 20px 20px;
    transform-origin: 20px 20px;
    border: 0px none rgb(255, 255, 255);
    border-radius: 38px 38px 38px 38px;
    font: normal normal 300 0px/24px 'Open Sans', sans-serif;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_20*/

#A_20:before {
    color: rgb(255, 255, 255);
    display: block;
    height: 42px;
    text-align: center;
    text-decoration: none solid rgb(255, 255, 255);
    width: 40px;
    perspective-origin: 20px 21px;
    transform-origin: 20px 21px;
    content: '';
    border: 0px none rgb(255, 255, 255);
    font: normal normal normal 22px/42px FontAwesome;
    list-style: none outside none;
    outline: rgb(255, 255, 255) none 0px;
}/*#A_20:before*/

#DIV_21 {
    box-sizing: border-box;
    color: rgb(106, 106, 106);
    display: none;
    float: left;
    height: auto;
    min-height: 30px;
    text-decoration: none solid rgb(106, 106, 106);
    width: 100%;
    perspective-origin: 50% 50%;
    transform-origin: 50% 50%;
    border: 0px none rgb(106, 106, 106);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(106, 106, 106) none 0px;
    padding: 0px 0px 0px 36px;
}/*#DIV_21*/

#A_22 {
    color: rgb(255, 255, 255);
    text-decoration: none solid rgb(255, 255, 255);
    perspective-origin: 50% 50%;
    transform-origin: 50% 50%;
    border: 0px none rgb(255, 255, 255);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(255, 255, 255) none 0px;
    transition: all 0.5s ease 0s;
}/*#A_22*/

#SPAN_23 {
    color: rgb(255, 255, 255);
    text-decoration: none solid rgb(255, 255, 255);
    perspective-origin: 50% 50%;
    transform-origin: 50% 50%;
    border: 0px none rgb(255, 255, 255);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(255, 255, 255) none 0px;
}/*#SPAN_23*/

#SPAN_24 {
    color: rgb(255, 255, 255);
    display: none;
    text-decoration: none solid rgb(255, 255, 255);
    perspective-origin: 50% 50%;
    transform-origin: 50% 50%;
    border: 0px none rgb(255, 255, 255);
    font: normal normal 300 13px/24px 'Open Sans', sans-serif;
    outline: rgb(255, 255, 255) none 0px;
}/*#SPAN_24*/


                  </style>
                    <div class="control-group">
                    <label class="control-label" for="normal">Info:</label>
                    <div class="controls controls-row">
                      <textarea id="data" name="data"><?php echo !empty($data['data'])?$data['data']:""; ?></textarea>
                    </div>
                  </div>
                    

                  <div class="form-actions">
                    <button type="submit" value="edit" name="edit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>

              </div>
              <!-- End .widget-content -->
            </div>
            <!-- End .widget -->
          </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('data',{
            skin:'moonocolor',
            uiColor:'#9DBBE9',
            enterMode: CKEDITOR.ENTER_BR,
            height:200,
            toolbar : [['Source','Bold','Italic','Underline','font','format','Strike','Styles','Format','Font','FontSize','TextColor','BGColor','Cut','Copy','Paste','PasteText','PasteFromWord','Link','Unlink','Anchor']],
            })
 </script>