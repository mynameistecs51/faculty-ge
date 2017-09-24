<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __Construct()
	{
		parent::__construct();

	}

	public function index()
	{

	}

	public function login($value='')
	{
		if($_POST){
			print_r($_POST);
		}
	}

	public function addUser()
	{
		if($_POST){
			print_r($_POST);
		}
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */