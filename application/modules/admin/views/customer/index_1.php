<?php $this->load->view('toolbar'); ?>
<div class="row-fluid">
<div class="span12">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <h4><a id="add" href="<?php echo base_url().'admin/customer/list'; ?>">&nbsp;</a></h4>
         <h4 id="wait"></h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content">
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
          
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting" role="columnheader" aria-controls="dataTable" rowspan="1" colspan="1">Name</th>
                     <th class="sorting" role="columnheader" aria-controls="dataTable" rowspan="1" colspan="1">Phone</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Address</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Created date</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Status</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" ></th>
                  </tr>
               </thead>
               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
               <?php
                    $stt=0;
                    foreach($info as $item){
                        $stt+=1;
                        if($stt%2==0){
                            echo '<tr class="gradeA even">';
                        }else{
                            echo '<tr class="gradeA odd">';
                        }?>
                        <td class="center"><?=$item['customer_name']?></td>
                            <td class="center"><?=$item['customer_phone']?></td>
                             <td class="center"><?=$item['customer_address']?></td>
                             <td class="center"><?=date('d/m/Y',$item['customer_date']+(3600*7))?></td>
                             <td class="center" ><?=$item['customer_type']?></td>
                             <td class="center ">
                             <div class="btn-group">                                
                                <a class="btn" title="View" href="<?=base_url().'admin/customer/view/'.$item['customer_id']?>"/><i class="icon16 i-search-3"></i></a>
                                <?php if ($user_E == 1 || $user==1) {?>
                                <a class="btn" title="Delete" href="<?=base_url().'admin/customer/delete/'.$item["customer_id"].'?page='.$page?>" onclick="return alert(\'Are You Sure?\');"><i class="icon16 i-remove-2"></i></a>
                                <?php } ?>
                              </div>
                             </td>
                          </tr>
                    <?php } ?>
               </tbody>
            </table>
            
<?php
    $this->load->library('pagination');
    $config['uri_segment'] = 4;
    $config['num_links'] = 4;
    $config['use_page_numbers'] = TRUE;
    $config['base_url'] = base_url().'admin/customer/index';
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    
    $this->pagination->initialize($config); 
    echo '<div class="pagination">';
    echo $this->pagination->create_links();
    echo '</div>';
?>    
         </div>
      </div>
      <!-- End .widget-content --> 
   </div>
   <!-- End .widget --> 
</div>
<!-- End .span12 -->
</div>