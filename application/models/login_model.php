<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function cekLogin($user,$pass){
			$a = "
				SELECT * FROM TRUSER WHERE n_vv_username='".$user."' AND n_vv_password ='".$pass."'
			";
			$query = $this->db->query($a);
			return $query->num_rows();
		}
		public function getId($user){
			$a = "
				SELECT i_ii_id FROM TRUSER WHERE n_vv_username='".$user."'
			";
			$query = $this->db->query($a);
			return $query;
		}
		public function getLogin($id){
			$a = "
				SELECT * FROM truser WHERE i_ii_id='".$id."'
			";
			$query = $this->db->query($a);
			return $query;
		}
		public function getDetail($id){
			if (substr($id, 0,1)=="1") {
				$tbl = "tradm";
			}else if(substr($id, 0,1)=="2"){
				$tbl = "trkont";
			}else if(substr($id, 0,1)=="3"){
				$tbl = "trvendor";
			}
			$a = "
				SELECT * FROM ".$tbl." WHERE i_ii_id='".$id."'
			";
			$query = $this->db->query($a);
			return $query;
		}
	}
?>