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
		echo "<pre>";
		$filed      = 'images';
		$date = date("d_m_y_H_i");
		$name_array = array();
		$count = count($_FILES[$filed]['name']);

		foreach($_FILES as $key => $value){
			for($s=0; $s < $count; $s++) {

				$_FILES[$filed]['name'] = $date.'_'.substr($value['name'][$s],-4);
				$_FILES[$filed]['type']    = $value['type'][$s];
				$_FILES[$filed]['tmp_name'] = $value['tmp_name'][$s];
				$_FILES[$filed]['error']       = $value['error'][$s];
				$_FILES[$filed]['size']    = $value['size'][$s];

				echo var_dump(is_dir(base_url().'file_uploads'));
				$config = array();
				$config['upload_path'] = base_url().'assets/files_upload/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$config['max_size'] = 0;

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload($filed)){
					echo "1";
					$data =  array('error' => $this->upload->display_errors());
				}else{
					echo "2";
					$this->upload->initialize($config);
					$data = array('upload_data' => $this->upload->data());
					$name_array[] = $data['file_name'];
					// print_r($this->upload->data());
				}
			}
		}
		$names_research = implode(',', $name_array);
		print_r($data);
		print_r($config['upload_path']);
	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */