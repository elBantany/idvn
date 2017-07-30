<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('ip_helper');
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}
	public function index()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		redirect('beranda','location');
	}
}
