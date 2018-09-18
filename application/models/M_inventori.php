<?php

/**
* 
*/
class M_inventori extends CI_Model {
	
	function cek_login_admin($user, $pass) {
		$this->db->where('user', $user);
		$this->db->where('password', $pass);
		return $this->db->get('petugas_penata')->result_array();
	}

	function cek_login_user($user, $pass) {
		$this->db->where('user', $user);
		$this->db->where('password', $pass);
		return $this->db->get('sekolah')->result_array();
	}

	function get_user() {
		return $this->db->get('sekolah')->result_array();
	}

	function insert_mesin($data) {
		$this->db->insert('peralatan_mesin', $data);
		return $this->db->insert_id();
	}

	function insert_gedung($data) {
		$this->db->insert('gedung_bangunan', $data);
		return $this->db->insert_id();
	}

	function insert_buku($data) {
		$this->db->insert('buku_perpustakaan', $data);
		return $this->db->insert_id();
	}

	function insert_hewan($data) {
		return $this->db->insert('hewan_ternak_tumbuhan', $data);
	}

	function insert_seni($data) {
		return $this->db->insert('kesenian_kebudayaan', $data);
	}

	function insert_aset($data) {
		return $this->db->insert('aset_tetap_lain', $data);
	}

	function get_sup() {
		return $this->db->get('suplier')->result_array();
	}

	function insert_suplier($data) {
		return $this->db->insert('suplier', $data);
	}

	function insert_sekolah($data) {
		return $this->db->insert('sekolah', $data);
	}

	function insert_galeri($data) {
		return $this->db->insert('galeri', $data);
	}

	function insert_pengadaan($data) {
		return $this->db->insert('pengadaan', $data);
	}

	function get_pengadaan() {
		return $this->db->get('pengadaan')->result_array();
	}

	function get_table($table) {
		return $this->db->list_fields($table);
	}

	function get_isi($table) {
		return $this->db->get($table)->result_array();
	}
}