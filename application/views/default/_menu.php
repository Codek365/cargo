<link rel="stylesheet" href="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/css/superfish.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/css/superfish-navbar.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/css/superfish-vertical.css" type="text/css" />


<script src="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/js/superfish.min.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/js/jquery.mobilemenu.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/js/hoverIntent.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/js/supersubs.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/modules/mod_superfish_menu/js/sftouchscreen.js" type="text/javascript"></script>
<script src="<?php echo base_url().'public/cargo'; ?>/templates/theme1981/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<style type="text/css">
.mntop{
 -webkit-box-shadow: 0px 1px 7px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 1px 7px 0px rgba(0,0,0,0.75);
box-shadow: 0px 1px 7px 0px rgba(0,0,0,0.75);
}
.sd{
-webkit-box-shadow: -9px -1px 16px -3px rgba(250,250,250,1);
-moz-box-shadow: -9px -1px 16px -3px rgba(250,250,250,1);
box-shadow: -9px -1px 16px -3px rgba(250,250,250,1);
}
.rd{
  border-radius: 0px 5px 5px 0px !important;
-moz-border-radius: 0px 10px 10px 0px;
-webkit-border-radius: 0px 10px 10px 0px;
}
.cursor{
  cursor: pointer;
}
</style>
<div id="navigation-row" role="navigation" class="mntop">
  <div class="row-container ">
    <div class="container-fluid ">
      <div class="row-fluid">
        <div id="logo" class="span3">
          <a href="<?php echo base_url() ?>">
            <?php $header=unserialize($layout[0]['data']);?>
              <img src="<?php
                                if(empty($header['logo'])){
                                    echo base_url().'uploads/logo/nologo.png';
                                }else{
                                    echo base_url().'uploads/logo/'.$header['logo'];
                                }
                              ?>" alt="Transportation" />
                              
            <h1>Transportation</h1>
          </a>
        </div>
        <?php $page=$this->router->fetch_class();?>
          <nav class="moduletable navigation  span6 left">
            <ul class="sf-menu   sticky" id="module-93">                              
              <li class="<?php echo $page=='about'?'current active':""; ?>">
                <a href="<?php echo base_url().'about'; ?>">Á Đông</a>
              </li>
              <li class="<?php echo $page=='service'?'current active':""; ?>"><a href="<?php echo base_url().'service'; ?>">Dịch vụ</a></li>
              <li ><a href="#myModal" role="button"  data-toggle="modal">Shopping</a></li>

              <!-- <li class="<?php echo $page=='blog'?'current active':""; ?>"><a href="<?php echo base_url().'blog'; ?>">Tin tức</a></li> -->
              <li class="<?php echo $page=='contact'?'current active':""; ?>"><a href="<?php echo base_url().'contact'; ?>">Contact Us</a></li>
              <!-- <li ><a href="#login"  role="button"  data-toggle="modal">Login</a></li> -->
            </ul>                           
          </nav>
          <div class="moduletable locations  span3 hidden-phone hidden-tablet">
          <div class="mod-custom " style="padding: 12px 0px 15px 10px;">           
            <form style="margin:0 !important"> 
                <div class="row ">         
                <p class="span12 "  style="padding-bottom:0;text-align:center;text-transform: capitalize;font-size: 17px;"><?php $header=unserialize($layout[0]['data']);if(!empty($header['header_info'])){
                      echo $header['header_info'];}?>&nbsp;&nbsp;&nbsp;</p>
                </div>           
                <div class="row ">                  
                  <div class="span2" ><i class="fa fa-archive fa-2x fa-border" style="position:relative;z-index:1;color:#e17329;background:#fff;border:1px solid #fff;margin-top:1px;"></i></div>
                  <div class="span10" style="margin-left:-10px"><input id="track" type="text" placeholder="Enter tracking number" class="rd" style="width: 100% !important;height:34px;background:#fff;box-shadow:none; font-style: italic;"><i class="fa fa-search fa-2x cursor" style="color:#e17329;margin-left: -25px;margin-top:6px;background:#fff"></i></div>                 
                  
                </div>             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
 // initialise plugins
jQuery(function($){
$('#module-93')                                  
.superfish({
  hoverClass:    'sfHover',         
  pathClass:     'overideThisToUse',
  // pathLevels:    1,    
  // delay:         500, 
  animation:     {opacity:'show', height:'show'}, 
  // speed:         'normal',   
  // speedOut:      'fast',   
  autoArrows:    false, 
  disableHI:     false, 
  useClick:      0,                                  
  })
.mobileMenu({
  defaultText: "Navigate to...",
  className: "select-menu",
  subMenuClass: "sub-menu"
});                                 
  var ismobile = navigator.userAgent.match(/(iPhone)|(iPod)|(android)|(webOS)/i)
  if(ismobile){
    $('#module-93').sftouchscreen();
  }
    $('.btn-sf-menu').click(function(){
                                  $('#module-93').toggleClass('in')
    });
  if (typeof $.ScrollToFixed == 'function') {
    $('#module-93').parents('[id*="-row"]').scrollToFixed({minWidth :768});
  }
})
</script>                             
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    
  </div>
  <div class="modal-body">
    <center><h3>COMING SOON!</h3></center>
    <button class="btn pull-right" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
  <div class="modal-footer">
    
  </div>
</div>
<!-- Modal -->
<div id="" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    
  </div>
  <div class="modal-body">
    <button class="btn pull-right" data-dismiss="modal" aria-hidden="true">Close</button>
    <div>
      <?php
    if(!$this->session->userdata('customer_id')){
        echo '<header><h3 class="moduleTitle ">Login form</h3></header><div class="mod-login mod-login__aside">
  <form action="'.base_url().'default/customer/login'.'" method="post" class="">
        <div class="mod-login_userdata">
      <label for="mod-login_username101" class="">User name</label>
      <input id="mod-login_username101" class="inputbox mod-login_username" type="text" name="username" tabindex="1" size="18" placeholder="User name" required>
      <label for="mod-login_passwd101" class="">Password</label>
      <input id="mod-login_passwd101" class="inputbox mod-login_passwd" type="password" name="password" tabindex="2" size="18" placeholder="Password"  required>
            <label for="mod-login_remember101" class="checkbox">
        <input id="mod-login_remember101" class="mod-login_remember" type="checkbox" name="remember" value="yes">
        Remember me</label> 
        <div class="mod-login_submit">
                <input type="hidden" name="url" value="'.ltrim($_SERVER['PATH_INFO'],'/').'"/>
        <button type="submit" value="submit" tabindex="3" name="submit" class="btn btn-primary">Log in</button>';
                    if($this->session->flashdata('error')){
                        echo '<ul id="error_msg">';
                        $error=$this->session->flashdata('error');
                        if(is_array($error)){
                            foreach($error as $item){
                                echo '<li>'.$item.'<li>';
                            }
                        }else{
                            echo $error;
                        }
                        echo '</ul>';
                    }
                    if($this->session->flashdata('notify')){
                        echo '<p style="color:green;">'.$this->session->flashdata('notify').'</p>';
                    }
                echo '</ul>
                  </div>
                    <style>
                                ul#error_msg li{ color:red; font-size:14px; font-weight:bold}
                            </style>        
                  <ul class="unstyled">
                    <li><a href="'.base_url().'customer/forgotpassword'.'" class="" title="Forgot your password?">Forgot your password?</a></li>
                    <li><a href="'.base_url().'customer/register'.'">Create an account</a></li>
                  </ul>
                  </form>
            </div></div>';
    }else{
        echo '<header><h3 class="moduleTitle ">Your account</h3></header><div class="mod-login mod-login__aside">';
        echo '<ul class="unstyled">
        <li><a href="#" class="" title="">Hi, '.$this->session->userdata('customer_username').'</a></li>
        <li><a href="'.base_url().'customer/changepassword'.'">Change password</a></li>
                <li><a href="#" class="" title="">Your profile</a></li>
                <li><a href="'.base_url().'customer/logout'.'">Logout</a></li>
      </ul>';
    }
   ?>
    </div>
  </div>
  <div class="modal-footer">
    
  </div>
</div>
