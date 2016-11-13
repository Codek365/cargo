<h5>Trang không tồn tại, sẽ chuyển đến trang chủ trong <span id="waitforredirect">5</span> giây...</h5>
<script type="text/javascript">
    setInterval("wait()",999);
    var t=5;
    function wait(){
        if(t==0){
            window.location=<?php echo '"'.base_url().'"';?>
        }else{
            t=t-1;
            var d=document.getElementById("waitforredirect");
            d.innerHTML=t;
        }
    }
</script>