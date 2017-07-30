<?
	class Ancaman_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function getone_data($isi){
			$query = $this->db->query("
				select 
				i_ii_id as id,
				c_ii_risklvl as codeRisk,
				n_vv_risklvl as judulRisk,
				t_tt_deskripsi as deskripsi,
				w_dt_upload as tglUpload,
				w_dt_edit as tglEdit,
				w_tm_upload as wktUpload,
				w_tm_edit as wktEdit
				from
				trrisklevel
				where
				n_vv_risklvl = '".$isi."'
			");
			

			
			return $query;
		}
		function select_data(){
			$query = $this->db->query("
				select 
				i_ii_id as id,
				c_ii_risklvl as codeRisk,
				n_vv_risklvl as judulRisk,
				t_tt_deskripsi as deskripsi,
				w_dt_upload as tglUpload,
				w_dt_edit as tglEdit,
				w_tm_upload as wktUpload,
				w_tm_edit as wktEdit
				from
				trrisklevel
			");
			

			
			return $query;
		}
	}
?>