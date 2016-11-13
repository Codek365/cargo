<?php
if(!empty($news_detail)){
	echo '<header class="page_header">
		<h3>'.$news_detail['title'].'</h3></header>';
    echo $news_detail['description'];
}else{
    echo 'Empty';
}
?>