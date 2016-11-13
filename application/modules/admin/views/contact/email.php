<?php $this->load->view('toolbar'); ?>
<div class="row-fluid">
<div class="span12">

   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <h4>&nbsp;</h4>
         <h4 id="wait"></h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content">
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
         
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting" role="columnheader" aria-controls="dataTable" width="25%">Name</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable">Email</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable">Subject</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" >Message</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" >Status</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" >Action</th>
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
                        }
                        echo '<td class="center">'.$item['name'].'</td>
                             <td class="center">'.$item['email'].'</td>
                             <td class="center">'.$item['subject'].'</td>
                             <td class="center">'.$item['message'].'</td>
                             <td class="center">';echo ($item['status']==1)?'<span style="color:green">Read</span>':'<span style="color:red">Unread</span>';echo '</td>
                             <td class="center ">
                             <div class="btn-group">
                                <a class="btn" title="View" href="'.base_url().'admin/contact/view/'.$item['id'].'"/><i class="icon16 i-search-3"></i></a>
                                <a class="btn" title="Delete" href="'.base_url().'admin/contact/deleteemail/'.$item["id"].'" onclick="return xacnhan(\'Are you sure?\');"><i class="icon16 i-remove-2"></i></a>
                              </div>
                             </td>
                          </tr>';
                    }
               ?>
               </tbody>
            </table>
         </div>
      </div>
      <!-- End .widget-content --> 
   </div>
   <!-- End .widget --> 
</div>
<!-- End .span12 -->
</div>
</script>