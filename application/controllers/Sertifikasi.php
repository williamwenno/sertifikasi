<?php 
/**
* 
*/
class Sertifikasi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_peserta');
		date_default_timezone_set('Asia/Makassar');
		
	}

	function index() {
		$peserta = $this->M_peserta->get_data();
		$data = array(
			
			'peserta' => $peserta
			);
		$this->load->view('index', $data);
	}

	function input() {
		$this->load->view('input');
	}

	function input_proses() {
		$data_insert = array(
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'no_hp' => $this->input->post('hp'),
			'email' => $this->input->post('email'),
			'skema' => $this->input->post('skema'),
			'tempat_uji' => $this->input->post('lokasi_ujian'),
			'rekomendasi' => $this->input->post('rekomendasi'),
			'tgl_terbit' => $this->input->post('tgl_terbit'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'organisasi' => $this->input->post('organisasi')
		);

		$this->M_peserta->insert_data($data_insert);
		redirect(base_url());
	}

	function tgl() {
		$peserta = $this->M_peserta->get_data_tgl();
		$data = array(
			
			'peserta' => $peserta
			);
		$this->load->view('by_tgl', $data);
	}
}