<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ancaman extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ancaman_model');
	}
	public function index()
	{
		//TAMPILKAN INDEKS DAFRAR RISK LEVEL
		$data['daftar_vulner'] = $this->ancaman_model->select_data()->result();
		$data['asc'] = 0;
		$this->load->view('main/header');
		$this->load->view('ancaman/indeks',$data);
		$this->load->view('main/footer');
		//$this->load->view('pengembangan');
	}
	public function level($code=0){
		$data['isi'] = $this->ancaman_model->getone_data($code)->result();
		$this->load->view('main/header');
		$this->load->view('ancaman/level',$data);
		$this->load->view('main/footer');
	}

}
