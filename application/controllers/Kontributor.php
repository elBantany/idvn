<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Kontributor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('kontributor_model');
		$this->load->library('session');
	}
	public function index()
	{		
			if (!$this->session->userdata('id')) {
				redirect('login','location');
			}
			$idAuthor = $this->session->userdata('id');
			$data['daftar_vulner'] = $this->kontributor_model->getAllLaporan($idAuthor)->result();
			$this->load->view('user/kont/laporan',$data);
	}
	public function laporan($laporan=""){

			if (!$this->session->userdata('id')) {
				redirect('login','location');
			}
		if ($laporan) {
			if ($laporan=="tambah") {
				$data['id'] = $this->session->userdata('id');
				$data['alias'] = "FulanAlias";
				$this->load->view('user/kont/laporan_tambah',$data);
			}
			else if($laporan=="inpTambah"){
				$data['lastid'] = $this->kontributor_model->getLastid()->result();
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
				$var["idAuthor"] = $this->session->userdata('id');
				$this->kontributor_model->insertLaporanMain($var);
				$this->kontributor_model->insertLaporanRef($var);
				redirect('kontributor/laporan', 'location');
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
				$this->kontributor_model->editLaporanMain($var);
				$this->kontributor_model->editLaporanRef($var);
				redirect('kontributor/laporan', 'location');
			}
			else{

				$data['vulner'] = $this->kontributor_model->getLapPerId($laporan)->result();
				$this->load->view('user/kont/laporan_edit',$data);
			}
		}else{
			$idAuthor = $this->session->userdata('id');
			$data['daftar_vulner'] = $this->kontributor_model->getAllLaporan($idAuthor)->result();
			$this->load->view('user/kont/laporan',$data);
		}
		
	}
	public function profile($f=""){
			if (!$this->session->userdata('id')) {
				redirect('login','location');
			}
			$data['user'] = $this->kontributor_model->getLogin($this->session->userdata('id'))->result();
			$data['detail'] = $this->kontributor_model->getDetail($this->session->userdata('id'))->result();
		if ($f) {
			if ($f=="edit") {
				$this->load->view('user/kont/profile_edit',$data);
			}
		}else{
			$this->load->view('user/kont/profile',$data);
		}
		
	}
	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		redirect('login','location');
	}
	public function cekIp(){
			if (!$this->session->userdata('id')) {
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
		$iplist = $this->kontributor_model->select_ip()->result();
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
			if (!$this->session->userdata('id')) {
				redirect('login','location');
			}
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
