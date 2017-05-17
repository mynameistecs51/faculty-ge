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

	public function getDocID($docID)
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
		FROM document
		WHERE doc_id = '".$docID."' ";

		$query = $this->db->query($sql)->result_array();
		foreach ($query as $keyDoc => $rowDoc) {
			$data = array(
				'doc_id' => $rowDoc['doc_id'],
				'doc_name' => $rowDoc['doc_name'],
				'doc_lastname' => $rowDoc['doc_lastname'],
				'doc_moneySupport' => $rowDoc['doc_moneySupport'],
				'doc_amount' => $rowDoc['doc_amount'],
				'doc_publicationWhere' => $rowDoc['doc_publicationWhere'],
				'doc_researchName' => $rowDoc['doc_researchName'],
				'doc_abstract' => $rowDoc['doc_abstract'],
				'doc_outline' => $rowDoc['doc_outline'],
				'doc_progress' => $rowDoc['doc_progress'],
				'doc_filesuccess' => $rowDoc['doc_filesuccess'],
				'dt_create' => $rowDoc['dt_create'],
				'ip_create' => $rowDoc['ip_create'],
				);
		}
		return $data;
	}

	public function insertDoc($data)
	{
		$this->db->insert('document',$data);
		return true;
	}

	public function deleteDoc($id)
	{
		$this->db->where('doc_id',$id);
		$data = $this->db->get('document')->result_array();  //getdocument
		foreach ($data as $key => $value) {
			unlink('./assets/files_document/'.$value['doc_outline']);	//delete file
		}

		$this->db->where('doc_id',$id);
		$del = $this->db->delete('document');
		return TRUE;
	}

}

/* End of file mdl_document.php */
/* Location: ./application/models/mdl_document.php */