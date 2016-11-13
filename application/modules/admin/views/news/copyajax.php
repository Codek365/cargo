<?php   
                    $stt=0;
                    foreach($info as $item){
                        $stt+=1;
                        if($stt%2==0){
                            echo '<tr class="gradeA even" id="'.$item['id'].'">';
                        }else{
                            echo '<tr class="gradeA odd" id="'.$item['id'].'">';
                        }
                        echo '<td class="center"><input type="checkbox" class="checkbox chk_item" style="width:22px; height:22px;"/></td>';
                        echo '<td class="center">';
                            if(empty($item['image'])){
                                echo '<img src="'.base_url().'/uploads/thumb_noimage.png'.'" style="width:100px; height:100px;"/>';
                            }else{
                                echo '<img src="'.base_url().'/uploads/news_image/thumb_'.$item['image'].'" style="width:100px; height:100px;" />';
                            }
                            echo'</td>
                             <td class="left">'.$item['title'].'</td>
                             <td class="center">'.date('d/m/Y',$item['date']).'</td>
                             <td class="left">'.$item['name'].'</td>
                             <td class="center">';
                                if($item['status']==1){
                                    echo '<span style="color:green">Enable</span>';
                                }else{
                                    echo '<span style="color:red">Disable</span>';
                                }
                             echo '</td>
                             <td class="center ">
                                <a href="'.base_url().'admin/news/edit/'.$item["id"].'"><img src="'.base_url().'public/genyx/images/edit.png" /></a>&nbsp;&nbsp;
                                <a href="'.base_url().'admin/news/delete/'.$item["id"].'" onclick="return xacnhan(\'Are you sure?\');"><img src="'.base_url().'public/genyx/images/delete.png" /></a>
                             </td>
                          </tr>';
                    }
?>