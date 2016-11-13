<?php $this->load->view('default/header');?>
<?php
    if(!empty($styles)){
                foreach($styles as $style){
                    echo '<link href="'.base_url().$style.'" rel="stylesheet" /> ';   
                }
    }
  ?>
   <link rel="stylesheet" href="<?php echo base_url().'public/cargo/timeline/css/'; ?>component.css" type="text/css"/> 
<script src="<?php echo base_url().'public/cargo/timeline/js/'; ?>modernizr.custom.js" type="text/javascript"></script>
  <body class="com_content view-category task- itemid-141 body__">
  
  <!-- Body -->
  <div id="wrapper">
    <div class="wrapper-inner">
      <!-- Header -->            
      <!-- Navigation -->
      <?php $this->load->view('default/menu'); ?>
                        
      <div class="bg_cont" style="padding-top:20px;padding-bottom:40px">       
      <!-- Main Content row -->
      <div id="content-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="content-inner row-fluid">                      
              <div id="component" class="span10" style="margin-left:10px">                 
                  <?php $this->load->view($view,$info);  ?>
              </div>            
            </div>
          </div>
        </div>
      </div>   
    </div>           
  </div>
</div>
<style type="text/css">
  .border{
    border: 1px solid #ccc;
  }
</style>
 <?php $this->load->view('default/footer_content') ?>  