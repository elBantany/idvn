<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		/*$data['daftar_vulner'] = $this->beranda_model->select_data()->result();
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();*/
		if ($this->session->userdata('id')) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		$data['asc'] = 0;
		$data['msg'] = $this->session->flashdata('message');
		$this->load->view('user/login',$data);
		$ip = getIp();
	}
	public function cek(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$secpwd = sha1($pass);
		$secpwd = substr($secpwd, 0,6);
		$secpwd = $secpwd.sha1($pass);
		if ($this->login_model->cekLogin($user,$secpwd)==1) {
			$this->session->set_userdata('username',$user);
			$id = $this->login_model->getId($user)->result();
			$id = $id[0]->i_ii_id;
			$this->session->set_userdata('id',$id);
			if (substr($id, 0,1)=="1") {
				redirect(site_url('admin'), 'refresh'); 
			}else if(substr($id, 0,1)=="2"){
				redirect(site_url('kontributor'), 'refresh'); 
			}else if(substr($id, 0,1)=="3"){
				redirect(site_url('vendor'), 'refresh'); 
			}
			
		}else{
			$this->session->set_flashdata('message', 'Authentication failed');
  			redirect(site_url('login'), 'refresh'); 

		}
	}


	public function getIp(){
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
    return $ipaddress;
	}
}
