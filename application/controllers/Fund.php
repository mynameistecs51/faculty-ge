<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Fund";
		// $this->load->model('mdl_news');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	public function index()
	{

	}

}

/* End of file Fund.php */
/* Location: ./application/controllers/Fund.php */