<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_document extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getAllDoc()
	{
		$sql = "SELECT
		doc_id,
		doc_name,
		doc_lastname,
		doc_moneySupport,
		doc_amount,
		doc_publicationWhere,
		doc_researchName,
		doc_abstract,
		doc_outline,
		doc_progress,
		doc_filesuccess,
		dt_create,
		ip_create
		FROM document";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

	public function insertDoc($data)
	{
		$this->db->insert('document',$data);
		return true;
	}

}

/* End of file mdl_document.php */
/* Location: ./application/models/mdl_document.php */