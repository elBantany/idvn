<?
	class Member_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function select_ip(){
			$query = $this->db->query("
				select 
				i_ii_id as id,
				c_vv_ip as ip
				from
				trip
			");
			return $query;
		}
		function getLastid(){
			$query = $this->db->query("
				select
					i_ii_id
				from
					trkont
				order by
					trkont.i_ii_id DESC
				LIMIT 0,1
			");
			return $query;
		}
		function insertMember($isi){
			$inpMain = array(
							'i_ii_id' => $isi['id'],
							'n_vv_nama' => $isi['nama'],
							'n_vv_alias' => $isi['alias'],
							'n_vv_email' => $isi['email'],
							'v_vv_kontak' => $isi['hp'],
							't_tt_alamat' => $isi['alamat'],
							'status' => $isi['status']
				);
			$this->db->set($inpMain);
			return $this->db->insert('trkont');;
		}
		function insertUser($isi){
			$inpMain = array(
							'i_ii_id' => $isi['id'],
							'n_vv_username' => $isi['uname'],
							'n_vv_password' => $isi['pwd']
				);
			//var_dump($inpMain);
			$this->db->set($inpMain);
			return $this->db->insert('truser');;
		}
		function editLaporanMain($isi){
			//var_dump($isi);
			$inpMain = array(
							'n_vv_nama' => $isi['namaKerentanan'],
							'n_vv_platform' => $isi['platform'],
							'c_vv_show' => $isi['tampil'],
							'w_dt_edit' => $isi['tgl'],
							'w_tm_edit' => $isi['jam']
				);
			//var_dump($inpMain);
			$this->db->where('i_ii_id', $isi['id']);
			return $this->db->update('tmvulner',$inpMain);;
		}
		function editLaporanRef($isi){
			$inpRef = array(
							't_tt_prod' => $isi['namaProduk'],
							't_tt_tinjauan' => $isi['tinjauan'],
							't_tt_deskripsi' => $isi['keterangan'],
							't_tt_akibat' => $isi['dampak'],
							't_tt_solusi' => $isi['solusi'],
							't_tt_vendor' => $isi['status'],
				);
			//var_dump($inpRef);
			$this->db->where('i_ii_id', $isi['id']);
			return $this->db->update('trvulner',$inpRef);;
		}
		
	}

?>