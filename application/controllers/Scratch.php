<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Scratch extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->library('session');
	}
	public function index()
	{
		$this->cekIp(); // SEMUA FUNCTION DI CONTROLLER INI HARUS DIAWALI INI
	}
	public function login(){
		$this->cekIp();
	}
	public function cekIp(){
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		$ip = $ipaddress;
		$iplist = $this->admin_model->select_ip()->result();
		$iptrue = 0;
		$cont = 1;
		$iptot = count($iplist);
		foreach($iplist as $iplist){
			if($iplist->ip==$ip){
				$iptrue=1;
			}
			if($iptrue==0 && $iptot==$cont){
				redirect('beranda', 'location');
			}
			$cont++;
		}
	}
}


