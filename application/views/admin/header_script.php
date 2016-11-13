
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>A Dong Cargo System Control</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="<?php echo base_url().'public/admin_layout/';?>fa/css/font-awesome.min.css" rel="stylesheet">
      <!-- Headings --> 
     <!--  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'> -->
      <!-- Text --> 
      <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> -->
      <!--[if lt IE 9]> 
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
      <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
      <![endif]--> <!-- Core stylesheets do not remove --> 
      <link href="<?php echo base_url().'public/admin_layout/';?>css/bootstrap/bootstrap.css" rel="stylesheet" />
      <link href="<?php echo base_url().'public/admin_layout/';?>css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
      <link href="<?php echo base_url().'public/admin_layout/';?>css/icons.css" rel="stylesheet" />
      <!-- Plugins stylesheets --> 
      <link href="<?php echo base_url().'public/admin_layout/';?>js/plugins/misc/fullcalendar/fullcalendar.css" rel="stylesheet" />
      <link href="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/uniform/uniform.default.css" rel="stylesheet" />
      <link href="<?php echo base_url().'public/admin_layout/';?>js/plugins/ui/jgrowl/jquery.jgrowl.css" rel="stylesheet" />
      <!-- app stylesheets --> 
      <link href="<?php echo base_url().'public/admin_layout/';?>css/app.css" rel="stylesheet" />
      <!-- Custom stylesheets ( Put your own changes here ) --> 
      <link href="<?php echo base_url().'public/admin_layout/';?>css/custom.css" rel="stylesheet" />
      <!--[if IE 8]>
      <link href="css/ie8.css" rel="stylesheet" type="text/css" />
      <![endif]--> <!-- HTML5 shim, for IE6-8 support of HTML5 elements --> <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <![endif]--> <!-- Fav and touch icons --> 
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="<?php echo base_url().'public/admin_layout/';?>images/ico/apple-touch-icon-57-precomposed.png">
      <link rel="shortcut icon" href="<?php echo base_url().'public/admin_layout/';?>images/ico/favicon.png">
      <!-- Le javascript ================================================== --> <!-- Important plugins put in all pages -->
      <script src="<?php echo base_url().'public/admin_layout/';?>js/jquery.min.js"></script>
      
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/uniform/jquery.uniform.min.js"></script>

      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/validation/jquery.validate.js"></script>

      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/select2/select2.js"></script>

      <script src="<?php echo base_url().'public/admin_layout/';?>js/jquery-ui.min.js"></script>

      <script src="<?php echo base_url().'public/admin_layout/';?>js/conditionizr.min.js"></script> 

      <script src="<?php echo base_url().'public/admin_layout/';?>js/bootstrap/bootstrap.js"></script> 

      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/core/nicescroll/jquery.nicescroll.min.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/core/jrespond/jRespond.min.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/jquery.genyxAdmin.js"></script> <!-- Charts plugins --> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.pie.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.resize.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.tooltip.min.js"></script> 
      <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.orderBars.js"></script>
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/jquery.flot.time.min.js"></script> 
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/sparklines/jquery.sparkline.min.js"></script> 
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/flot/date.js"></script> <!-- Only for generating random data delete in production site--> 
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/charts/pie-chart/jquery.easy-pie-chart.js"></script> 
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/forms/uniform/jquery.uniform.min.js"></script> <!-- Misc plugins --> 
       <script src="<?php echo base_url().'public/admin_layout/';?>js/plugins/misc/fullcalendar/fullcalendar.min.js"></script> <!-- UI plugins --> 
        <?php
            if($this->session->flashdata('notify_login')){
                  echo $this->session->flashdata('notify_login');
                  echo '<script src="'.base_url().'public/admin_layout/js/plugins/ui/jgrowl/jquery.jgrowl.min.js"></script> <!-- Init plugins --> ';
            }
            if(!empty($scripts)){
                foreach($scripts as $script){
                    echo '<script src="'.base_url().$script.'"></script> <!-- Init plugins --> ';   
                }
            }
            if(!empty($styles)){
                foreach($styles as $style){
                    echo '<link href="'.base_url().$style.'" rel="stylesheet" /> ';   
                }
            }
      ?>
        <script type="text/javascript">
            var base_url="<?php echo base_url(); ?>";
        </script>
       <script src="<?php echo base_url().'public/admin_layout/';?>js/app.js"></script><!-- Core js functions --> 
       <script type="text/javascript">
        var base_url="<?php echo base_url();?>";
        function xacnhan(msg) {
            if (!window.confirm(msg)) {
                return false;
            }
            return true;
        }
    </script>
   </head>
