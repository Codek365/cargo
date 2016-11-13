<?php $this->load->view('default/header');?>
<?php
    if(!empty($styles)){
                foreach($styles as $style){
                    echo '<link href="'.base_url().$style.'" rel="stylesheet" /> ';   
                }
    }
  ?>
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
              <div id="component" class="span12" style="margin-left:80px">
                <main role="main"> 
                  <section class="page-blog page-blog__">       
                        <header class="page_header">
                          <h3><span class="item_title_part0" style="margin-left:10px;font-size:30px">Our Services</span></h3>
                        </header>
                        <!-- Filter -->
                        <div >
                          <?php foreach($service_news as $num => $item){?>  
                            <?php for ($i=0; $i < 2; $i++) { ?>                            
                              <?php if($i == $num) {?>
                                <div class="span5 thumbnail mntop" style="height:250px;padding:10px; margin:10px; overflow:hidden">
                                <h4 style="font-size:20px"><?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">'.$item['title'].'</a>' ?></h4><br>
                                <?php echo substr($item['summary'], 0 , 700) ?>....<?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">Read more</a>' ?>
                                </div> 
                              <?php } ?>
                            <?php } ?>
                          <?php }?>
                        </div>
                        <div>
                          <?php foreach($service_news as $num => $item){?>  
                            <?php for ($i=2; $i < 4; $i++) { ?>                            
                              <?php if($i == $num) {?>
                                <div class="span5 thumbnail mntop" style="height:250px;padding:10px; margin:10px;overflow:hidden">
                                <h4 style="font-size:20px"><?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">'.$item['title'].'</a>' ?></h4><br>
                                <?php echo substr($item['summary'], 0 , 700) ?>....<?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">Read more</a>' ?>
                                </div> 
                              <?php } ?>
                            <?php } ?>
                          <?php }?>
                        </div>
                        <div>
                          <?php foreach($service_news as $num => $item){?>  
                            <?php for ($i=4; $i < 6; $i++) { ?>                            
                              <?php if($i == $num) {?>
                                <div class="span5 thumbnail mntop" style="height:250px;padding:10px; margin:10px;overflow:hidden">
                               <h4 style="font-size:20px"><?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">'.$item['title'].'</a>' ?></h4><br>
                                <?php echo substr($item['summary'], 0 , 700) ?>....<?php echo '<a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">Read more</a>' ?>
                                </div> 
                              <?php } ?>
                            <?php } ?>
                          <?php }?>
                        </div>
                  </section>   
                 </main>
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