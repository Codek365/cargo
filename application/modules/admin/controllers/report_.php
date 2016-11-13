<?php
class Report extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_type_delivery_report');
        $this->load->model('m_type_ship_report');
        $this->load->model('m_type_payment_report');
        $this->load->model('m_user_positions_report');
        $this->load->model('m_system_report');
        $this->load->model('m_order_report');
    }
    // public function index(){
    //     $this->load->helper('date');
    //     $now=local_to_gmt(time());
    //     $datenowcali = strtotime(date('Y/m/d h:i:s',($now)-(7*3600)));//giờ đang chạy ở california

    //     $startdaycali =strtotime(date('Y/m/d 00:00:00',$datenowcali));//ngày hôm nay 00:00:00
    //     $datetomorrowacali= $startdaycali+(86399);//ngày hôm nay 00:00:00

    //     $yesterday_begin=$startdaycali-(86400);
    //     $yesterday_last=$startdaycali-1;
    //     $this->_data["yesterday"]=date('d/m/Y',$yesterday_begin);
    //     $this->_data["all_user_yesterday"] = $this->m_order_report->listordera_alluser_today($yesterday_begin,$yesterday_last);

    //     $tomorrow_begin=$datetomorrowacali+1;
    //     $tomorrow_last=$datetomorrowacali+(86400);
    //     $this->_data["tomorrow"]=date('d/m/Y',$tomorrow_begin);
    //     $this->_data["all_user_tomorrow"] = $this->m_order_report->listordera_alluser_today($tomorrow_begin,$tomorrow_last);

    //     $this->_data["title_area"]="Report";
    //     $this->_data["today"]=date('d/m/Y',$datenowcali);
    //     $this->_data["info"] = $this->m_order_report->listorderatoday($startdaycali,$datetomorrowacali);

    //     $this->_data["all_user_today"] = $this->m_order_report->listordera_alluser_today($startdaycali,$datetomorrowacali);
    //     $this->_data['view']='report/report';
    //     $this->load->view($this->_data['template'], $this->_data);
    // }
    public function index1(){
        $this->load->helper('date');
        $now=local_to_gmt(time());
        $datenowcali = strtotime(date('Y/m/d H:i:s',($now)-(7*3600)));//giờ đang chạy ở california
        $startdaycali =strtotime(date('Y/m/d',$datenowcali));//ngày hôm nay 00:00:00
        $datetomorrowacali= $startdaycali+(86399);//ngày hôm nay 00:00:00

        // $yesterday_begin=$startdaycali-(86400);
        // $yesterday_last=$startdaycali-1;

        $tomorrow_begin=$datetomorrowacali+1;
        $tomorrow_last=$datetomorrowacali+(86400);
        echo date('d/m/Y',$tomorrow_begin);
    }
    public function index(){
        $this->load->helper('date');
        $this->_data["title_area"]="Report";
        $now=local_to_gmt(time());
        $this->_data["now"]=$now;
        $startdaycali =strtotime(date('Y/m/d 00:00:00',$now ));//đầu ngày dược chọn
        $datetomorrowacali= $startdaycali+(86399);//cuối ngày được chọn
        $day_tomorrow= $startdaycali+(86401);//qua ngày mai luôn

        $start = date('Y/m/d ',$now );
        $end = date('Y/m/d ',$day_tomorrow );

        // $start = '2014-09-24';
        // $end ='2014-09-26';

        $this->_data["today"]=date('F d.Y',($now)-(25200));
        $this->_data["info"] = $this->m_order_report->listorderatoday($startdaycali,$datetomorrowacali);
        // $this->_data["all"] = $this->m_order_report->listordera_alluser_today3('2014-09-23','2014-09-23');//dangtest
        $this->_data["all"] = $this->m_order_report->listordera_alluser_today3($start,$end);//dangtest
        $this->_data["user_pos"] = $this->m_user_positions_report->all();
        $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto3($start,$end);//dangtest

        // echo date('Y/m/d 00:00:00',$now );
        
        $this->_data['view']='report/report1';
        $this->load->view($this->_data['template'], $this->_data);

        // $datenowcali = strtotime(date('Y/m/d h:i:s',($now)-(7*3600)));//giờ đang chạy ở california

        // $startdaycali =strtotime(date('Y/m/d 00:00:00',$datenowcali));//ngày hôm nay 00:00:00
        // $datetomorrowacali= $startdaycali+(86399);//ngày hôm nay 00:00:00


        // $this->_data["title_area"]="Report";
        // $this->_data["today"]=date('d/m/Y',$datenowcali);
        // $this->_data["info"] = $this->m_order_report->listorderatoday($startdaycali,$datetomorrowacali);

        // $this->_data["all_user_today"] = $this->m_order_report->listordera_alluser_today($startdaycali,$datetomorrowacali);
        // $this->_data['view']='report/report1';
        // $this->load->view($this->_data['template'], $this->_data);
    }
     public function dt(){
         $this->load->view("report/data");
     }
      public function data(){
        $this->load->helper('date');
        $datetext=$this->input->post("datetext");
        $other_day=strtotime($datetext);//giờ đang chạy ở california
        $datetext = date('Y-m-d',$other_day);//mục đích chuyển từ (tên tháng ngày.năm)=>(năm-tháng-ngày)
        $this->_data["other_day"]=$other_day;
        $startdaycali =strtotime(date('Y/m/d 00:00:00',$other_day ));//đầu ngày dược chọn
        $datetomorrowacali= $startdaycali+(86399);//cuối ngày được chọn



        $this->_data["today"]=date('F d.Y',$other_day);
        // $this->_data["info"] = $this->m_order_report->listorderatoday1($startdaycali,$datetomorrowacali);
        $this->_data["info"] = $this->m_order_report->listorderatoday1($datetext);
        $this->load->view("report/datareport",$this->_data);
     }
    public function datafromto(){
        //echo "success";
        $a=$this->input->post("a");
        $mang=explode (",", $a);
        $start = $mang[0];
        $end = $mang[1];
        $selected = $mang[2];
        $start_out = strtotime($start);
        $end_out =  strtotime($end);
        $start = date('Y-m-d',$start_out);//mục đích chuyển từ (tên tháng ngày.năm)=>(năm-tháng-ngày)
        $end = date('Y-m-d',$end_out);//mục đích chuyển từ (tên tháng ngày.năm)=>(năm-tháng-ngày)
        $this->_data["user_pos"] = $this->m_user_positions_report->all();
        $this->_data["day_output"] = date('F d.Y',$start_out) ." <b>To</b> ".date('F d.Y',$end_out);
        if($selected == 0 or $selected == -1){
         $this->_data["all"] = $this->m_order_report->listordera_alluser_today3($start,$end);//dangtest
         $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto3($start,$end);//dangtest         
        }else{
        $this->_data["all"] = $this->m_order_report->listordera_alluser_today4($start,$end,$selected);//dangtest
        $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto4($start,$end,$selected);//dangtest
        }
        $this->load->view("report/datafromto",$this->_data);
    }
    public function dataselect(){
        //echo "success";
        $a=$this->input->post("a");
        $mang=explode (",", $a);
        $start = $mang[0];
        $end = $mang[1];
        $selected = $mang[2];
        $start_out = strtotime($start);
        $end_out =  strtotime($end);
        $start = date('Y-m-d',$start_out);//mục đích chuyển từ (tên tháng ngày.năm)=>(năm-tháng-ngày)
        $end = date('Y-m-d',$end_out);//mục đích chuyển từ (tên tháng ngày.năm)=>(năm-tháng-ngày)

        $this->_data["user_pos"] = $this->m_user_positions_report->all();
        $this->_data["day_output"] = date('F d.Y',$start_out) ." <b>To</b> ".date('F d.Y',$end_out);

        // $this->_data["all"] = $this->m_order_report->listordera_alluser_today3('2014-09-23','2014-09-23');//dangtest
        // $this->_data["all"] = $this->m_order_report->listordera_alluser_today4($start,$end,$selected);//dangtest
        // $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto4($start,$end,$selected);//dangtest
        if($selected == 0 or $selected == -1){
         $this->_data["all"] = $this->m_order_report->listordera_alluser_today3($start,$end);//dangtest
         $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto3($start,$end);//dangtest         
        }else{
        $this->_data["all"] = $this->m_order_report->listordera_alluser_today4($start,$end,$selected);//dangtest
        $this->_data["all_user_fromto"] = $this->m_order_report->listordera_alluser_fromto4($start,$end,$selected);//dangtest
        }
        $this->load->view("report/datafromto",$this->_data);
    }
     public function test(){
        //$this->load->view("report/test");

        // $this->_data["title_area"]="Report";
        // echo $now=local_to_gmt(time());
        // $this->load->helper('date');
        // $this->_data["title_area"]="Report";
        // echo $now=local_to_gmt(time());
         echo strtotime('2014-09-26');
     }
     public function detail($user_id,$order_date){
        $this->load->helper('date');

        $this->_data["title_area"]='Report';
        $now=$order_date;
        $this->_data["now"]=$now;
        $startdaycali =strtotime(date('Y/m/d 00:00:00',$now ));//đầu ngày dược chọn
        $datetomorrowacali= $startdaycali+(86399);//cuối ngày được chọn

        $startdaycali=date('Y-m-d',$order_date);
        // echo $startdaycali;
        $this->_data["link_back"]=base_url()."admin/report";
        $this->_data["today"]=date('F d.Y',$now);
        $this->_data["user_day"] = $this->m_order_report->user_day($startdaycali,$user_id);
        $this->_data["user_day_sum"] = $this->m_order_report->user_day_sum($startdaycali,$user_id);
        $this->_data["type_payment"] = $this->m_type_payment_report->all();
        $this->_data["type_ship"] = $this->m_type_ship_report->all();
        $this->_data["type_delivery"] = $this->m_type_delivery_report->all();
        
        
        $this->_data["system"] = $this->m_system_report->all();
        $this->_data["user_pos"] = $this->m_user_positions_report->all();
        
        $this->_data['view']='report/detail';
        $this->load->view($this->_data['template'], $this->_data);
     }
}


 ?>