<div class="span10">
   <div class="widget">
      <div class="widget-title">
         <div class="icon"><i class="icon20 i-images"></i></div>
         <h4>All status</h4>
         <a href="#" class="minimize"></a> 
      </div>
      <!-- End .widget-title --> 
      <div class="widget-content noPadding">
         <table class="table table-bordered table-hover table-striped">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Notes</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php if(!empty($info))?>
               <?php foreach ($info as $key => $value){?>
               <tr>
                  <td class="center vcenter"><?php echo $key; ?></td>
                  <td class="left"><?php echo $value['order_status_name']; ?></td>
                  <td><?php echo $value['order_status_notes']; ?></td>
                  <td class="center vcenter">
                     <div class="btn-group"> 
                        <a href="<?php echo base_url().'admin/progress_status/update/'.$value['order_status_id']; ?>" class="btn tip" title="" data-original-title="Edit"><i class="icon16 i-pencil"></i></a> 
                        <?php if ($user_E == 1 || $user==1) {?>
                        <a href="<?php echo base_url().'admin/progress_status/delete/'.$value['order_status_id']; ?>" class="btn tip" title="" data-original-title="Remove"><i class="icon16 i-remove"></i></a>
                        <?php } ?>
                     </div>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>

      </div>
      <!-- End .widget-content --> 
   </div>
   <!-- End .widget --> 
    <hr>
         <a href="<?php echo base_url().'admin/progress_status/add' ?>" class="btn pull-right"><i class="icon20 i-plus-circle-2"></i>ADD</a>
</div><html>
<body>
<script type="text/javascript">
	parent.processForm('&ftpAction=openFolder');
</script>
</body>
</html>
