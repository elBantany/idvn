<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->library('session');
		$this->load->library('pagination');
	}
	public function index()
	{
		//$this->sessCheck();
			if (substr($this->session->userdata('id'), 0,1)!="1" || !$this->session->userdata('id')) {
				redirect('login','location');
			}
		$this->load->view('user/adm/cms');
	}
	public function laporan($laporan="", $pg="", $cari=""){

			if (substr($this->session->userdata('id'), 0,1)!="1" || !$this->session->userdata('id')) {
				redirect('login','location');
			}
		/*$this->pagination->initialize($config); 
		echo "<br><br><br><br><br><br>";
		echo $this->pagination->create_links();*/
		if($laporan==""){
			redirect('admin/laporan/index', 'location');

		}
		if ($laporan) {
			if ($laporan=="tambah") {
				$this->load->view('user/adm/laporan_tambah');
			}
			else if($laporan=="inpTambah"){
				$data['lastid'] = $this->admin_model->getLastid()->result();
				$lastid = $data['lastid'][0]->i_ii_id;
				$lastcvul = $data['lastid'][0]->c_vv_vulner;
				$a = substr(date("Y"),2,2).date("m");
				if (substr($lastcvul,0,4)==$a) {
					$tricvul = substr($lastcvul,4,3)+1;
				}else{
					$tricvul = 1;
				}
				if ($tricvul<100) {
					if ($tricvul<10) {
						$tricvul = "00".$tricvul;
					}else{
						$tricvul = "0".$tricvul;
					}
				}
				$h = "7";
				$hm = $h * 60; 
				$ms = $hm * 60;
				$gmdate = gmdate("h:i:s", time()+($ms));
				$tgl = date("Y/m/d");
				$jam = $gmdate;
				//echo $tgl.$jam;
				$id = $lastid + 1;
				$var = $_POST;
				$var["code"] = $a.$tricvul;
				$var["id"] = $id;
				$var["tgl"] = $tgl;
				$var["jam"] = $jam;
				$this->admin_model->insertLaporanMain($var);
				$this->admin_model->insertLaporanRef($var);
				redirect('admin/laporan', 'location');
			}else if($laporan=="editLap"){
				$var = $_POST;
				$h = "7";
				$hm = $h * 60; 
				$ms = $hm * 60;
				$gmdate = gmdate("h:i:s", time()+($ms));
				$tgl = date("Y/m/d");
				$jam = $gmdate;
				$var["tgl"] = $tgl;
				$var["jam"] = $jam;
				$this->admin_model->editLaporanMain($var);
				$this->admin_model->editLaporanRef($var);
				redirect('admin/laporan', 'location');
			}
			else if($laporan=="index"){
				$totdta = $this->admin_model->getTotLaporan()->result();
				$totdta = $totdta[0]->total;
				$dataPerPage = 10;
				$kat = array();
				$a = $totdta;
				if ($a%$dataPerPage!=0) {
					$a = $a+($dataPerPage-$a%$dataPerPage);
				}
				$a = $a/$dataPerPage;
				for ($i=1; $i <= $a ; $i++) { 
					array_push($kat, $i);
				}
				if($pg==""){
					$pg = 1;
					$start=0;
					$end=$dataPerPage;
				}else{
					$start = $dataPerPage*($pg-1);
					$end = $dataPerPage;
				}
				if ($cari) {
					$data['daftar_vulner'] = $this->admin_model->getAllLaporanSearch($start,$end,$cari)->result();
				}else{
					$data['daftar_vulner'] = $this->admin_model->getAllLaporan($start,$end)->result();
				}
				
				$data['pg'] = $pg;
				$data['totdta'] = $totdta;
				$data['listpg'] = $kat;
				$data['cari'] = $cari;
				
				$this->load->view('user/adm/laporan',$data);
			}
			else{
				$data['vulner'] = $this->admin_model->getLapPerId($laporan)->result();
				$this->load->view('user/adm/laporan_edit',$data);
			}
		}else{
			$data['daftar_vulner'] = $this->admin_model->getAllLaporan()->result();
			$this->load->view('user/adm/laporan',$data);
		}
		
	}
	public function akun($akun=""){
			if (substr($this->session->userdata('id'), 0,1)!="1" || !$this->session->userdata('id')) {
				redirect('login','location');
			}
		if($akun){
			if($akun=="tambah"){

			}else if($akun=="edit"){

			}
			else if ($akun=="acc") {

				for ($i=0; $i <count($_POST); $i++) { 
					if ($_POST['cek'][$i]=="ok") {
						$var[$i]['id'] = $_POST['id'][$i];
					}
				}
				$jenis = "set";
				$this->admin_model->setRequestAkun($var,$jenis);
				redirect('admin/akun', 'location');
			}
		}else{
			$data['daftar_user_un'] = $this->admin_model->getAllUserKont()->result();
			for ($i=0; $i < count($data['daftar_user_un']) ; $i++) { 
				if ($data['daftar_user_un'][$i]->status != "ok") {
					$dat = substr($data['daftar_user_un'][$i]->id, 0,1);
					echo $dat;
					if ($dat == "2") {
						$dd = $this->admin_model->getAllUserKontDet($data['daftar_user_un'][$i]->id)->result();
						$data['daftar_user_un'][$i]->nama = $dd[0]->alias;
						$data['daftar_user_un'][$i]->email = $dd[0]->email;
						$data['daftar_user_un'][$i]->kontak = $dd[0]->kontak;
					}else if($dat == "3"){
						//$data['daftar_user_un'][$i]->nama = $this->admin_model->getAllUserVend($data['daftar_user_un'][$i]->id)->result();
					}else if($dat == "1"){

					}
				}
				
			}
			$data['daftar_user_kont'] = $this->admin_model->getAllUserKont()->result();
			for ($i=0; $i < count($data['daftar_user_kont']) ; $i++) { 
					$dat = substr($data['daftar_user_kont'][$i]->id, 0,1);
					if ($dat == "2") {
						$dd = $this->admin_model->getAllUserKontDet($data['daftar_user_kont'][$i]->id)->result();
						$data['daftar_user_kont'][$i]->nama = $dd[0]->alias;
						$data['daftar_user_kont'][$i]->email = $dd[0]->email;
						$data['daftar_user_kont'][$i]->kontak = $dd[0]->kontak;
					}
				}
			//$data['daftar_kont'] = $this->admin_model->getAllKont()->result();
			//$data['daftar_vend'] = $this->admin_model->getAllVend()->result();
			$this->load->view('user/adm/akun',$data);
		}
	}
	public function vendor($pilih=""){
			if (substr($this->session->userdata('id'), 0,1)!="1" || !$this->session->userdata('id')) {
				redirect('login','location');
			}
		$this->load->view('main/header');
		if($pilih=="list"){
			$this->load->view('member/vendor');
			
		}else if($pilih=="daftar"){
			$this->load->view('member/vendor_daftar');
			
		}else{
			//redirect('member/vendor/list', 'location');
		}
		$this->load->view('main/footer');
	}
	public function cekIp(){
			if (substr($this->session->userdata('id'), 0,1)!="1" || !$this->session->userdata('id')) {
				redirect('login','location');
			}
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
		return $ip;
	}
	public function sessCheck(){
		$ip = $this->cekIp();
		$user = $this->session->userdata('user_data');
        isset($user);
        var_dump($user);
		if ($user) {
			echo "222222";
			//cek apakah session sudah terisi ?
			//cek apakah session sesuai dengan IP ?	
		}else{

		}
		$result = array(
							"ip" => $ip,
							"isLog" => true,
							""
			);
		var_dump($result);
		return $result;
	}
}
