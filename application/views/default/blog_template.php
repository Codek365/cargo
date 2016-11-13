<?php $this->load->view('default/header');?>
<?php
    if(!empty($styles)){
                foreach($styles as $style){
                    echo '<link href="'.base_url().$style.'" rel="stylesheet" /> ';   
                }
    }
  ?>
<body >
  <!-- Body -->
  <div id="wrapper" style="min-height: 700px">
    <div class="wrapper-inner">        
        <?php $this->load->view('default/menu'); ?>                        
      <div class="bg_cont">      
      <!-- Main Content row -->
      <div id="content-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="content-inner row-fluid">                      
                <div id="component" class="span8">
                  <main role="main"> 
                    <section class="page-blog page-blog__">       
                          <?php  $this->load->view($view); ?>                		
                  	</section>   
                  </main>
                </div>        
                <!-- Right sidebar -->
                <div id="aside-right" class="span4">
                  <aside role="complementary">
                    <div class="moduletable list1"><header><h3 class="moduleTitle ">Relative news</h3></header>
                    <ul class="categories-modulelist1">
                      <?php
                        if(!empty($related_data)){
                            foreach($related_data as $item){
                                echo '<li><a href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">'.$item['title'].'</a></li>';        
                            }
                        }
                      ?>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>           
  </div>
</div>
<?php $this->load->view('default/footer_content') ?>  