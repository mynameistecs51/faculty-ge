<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl = "activity";
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
				'ac_detail' => $this->input->post('input_detail'),
					'ac_pict'   => $name_picture,
					'dt_create' => $this->dt_now,
					'ip_create' => $_SERVER['REMOTE_ADDR']
					);
					 $this->mdl_activity->insertdata($data);

				}

				private function _upload_files($field){
					$file_name =  date('d_m_y_H_i_s');
					$config['upload_path'] ='./assets/files_upload/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
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