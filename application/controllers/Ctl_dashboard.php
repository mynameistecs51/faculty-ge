<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctl_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$TEXTTITLE = "ทั่วไป";
		$PAGE = 'index';
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
	}
}

/* End of file Ctl_dashboard.php */
/* Location: ./application/controllers/Ctl_dashboard.php */