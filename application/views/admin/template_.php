<?php $this->load->view('admin/header_script'); ?>
 <script type="text/javascript">
            var base_url="<?php echo base_url(); ?>";
        </script>
       <script type="text/javascript">
        var base_url="<?php echo base_url();?>";
        function xacnhan(msg) {
            if (!window.confirm(msg)) {
                return false;
            }
            return true;
        }
    </script>
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
   <body>
      <!-- menu top -->
      <?php $this->load->view('admin/menu-top'); ?>
      <div class="main">
      <!-- sidebar  -->
         <?php $this->load->view('admin/sidebar'); ?>
         <!-- End #sidebar --> 
         <section id="content">
            <div class="wrapper">
               <div class="crumb">
                  <ul class="breadcrumb">
                     <li><a href="<?php echo base_url().'admin' ?>"><i class="icon16 i-home-4"></i>Home</a> <span class="divider">/</span></li>
                     <li><a href="<?php echo base_url().'admin' ?>"><?php echo $this->uri->segment(2) ?></a> <span class="divider">/</span></li>
                     <li class="active"><?php echo $this->uri->segment(3) ?></li>
                  </ul>
               </div>
               <div class="container-fluid">
                  <div id="heading" class="page-header">
                     <h1><i class="icon20 i-dashboard"></i><?php echo empty($title_area)?"unknown":$title_area; ?></h1>
                  </div>
                  <?php
                    if($this->session->flashdata('notify')){
                        echo '<p class="notify result_msg">'.$this->session->flashdata('notify').'</p>';
                    }
                  ?>
                <?php $this->load->view($view); ?>  
 
               </div>
               <!-- End .container-fluid --> 
            </div>
            <!-- End .wrapper --> 
         </section>
      </div>
      <!-- End .main -->
      <?php
        if($this->session->flashdata("notify") || $this->session->flashdata("error")){
            echo '<script type="text/javascript" src="'.base_url().'/public/admin_layout/scripts/jquery-1.10.2.min.js"></script>';
            echo '<script>
            $("document").ready(function(){
                setInterval("hideNotify()",3000);
            });
            function hideNotify(){
                $(".notify").hide(500);
            }
        </script>';
        }
    ?>
   </body>
</html>