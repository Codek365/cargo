<?php
    if($this->session->flashdata('contact_notify')){
        echo '<h4 style="color: green;">Your mail has been sent successfully, Thanks...</h4>';
    }elseif($this->session->flashdata('contact_error')){
        echo '<ul class="error_msg">';
            echo $this->session->flashdata('contact_error'); 
        echo '</ul>';
    }else{
        redirect(base_url().'contact');
    }
    if($this->session->flashdata('notify')){
        echo '<h4 style="color: green;">'.$this->session->flashdata('notify').'</h4>';
    }
?>
<br />
you will be redirected to contact page in <span id="waitforredirect">5</span> secs...
<style>
    ul.error_msg{
        
    }
    ul.error_msg li{
        list-style: none;
        color:red;
        font-size:19px;
        line-height:14px;
    }
</style>
<script type="text/javascript">
    setInterval("wait()",999);
    var t=5;
    function wait(){
        if(t==0){
            window.location="<?php echo base_url().'contact';?>";
        }else{
            t=t-1;
            var d=document.getElementById("waitforredirect");
            d.innerHTML=t;
        }
    }
</script>