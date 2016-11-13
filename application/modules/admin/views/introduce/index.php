<div class="row-fluid">
<div class="span12">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <!--h4><a id="add" href="<?php //echo base_url().'admin/member/add'; ?>">ADD</a></h4-->
         <!--h4><a id="delete" href="#">DELETE</a></h4-->
         <!--h4><a id="copy" href="#">COPY</a></h4-->
         <h4>Introduction news</h4>
         <h4 id="wait"></h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content">
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
         
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Title</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Summary</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Action</th>
                  </tr>
               </thead>
               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
               <?php
                    $stt=0;
                    foreach($info as $item){
                        $stt+=1;
                        if($stt%2==0){
                            echo '<tr class="gradeA even" id="'.$item['id'].'">';
                        }else{
                            echo '<tr class="gradeA odd" id="'.$item['id'].'">';
                        }
                         echo '<td class="left">'.$item['title'].'</td>
                             <td class="left">'.$item['summary'].'</td>
                             <td class="center ">
                                <a title="Edit" href="'.base_url().'admin/introduce/edit/'.$item["id"].'"><img src="'.base_url().'public/admin_layout/images/edit.png" /></a>&nbsp;&nbsp;
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