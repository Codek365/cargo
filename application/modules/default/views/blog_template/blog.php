<?php    foreach($blog_data as $item){?>
        echo '<div class="items-row cols-1 row-0 row-fluid">
			<div class="span12">
			<article class="item column-1">
				<!--  title/author -->
            <header class="item_header" style="padding-bottom: 10px;">
            	<h4 class="item_title"><a style="color: #e17329; text-transform: uppercase;" href="<?php echo .base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id']. ?>html"><?php echo .$item['title']. ?></a></h4></header>
            <!-- info TOP -->
            <!-- Intro image -->
            <figure class="item_img img-intro img-intro__left">
            		<a href="<?php echo .base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id']. ?>.html">
            			<img src="<?php echo .base_url().'uploads/news_image/thumb_'.$item['image']. ?>" alt="" style="width:300px"/>
            				</a>
            	</figure>
            <!-- Introtext -->
            <div class="item_introtext">
            	<p style="align:justify;"><?php echo .substr(substr($item['summary'],0,400),0,strrpos(substr($item['summary'],0,300),' ')). ?>.</p>
            </div>
            <!-- info BOTTOM -->
            <!-- More -->
            <a class="btn btn-info" href="<?php echo .base_url().'news/detail/'.strtolower(url_title($item['title_non_unicode'])).'-'.$item['id']. ?>.html"><span>Read more</span></a>
            	<!-- Tags --><div class="kmt-readon">
            		<span class="kmt-comment aligned-left"></span>
            	</div>
             </article><!-- end item -->
            </div><!-- end spann -->				
            </div>';
    }
<?php }?>