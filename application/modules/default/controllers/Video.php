<?php

class Video extends Default_Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        // $this->load->model('mabout');
        // $this->_data['about_news']=$this->mabout->get4news();
        // // $this->_data['about_member']=$this->mabout->getMember();
        // $this->_data['about_intro']=$this->mabout->getIntro();
        $this->_data['on']='true';
        $this->_data['info']='

            <header class="page_header">
              <h3><span class="item_title_part0" style="margin-left:10px;font-size:30px">Video Clip</span></h3>
            </header>
        <div id="component" class="span12" style="margin-left:80px">
            <div class="row">
              <div class="col-md-6 col-md-offset-7">
                    <iframe width="853" height="480" src="//www.youtube.com/embed/UXuEBrORrTQ?autoplay=1" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
        </div>
        ';
        $this->_data['title_page']="Giới thiệu";
        $this->load->view('default/video_template',$this->_data);

    }

}

?>