
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>A Dong Cargo System Control</title>

<!-- Headings -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
<!-- Text -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
<!--[if lt IE 9]> <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" /> <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" /> <![endif]-->
<!-- Core stylesheets do not remove -->
<link href="<?php echo base_url().'public/admin_layout/';?>css/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url().'public/admin_layout/';?>css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
<link href="<?php echo base_url().'public/admin_layout/';?>css/icons.css" rel="stylesheet" />
<!-- Plugins stylesheets -->
<link href="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/uniform/uniform.default.css" rel="stylesheet" />
<!-- app stylesheets -->
<link href="<?php echo base_url().'public/admin_layout/';?>css/app.css" rel="stylesheet" />
<!-- Custom stylesheets ( Put your own changes here ) -->
<link href="<?php echo base_url().'public/admin_layout/';?>css/custom.css" rel="stylesheet" />
<!--[if IE 8]><link href="css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]> </script><script src="js/html5shiv.js"></script></script> <![endif]-->
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?php echo base_url().'public/admin_layout/';?>images/ico/favicon.html">
<!-- Le javascript ================================================== -->
<!-- Important plugins put in all pages -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/conditionizr.min.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/core/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/core/jrespond/jRespond.min.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/jquery.genyxAdmin.js"></script>
<!-- Form plugins -->
<script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/validation/jquery.validate.js"></script>
<!-- Init plugins -->
<script src="<?php echo base_url().'public/admin_layout/';?>js/app.js"></script>
<!-- Core js functions -->
<script src="<?php echo base_url().'public/admin_layout/';?>js/pages/login.js"></script>
<!-- Init plugins only for page -->
</head>
<body>
<div class="container-fluid">
   <div id="login">
      <div class="login-wrapper" data-active="log">
         <a class="brand">
         <img src="<?php echo base_url().'public/admin_layout/images' ?>/logo2.png" alt="Genyx admin">
         </a> 
         <div id="log">
           <!--  <div id="avatar"> 
               <img src="<?php echo base_url().'public/admin_layout/images' ?>/logo.png" alt="Genyx admin">
            </div> -->
            <div class="page-header">
               <h3 class="center">Please login</h3>
            </div>
            <form id="login-form"  method="post" action="<?php echo base_url().'admin/verify/login'; ?>" class="form-horizontal">
               <div class="row-fluid">
                  <div class="control-group">
                     <div class="controls-row">
                        <div class="icon"><i class="icon20 i-user"></i></div>
                        <input class="span12" type="text" name="user" id="user" placeholder="Username" value="<?php echo !empty($username)?$username:""; ?>" />
                     </div>
                  </div>
                  <!-- End .control-group --> 
                  <div class="control-group">
                     <div class="controls-row">
                        <div class="icon"><i class="icon20 i-key"></i></div>
                        <input class="span12" type="password" name="password" id="password" placeholder="Password" value="">
                     </div>
                     <input type="hidden" name="login" value="login"/>
                  </div>
                  <!-- End .control-group --> 
                  <div class="form-actions full"> <label class="checkbox pull-left"> 
                  	<input type="checkbox" value="1" name="remember"> <span class="pad-left5">Remember me ?</span> </label>
                  	<button value="login" id="loginBtn" type="submit" name="login" class="btn btn-primary pull-right span5">Login</button> </div>
                  	<?php
                  		if(!empty($error)){
                  		    echo '<br>';
                  			echo '<ul class="error" style="color:red">';
                  				echo $error;
                  			echo '</ul>';
                  		}
                  	?>
               </div>
               <!-- End .row-fluid -->
            </form>
            <!-- <p class="center">Don`t have an account? <a href="#" id="register"><strong>Create one now</strong></a></p> -->
               <!-- <div class="or center"><strong>or</strong></div> -->
               <!-- <hr class="seperator"> -->
            <!-- <a href="#" class="btn btn-primary pull-left"> -->
            <!-- <i class="icon16 i-facebook gap-left0"></i> Connect</a> <a href="#" class="btn btn-info pull-right"><i class="icon16 i-twitter gap-left0"></i> Connect</a>  -->
         </div>
         <div id="forgot">
            <div class="page-header">
               <h3 class="center">Forgot password</h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/verify/forgot';?>" method="post">
               <div class="row-fluid">
                  <div class="control-group">
                     <div class="controls-row">
                        <div class="icon"><i class="icon20 i-user"></i></div>
                        <input class="span12" type="text" name="username" id="user" placeholder="Username"/> 
                     </div>
                  </div>
                  <!-- End .control-group --> 
                  <div class="control-group">
                     <div class="controls-row">
                        <div class="icon"><i class="icon20 i-envelop-2"></i></div>
                        <input class="span12" type="text" name="email" id="email-field" placeholder="Your email" /> 
                     </div>
                  </div>
                  <!-- End .control-group --> 
                  <div class="form-actions full"> <input type="submit" name="btnforgot" class="btn btn-large btn-block btn-success" value="Recover my password" /> </div>
                  <?php
                  		if(!empty($error)){
                  		    echo '<br>';
                  			echo '<ul class="error" style="color:red">';
                  				echo $error;
                  			echo '</ul>';
                  		}
                 	?>
               </div>
               <!-- End .row-fluid --> 
            </form>
         </div>
      </div>
      <div id="bar" data-active="log">
         <div class="btn-group btn-group-vertical"> <a id="log" href="#" class="btn tipR" title="Login"><i class="icon16 i-key"></i></a> <a id="forgot" href="#" class="btn tipR" title="Forgout password"><i class="icon16 i-question"></i></a> </div>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
</body>
</html>