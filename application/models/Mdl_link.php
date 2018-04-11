<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_link extends CI_Model {

	public function getLink()
	{
		$sql = "
		SELECT
		link_id,
		link_name,
		link_url,
		dt_create,
		ip_create
		FROM
		link
		ORDER BY link_id DESC
		";
		$dataLink = $this->db->query($sql)->result();
		return $dataLink;
	}


	public function saveAdd($data)
	{
		$this->db->insert('link',$this->security->xss_clean($data));
	}

	public function getLinkID($linkID)
	{
		$sql = "
		SELECT
		link_id,
		link_name,
		link_url,
		dt_create,
		ip_create
		FROM
		link
		WHERE
		link_id = '".$linkID."'
		ORDER BY link_id DESC
		";
		$dataLink = $this->db->query($sql);
		return $dataLink->result();
	}

	function saveEdit($idLink,$data)
	{
		$this->db->where('link_id',$idLink);
		$this->db->update('link',$data);
	}


}

/* End of file Mdl_link.php */
/* Location: ./application/models/Mdl_link.php */