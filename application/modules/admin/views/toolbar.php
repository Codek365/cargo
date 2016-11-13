<div class="btn-group">
    <a href="<?php echo base_url().'admin/order/' ?>" class="btn btn-danger btn-large">
      <i class="icon20 i-clipboard-4"></i>  Order List</a>
    <a href="<?php echo base_url().'admin/customer/' ?>" class="btn btn-warning btn-large">
      <i class="icon20  i-users-3"></i>  Customer List</a>
    <!-- <a href="<?php echo base_url().'admin/order/add' ?>" class="btn btn-info btn-large"> -->
      <!-- <i class="icon20  i-stack-plus"></i>  Create New Order</a> -->
    <a href="<?php echo base_url().'admin/order/quickadd' ?>" class="btn btn-info btn-large">
      <i class="icon20  i-stack-plus"></i>  Quick Order</a>
    
     
</div>
<div class="pull-right">
  <!-- <a href="<?php echo base_url().'admin/contact/email' ?>" class="btn btn-primary btn-large">
      <i class="icon20 i-envelop-2 "></i>Email Manager</a> -->
   <a href="<?php echo base_url().'admin/report/detail/'.$user.'/'.date($now) ?>" class="btn btn-primary btn-large">
      <i class="icon20 i-pie-7 "></i>Report</a>
</div>
<hr>