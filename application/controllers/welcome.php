<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// No required options
		/*$rendererOptions = array();
		$this->load->library("Zend");
		$this->zend->load("Zend_Barcode");
		$barcodeOptions = array('text' => strtoupper('TN148224540'),'barHeight' => 20);
		$rendererOptions = array();
		Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();*/
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = '123456';
		$params['size'] = 2;
		$this->ciqrcode->generate($params);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */