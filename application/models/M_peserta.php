<?php
/**
* 
*/
class M_peserta extends CI_Model
{
	
	function get_data() {
		$data = $this->db->get('peserta');
		return $data->result_array();
	}

	function insert_data($data) {
		$this->db->insert('peserta', $data);
	}

	function get_data_tgl() {
		return $this->db->query("CALL order_by_tgl_lahir")->result_array();
	}
}