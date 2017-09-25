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
	}

	public function index()
	{
		if($this->userID == ""){
			redirect('dashboard','refresh');
		}else{
			redirect('dashboard','refresh');
		}
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
		if($this->session->userdata('userID')==""){
			$this->data['viewName']="Login";
			$this->data['userID']=$this->userID;
			$this->data['ctl'] = $this->ctl;
			$this->data['error'] = ($error == 'fail') ? 'Username Password not found ! ' : '';
			$this->load->view($this->data['viewName'],$this->data);
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