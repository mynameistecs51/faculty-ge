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
		$config['upload_path']   = './file_upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = 0;
		//$file_name =$_FILES['images']['name'];

		// $rand = rand(1111,9999);
		// $date= date("Y_m_d_H_i");
		// $name_picture = "";
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($_FILES['images']){
			$files = array();

			foreach( $_FILES['images'] as $key => $all ){
				foreach( $all as $i => $val ){
					$files[$i][$key] = $val;
				}
			}

			$files_uploaded = array();
			for ($i=0; $i < count($files); $i++) {
				$field = $files[$i];
				if ($this->upload->do_upload('images'))
					$files_uploaded[$i] = $this->upload->data($field);
				else
					array('error' => $this->upload->display_errors());
					// $files_uploaded[$i] = null;
			}

		// 	$images = $this->_upload_files($_FILES['images']);
		// 	foreach ($images as $key => $value) {
		// 	# code...
		// 		$name_picture .=$value['file_name'].",";		//------------./ show list name picture./---------//
		// 	}
			print_r($files);



// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:

			$data = array(
				'ac_id' => '',
				'ac_title'   => $this->input->post('input_title'),
				'ac_detail'  => str_replace("\n", "<br>",$this->input->post('input_detail')),
				// 'ac_pict' =>substr($name_picture,0,-1),
				);

			// print_r($data);
		}else{
			echo "NONE PICTUE";
		}
	}

	public function _upload_files($field){
		$config['upload_path'] = './file_upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		$files = array();
		foreach( $field as $key => $all )
			foreach( $all as $i => $val )
				$files[$i][$key] = $val;

			$files_uploaded = array();
			for ($i=0; $i < count($files); $i++) {
				$field = $files[$i];
				if ($this->upload->do_upload($field))
					$files_uploaded[$i] = $this->upload->data($files);
				else
					$files_uploaded[$i] = null;
			}
			return $files_uploaded;
		}
	}

	/* End of file Activity.php */
/* Location: ./application/controllers/Activity.php */