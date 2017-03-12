<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$TEXTTITLE = "กิจกรรม";
		$PAGE = 'index';
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/'.$PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */