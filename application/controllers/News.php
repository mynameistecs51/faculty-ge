<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "News";
		$this->load->model('mdl_news');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> ระบบจัดการข่าว";
		$PAGE = "/News/index";
		$this->data['getNews'] = $this->mdl_news->getNews();
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function readNews($idNews)
	{
		$this->data['dataNews'] = $this->mdl_news->getNewsID($idNews);
		$TEXTTITLE = "<i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> ".$this->data['dataNews'][0]['news_title'];
		$PAGE = "/News/readNews";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
		$this->data['datenow'] = $this->datenow;
		$this->data['dt_now'] = $this->dt_now;
		$this->data['controller'] = $this->ctl;
		$this->data['url_addNews'] = base_url().'index.php/'.$this->ctl.'/addNews/';
		$this->data['url_deleteNews'] = base_url().'index.php/'.$this->ctl.'/deleteNews/';
		$this->data['saveEdit'] = base_url().'index.php/'.$this->ctl.'/saveEdit/';

	}

	public function addNews()
	{
		$TEXTTITLE = "เพิ่มข่าวสาร";
		$PAGE = "/News/addNews";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function saveAdd()
	{
		$data = array(
			'id_news' => '',
			'news_title' => $this->input->post('title'),
			'news_detail' => str_replace(array("\n",'&nbsp;'),array("<br>",'&nbsp;'),$this->input->post('detail')),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			'id_member' => $this->session->userdata('userID'),
			);
		$insert = $this->mdl_news->saveAdd($this->security->xss_clean($data));
		// echo "<pre>";
		// print_r($insert);
		redirect('News/index','refresh');
	}

	public function deleteNews()
	{
		$idNews = $this->input->post('id_news');
		$this->db->where('id_news', $idNews);
		$del = $this->db->delete('news');

		redirect('News/index/','refresh');
	}

	public function editNews($editid)
	{
		$TEXTTITLE = "แก้ไข ข่าวสาร";
		$PAGE = "/News/editNews";
		$this->data['news_detail'] = $this->mdl_news->getNewsID($editid);
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function saveEdit()
	{
		$idNews = $this->input->post('id_news');
		$data = array(
			'news_title' => $this->security->xss_clean($this->input->post('title')),
			'news_detail' =>  str_replace("\n", "<br>",$this->input->post('detail')),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			'id_member' => $this->session->userdata('userID'),
			);
		$this->mdl_news->saveEdit($idNews,$this->security->xss_clean($data));
		redirect('News/index','refresh');
	}

}

/* End of file AddNews.php */
/* Location: ./application/controllers/AddNews.php */