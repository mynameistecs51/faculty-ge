<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Authen";
		$this->load->model('Mdl_authen','authen');
		$this->ip_address = $this->input->ip_address();
		$this->userID = $this->session->userdata('userID');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);
	}

	public function index()
	{
		if($this->userID == ""){
			redirect('dashboard','refresh');
		}else{
			redirect('dashboard','refresh');
		}
	}

	public function mainpage($TEXTTITLE)
	{
		$this->data['header'] = $this->template->getHeader(base_url(),$TEXTTITLE);
		$this->data['footer'] = $this->template->getFooter(base_url());
		$this->data['datenow'] = $this->datenow;
		$this->data['dt_now'] = $this->dt_now;
		$this->data['controller'] = $this->ctl;

	}

	public function checkLogin()
	{
		if($_POST){
			$authData = $this->authen->checkLogin($_POST['username'],MD5($_POST['password']));
			if(COUNT($authData) > 0){
				$this->setSession($authData);
			}else{
				redirect('authen/login/fail','refresh');
			}
		}else{
			redirect('authen','refresh');
		}
	}

	public function setSession($authData)
	{
		$this->loginSession = 	array(
			"userID" => $authData[0]['account_id'],
			"username" => $authData[0]['account_user'],
			'userEmail' => $authData[0]['account_email'],
			'userStatus' => $authData[0]['account_status'],
		);
			// Set ค่าให้ session
		$this->session->set_userdata($this->loginSession);
			// เสร็จแล้วไปที่หน้า dashboard
		redirect('dashboard/','refresh');
	}

	public function login($error='')
	{
		$TEXTTITLE = "Login";
		$PAGE = "/Login";
		if($this->session->userdata('userID')==""){
			// $this->data['viewName']="Login";
			$this->data['userID']=$this->userID;
			$this->data['ctl'] = $this->ctl;
			$this->data['error'] = ($error == 'fail') ? 'Username Password not found ! ' : '';
			$this->mainpage($TEXTTITLE);
			$this->load->view($PAGE,$this->data);
		}else{
			redirect('authen/','refresh');
		}
	}

	public function logout()
	{
		$userID = $this->session->unset_userdata("userID");
		$userName = $this->session->unset_userdata("username");
		$userEmail = $this->session->unset_userdata("userEmail");
		$userStatus = $this->session->unset_userdata("userStatus");
		session_destroy();
		redirect('authen','refresh');
	}

}

/* End of file Authen.php */
/* Location: ./application/controllers/Authen.php */