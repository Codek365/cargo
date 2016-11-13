<?php

  /*1*/

    if( $info['order_status_id'] == 1){

      /*1*/
      $start='60px';

      $end = '160px';

    }elseif($info['order_status_id'] == 2){

    /*2*/

      $start='220px';

      $end = '260px';

    }elseif($info['order_status_id'] == 3){

    /*3*/

      $start='380px';

      $end = '400px';

    }elseif($info['order_status_id'] == 4){

    /*4*/

      $start='510px';

      $end = '560px';

    }elseif($info['order_status_id'] == 5){

    /*5*/

      $start='640px';

      $end = '670px';

    }elseif($info['order_status_id'] == 6){

    /*6*/

      $start='800px';

      $end = '860px';

    }elseif($info['order_status_id'] == 7){

    /*7*/

      $start='940px';

      $end = '1000px';

   }elseif ($info['order_status_id'] == 8){

    /*8*/

      $start='1090px';

      $end = '1140px';

    }elseif($info['order_status_id'] == 9){

    /*9*/

      $start='1230px';

      $end = '1280px';

   }elseif ($info['order_status_id'] == 10){

    /*10*/

      $start='1380px';

      $end = '1430px';

    }elseif($info['order_status_id'] == 11){

    /*11*/

      $start='1520px';

      $end = '1570px';

   }elseif ($info['order_status_id'] == 12){

    /*12*/

      $start='100%';

      $end = '';

    }

  ?>



  <style>

.cbp_tmtimeline:before{

     /*1*/

    background: linear-gradient(#E17329 <?php if(isset($info)) echo $start?>, #afdcf8 <?php if(isset($info)) echo $end?>);

  }

  .cbp_tmtimeline > li .cbp_tmlabel{

  	padding: 1.5em 2em 1em 2em !important;

  }

  </style>

				<h1 class="center"><?php echo $track;?></h1>

			

			<ul class="cbp_tmtimeline">

				<?php

				$stt=1;

				foreach($status as $key => $item ){ 

				?>

					<?php if( $item['order_status_id'] <= $info['order_status_id'] ){ ?>

					<li>

						<!-- <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span class="activesp"><?php echo $key; ?></span></time> -->

						<div class="cbp_tmicon cbp_tmicon-phone active hidden-sm"></div>

						<div class="cbp_tmlabel activecls">

							<h3><?php echo $item['order_status_name']; ?></h3>

						</div>

					</li>

					<?php  }else{ ?>

					<li>

					

						<div class="cbp_tmicon cbp_tmicon-phone"></div>

						<div class="cbp_tmlabel">

							<h3><?php echo $item['order_status_name']; ?></h3>

						</div>

					</li>

				<?php 

				}/*end if else*/

				$stt++;

				}

				 ?>				

		</ul>

	

