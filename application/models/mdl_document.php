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

	public function updateFileOutline($docID)
	{
		$Outline = (empty($_FILES['Outline']['size']))?'':$this->upFile($docID,'doc_outline','Outline');
		$data = array(
			'doc_name' => $this->input->post('name'),
			'doc_lastname' => $this->input->post('lastname'),
			'doc_moneySupport' => $this->input->post('moneySupport'),
			'doc_amount' => $this->input->post('amount'),
			'doc_publicationWhere' => $this->input->post('publicationWhere'),
			'doc_researchName' => str_replace("\n", "<br>",$this->input->post('researchName')),
			'doc_abstract' => str_replace("\n", "<br>",$this->input->post('abstract')),
			'doc_outline' => $Outline['file_name'],
			// 'doc_progress' => $Progress['file_name'],
			// 'doc_filesuccess' => $Success['file_name'],
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			);
		$this->db->where('doc_id',$docID);
		$this->db->update('document',$data);
		// redirect('/Document/','refresh');
	}

	public function updateFileProgress($docID)
	{
		$Progress = (empty($_FILES['Progress']['size']))?'':$this->upFile($docID,'doc_progress','Progress');
		$data = array(
			'doc_name' => $this->input->post('name'),
			'doc_lastname' => $this->input->post('lastname'),
			'doc_moneySupport' => $this->input->post('moneySupport'),
			'doc_amount' => $this->input->post('amount'),
			'doc_publicationWhere' => $this->input->post('publicationWhere'),
			'doc_researchName' => str_replace("\n", "<br>",$this->input->post('researchName')),
			'doc_abstract' => str_replace("\n", "<br>",$this->input->post('abstract')),
			// 'doc_outline' => $Outline['file_name'],
			'doc_progress' => $Progress['file_name'],
			// 'doc_filesuccess' => $Success['file_name'],
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			);
		$this->db->where('doc_id',$docID);
		$this->db->update('document',$data);
	}

	public function updateFilesuccess($docID)
	{
		$Success = (empty($_FILES['Success']['size']))?'':$this->upFile($docID,'doc_filesuccess','Success');
		$data = array(
			'doc_name' => $this->input->post('name'),
			'doc_lastname' => $this->input->post('lastname'),
			'doc_moneySupport' => $this->input->post('moneySupport'),
			'doc_amount' => $this->input->post('amount'),
			'doc_publicationWhere' => $this->input->post('publicationWhere'),
			'doc_researchName' => str_replace("\n", "<br>",$this->input->post('researchName')),
			'doc_abstract' => str_replace("\n", "<br>",$this->input->post('abstract')),
			// 'doc_outline' => $Outline['file_name'],
			// 'doc_progress' => $Progress['file_name'],
			'doc_filesuccess' => $Success['file_name'],
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			);
		$this->db->where('doc_id',$docID);
		$this->db->update('document',$data);
	}

	public function upFile($docID,$docField,$docFile)
	{
		$delFile = $this->deleteFile($docID,$docField);
		$uploadFile = $this->_upload_files($docFile);
		return $uploadFile;
	}

	/*
	*function upload files *
	 */
	private function _upload_files($field){
		$file_name =  date('dmy_His');
		$config['upload_path'] ='./assets/files_document/';
		$config['allowed_types'] = 'pdf|';
		$config['max_size']	= '0';
		$config['remove_spaces'] = TRUE;
		$config['file_name'] = $file_name;

		$this->load->library('upload');
		$this->upload->initialize($config);
		$files = array();

		if ($this->upload->do_upload($field)){
			$files_uploaded = $this->upload->data();
		}else{
			$files_uploaded = null;
		}
		return $files_uploaded;
	}

	//delete select file
	public function deleteFile($id,$field)
	{
		// $this->db->where('doc_id',$id);
		$data = $this->db->query("SELECT ".$field." FROM document WHERE doc_id = '".$id."'")->result_array();  //getdocument
		// echo "<pre>";
		// print_r($data);
		$del = ($data[0][$field] == "")?'':unlink('./assets/files_document/'.$data[0][$field]);

	}


}

/* End of file mdl_document.php */
/* Location: ./application/models/mdl_document.php */