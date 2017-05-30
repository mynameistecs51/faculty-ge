<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_activity');
		$this->load->model('mdl_news');
	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-fw fa-book\"></i>ทั่วไป";
		$PAGE = 'index';
		$this->data['getAll_activity'] = $this->mdl_activity->getAll_activity(); //$this->getAll_activity();
		$this->data['getNews'] = $this->mdl_news->getNews();
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
	}

	public function getAll_activity()
	{
		$this->data  = $this->mdl_activity->getAll_activity();
		return $this->data;
	}

}

/* End of file Ctl_dashboard.php */
/* Location: ./application/controllers/Ctl_dashboard.php */