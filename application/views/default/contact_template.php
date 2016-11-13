<?php $this->load->view('default/header');?>
<link rel="stylesheet" href="<?php echo base_url().'public/cargo'; ?>/plugins/system/plugin_googlemap3/plugin_googlemap3.css.php" type="text/css" />
<script src="<?php echo base_url().'public/cargo'; ?>/media/system/js/punycode.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/media/system/js/validate.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/media/system/js/html5fallback.js" type="text/javascript"></script>
  <script src="http://www.google.com/jsapi?key=" type="text/javascript"></script>
  <script src="http://www.google.com/uds/?file=earth&amp;v=1" type="text/javascript"></script>
  <script src="<?php echo base_url().'public/cargo'; ?>/media/plugin_googlemap3/site/googleearthv3/googleearth.js" type="text/javascript"></script>
  <script src="<?php echo base_url().'public/cargo'; ?>/media/plugin_googlemap3/site/googlemaps/googlemapsv3.js" type="text/javascript"></script>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?v=3&amp;language=en-GB&amp;libraries=places&amp;sensor=false'></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        url="<?php echo base_url().'default/contact/getcapcha'; ?>";
        jQuery.ajax({
                url:url,
                success:function(res){
                    jQuery("#show-capcha").html(res);
                }
            });
        jQuery("span#refresh-capcha").click(function(){
            jQuery.ajax({
                url:url,
                success:function(res){
                    jQuery("#show-capcha").html(res);
                }
            });
        });
    });
  </script>
<body class="com_contact view-contact task- itemid-142 body__">
  <!-- Body -->
  <div id="wrapper">
    <div class="wrapper-inner">
            <!-- Header -->
            <?php $this->load->view('default/menu');?><strong></strong>
                  <!-- Navigation -->
                
                        
      <div class="bg_cont">
      
            <div class="row-container">
        <div class="container-fluid">
          <div id="system-message-container">
	</div>

        </div>
      </div>
      <!-- Main Content row -->
      <div id="content-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="content-inner row-fluid">   
                      
              <div id="component" class="span12">
                <main role="main">
                         
                          
                  <div class="page page-contact page-contact__">

    <!-- Heading -->
  <div class="page_header">
    <h3><span class="item_title_part0">Contacts</span> </h3>  </div>
    <!-- CONTACT FORM -->  
  <!-- Map -->
  <div class="mntop"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3317.509291241256!2d-117.96705700000001!3d33.74750300000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd27ca3e8831d5%3A0xd655b617a6129213!2s14822+Moran+St%2C+Westminster%2C+CA+92683!5e0!3m2!1sen!2svn!4v1409005152774" width="100%" height="450" frameborder="0" style="border:0"></iframe></div>   
      <!-- Address -->
      <br>
<div class="row-fluid">
<div class="contact_details">
		<div class="span4">
		<h4>Headquaters</h4>
				<div class="contact_address">
                <?php echo empty($info['address'])?"":$info['address']; ?>
					</div>
	</div>
		<div class="span4">
		<h4>Phones:</h4>
		<div class="contact_details_telephone" >
           <?php echo empty($info['phone'])?"":$info['phone']; ?>
		</div>			
		<div class="clearfix"></div>
			</div>
	<div class="span4">  
		<h4>E-mail:</h4>		
		<div class="contact_details_emailto">				
            <span ><?php echo empty($info['email'])?"":$info['email']; ?></span>
		</div>
		<div class="clearfix"></div>
		    <div class="contact_vcard">
    </div>
     <div class="clearfix"></div>
	 	</div>
</div>  </div>

  <!-- Misc -->
                  
  <div class="contact_misc">
	 <!--  <h3>Miscellaneous information:</h3><p><?php echo empty($info['info'])?"":$info['info']; ?></p>  </div> -->
  <div class="contact_form">
   <form id="contact-form" action="<?php echo base_url().'default/contact/receivemail'; ?>" method="post" class="form-validate">
      <fieldset>
      <p>
      <?php
        if(!empty($error)){
            echo '<ul>';
            if(is_array($error)){
                foreach($error as $item){
                    echo '<li>'.$item.'</li>';
                }
            }else{
                echo $error;
            }
            echo '</ul>';
        }else{
            echo '<i class="muted"></i>';
        }
      ?>
      </p>
         <div class="clearfix"></div>
         <div class="row-fluid">
            <div class="span4">
               <label id="jform_contact_name-lbl" for="jform_contact_name" class="hasTooltip required" title="<strong>Name</strong><br />Your name">Name<span class="star">&#160;*</span></label>					
               <div class="controls"><input type="text" name="name" id="jform_contact_name" value="" size="30" required aria-required="true" value="<?php echo !empty($data['name'])?$data['name']:""; ?>"/></div>
            </div>
            <div class="span4">
               <label id="jform_contact_email-lbl" for="jform_contact_email" class="hasTooltip required" title="<strong>Email</strong><br />Email for contact">Email<span class="star">&#160;*</span></label>					
               <div class="controls"><input type="email" name="email" class="validate-email" id="jform_contact_email" value="" size="30" required aria-required="true" value="<?php echo !empty($data['email'])?$data['email']:""; ?>"/></div>
            </div>
            <div class="span4">
               <label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasTooltip required" title="<strong>Subject</strong><br />Enter the subject of your message here .">Subject<span class="star">&#160;*</span></label>					
               <div class="controls"><input type="text" name="subject" id="jform_contact_emailmsg" value="" size="60" required aria-required="true" value="<?php echo !empty($data['subject'])?$data['subject']:""; ?>"/></div>
            </div>
         </div>
         <div class="row-fluid">
            <div class="span12">
               <label id="jform_contact_message-lbl" for="jform_contact_message" class="hasTooltip required" title="<strong>Message</strong><br />Enter your message here.">Message<span class="star">&#160;*</span></label>					
               <div class="controls">
                  <textarea name="message" id="jform_contact_message" cols="50" rows="10" required aria-required="true" ><?php echo !empty($data['message'])?$data['message']:""; ?></textarea>					
               </div>
               <div class="control-group">
                  <div class="controls">
                  </div>
               </div>
            </div>
         </div>
         <div class="controls">
            <input type="submit" name="sendmail" value="Send Email" class="btn validate btn-primary pull-right"/>
            <!--button class="btn validate btn-primary pull-right" name="sendmail" value="sendmail" type="submit">Send Email</button-->
            <span id="capcha">
                   <span><input type="text" name="capcha" required aria-required="true" style="margin-top: 12px; width:70px; height:32px"/></span>
                   <span id="show-capcha"></span>
                   <span id="refresh-capcha" title="refresh capcha"></span>
            </span>
            <!--div class="contact_email-copy pull-right">
                
            </div-->	
         </div>
      </fieldset>
   </form>
</div>
  <!-- MISC INFO -->
  <!-- Misc --></main>
              </div>        
              </div>
          </div>
        </div>
      </div>
      </div>
      <style>
        #refresh-capcha{
            background: transparent url("<?php echo base_url().'public/cargo/images/refresh.png'; ?>") no-repeat top left;
            padding:5px 15px;
            cursor: pointer;
            margin-top:20px;
        }
      </style>
    </div>
  </div>
  <?php $this->load->view('default/footer_content'); ?>
    