<?php $this->load->view('default/header');?>
<body class="com_content view-category task- itemid-134 body__">
  <!-- Body -->
  <div id="wrapper">
    <div class="wrapper-inner">
            <!-- Header -->
                  <!-- Navigation -->
            <?php $this->load->view('default/menu');?>
                        <!-- Feature -->
      <div id="feature-row">
        <div class="row-container">
          <div class="container-fluid">
            <div class="row-fluid">
            <?php
                if(!empty($about_news)){
                    foreach($about_news as $key=>$item){
                        echo '<div class="moduletable who_we_are  span12"><header><h3 class="moduleTitle "><a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html">'.$item['title'].'</a></h3></header><div class="mod-article-single mod-article-single__who_we_are" id="module_109">
                        	<div class="item__module" id="item_73">
                        		<!-- Intro Text -->
                                <a  href="'.base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id'].'.html"><img class="fleft" style="width:300px" src="'.base_url().'uploads/news_image/'.$item['image'].'" alt="" /></a>
                        		<div class="item_introtext">'.$item['description'].'</div>	
                        	</div>';
                         unset($about_news[$key]);
                         break;
                    }
                }
            ?>
    
  </div></div>
            </div>
          </div>
        </div>
      </div>
            
      <div class="bg_cont ">              
      <div id="bottom-row">
        <div class="row-container">
          <div class="container-fluid">
            <div id="bottom" class="row-fluid">
              <div class="moduletable objectives  span12"><header><h3 class="moduleTitle "><span class="item_title_part0">Our</span> <span class="item_title_part1">Objectives</span> </h3></header><div class="mod-newsflash-adv mod-newsflash-adv__objectives cols-3" id="module_112">
    <div class="row-fluid">
    
    <?php
        foreach($about_intro as $key=>$intro){
            //if($intro['id']==1){
                echo '<article class="span4 item item_num'.($intro['id']-1).' item__module  " >
                <div class="item_content">
            	<!-- Item title -->
            		<h4 class="item_title item_title__objectives">
            		<span class="item_title_part0">Our</span> <span class="item_title_part1">'.$intro['title'].'</span> 	</h4><br>
            		<!-- Introtext -->
            	<div class="item_introtext">
            		<p>'.$intro['summary'].'</p>
            	</div>
            	
            	<!-- Read More link -->
            	</div>
                <div class="clearfix"></div>  </article>';
               // unset($about_intro[$key]);
                //break; 
            //}        
        }
    ?>


    </div> 
  <div class="clearfix"></div>

  </div>
</div>
            </div>
          </div>
        </div>
      </div>
            
    </div>
  </div>
 <?php $this->load->view('default/footer_content') ?>
    