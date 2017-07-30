<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('laporan_model');
		$this->load->model('beranda_model');
		$this->load->library('session');
	}
	public function index($isi="", $pg=""){
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		
			//TAMPILKAN MENU PILIHAN LAPORAN
			//$data['daftar_vulner'] = $this->beranda_model->select_data()->result();
			//$data['asc'] = 0;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
			$this->load->view('laporan/indeks');
			$this->load->view('main/right',$data);
			$this->load->view('main/footer');

		
	}
	public function tipe($isi="",$pg=""){
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		if($isi){
			if($isi=="website"){
				$data['daftar_vulner'] = $this->laporan_model->selectDataPerType(1)->result();
				$data['qword'] = $isi;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
				$this->load->view('laporan/indeks_hasil',$data);
				$this->load->view('main/right',$data);
				$this->load->view('main/footer');
			}else if($isi=="webapps"){
								$data['daftar_vulner'] = $this->laporan_model->selectDataPerType(2)->result();
				$data['qword'] = $isi;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
				$this->load->view('laporan/indeks_hasil',$data);
				$this->load->view('main/right',$data);
				$this->load->view('main/footer');
			}else if($isi=="mobile"){
				$data['daftar_vulner'] = $this->laporan_model->selectDataPerType(3)->result();
				$data['qword'] = $isi;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
				$this->load->view('laporan/indeks_hasil',$data);
				$this->load->view('main/right',$data);
				$this->load->view('main/footer');
			}else if($isi=="desktop"){
				$data['daftar_vulner'] = $this->laporan_model->selectDataPerType(4)->result();
				$data['qword'] = $isi;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
				$this->load->view('laporan/indeks_hasil',$data);
				$this->load->view('main/right',$data);
				$this->load->view('main/footer');
			}else if($isi=="iot"){
				$data['daftar_vulner'] = $this->laporan_model->selectDataPerType(5)->result();
				$data['qword'] = $isi;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
				$this->load->view('laporan/indeks_hasil',$data);
				$this->load->view('main/right',$data);
				$this->load->view('main/footer');
			}else{
				redirect('beranda', 'location');
			}
		}else{
			//TAMPILKAN MENU PILIHAN LAPORAN
			//$data['daftar_vulner'] = $this->beranda_model->select_data()->result();
			//$data['asc'] = 0;
			if ($this->session->userdata('id')) {
				$dash['id'] = $this->session->userdata('id');
				$this->load->view('main/header',$dash);
			}else{
				$this->load->view('main/header');
			}
			$this->load->view('laporan/indeks');
			$this->load->view('main/right',$data);
			$this->load->view('main/footer');
		}
	}
	public function detail($code=0){
		$data['isi'] = $this->laporan_model->getone_data($code)->result();
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		
		$this->load->view('main/header');
		$this->load->view('laporan/detail',$data);
		$this->load->view('main/right',$data);
		$this->load->view('main/footer');
	}
	public function getIndex(){
		
	}
}
