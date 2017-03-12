<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctl_document extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-fw fa-folder-o\"></i>ระบบจัดเก็บเอกสาร งานวิจัย";
		$PAGE = 'document/indexDoc';
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
	}


}

/* End of file Ctl_document.php */
/* Location: ./application/controllers/Ctl_document.php */