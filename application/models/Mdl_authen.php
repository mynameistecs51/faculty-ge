<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_authen extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
		$now       = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now  = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/') . ($now->format('Y') + 543);
		$this->ip_client = $_SERVER['REMOTE_ADDR'];
	}

	public function checkLogin($userName ='',$password='')
	{
		$sql = "
		SELECT
		account_id,
		account_user,
		account_name,
		account_lastname,
		account_status,
		account_email
		FROM account
		WHERE
		account_user = '".$userName."'
		AND
		account_pass = '".$password."'
		";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return array();
		}
	}

}

/* End of file Mdl_authen.php */
/* Location: ./application/models/Mdl_authen.php */