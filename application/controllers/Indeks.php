<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Indeks extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('ip_helper');
		$this->load->model('indeks_model');
		$this->load->model('beranda_model');
		$this->load->library('session');
	}
	public function index()
	{
		$data['daftar_vulner'] = $this->beranda_model->select_data()->result();
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		$data['asc'] = 0;
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		//echo $this->getIp();
		//$this->load->view('beranda/beranda_content',$data);
		$this->load->view('indeks/list');
		//$this->load->view('main/join_us');
		//$this->load->view('main/sponsor');
		
		$this->load->view('main/right',$data);
		
		$this->load->view('main/footer');
		//$this->load->view('footer');
		//$this->load->view('pengembangan');
		
	}
	public function tanggal($tahun="",$bulan="",$tgl=""){
		$tanggal=$tahun."/".$bulan."/".$tgl;
		$data['daftar_vulner'] = $this->indeks_model->select_data_tgl($tanggal)->result();
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		$data['tgl'] = $tanggal;
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		$this->load->view('indeks/tanggal',$data);
		
		$this->load->view('main/right',$data);
		$this->load->view('main/footer');
	}
	public function kontributor($id=""){
		$data['daftar_vulner'] = $this->indeks_model->select_data_kont($id)->result();
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		$data['nama'] = $data['daftar_vulner'][0]->kont;
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		$this->load->view('indeks/kontributor',$data);
		
		$this->load->view('main/right',$data);
		$this->load->view('main/footer');
	}
}
