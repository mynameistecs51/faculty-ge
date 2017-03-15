<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Activity";
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);
		// $this->load->library('douploads');
		// $chkCode = $this->mdl_trepair_ws_closed->get_deleteFiles($post['id_trepair_hdr']);
		// $this->douploads->deleteFiles('Assessment','trepair_ws_closed',$chkCode);
	}

	public function index()
	{
		$TEXTTITLE = '<i class="fa fa-link" aria-hidden="true"></i> กิจกรรม';
		$PAGE = 'index';
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/'.$PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header']     = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer']     = $this->template->getFooter(base_url());
		$this->data['controller'] = $this->ctl;
		$this->data['url_add']    = base_url().$this->ctl.'/add/';
	}

	public function add()
	{
		$TEXTTITLE = "เพิ่มกิจกรรม";
		$PAGENAME  = "addActivity";
		$this->data["datenow"] =$this->datenow;
		$this->mainpage($TEXTTITLE);
		$this->load->view('/Activity/'.$PAGENAME,$this->data);
	}

	public function saveadd()
	{
		$this->load->library('douploads');
		$upload = $this->douploads->postFiles($_FILES['images[]'],$this->ctl,'0');
		// if($_POST):
		// 	parse_str($_POST['form'], $post);
		// //$code= $this->getCode();
		$data = array(
			'ac_id' => '',
			'ac_title'   => $this->input->post('input_title'),
			'ac_detail'  => str_replace("\n", "<br>",$this->input->post('input_detail')),
			'ac_pict' => $upload['file_name'],
			// $detail =  str_replace("\n", "<br>\n",$post['input_detail']),
			// $picture = $_FILES['images'] //implode(',', $_FILES['images']['name'])
			);
		echo json_encode($data);
		$this->db->insert('activity',$data);
		// endif;

		// print_r($upload);
		// exit;
	}

	function GetClientMac(){
		echo "<pre>";
		echo shell_exec ('hostname');
		echo "<br>";
		echo shell_exec('getmac');
	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */