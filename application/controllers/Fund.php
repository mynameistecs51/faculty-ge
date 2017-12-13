<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Fund";
		$this->load->model('mdl_fund');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-money\" aria-hidden=\"true\"></i> ระบบจัดการแหล่งทุน";
		$PAGE = "/Fund/index";
		$this->data['getFund'] = $this->mdl_fund->getFund();
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
		$this->data['url_addFund'] = base_url().'index.php/'.$this->ctl.'/addFund/';
		$this->data['url_deleteFund'] = base_url().'index.php/'.$this->ctl.'/deleteFund/';
		$this->data['url_editFund'] = base_url().'index.php/'.$this->ctl.'/editfund/';
		$this->data['saveEdit'] = base_url().'index.php/'.$this->ctl.'/saveEdit/';

	}

	public function addFund()
	{
		$TEXTTITLE = "เพิ่มแหล่งทุน";
		$PAGE = "/Fund/addFund";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function saveAdd()
	{
		$data = array(
			'id_fund' => '',
			'fund_title' => $this->input->post('title'),
			'fund_source' => $this->input->post('source'),
			'fund_detail' => str_replace(array("\n",'&nbsp;'),array("<br>",'&nbsp;'),$this->input->post('detail')),
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			'id_member' => $this->session->userdata('userID'),
			'dt_create' => $this->dt_now,
			'dt_update' => $this->dt_now,
		);

		$insert = $this->mdl_fund->saveAdd($data);
	}

	public function readFund($fundID)
	{
		$this->data['fundData'] = $this->mdl_fund->getFundID($fundID);
		$TEXTTITLE = "<i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> ".$this->data['fundData'][0]['fund_title'];
		$PAGE = "/Fund/readFund";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function editfund($editid)
	{
		$TEXTTITLE = "แก้ไข แหล่งทุน";
		$PAGE = "/Fund/editFund";
		$this->data['fund_detail'] = $this->mdl_fund->getFundID($editid);
		$this->data['rowFund'] = array();
		foreach ($this->data['fund_detail'] as $rowFund) {
			$this->data['rowFund'] = array(
				'fund_id' => $rowFund['id_fund'],
				'fund_title' => $rowFund['fund_title'],
				'fund_source' => $rowFund['fund_source'],
				'fund_detail' => $rowFund['fund_detail']
			);
		}
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function saveEdit()
	{
		$idFund = $this->input->post('id_fund');
		$data = array(
			'fund_title' => $this->security->xss_clean($this->input->post('title')),
			'fund_source' => $this->security->xss_clean($this->input->post('source')),
			'fund_detail' =>  str_replace("\n", "<br>",$this->security->xss_clean($this->input->post('detail'))),
			'dt_create' => $this->dt_now,
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			'id_member' => $this->session->userdata('userID'),
		);
		$this->mdl_fund->saveEdit($idFund,$this->security->xss_clean($data));
		redirect('Fund/index','refresh');
	}

	public function deleteFund()
	{
		$idFund = $this->input->post('id_fund');
		$delFund = $this->mdl_fund->DelFund($idFund);

		redirect('Fund/index/','refresh');
	}

}

/* End of file Fund.php */
/* Location: ./application/controllers/Fund.php */