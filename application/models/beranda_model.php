<?
	class Beranda_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function select_data(){
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
					AND c_vv_show='ok'
				 order by TMVULNER.i_ii_id desc
			");/*
			$this->db->select('*');
			$this->db->from('TMVULNER');
			$this->db->order_by('i_ii_id', 'desc');*/

			
			return $query;
		}
		function select_rank(){
			$query = $this->db->query("
				SELECT 
					trkont.n_vv_alias as alias,
					count(tmvulner.i_ii_id) AS total
				FROM 
					trkont INNER JOIN tmvulner ON trkont.i_ii_id = tmvulner.i_vv_idauthor
				GROUP BY 
					trkont.n_vv_alias
				ORDER BY 
					total desc
				LIMIT 
					0,10
			");
			return $query;
		}
		function select_tot_lap(){
			$query = $this->db->query("
				SELECT 
					count(tmvulner.i_ii_id) AS total
				FROM 
					tmvulner
			");
			return $query;
		}
	}
?>