<?php
    class Mail{
        public function send($to=array(),$body='',$subject='',$attach=null){
            $config = Array( 
                  'protocol' => 'smtp', 
                  'smtp_host' => 'ssl://smtp.googlemail.com', 
                  'smtp_port' => 465,
                  'mailtype' =>'html',
                  'smtp_user' => 'coderfarm@gmail.com', 
                  'smtp_pass' => '@@@Coder@@@', );
            $CI=&get_instance();
            $CI->load->library('email', $config); 
              $CI->email->set_newline("\r\n");
              $CI->email->from('coderfarm@gmail.com', 'ATZ Company');
              $CI->email->to($to);
              $CI->email->subject($subject);
              $CI->email->message($body);
              if($attach!=null){
                $CI->email->attach($attach);
              }
              if (!$CI->email->send()) {
                return FALSE;
              }else {
                return TRUE;
              }
        }
    }
?>