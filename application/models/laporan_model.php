<?
	class Laporan_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function getone_data($isi){
			$q = 'select 
				TMVULNER.i_ii_id as id, 
				TMVULNER.c_vv_vulner as codeVulner, 
				TMVULNER.n_vv_nama as namaVulner, 
				TMVULNER.w_dt_upload as tglUp, 
				TMVULNER.w_dt_edit as tglEd, 
				TMVULNER.w_tm_upload as wktUp, 
				TMVULNER.w_tm_edit as wktEd, 
				TRVULNER.t_tt_prod as produk, 
				TRVULNER.t_tt_deskripsi as deskripsi,
				TRVULNER.t_tt_tinjauan as tinjauan,
				TRVULNER.t_tt_akibat as akibat, 
				TRVULNER.t_tt_solusi as solusi, 
				TRVULNER.t_tt_vendor as vendor, 
				TRVULNER.t_tt_referensi as referensi
				from 
				TMVULNER,TRVULNER 
				where 
				TMVULNER.c_vv_vulner="'.$isi.'" AND 
				TMVULNER.i_ii_iddet = TRVULNER.i_ii_id 
				order by 
				TMVULNER.i_ii_id desc';
			$query = $this->db->query($q);

			
			return $query;
		}
		function selectDataPerType($tipe){
			$query = $this->db->query("
				select
				TMVULNER.i_ii_id as id,
				TMVULNER.c_vv_vulner as codeVulner,
				TMVULNER.n_vv_nama as namaVulner,
				TMVULNER.w_dt_upload as tglUp,
				TMVULNER.w_dt_edit as tglEd,
				TMVULNER.w_tm_upload as wktUp ,
				TMVULNER.n_vv_platform as platform,
				trkont.i_ii_id as idKont,
				trkont.n_vv_alias as kont,
				TMVULNER.w_tm_edit as wktEd
				 from 
				TMVULNER, trkont
				where
					tmvulner.i_vv_idauthor=trkont.i_ii_id
					AND n_vv_platform=".$tipe."
					AND c_vv_show='ok'
				 order by TMVULNER.i_ii_id desc
			");/*
			$this->db->select('*');
			$this->db->from('TMVULNER');
			$this->db->order_by('i_ii_id', 'desc');*/

			
			return $query;
		}
	}
?>