<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('member_model');
		$this->load->library('email');
		$this->load->model('beranda_model');
		$this->load->library('session');
		//$this->load->library('recaptcha');
		//$this->load->model('member_model');
	}
	public function addproc($cat=""){
		$pwd = $_POST['pwd'];
		$pwd = do_hash($pwd, 'md5'); // MD5
		$data['lastid'] = $this->member_model->getLastid($cat)->result();
		$lastid = $data['lastid'][0]->i_ii_id;
		$_POST['id'] = $lastid+1;
		$_POST['status'] = "un";
		$_POST['pwd'] = $pwd;
		$var = $_POST;
		$this->member_model->insertMember($var);
		$this->member_model->insertUser($var);
		$this->load->view('member/addproc');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->from('admin@idvn.org', 'Admin IDVN');
		$this->email->to($_POST['email']); 

		$this->email->subject('Pemberitahuan Pendaftaran Kontributor IDVN');
		$this->email->message('Terimakasih telah mendaftar menjadi kontributor IDVN
								<br>Tunggu konfirmasi untuk aktifasi segera.');	

		$this->email->send();


	}
	public function index()
	{
		//$data['daftar_vulner'] = $this->beranda_model->select_data()->result();
		//$data['asc'] = 0;
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		$this->load->view('member/indeks',$data);
		//echo $this->getIp();
		//$this->load->view('beranda/beranda_content',$data);
		//$this->load->view('beranda/beranda',$data);
		//$this->load->view('main/join_us');
		//$this->load->view('main/sponsor');
		$this->load->view('main/right',$data);
		
		$this->load->view('main/footer');
		//$this->load->view('footer');
		//$this->load->view('pengembangan');
		
	}
	public function vendor($pilih=""){
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
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
		$this->load->view('main/right',$data);
		$this->load->view('main/footer');
	}
	public function kontributor($pilih=""){
		$data['daftar_kont'] = $this->beranda_model->select_rank()->result();
		$data['tot_lap'] = $this->beranda_model->select_tot_lap()->result();
		if ($this->session->userdata('id')) {
			$dash['id'] = $this->session->userdata('id');
			$this->load->view('main/header',$dash);
		}else{
			$this->load->view('main/header');
		}
		if($pilih=="list"){
			$this->load->view('member/kontributor');
			
		}else if($pilih=="daftar"){
			$this->load->view('member/kontributor_daftar');
			
		}else{
			redirect('member/kontributor/list', 'location');
		}
		$this->load->view('main/right',$data);
		$this->load->view('main/footer');
	}
}
