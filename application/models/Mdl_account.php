<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_account extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function Register($data)
	{
		$this->db->insert('account', $this->security->xss_clean($data));
		return true;
	}

}

/* End of file Mdl_account.php */
/* Location: ./application/models/Mdl_account.php */