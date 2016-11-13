<header id="header" class="navbar navbar-inverse navbar-fixed-top">

         <div class="navbar-inner">

            <div class="container-fluid">

               <a class="brand" href="<?php echo base_url().'admin/dashboard/index' ?>"><img src="<?php echo base_url() ?>public/admin_layout/images/logo.png" alt="avatar" width="40">   A Dong Cargo System Control</a> 

               <div class="nav-no-collapse">

                  <!-- <div id="top-search">

                     <form action="#" method="post" class="form-search">

                        <div class="input-append"> <input type="text" name="tsearch" id="tsearch" placeholder="Search here ..." class="search-query"> <button type="submit" class="btn"><i class="icon16 i-search-2 gap-right0"></i></button> </div>

                     </form>

                  </div> -->

                  <ul class="nav pull-right">

                     <li class="divider-vertical"></li>

                    <!--  <li class="dropdown">

                        <a href="" class="icon26  i-user-6"  id="online"></a>  </li>

                     <li class="divider-vertical"></li> -->

                     <li class="dropdown">

                        <a href="<?=base_url().'admin/order'; ?>" class="icon26 i-cube4"  id="orderstt"></a>       

                     </li>

                     <li class="divider-vertical"></li>

                     <li class="dropdown">

                        <a href="<?=base_url().'admin/contact/email'; ?>" id="nofmail"  class="icon26 i-envelop-2"></a>



                        

 

                     <script type="text/javascript">

                     </script>

                     <li class="divider-vertical"></li>

                    <li class="dropdown user">

                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php if(empty($avatar['user_avatar'])) echo base_url().'uploads/avatar/thumb_noavatar.png'; else echo base_url().'uploads/avatar/'.$avatar['user_avatar']; ?>" alt="sugge"> <span class="more"><i class="icon16 i-arrow-down-2"></i></span> </a> 

                        <ul class="dropdown-menu">

                            <li><a href="<?php echo base_url().'admin/user/changepassword'?>" class=""><i class="icon16 i-user"></i>Change password</a></li>

                           <li><a href="<?php echo base_url().'admin/user/profile'?>" class=""><i class="icon16 i-user"></i> Profile</a></li>

                           <li><a href="<?php echo base_url().'admin/verify/logout'?>" class=""><i class="icon16 i-exit"></i> Logout</a></li>

                        </ul>

                     </li>

                     <li class="divider-vertical"></li>

                     <li><a href="<?php echo base_url() ?>" target="_blank">View Website <i class="icon20 i-arrow-right-14"></i></a></li>

                     <li class="divider-vertical"></li>

                  </ul>

               </div>

               <!--/.nav-collapse --> 

            </div>

      </header>

<script type="text/javascript">

                           //Calling function

repeatAjax();

function repeatAjax(){

jQuery.ajax({

   type: "POST",

   url: "<?php echo base_url().'admin/nof'; ?>",

   // dataType: 'json',

   data: {mail: 'check'},  

   success: function(resp) {

   var obj = eval ("(" + resp + ")");

   jQuery('#nofmail').html('<span class="notification red">'+ obj.email +'</span>');

   jQuery('#orderstt').html('<span class="notification green">' + obj.order +'</span>');                        

   // jQuery('#online').html('<span class="notification blue">' + obj.online +'</span>');   

   },

   complete: function() {

      setTimeout(repeatAjax,10000); //After completion of request, time to redo it after a second

   }

   });

}                          

</script>

<style type="text/css">

   div.ui-dialog {

      top: 30% !important;

   }

</style>