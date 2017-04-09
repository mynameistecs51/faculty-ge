<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Activity";
		$this->load->model('mdl_activity');
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = '<i class="fa fa-link" aria-hidden="true"></i> กิจกรรม';
		$PAGE = 'index';
		$this->data['getAll_activity']  =  $this->getAll_activity();
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/'.$PAGE,$this->data);
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header']     = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer']     = $this->template->getFooter(base_url());
		$this->data['controller'] = $this->ctl;
		$this->data['url_add']    = base_url().$this->ctl.'/add/';
		$this->data['url_edit']   = base_url().$this->ctl.'/edit/';
	}

	public function getAll_activity()
	{
		$this->data  = $this->mdl_activity->getAll_activity();
		return $this->data;
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
		$name_picture = '';

		if($_FILES['images']){
			$images= $this->_upload_files('images');
			foreach ($images as $key => $value) {
				$name_picture .=$value['file_name'].",";
			}
		}

		$data = array(
			'ac_id'     => '',
			'ac_title'  => $this->input->post('input_title'),
			'ac_detail' =>	str_replace("\n", "<br>",$this->input->post('input_detail')),
			'ac_pict'   => substr($name_picture,0,-1),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR']
			);

		$insert = $this->mdl_activity->insertdata($data);
		$massage = "บันทึกข้อมูล เรียบร้อย !";
		$url = "Activity";
		$this->alert($massage,$url);

	}

	public function showActivity($numAct)
	{
	//ถ้ายังไม่ login ให้กลับไป index ถ้า login แล้วให้ ไปหน้า  /Activity/index
		$TEXTTITLE = anchor('Activity', 'กลับ', 'class="fa fa-hand-o-left" aria-hidden="true"');
		$PAGENAME = 'showActivity';
		$listActivity = array();
		$showAct = $this->mdl_activity->getId_activity($numAct);
		foreach ($showAct as $activity => $rowAct) {
			$listActivity = array(
				'ac_title' => $rowAct['ac_title'],
				'ac_detail' => $rowAct['ac_detail'],
				'ac_pict' => $rowAct['ac_pict'],
				'dt_create' => $rowAct['dt_create'],
				'ip_create' => $rowAct['ip_create']
				);
		}
		$this->data['listActivity'] = $listActivity;
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/'.$PAGENAME,$this->data);
	}

	public function edit($id)
	{
		$TEXTTITLE           = "แก้ไขข้อมูลกิจกรรม";
		$PAGENAME            = 'editActivity';
		$showAct             = $this->mdl_activity->getId_activity($id);
		$listActivity        = array();
		foreach ($showAct as $activity => $rowAct) {
			$listActivity = array(
				'ac_id' => $rowAct['ac_id'],
				'ac_title'  => $rowAct['ac_title'],
				'ac_detail' => $rowAct['ac_detail'],
				'ac_pict'   => $rowAct['ac_pict'],
				'dt_create' => $rowAct['dt_create'],
				'ip_create' => $rowAct['ip_create']
				);
		}
		$this->data['ac_id'] = $id;
		$this->data['controller'] = $this->ctl;
		$this->data['listActivity'] = $listActivity;
		$this->mainpage($TEXTTITLE);
		$this->load->view('Activity/'.$PAGENAME,$this->data);
	}

	public function saveEdit()
	{
		echo "<pre>";
		echo $title  = $this->input->post('input_title');
		echo $detail = $this->input->post('input_detail');
		echo 	$pictureAll = $this->input->post('pictureAll');
		for($i=0; $i < count($_FILES['images']['name']); $i++ ){
			echo $_FILES['images']['name'][$i],',';
		}
	}

	public function delEditpict()
	{
		$ac_id = $this->input->post('ac_id');
		$pictureName =$this->input->post('pictureName');
		$numPict = $this->input->post('numPict');

		$del_picture = $this->mdl_activity->delPicture($ac_id,$pictureName,$numPict);
	}

	public function showArray()
	{
		$num = array();
		$a = array(1,'a',3,4,5);
		for($i=0;$i < count($a); $i++){
			array_push($num,array('number' => $i,'data'=>$a[$i]));
		}
		echo "<pre>";
		print_r($num[0]['data']);
		// unset($a[2]);
		// print_r($a);

	}

	public function deleteActivity()
	{
		$del_data = $this->mdl_activity->del_activity($this->input->post('ac_id'));
	}

	private function _upload_files($field){
		$file_name =  date('d_m_y_H_i_s');
		$config['upload_path'] ='./assets/files_upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|';
		$config['max_size']	= '0';
		$config['remove_spaces'] = TRUE;
		$config['file_name'] = $file_name;

		$this->load->library('upload');
		$this->upload->initialize($config);
		$files = array();
		foreach( $_FILES[$field] as $key => $all )
			foreach( $all as $i => $val )
				$files[$i][$key] = $val;

			$files_uploaded = array();
			for ($i=0; $i < count($files); $i++) {
				$_FILES[$field] = $files[$i];
				if ($this->upload->do_upload($field)){
					$files_uploaded[$i] = $this->upload->data();
				}
				else{
					$files_uploaded[$i] = null;
				}

			}
			return $files_uploaded;
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


	/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */