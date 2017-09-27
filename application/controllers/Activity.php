<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Activity";
		$this->load->model('mdl_activity');
		date_default_timezone_set('Asia/Bangkok');
		$now           = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now  = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/') . ($now->format('Y') + 543);

	}

	public function index()
	{
		$TEXTTITLE             = '<i class="fa fa-link" aria-hidden="true"></i> กิจกรรม';
		$PAGE                          = 'index';
		$this->data['getAll_activity'] = $this->getAll_activity();
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/' . $PAGE, $this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header']     = $this->template->getHeader(base_url(), $TEXTTITLE);
		$this->data['footer']     = $this->template->getFooter(base_url());
		$this->data['controller'] = 'index.php/' . $this->ctl;
		$this->data['url_add']    = base_url() . 'index.php/' . $this->ctl . '/add/';
		$this->data['url_edit']   = base_url() . 'index.php/' . $this->ctl . '/edit/';
	}

	public function getAll_activity()
	{
		$this->data = $this->mdl_activity->getAll_activity();
		return $this->data;
	}

	public function add()
	{
		$TEXTTITLE             = "เพิ่มกิจกรรม";
		$PAGENAME              = "addActivity";
		$this->data["datenow"] = $this->datenow;
		$this->mainpage($TEXTTITLE);
		$this->load->view('/Activity/' . $PAGENAME, $this->data);
	}

	public function saveadd()
	{
		$addPict = array();
		$title   = $this->input->post('input_title');
		$detail  = $this->input->post('input_detail');
        //ถ้ามีการเพิ่มรูปภาพ
		if ($_FILES['images']['size'] != '') {
			$images = $this->_upload_files('images');
			for ($i = 0; $i < count($images); $i++) {
				array_push($addPict, $images[$i]);
			}
			// echo "<pre>";
			// print_r($images);
		}

		$data = array(
			'ac_title'  => $title,
			'ac_detail' => str_replace("\n", "<br>", $detail),
			'ac_pict'   => implode(',', $addPict),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
		);

		$insert = $this->mdl_activity->insertdata($this->security->xss_clean($data));

		redirect($this->ctl,'refresh');

	}

	public function showActivity($numAct)
	{
        //ถ้ายังไม่ login ให้กลับไป index ถ้า login แล้วให้ ไปหน้า  /Activity/index
		$TEXTTITLE    = anchor('dashboard', 'กลับ', 'class="fa fa-hand-o-left" aria-hidden="true"');
		$PAGENAME     = 'showActivity';
		$listActivity = array();
		$showAct      = $this->mdl_activity->getId_activity($numAct);
		foreach ($showAct as $activity => $rowAct) {
			$listActivity = array(
				'ac_title'  => $rowAct['ac_title'],
				'ac_detail' => $rowAct['ac_detail'],
				'ac_pict'   => $rowAct['ac_pict'],
				'dt_create' => $rowAct['dt_create'],
				'ip_create' => $rowAct['ip_create'],
			);
		}
		$this->data['listActivity'] = $listActivity;
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/' . $PAGENAME, $this->data);
	}

	public function edit($id)
	{
		$TEXTTITLE    = "แก้ไขข้อมูลกิจกรรม";
		$PAGENAME     = 'editActivity';
		$showAct      = $this->mdl_activity->getId_activity($id);
		$listActivity = array();
		foreach ($showAct as $activity => $rowAct) {
			$listActivity = array(
				'ac_id'     => $rowAct['ac_id'],
				'ac_title'  => $rowAct['ac_title'],
				'ac_detail' => str_replace("<br>", "", $rowAct['ac_detail']),
				'ac_pict'   => $rowAct['ac_pict'],
				'dt_create' => $rowAct['dt_create'],
				'ip_create' => $rowAct['ip_create'],
			);
		}
		$this->data['ac_id']        = $id;
		$this->data['controller']   = $this->ctl;
		$this->data['listActivity'] = $listActivity;
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/' . $PAGENAME, $this->data);
	}

	public function saveEdit()
	{
        // echo "<pre>";
		$addPict    = array();
		$ac_id      = $this->input->post('ac_id');
		$title      = $this->input->post('input_title');
		$detail     = $this->input->post('input_detail');
		$pictureAll = $this->input->post('pictureAll');
        //ถ้ามีการเพิ่มรูปภาพ
		if ($_FILES['images']['size'] != '') {
			$images = $this->_upload_files('images');
			for ($i = 0; $i < count($images); $i++) {
				array_push($addPict, $images[$i]);
			}
			array_push($addPict, $pictureAll);
		}
		$data = array(
			'ac_title'  => $title,
			'ac_detail' => str_replace("\n", "<br>", $detail),
			'ac_pict'   => $datafile = (empty($_FILES['images']['size'])) ? $pictureAll : implode(',', $addPict),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
		);
		$this->mdl_activity->saveEdit($ac_id, $this->security->xss_clean($data));
		redirect($this->ctl . '/showActivity/' . $ac_id, 'refresh');
	}

	public function delEditpict()
	{
		$ac_id       = $this->input->post('ac_id');
		$pictureName = $this->input->post('pictureName');
		$numPict     = $this->input->post('numPict');

		$del_picture = $this->mdl_activity->delPicture($ac_id, $pictureName, $numPict);
	}

	public function deleteActivity()
	{
		$del_data = $this->mdl_activity->del_activity($this->input->post('ac_id'));
	}

	private function _upload_files($field )
	{
		$file_name               = date('dmy_His_');
		$config['upload_path']   = 'assets/files_upload/';
		$config['allowed_types']        = 'gif|jpg|png|GIF|JPG|PNG';
		$config['max_size']      =0;
		$config['remove_spaces'] = true;
		$configi['width']  = 75;
		$configi['height'] = 50;
		$config['overwrite']      = true;
		$resize['maintain_ratio'] = true;

		$this->load->library('upload');
		$files = $_FILES;
		$fileName = array();
		$cpt = count($_FILES[$field]['name']);
		for($i=0; $i<$cpt; $i++)
		{
			$config['file_name']     = $file_name.$i;
			$_FILES[$field]['name']= $files[$field]['name'][$i];
			$_FILES[$field]['type']= $files[$field]['type'][$i];
			$_FILES[$field]['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES[$field]['error']= $files[$field]['error'][$i];
			$_FILES[$field]['size']= $files[$field]['size'][$i];

			$this->upload->initialize($config);
			if($this->upload->do_upload($field)){
				//chmod($config['upload_path'],0777);
				$config['file_name'] = $file_name.$i.$this->upload->data('file_ext');
				// $config['file_name']     = $file_name.$i.substr($files['images']['name'][$i],-4);
				array_push($fileName,$config['file_name']);
				$this->upload->data();
				// echo "<pre>";
				// print_r($this->upload->data());
			}else{
				$massage =  $this->upload->display_errors();
			}
		}
		return $fileName  ;
	}

	public function alert($massage, $url)
	{
		echo "<meta charset='UTF-8'>
		<SCRIPT LANGUAGE='JavaScript'>
		window.alert('$massage')
		window.location.href='" . site_url($url) . "';
		</SCRIPT>";
	}
}

/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */
