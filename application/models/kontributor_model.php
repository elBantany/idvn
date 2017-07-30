<?
	class Kontributor_model extends CI_Model{
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
		function getAllLaporan($id){
			$query = $this->db->query("
				select
					tmvulner.w_dt_upload as date,
					tmvulner.w_tm_upload as time,
					tmvulner.n_vv_nama as judul,
					tmvulner.c_vv_vulner as code,
					tmvulner.c_vv_show as tampil,
					trkont.i_ii_id as idkont,
					trkont.n_vv_alias as kont
				from
					tmvulner, trkont
				where
					tmvulner.i_vv_idauthor=trkont.i_ii_id
					AND trkont.i_ii_id = ".$id."
				order by
					tmvulner.i_ii_id DESC
			");
			//NANTI EDIT SESUAI SESI
			return $query;
		}

		function getLapPerId($isi){
			$q = 'select 
				TMVULNER.i_ii_id as id, 
				TMVULNER.c_vv_vulner as codeVulner, 
				TMVULNER.n_vv_nama as namaVulner, 
				TMVULNER.w_dt_upload as tglUp, 
				TMVULNER.w_dt_edit as tglEd, 
				TMVULNER.w_tm_upload as wktUp, 
				TMVULNER.w_tm_edit as wktEd, 
				TMVULNER.c_vv_show as tampil,
				TMVULNER.i_vv_idauthor as idAuthor,
				TMVULNER.n_vv_platform as plat,
				TRVULNER.t_tt_prod as produk, 
				TRVULNER.t_tt_deskripsi as deskripsi,
				TRVULNER.t_tt_tinjauan as tinjauan,
				TRVULNER.t_tt_akibat as akibat, 
				TRVULNER.t_tt_solusi as solusi, 
				TRVULNER.t_tt_vendor as vendor,
				trkont.n_vv_alias as kont,
				TRVULNER.t_tt_referensi as referensi
				from 
				TMVULNER,TRVULNER,trkont
				where 
				TMVULNER.c_vv_vulner="'.$isi.'" AND 
				TMVULNER.i_ii_iddet = TRVULNER.i_ii_id AND
				tmvulner.i_vv_idauthor=trkont.i_ii_id
				order by 
				TMVULNER.i_ii_id desc';
			$query = $this->db->query($q);

			
			return $query;
		}

		function getLastid(){
			$query = $this->db->query("
				select
					i_ii_id,
					c_vv_vulner
				from
					tmvulner
				order by
					tmvulner.i_ii_id DESC
				LIMIT 0,1
			");
			return $query;
		}
		function insertLaporanMain($isi){
			//var_dump($isi);
			$inpMain = array(
							'i_ii_id' => $isi['id'],
							'i_ii_iddet' => $isi['id'],
							'c_ii_risklvl' => 1,
							'c_vv_vulner' => $isi['code'],
							'n_vv_nama' => $isi['namaKerentanan'],
							'n_vv_platform' => $isi['platform'],
							'i_vv_idauthor' => $isi['idAuthor'],
							'c_vv_show' => "un",
							'w_dt_upload' => $isi['tgl'],
							'w_tm_upload' => $isi['jam']
				);
			//var_dump($inpMain);
			$this->db->set($inpMain);
			return $this->db->insert('tmvulner');;
		}
		function insertLaporanRef($isi){
			$inpRef = array(
							'i_ii_id' => $isi['id'],
							't_tt_prod' => $isi['namaProduk'],
							't_tt_tinjauan' => $isi['tinjauan'],
							't_tt_deskripsi' => $isi['keterangan'],
							't_tt_akibat' => $isi['dampak'],
							't_tt_solusi' => $isi['solusi'],
							't_tt_vendor' => $isi['status'],
				);
			//var_dump($inpRef);
			$this->db->set($inpRef);
			return $this->db->insert('trvulner');;
		}
		function editLaporanMain($isi){
			//var_dump($isi);
			$inpMain = array(
							'n_vv_nama' => $isi['namaKerentanan'],
							'n_vv_platform' => $isi['platform'],
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

		public function getLogin($id){
			$a = "
				SELECT * FROM truser WHERE i_ii_id='".$id."'
			";
			$query = $this->db->query($a);
			return $query;
		}
		public function getDetail($id){
			$a = "
				SELECT * FROM trkont WHERE i_ii_id='".$id."'
			";
			$query = $this->db->query($a);
			return $query;
		}
		
	}

?>