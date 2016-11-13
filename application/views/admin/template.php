<?php $this->load->view('admin/header_script'); ?>
   <body>
      <?php $this->load->view('admin/menu-top'); ?>
      <!-- End #header --> 
      <div class="main">
        <?php $this->load->view('admin/sidebar'); ?>
         
         <!-- End #sidebar --> 
         <section id="content">
            <div class="wrapper">
               <div class="crumb">
                  <ul class="breadcrumb">
                     <li><a href="<?=base_url().$this->uri->segment(1); ?>"><i class="icon16 i-home-4"></i>Home</a> <span class="divider">/</span></li>
                     <li><a href="<?=base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>"><?=$this->uri->segment(2); ?></a> <span class="divider">/</span></li>
                     <li class="active"><?=$this->uri->segment(3); ?></li>
                  </ul>
               </div>
               <div class="container-fluid">
                  <div id="heading" class="page-header">
                     <h1><i class="icon20 i-dashboard"></i><?php echo empty($title_area)?"unknown":$title_area; ?></h1>
                  </div>
                  <?php
                    if($this->session->flashdata('notify')){?>
                    <div class="row-fluid">
                      <div class="span12">
                        <div class="alert alert-success">                
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong><?php echo $this->session->flashdata('notify') ?>!</strong>
                        </div>
                      </div>
                    </div>
                  
                  <?php }?>
                 
                <?php $this->load->view($view); ?>  
 
               </div>
               <!-- End .container-fluid --> 
            </div>
            <!-- End .wrapper --> 
         </section>
      </div>
      <!-- End .main -->
      <?php
            echo '<script>
            $("document").ready(function(){
                setInterval("hideNotify()",10000);
            });
            function hideNotify(){
                $(".alert").hide(500);
            }
        </script>';
    ?>
   </body>
</html>