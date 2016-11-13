<?php //print_r($info); ?>
<?php $this->load->library('Dropdown');?><div class="row-fluid">
<div class="span12">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-table"></i></div>
         <h4><a id="add" href="<?php echo base_url().'admin/role/add'; ?>">ADD</a></h4>
         <!--h4><a id="delete" href="#">DELETE</a></h4-->
         <!--h4><a id="copy" href="#">COPY</a></h4-->
         <h4 id="wait"></h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content">
         <div id="dataTable_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <form style="text-align: left; padding-bottom:10px;" class="form-horizontal" method="POST" action="<?php echo base_url().'admin/city/search';?>">
                    <?php
                    $listCountry[]=array("country_id"=>"90","country_name"=>"Please choose a country");
                    echo $this->dropdown->dropdown($listCountry,'country_name','country_id',"90",array("name"=>"contry_id","style"=>"width:220px","id"=>"contry_id"))
                    ;?>
          <i class=" i-arrow-down-3" style="margin-left:-30px;position:relative"></i>
                      <button style="width: 100px; margin-left: 10px; height:36px" type="submit" value="search" name="search" class="btn btn-primary" id="search">Search</button>
                      <!-- <a style="width: 100px; margin-left: 10px; height:36px; line-height:27px" class="btn btn-primary" href="<?php echo base_url().'admin/customer/index';?>">LẤY TẤT CẢ</a> -->
                  </div>
                </form>
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover dataTable" id="dataTable" aria-describedby="dataTable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >City</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >State</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" >Country</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" ></th>
                  </tr>
               </thead>
               <tbody id="tbl_menu" role="alert" aria-live="polite" aria-relevant="all">
               <?php
                    if(!empty($info)){
                        $stt=0;
                        foreach($info as $item){
                            $stt++;
                            
                                   // <td style="text-align:center">'.$item['city'].'</td>
                            echo '<tr>
                                    <td style="text-align:center">'.$item['states'].'</td>
                                    <td style="text-align:center">'.$item['country'].'</td>
                                    <td style="text-align:center">
                                    <div class="btn-group">
                                        <a class="btn" href="'.base_url().'admin/city/edit/'.$item["city_id"].'"><i class="icon20 i-pencil-5"></i></a>&nbsp;&nbsp;
                                        <a class="btn" accesskey="'.$item['city_id'].'" class="delete_role" href="'.base_url().'admin/role/delete/'.$item["city_id"].'" onclick="return xacnhan(\'Are you sure?\');"><i class="icon20 i-remove-2"></i></a>
                                      </div>
                                        </td>
                                </tr>';
                        }
                    }
               ?>
               </tbody>
            </table>
<?php
    $this->load->library('pagination');
    $config['uri_segment'] = 4;
    $config['num_links'] = 4;
    $config['use_page_numbers'] = TRUE;
    $config['base_url'] = base_url().'admin/city/search';
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