<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl = "Link";
		$this->load->model('mdl_link');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		$this->datenow = $now->format('d/m/').($now->format('Y')+543);

	}

	public function index()
	{
		$TEXTTITLE = "<i class=\"fa fa-fw fa-link\" aria-hidden=\"true\"></i> จัดการ link ภายนอก";
		$PAGE = "/Link/index";
		$this->data['getLink'] = $this->mdl_link->getLink();
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
		$this->data['url_addLink'] = base_url().'index.php/'.$this->ctl.'/addLink/';
		// $this->data['url_deleteFund'] = base_url().'index.php/'.$this->ctl.'/deleteFund/';
		$this->data['url_editLink'] = base_url().'index.php/'.$this->ctl.'/editLink/';
		$this->data['saveEdit'] = base_url().'index.php/'.$this->ctl.'/saveEdit/';

	}


	public function addLink()
	{
		$TEXTTITLE = "เพิ่มลิงค์ภายนอก";
		$PAGE = "/Link/addLink";
		$this->mainpage($TEXTTITLE);
		$this->load->view($PAGE,$this->data);
	}

	public function saveAdd()
	{
		$data = array(
			'link_name' => $this->input->post('linkName'),
			'link_url' => $this->input->post('linkUrl'),
			'ip_create' => $_SERVER['REMOTE_ADDR'],
			'dt_create' => $this->dt_now,
		);

		$insert = $this->mdl_link->saveAdd($data);
	}

	public function editLink($editid)
	{
		$TEXTTITLE = "แก้ไข Link ภายนอก";
		$PAGE = "/Link/editLink";
		$this->data['rowLink'] = $this->mdl_link->getLinkID($editid);
		$this->data['linkDetail'] = array();
		foreach ($this->data['rowLink'] as $rowLink) {
			$this->data['linkDetail'] = array(
				'link_id' => $rowLink->link_id,
				'link_name' => $rowLink->link_name,
				'link_url' => $rowLink->link_url,
			);
	}
	$this->mainpage($TEXTTITLE);
	$this->load->view($PAGE,$this->data);
}

public function saveEdit()
{
	$idFund = $this->input->post('id_fund');
	$data = array(
		'link_name' => $this->input->post('linkName'),
		'link_url' => $this->input->post('linkUrl'),
		'ip_create' => $_SERVER['REMOTE_ADDR'],
		'dt_create' => $this->dt_now,
	);
	$this->mdl_link->saveEdit($idFund,$this->security->xss_clean($data));
	redirect('Fund/index','refresh');
}

}

/* End of file Link.php */
/* Location: ./application/controllers/Link.php */