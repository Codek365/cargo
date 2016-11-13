<?php $this->load->view('default/header');?>
   <body >
      <div id="wrapper">
         <div class="wrapper-inner">
            <?php $this->load->view('default/menu');?>
            <?php $this->load->view('default/slider');?>
            <div id="feature-row">
               <div class="row-container">
                  <div class="container-fluid">
                     <div class="row-fluid">
                     <?php
                        foreach($home_news as $key=>$news){
                            if($news['type']=='hello'){
                                echo '<div class="moduletable hello  span6">
                                       <header>
                                          <h3 class="moduleTitle "><a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html"><b>'.$news['title'].'</b></a></h3>
                                       </header>
                                       <div class="mod-article-single mod-article-single__hello" id="module_105">
                                          <div class="item__module" id="item_65">
                                             <div class="item_introtext">
                                                <p>'.substr($news['summary'], 0, 480).'...<a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html"><b>Read more</b></a></p></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>';
                                    unset($home_news[$key]);
                                    break;
                            }
                        }
                        foreach($home_news as $key=>$news){
                            if($news['type']=='about'){
                                echo '<div class="moduletable about_us  span6">
                                   <header>
                                      <h3 class="moduleTitle "><a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html"><b>'.$news['title'].'</b></a></h3>
                                   </header>
                                   <div class="mod-article-single mod-article-single__about_us" id="module_106">
                                      <div class="item__module" id="item_66">
                                         <div class="item_introtext">
                                            <p>'.substr($news['summary'], 0,600)."...".'<a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html"><b>Read more</b></a></p>
                                         </div>
                                      </div>
                                   </div>
                                </div>';
                                unset($home_news[$key]);
                                break;     
                            }
                        }
                     ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg_cont">
               <div id="maintop-row">
                  <div class="row-container">
                     <div class="container-fluid">
                        <div id="maintop" class="row-fluid">
                           <div class="moduletable blocks  span12">
                              <div class="mod-newsflash-adv mod-newsflash-adv__blocks cols-1" id="module_107">
                              <?php
                              if(!empty($home_news)){
                                $stt=0;
                                foreach($home_news as $news){
                                    echo '<div class="row-fluid">';
                                        if($stt%3==0){
                                            echo '<article class="span12 item item_num0';
                                        }elseif($stt%3==1){
                                            echo '<article class="span12 item item_num1';
                                        }elseif($stt%3==2){
                                            echo '<article class="span12 item item_num2';
                                        }
                                        echo ' item__module  " id="item_67">
                                           <figure class="item_img img-intro img-intro__none">
                                              <a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html">
                                              <img src="'.base_url().'uploads/news_image/'.$news['image'].'" alt=""/>
                                              </a>
                                           </figure>
                                           <div class="item_content">
                                              <h4 class="item_title item_title__blocks">
                                              <a href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html"><b>'.$news['title'].'</b></a>
                                              </h4>
                                              <div class="item_introtext">
                                                 <p>'.substr($news['summary'], 0,600)."...".'</p>
                                              </div>
                                           </div>
                                           <div class="clearfix"></div>
                                        </article>
                                     </div>';
                                     $stt+=1;
                                }
                              }
                              
                              ?>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>              
            </div>
            <div id="bottom-row">
               <div class="row-container">
                  <div class="container-fluid">
                     <div id="bottom" class="row-fluid">
                        <div class="moduletable news  span12">
                           <header>
                              <h3 class="moduleTitle ">Tin Tức</h3>
                           </header>
                           <div class="mod-newsflash-adv mod-newsflash-adv__news cols-3" id="module_108">
                              <div class="row-fluid">
                              <?php
                                if(!empty($lastest_news)){
                                    $date="";
                                    foreach($lastest_news as $news){
                                         $date=date('d/m/y',$news['date']);
                                         $arr_date=explode('/',$date);
                                          echo '<article class="span4 item item_num0 item__module" id="item_70">
                                                    <div class="item_content">
                                                       <time datetime="'.$date.'" class="item_published">
                                                       '.$arr_date[0].'<span>'.$arr_date[1].'</span>
                                                       </time>
                                                       <div class="item_introtext">
                                                          <p>'.substr($news['summary'],0,strripos($news['summary'],' ')).'.</p>
                                                       </div>
                                                       <a class="btn btn-info readmore" href="'.base_url().'news/detail/'.strtolower(url_title($news['title_non_unicode'])).'-'.$news['id'].'.html" ><span>Read more</span></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                 </article>';      
                                    }
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
<?php $this->load->view('default/footer_content'); ?>      
