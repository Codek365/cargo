<?php 
$lv1 = $this->m_user->loadPermissionGroup($user_group);
?>

<aside id="sidebar">
           <div class="side-options">
               <ul>
                  <li><a href="#" id="collapse-nav" ><i class="icon32 i-arrow-left-2" ></i></a></li>
               </ul>
            </div>
            <div class="sidebar-wrapper">
             
               <nav id="mainnav">
                  <ul class="nav nav-list">
                     <?php foreach ($lv1 as $k => $menu) {?>
                     <li <?php if (($position.'/index') == $menu['user_router_link']) {echo "class='current'";} ?>>
                        
                     <?php  $lv2 = $this->m_user->loadRoutersByPermissionLv2($menu['user_router_id']);
                        if (count($lv2) > 0) {
                     ?>
                        <a href="#"><span class="icon"><i class="<?php echo $menu['icon'] ?>"></i></span><span class="txt"><?php echo $menu['user_router_name'] ?></span></a>
                        <ul class="sub">                        
                           <?php foreach ($lv2 as $k => $menulv2) {?>
                           <li ><a   href="<?php echo base_url().'admin/'.$menulv2['user_router_link']; ?>"><span class="icon"><i class="<?php echo $menulv2['icon'] ?>"></i></span><span class="txt"><?php echo $menulv2['user_router_name'] ?></span></a></li>
                           <?php } ?>
                        </ul>
                         <?php } else {?>
                           <a href="<?php echo base_url().'admin/'.$menu['user_router_link']; ?>" ><span class="icon"><i class="<?php echo $menu['icon'] ?>"></i></span><span class="txt"><?php echo $menu['user_router_name'] ?></span></a>
                         <?php } ?>
                     </li>                    
                     <?php } ?>
					 <!--=====================================TRINH THEM (17/12/2014 10:22)=============================-->
                      <li>
                        <a href="<?php echo base_url()."admin/warehouse/shipment_index"; ?>" class="rotateOut">
                          <span class="icon"><i class="icon26 i-cube4"></i></span><span class="txt">Shipment List</span>
                        </a>
                      </li>
                    <!--==================================###TRINH THEM (17/12/2014 10:22)###==========================-->
                  </ul>
               </nav>                
            </div>
            <!-- End .sidebar-wrapper --> 
         </aside>
