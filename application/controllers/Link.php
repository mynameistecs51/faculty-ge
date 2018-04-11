<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Link";
		$this->load->model('mdl_link');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-fw fa-link\" aria-hidden=\"true\"></i> จัดการ link ภายนอก";
		$PAGE = "/Link/index";
		$this->data['getLink'] = $this->mdl_link->getLink();
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
		$this->data['datenow'] = $this->datenow;
		$this->data['dt_now'] = $this->dt_now;
		$this->data['controller'] = $this->ctl;
		// $this->data['url_addFund'] = base_url().'index.php/'.$this->ctl.'/addFund/';
		// $this->data['url_deleteFund'] = base_url().'index.php/'.$this->ctl.'/deleteFund/';
		// $this->data['url_editFund'] = base_url().'index.php/'.$this->ctl.'/editfund/';
		// $this->data['saveEdit'] = base_url().'index.php/'.$this->ctl.'/saveEdit/';

	}

}

/* End of file Link.php */
/* Location: ./application/controllers/Link.php */