<?php

/**
* 
*/
class C_login extends CI_Controller {
	
function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != 'logined') {
			redirect(base_url());
		}
		$this->load->model('M_inventori');
		date_default_timezone_set('Asia/Makassar');
		
	}

	function index() {
		$menu['menu'] = 'home';
		$data =  array(
			'menu' => $menu,
			'title' => 'Welcome - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('home', $data);
	}

	function user() {
		$menu['menu'] = 'user';
		$datauser = $this->M_inventori->get_user();
		$data = array (
			'menu' => $menu,
			'title' => 'User - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level'),
			'user' => $datauser
		);
		$this->load->view('user', $data);
	}

	function mesin() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('mesin', $data);
	}

	function mesin_proses() {
		$data_insert = array (
			'nm_barang' => $this->input->post('nm_barang'),
			'nomor_reg' => $this->input->post('nomor_reg'),
			'merk_jenis' => $this->input->post('merk_jenis'),
			'ukuran' => $this->input->post('ukuran'),
			'bahan' => $this->input->post('bahan'),
			'tahun_beli'=> $this->input->post('tahun_beli'),
			'nomor_pabrik' => $this->input->post('nomor_pabrik'),
			'nomor_rangka' => $this->input->post('nomor_rangka'),
			'nomor_mesin' => $this->input->post('nomor_pabrik'),
			'nomor_polisi' => $this->input->post('nomor_polisi'),
			'nomor_bpkb' => $this->input->post('nomor_bpkb'),
			'asal_usul_perolehan' => $this->input->post('asal_usul'), 
			'jumlah_unit' => $this->input->post('jumlah_unit'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'nilai_semester' => $this->input->post('nilai_semester'),
			'mutasi_semester_bertambah' => $this->input->post("mutasi_semester_bertambah"),
			'mutasi_semester_berkurang' => $this->input->post('mutasi_semester_berkurang'),
			'harga_perolehan' => $this->input->post('harga_perolehan'),
			'keterangan' => $this->input->post('keterangan')
		);

		$mesin = $this->M_inventori->insert_mesin($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function gedung() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('gedung', $data);
	}

	function gedung_proses() {
		$data_insert = array (
			'nomor_reg' => $this->input->post('nomor_reg'),
			'kondisi_bangunan' => $this->input->post('kondisi_bangunan'),
			'konstruksi_bangunan' => $this->input->post('konstruksi_bangunan'),
			'luas_lantai' => $this->input->post('luas_lantai'),
			'letak_lokasi' => $this->input->post('letak_lokasi'),
			'dokumen_gedung'=> $this->input->post('dokumen_gedung'),
			'luas' => $this->input->post('luas'),
			'status_tanah' => $this->input->post('status_tanah'),
			'tahun_perolehan' => $this->input->post('tahun_perolehan'),
			'asal_usul' => $this->input->post('asal_usul'), 
			'mutasi_semester_bertambah' => $this->input->post("mutasi_semester_bertambah"),
			'mutasi_semester_berkurang' => $this->input->post('mutasi_semester_berkurang'),
			'harga_perolehan' => $this->input->post('harga_perolehan'),
			'keterangan' => $this->input->post('keterangan')
		);
		$gedung = $this->M_inventori->insert_gedung($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function buku() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('buku', $data);
	}

	function buku_proses() {
		$data_insert = array(
			'penulis' => $this->input->post('penulis'),
			'penerbit' => $this->input->post('penerbit'),
			'spesifik_asal' => $this->input->post('spesifik_asal')
		);
		$buku = $this->M_inventori->insert_buku($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function hewan() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('hewan', $data);
	
	}

	function hewan_proses() {
		$data_insert = array (
			'nama' => $this->input->post('nama'),
			'jenis' => $this->input->post('jenis'),
			'jumlah' => $this->input->post('jumlah')
		);

		$hewan = $this->M_inventori->insert_hewan($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function seni() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('seni', $data);
	}

	function seni_proses() {
		$data_insert = array (
			'nama_tarian' => $this->input->post('tarian'),
			'alat_musik' => $this->input->post('musik'),
		);

		$hewan = $this->M_inventori->insert_seni($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function aset() {
		$menu['menu'] = 'inventaris';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('aset', $data);
	}

	function aset_proses() {
		$data_insert = array (
			'nomor_registrasi' => $this->input->post('nomor_registrasi'),
			'jumlah' => $this->input->post('jumlah'),
			'tahun_perolehan' => $this->input->post('tahun_perolehan'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'nilai_semester' => $this->input->post('nilai_semester'),
			'mutasi_semester_bertambah' => $this->input->post("mutasi_semester_bertambah"),
			'mutasi_semester_berkurang' => $this->input->post('mutasi_semester_berkurang'),
			'harga_perolehan' => $this->input->post('harga_perolehan'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->M_inventori->insert_aset($data_insert);
		redirect(base_url('index.php/C_login'));

	}

	function suplier() {
		$menu['menu'] = 'suplier';
		$suplier = $this->M_inventori->get_sup();
		$data =  array(
			'menu' => $menu,
			'title' => 'Suplier - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level'),
			'sup' => $suplier
			);
		$this->load->view('suplier', $data);
	}

	function suplier_proses() {
		$data_insert = array(
			'nm_suplier' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);
		$this->M_inventori->insert_suplier($data_insert);
		redirect(base_url('index.php/C_login/suplier'));
	}

	function sekolah() {
		$menu['menu'] = 'sekolah';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('sekolah', $data);
	}

	function sekolah_proses() {
		$data_insert = array(
			'nm_sekolah' => $this->input->post('nama_sekolah'),
			'email_sekolah' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'status' => $this->input->post('status'),
			'user' => $this->input->post('username'),
			'password' => MD5($this->input->post('password')),
			'id_kecamatan' => '1'
		);
		$this->M_inventori->insert_sekolah($data_insert);
		redirect(base_url('index.php/C_login'));
	}

	function galeri() {
		$menu['menu'] = 'galeri';
		$data =  array(
			'menu' => $menu,
			'title' => 'Galeri - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('galeri', $data);
	}

	function galeri_proses() {
		$config['upload_path']          = './galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']			= MD5($this->session->userdata('username').date('Y m d H i s'));

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');

        $data_insert = array(
        	'judul' => $this->input->post('judul'),
        	'file' => $this->upload->data('file_name')
        );
        $this->M_inventori->insert_galeri($data_insert);
        redirect(base_url('index.php/C_login'));
	}

	function form_pengadaan() {
		$menu['menu'] = 'pengadaan';
		$data =  array(
			'menu' => $menu,
			'title' => 'Inventaris - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('form_pengadaan', $data);
	}

	function pengadaan_proses() {
		$data_insert = array(
			'jenis' => $this->input->post('jenis'),
			'tahun' => $this->input->post('tahun')
		);
		$this->M_inventori->insert_pengadaan($data_insert);
        redirect(base_url('index.php/C_login'));
	}

	function about() {
		$menu['menu'] = 'about';
		$data =  array(
			'menu' => $menu,
			'title' => 'Tentang - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('about', $data);
	}

	function pengadaan() {
		$menu['menu'] = 'about';
		$data =  array(
			'menu' => $menu,
			'title' => 'Pengadaan - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('laporan_pengadaan', $data);
	}

	function laporan_pengadaan() {
		$menu['menu'] = 'laporan';
		$data =  array(
			'menu' => $menu,
			'title' => 'Pengadaan - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('laporan_pengadaan', $data);
	}

	function laporan_pengadaan_proses() {
		$menu['menu'] = 'laporan';
		$pengadaan = $this->M_inventori->get_pengadaan();
		$data =  array(
			'menu' => $menu,
			'title' => 'Pengadaan - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level'),
			'pengadaan' => $pengadaan
			);
		if($this->input->post('excel')) {
			$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Laporan Pengadaan.csv";
        $query = "SELECT * FROM pengadaan"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
		} elseif ($this->input->post('pdf')) {
			$this->load->view('cetak_pengadaan', $data);
		}
	}

	function laporan_inventaris() {
		$menu['menu'] = 'laporan';
		$data =  array(
			'menu' => $menu,
			'title' => 'Pengadaan - Aplikasi Monitoring Inventaris Sekolah Dinas Pendidikan Pemuda dan Olahraga Kota Tidore Kepulauan',
			'level' => $this->session->userdata('level')
			);
		$this->load->view('laporan_inventaris', $data);
	}

	function laporan_inventaris_proses() {
		if($this->input->post('excel')) {
			$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
         $tabel = $this->input->post('jenis');
        $filename = $tabel.".csv";
       
        $query = "SELECT * FROM $tabel"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
		} elseif ($this->input->post('pdf')) {
			$data1 = $this->M_inventori->get_table($this->input->post('jenis'));
			$data2 = $this->M_inventori->get_isi($this->input->post('jenis'));
			$data = array(
				'kolom' => $data1,
				'isi' => $data2
			);
			$this->load->view('cetak_inventori', $data);

			
		}
	}


}