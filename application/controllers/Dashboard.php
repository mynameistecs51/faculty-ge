<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = 'Dashboard';
		$this->load->model('Mdl_activity');
		$this->load->model('Mdl_news');
		$this->load->model('Mdl_fund');
	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"glyphicon glyphicon-hand-right\"></i>  ทั่วไป";
		$PAGE = 'index';
		$this->data['getAll_activity'] = $this->Mdl_activity->getAll_activity(); //$this->getAll_activity();
		$this->data['getNews'] = $this->Mdl_news->getNews();
		$this->data['getFund'] = $this->Mdl_fund->getFund();
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
		$this->data['controller'] = 'index.php/'.$this->ctl;
	}

	public function test()
	{
		echo exec('hostname')."<br>";
		echo  exec('whoami');
	}
}

/* End of file Ctl_dashboard.php */
/* Location: ./application/controllers/Ctl_dashboard.php */