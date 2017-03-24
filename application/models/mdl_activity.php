<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_activity extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function insertdata($data)
	{
		$this->db->insert('activity',$data);
		$massage = "บันทึกข้อมูล เรียบร้อย !";
		$url = "activity";
		$this->alert($massage,$url);
	}

	public function alert($massage, $url)
	{
		echo "<meta charset='UTF-8'>
		<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')
			window.location.href='".site_url($url)."';
		</SCRIPT>";
	}

}

/* End of file mdl_activity.php */
/* Location: ./application/models/mdl_activity.php */