<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "News";
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> ระบบประกาศข่าว";
		$PAGE = "/News/index";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);

	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
		$this->data['datenow'] = $this->datenow;
		$this->data['dt_now'] = $this->dt_now;
	}

}

/* End of file AddNews.php */
/* Location: ./application/controllers/AddNews.php */