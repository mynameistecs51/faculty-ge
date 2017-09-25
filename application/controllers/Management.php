<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('userStatus') != 'admin') {
			redirect('authen','refresh');
		}
	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-cog \"></i> ระบบจัดการ";
		$PAGE = 'management/dashboard';
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
	}

}

/* End of file Management.php */
/* Location: ./application/controllers/Management.php */