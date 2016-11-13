            <div id="header-row">
               <div class="row-container">
                  <div class="container-fluid">
                     <header>
                        <div class="row-fluid"></div>
                     </header>
                  </div>
               </div>
            </div>
            <div id="navigation-row" role="navigation">
               <div class="row-container">
                  <div class="container-fluid">
                     <div class="row-fluid">
                        <div id="logo" class="span2">
                           <a href="#">
                                <?php
                                $header=unserialize($layout[0]['data']);
                              ?>
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
                        <?php
                            $page=$this->router->fetch_class();
                        ?>
                        <nav class="moduletable navigation  span7 left">
                           <ul class="sf-menu   sticky" id="module-93">
                              <li class="item-101 <?php echo $page=='home'?'current active':""; ?>"><a href="<?php echo base_url(); ?>">Trang chính</a></li>
                              <li class="item-134 <?php echo $page=='about'?'current active':""; ?>">
                                 <a href="<?php echo base_url().'about'; ?>">A Dong Cargo</a>
                              </li>
                              <li class="item-140 <?php echo $page=='service'?'current active':""; ?>"><a href="<?php echo base_url().'service'; ?>">Dịch vụ</a></li>
                              <li class="item-141 <?php echo $page=='blog'?'current active':""; ?>"><a href="<?php echo base_url().'blog'; ?>">Tin tức</a></li>
                              <li class="item-142 <?php echo $page=='contact'?'current active':""; ?>"><a href="<?php echo base_url().'contact'; ?>">Liên hệ</a></li>
                           </ul>
                           <script>
                              // initialise plugins
                              jQuery(function($){
                              	$('#module-93')
                              		 
                              	.superfish({
                              		hoverClass:    'sfHover',         
                                  pathClass:     'overideThisToUse',
                                  pathLevels:    1,    
                                  delay:         500, 
                                  animation:     {opacity:'show', height:'show'}, 
                                  speed:         'normal',   
                                  speedOut:      'fast',   
                                  autoArrows:    false, 
                                  disableHI:     false, 
                                  useClick:      0,
                                  easing:        "swing",
                                  onInit:        function(){},
                                  onBeforeShow:  function(){},
                                  onShow:        function(){},
                                  onHide:        function(){},
                                  onIdle:        function(){}
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
                        </nav>
                        <div class="moduletable locations  span3">
                           <div class="mod-custom mod-custom__locations">
                              <p><?php
                                $header=unserialize($layout[0]['data']);
                                if(!empty($header['header_info'])){
                                    echo $header['header_info'];
                                }
                              ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>