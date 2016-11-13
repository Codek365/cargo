<div class="row-fluid">
<div class="span12">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <h4><a id="add" href="<?php if(empty($page)){echo base_url().'admin/news/add';}else{echo base_url().'admin/news/add?pageurl='.$page;} ?>">ADD</a></h4>
         <h4><a id="delete" href="#">DELETE</a></h4>
         <!--h4><a id="copy" href="#">COPY</a></h4-->
         <h4 id="wait"></h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content">
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
         
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                    <th role="columnheader" aria-controls="dataTable" rowspan="1" colspan="1"><input type="checkbox" id="checkall" class="checkbox" /></th>
                     <th class="sorting" role="columnheader" aria-controls="dataTable" rowspan="1" colspan="1">Image</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Title</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Date</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >News Type</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Sort</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Status</th>
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
                        echo '<td class="center"><input type="checkbox" class="checkbox chk_item"/></td>';
                        echo '<td class="center">';
                            if(empty($item['image'])){
                                echo '<img src="'.base_url().'/uploads/thumb_noimage.png'.'"style="height:100px;width:100px"/>';
                            }else{
                                echo '<img src="'.base_url().'/uploads/news_image/thumb_'.$item['image'].'" style="height:100px;width:100px"/>';
                            }
                            echo'</td>
                             <td class="left">'.$item['title'].'</td>
                             <td class="center">'.$item['page'].'</td>
                             <td class="center">'.$item['sort'].'</td>
                             <td class="center">'.date('d/m/Y',$item['date']).'</td>
                             <td class="center">';
                                if($item['status']==1){
                                    echo '<span style="color:green">Enable</span>';
                                }else{
                                    echo '<span style="color:red">Disable</span>';
                                }
                             echo '</td>
                             <td class="center ">
                                <a title="Edit" href="'.base_url().'admin/news/edit/'.$item["id"];
                                if(!empty($page)){
                                    echo '?pageurl='.$page;
                                }
                                echo '"><img src="'.base_url().'public/admin_layout/images/edit.png" /></a>&nbsp;&nbsp;
                                <a title="Delete" href="'.base_url().'admin/news/delete/'.$item["id"];
                                if(!empty($page)){
                                    echo '?pageurl='.$page;
                                }
                                echo'" onclick="return xacnhan(\'Are you sure?\');"><img src="'.base_url().'public/admin_layout/images/delete.png" /></a>
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
<script type="text/javascript">
$(document).ready(function(){
    //CHECK ALL
           $('#checkall').click(function() {
                var c = this.checked;
                $(':checkbox').prop('checked',c);
           });
    //DELETE
        //DELETE
        $("#delete").on('click',function(){
            $("#wait").html("Please wait...");
            var count_item=0;
            var id_arr=new Array();
            $("input.chk_item").each(function(){
                if($(this).is(":checked")){
                    var id=$(this).parents('tr').attr('id');
                    id_arr.push(id);
                }else{
                    count_item+=1;
                }
            });
            if(count_item==$("input.chk_item").length){
                $("#wait").html("");
                alert("You haven't chose any item yet!");
            }
            var JsonString = JSON.stringify(id_arr);
            //XU LY AJAX DE XOA
            if(JsonString!=""){
                $.ajax({
                    url:base_url+"admin/news/deleteAjax?id="+JsonString,
                    type:"get",
                    success:function(res){
                        if(res!=0){
                            alert('Error');
                        }else if(res==0){
                            $("input.chk_item").each(function(){
                                if($(this).is(":checked")){
                                    $(this).parents('tr').fadeOut(500);
                                }
                            });
                            $("#wait").html("");
                        }
                    }
                });
            }
            return false;
        });
        //XU LY AJAX DE COPY
        $(document).on('click','#copy',function(){
            $("#wait").html("Please wait...");
            var count_item=0;
            var id_arr=new Array();
            $("input.chk_item").each(function(){
                if($(this).is(":checked")){
                    var id=$(this).parents('tr').attr('id');
                    id_arr.push(id);
                }else{
                    count_item+=1;
                }
            });
            if(count_item==$("input.chk_item").length){
                $("#wait").html("");
                alert("You haven't chose any item yet!");
            }
            var JsonString = JSON.stringify(id_arr);
            if(JsonString!=""){
                $.ajax({
                    url:base_url+"admin/news/copyAjax?id="+JsonString,
                    type:"get",
                    success:function(res){
                        if(res==1){
                            alert('Error');
                        }else{
                            $("#tbl_menu").prepend(res);
                            $("#wait").html("");
                        }
                    }
                });
            }
            return false;
        });
});
</script>