<?php
    if($this->session->flashdata('notify')){
        echo '<span style="color:red; font-size:16px">'.$this->session->flashdata('notify').'</span>';
    }elseif($this->session->flashdata('error')){
        echo '<span style="color:red; font-size:16px">'.$this->session->flashdata('error').'</span>';
    }
?>
<br/>Bạn sẽ được chuyển đến trang chủ trong <span id="waitforredirect">5</span> giây...
<script type="text/javascript">
    setInterval("wait()",999);
    var t=5;
    function wait(){
        if(t==0){
            window.location=<?php echo '"'.base_url().'admin/dashboard/index"';?>
        }else{
            t=t-1;
            var d=document.getElementById("waitforredirect");
            d.innerHTML=t;
        }
    }
</script>