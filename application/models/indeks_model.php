<?php
	class Indeks_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function select_data_kont($data){
			$query = $this->db->query("
				SELECT
				TMVULNER.i_ii_id as id,
				TMVULNER.c_vv_vulner as codeVulner,
				TMVULNER.n_vv_nama as namaVulner,
				TMVULNER.w_dt_upload as tglUp,
				TMVULNER.w_dt_edit as tglEd,
				TMVULNER.w_tm_upload as wktUp ,
				TMVULNER.n_vv_platform as platform,
				trkont.i_ii_id as idkont,
				trkont.n_vv_alias as kont,
				TMVULNER.w_tm_edit as wktEd
				 from 
				TMVULNER, trkont
				where
					tmvulner.i_vv_idauthor=trkont.i_ii_id
					AND c_vv_show='ok'
					AND trkont.i_ii_id='".$data."'
				 order by TMVULNER.i_ii_id desc
			");/*
			$this->db->select('*');
			$this->db->from('TMVULNER');
			$this->db->order_by('i_ii_id', 'desc');*/

			
			return $query;
		}
		function select_data_tgl($data){
			$query = $this->db->query("
				SELECT
				TMVULNER.i_ii_id as id,
				TMVULNER.c_vv_vulner as codeVulner,
				TMVULNER.n_vv_nama as namaVulner,
				TMVULNER.w_dt_upload as tglUp,
				TMVULNER.w_dt_edit as tglEd,
				TMVULNER.w_tm_upload as wktUp ,
				TMVULNER.n_vv_platform as platform,
				trkont.i_ii_id as idkont,
				trkont.n_vv_alias as kont,
				TMVULNER.w_tm_edit as wktEd
				 from 
				TMVULNER, trkont
				where
					tmvulner.i_vv_idauthor=trkont.i_ii_id
					AND c_vv_show='ok'
					AND TMVULNER.w_dt_upload='".$data."'
				 order by TMVULNER.i_ii_id desc
			");/*
			$this->db->select('*');
			$this->db->from('TMVULNER');
			$this->db->order_by('i_ii_id', 'desc');*/

			
			return $query;
		}
	}
?>