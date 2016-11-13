<?php
class Barcode extends Admin_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function getBarcode(){
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = 'QRCODE';
		$params['size'] = 10;
		$params['savename'] = './capcha/tes1.png';
		$this->ciqrcode->generate($params);
	}
}