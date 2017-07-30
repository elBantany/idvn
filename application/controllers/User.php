<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->library('session');
	}
	public function index()
	{
		$this->cekIp;
		//$this->sessCheck();
		$this->load->view('user/adm/cms');
	}
	public function vendor($pilih=""){
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		if($pilih=="list"){
			$this->load->view('member/vendor');
			
		}else if($pilih=="daftar"){
			$this->load->view('member/vendor_daftar');
			
		}else{
			redirect('member/vendor/list', 'location');
		}
		$this->load->view('main/footer');
	}
}
