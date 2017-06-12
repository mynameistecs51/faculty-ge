<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_news extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			//Do your magic here
	}

	public function getNews()
	{
		// $this->db->select('
		$sql ="
		SELECT
		id_news ,
		news_title ,
		news_detail ,
		CONCAT(
		DATE_FORMAT(dt_create,'%d/%m/'),
		DATE_FORMAT(dt_create,'%Y')+543 )
		AS dateNews,
			--dt_create ,
			ip_create ,
			id_member
			FROM news
			ORDER BY id_news DESC
			";
		// $this->db->order_by('id_news','DESC');
		// $this->db->from('news');
		// $getData = $this->db->get();
			$getData = $this->db->query($sql);
			return $getData->result_array();
		}

		public function getNewsID($id_news)
		{
		// $this->db->select('
			$sql ="
			SELECT
			id_news ,
			news_title ,
			news_detail ,
			CONCAT(
			DATE_FORMAT(dt_create,'%d/%m/'),
			DATE_FORMAT(dt_create,'%Y')+543 )
			AS dateNews,
			--dt_create ,
			ip_create ,
			id_member
			FROM news
			WHERE id_news = '".$id_news."'
			";
			$getData = $this->db->query($sql);
			return $getData->result_array();
		}

		public function saveAdd($data)
		{
			$this->db->insert('news',$data);
			return true;
		}

		public function saveEdit($idNews,$data)
		{
			$this->db->where('id_news',$idNews);
			$this->db->update('news',$data);
		}
	}

	/* End of file Mdl_news.php */
/* Location: ./application/models/Mdl_news.php */