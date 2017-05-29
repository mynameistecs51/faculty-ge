<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_activity extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getAll_activity()
	{
		$this->db->select('ac_id,ac_title,ac_detail,ac_pict,dt_create,ip_create');
		$this->db->order_by('ac_id','DESC');
		$this->db->from('activity');
		$data  = $this->db->get();
		return $data->result_array();
	}

	public function insertdata($data)
	{
		$this->db->insert('activity',$data);
		return true;
	}

	public function getId_activity($id)
	{
		$this->db->where('ac_id',$id);
		$data  = $this->db->get('activity');
		return $data->result_array();
	}

	function del_activity($id){
		$this->db->where('ac_id',$id);
		$data = $this->db->get('activity')->result();  //getpicture

		foreach ($data as $row_activity) {

			$file_pic = explode(',',$row_activity->ac_pict);

			for($i=0; $i < count($file_pic); $i++){
				@unlink('./assets/files_upload/'.$file_pic[$i]);	//delete file pic
				//echo $i;
			}
				//@unlink('./assets/files_upload/'.$row_activity->ac_pict);	//delete file

		}
		$this->db->where('ac_id',$id);
		$del = $this->db->delete('activity');
		return TRUE;
	}

	public function delPicture($ac_id,$pictureName,$numPict)
	{
		$query_ac = $this->getId_activity($ac_id);
		foreach ($query_ac as $rowACT) {
			$pic_newsEX = explode(',', $rowACT['ac_pict']);
			@unlink('./assets/files_upload/'.$pictureName);
			unset($pic_newsEX[$numPict]);

			$update_arrPic = implode(',', $pic_newsEX);

			$this->db->where('ac_id',$ac_id);
			$this->db->update('activity',array('ac_pict'=>$update_arrPic));
		}
		return TRUE;
	}

	public function saveEdit($ac_id,$data)
	{
		$this->db->where('ac_id',$ac_id);
		$this->db->update('activity',$data);
		return TRUE;
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