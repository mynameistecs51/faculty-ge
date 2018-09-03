<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_fund extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getFund()
	{
		$sql = "
		SELECT
		id_fund,
		fund_title,
		fund_source,
		fund_detail,
		id_member,
		dt_update
		FROM
		fund
		ORDER BY id_fund DESC
		";
		$dataFund = $this->db->query($sql)->result_array();
		return $dataFund;
	}

	public function getFundID($fundID)
	{
		$sql = "
		SELECT
		id_fund,
		fund_title,
		fund_source,
		fund_detail,
		fund_file,
		id_member,
		dt_update
		FROM
		fund
		WHERE
		id_fund = '".$fundID."'
		ORDER BY id_fund DESC
		";
		$dataFund = $this->db->query($sql);
		return $dataFund->result_array();
	}

	public function saveAdd($data)
	{
		$this->db->insert('fund',$this->security->xss_clean($data));
	}

	function saveEdit($idfund,$data)
	{
		$this->db->where('id_fund',$idfund);
		$this->db->update('fund',$data);
	}

	function DelFund($data)
	{
		$this->db->where('id_fund', $data);
		$del = $this->db->delete('fund');
	}


	public function getId_fund($id)
	{
		$this->db->where('id_fund',$id);
		$data  = $this->db->get('fund');
		return $data->result_array();
	}

	public function delPicture($id_fund,$pictureName,$numPict)
	{
		$query_ac = $this->getId_fund($id_fund);

		foreach ($query_ac as $rowACT) {
			$pic_newsEX = explode(',', $rowACT['fund_file']);
			@unlink('./assets/files_fund/'.$pictureName);
			unset($pic_newsEX[$numPict]);

			$update_arrPic = implode(',', $pic_newsEX);

			$this->db->where('id_fund',$id_fund);
			$this->db->update('fund',array('id_fund'=>$update_arrPic));
		}
		return TRUE;
	}



}

/* End of file Mdl_fund.php */
/* Location: ./application/models/Mdl_fund.php */