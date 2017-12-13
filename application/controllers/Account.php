<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __Construct()
	{
		parent::__construct();
		$this->load->model('Mdl_account','account');
		date_default_timezone_set('Asia/Bangkok');
		$now           = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now  = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/') . ($now->format('Y') + 543);
		$this->ip_client = $_SERVER['REMOTE_ADDR'];
	}

	// public function index()
	// {

	// }

	public function login($value='')
	{
		if($_POST){
			print_r($_POST);
		}
	}

	public function Register()
	{
		if($_POST){
			$data = array(
				// 'account_id' => '',
				'account_name' => $this->input->post('name'),
				'account_lastname'  => $this->input->post('lastname'),
				'account_user' => $this->input->post('username'),
				'account_pass' => md5($this->input->post('password')),
				'account_status' => 'user',
				'account_email' => $this->input->post('email'),
				'dt_create' => $this->dt_now,
				'dt_update' => $this->dt_now,
				'ip_create' => $this->ip_client
			);

			$this->account->Register($data);
		}
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */