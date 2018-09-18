<?php
class Bengkel extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_bengkel');
		date_default_timezone_set('Asia/Makassar');
		error_reporting(0);
	}

	function index() {
		$data = array(
			'produk' => $this->M_bengkel->get_produk(),
			'produk_laris' => $this->M_bengkel->barang_terlaris()
			);
		$this->load->view('public/index', $data);
	}

	function register() {
		$this->load->view('public/register');
	}

	function register_proses() {
		$data= array (
			'username' => $this->input->post('username'),
			'password' =>md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email')
			);
		$this->M_bengkel->register($data);
		redirect(base_url('index.php/bengkel/login_page'));
	}

	function login_proses() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$url = $this->input->post('url');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_bengkel->cek_login($where)->num_rows();
		if($cek > 0){
			$keranjang = $this->cart->contents();
			if(count($keranjang) > 0) {
				foreach($keranjang as $keranjang) {
					$insker = array(
						'id_produk' => $keranjang['id'],
						'jumlah' => $keranjang['qty'],
						'username' => $username
						);
					$this->M_bengkel->keranjang($insker);
					
				} 
			}
			$data_session = array(
				'username' => $username,
				'status' => "logined",
				'referred_from' => $url
				);
			$this->session->set_userdata($data_session);
			$url = $this->session->userdata('referred_from');
			redirect($url);
		}else{
			$data = array(
				'gagal' => 'Password Salah atau Belum Terdaftar'
				);
			$this->load->view('public/login_page', $data);
		}
	}

	function login_proses2() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$url = $this->input->post('url');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_bengkel->cek_login($where)->num_rows();
		if($cek > 0){
			$keranjang = $this->cart->contents();
			if(count($keranjang) > 0) {
				foreach($keranjang as $keranjang) {
					$insker = array(
						'id_produk' => $keranjang['id'],
						'jumlah' => $keranjang['qty'],
						'username' => $username
						);
					$this->M_bengkel->keranjang($insker);
					
				} 
			}
			$data_session = array(
				'username' => $username,
				'status' => "logined",
				'referred_from' => $url
				);
			$this->session->set_userdata($data_session);
			$url = $this->session->userdata('referred_from');
			redirect(base_url());
		}else{
			$data = array(
				'gagal' => 'Password Salah atau Belum Terdaftar'
				);
			$this->load->view('public/login_page', $data);
		}
	}

	function change_pass() {
		$oldpas = $this->input->post('oldpas');
		$newpas = $this->input->post('newpas');
		$username = $this->session->userdata('username');
		$where = array(
			'username' => $username,
			'password' => md5($oldpas)
			);
		$cek = $this->M_bengkel->cek_login($where)->num_rows();
		if($cek > 0){
			$data = array(
				'password' => md5($newpas)
				);
			$this->M_bengkel->update_pas($username, $data);
			redirect(base_url());
		}else{
			echo 'Password Lama Anda Salah';
		}
	}

	function login_admin() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_bengkel->cek_admin($where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => "admin_log",
				
				);
			$this->session->set_userdata($data_session);
			
			redirect(base_url('index.php/Admin'));
		}else{
			$data = array (
				'gagal' => 'Username atau Password Salah'
				);
			$this->load->view('admin/login_form',$data);
		}
	}

	function produk($id) {
		$data = $this->M_bengkel->produk($id);
		$data = array (
			'produk' => $data[0]
			);
		$this->load->view('public/produk', $data);
	}

	function keranjang_nonlogin() {
		$data = array(
			'id' => $this->input->post('produk'),
			'qty' => $this->input->post('jumlah'),
			'price' => 1,
			'name' => 'mana2'
			);
		//print_r($data);
		
		$this->cart->insert($data);
		redirect(base_url());
	}

	function keranjang() {
		$data = array(
			'username' => $this->input->post('user'),
			'id_produk' => $this->input->post('produk'),
			'jumlah' => $this->input->post('jumlah')
			);
		if($this->input->post('keranjang')) {
			$this->M_bengkel->keranjang($data);
			redirect(base_url());
		} else {
			$user = $this->session->userdata('username');
			$tgl = date('dmYhi');
			$kode = $tgl.$user;
			$data_ker = array(
				'username' => $this->input->post('user'),
				'id_produk' => $this->input->post('produk'),
				'jumlah' => $this->input->post('jumlah'),
				'kode_pesanan' => $kode,
				'status_pesanan' => '1'
				);
			$id_ker = $this->M_bengkel->keranjang($data_ker);
			$keranjang = $this->M_bengkel->get_keranjang($id_ker);
			$keranjang = $keranjang[0];
			$alamat = $this->M_bengkel->get_alamat($username);
			$produk = $this->M_bengkel->produk($keranjang['id_produk']);
			$produk = $produk[0];
			$total = $keranjang['jumlah'] * $produk['harga'];
			$data_pesanan = array (
				'pemesan' => $user,
				'kode_pesanan' => $keranjang['kode_pesanan'],
				'total' => $total,
				'id_alamat' => $alamat[0]['id_alamat'],
				);		
			$pesanan = $this->M_bengkel->tambah_pesanan($data_pesanan);	
			redirect(base_url('index.php/Bengkel/detail_kirim/'.$pesanan));
			//redirect (base_url('index.php/Bengkel/bayar/'.$this->session->userdata('username')));
		}
	}

	function hitungan() {

		
	}

	function bayar($username) {
		$alamat = $this->M_bengkel->get_alamat($username);
		$keranjang = $this->M_bengkel->cek_keranjang($username);
		$tgl = date('dmYhi');
		$kode = $tgl.$username;
		$total = 0;
		foreach ($keranjang as $ker) {
			$data = array (
				'status_pesanan' => '1',
				'kode_pesanan' => $kode
				);
			$this->M_bengkel->bayar($ker['id_keranjang'], $data);
			$subtot = $ker['jumlah'] * $ker['harga'];
			$total = $total + $subtot;
		}
		$data2 = array (
			'kode_pesanan' => $kode,
			'pemesan' => $username,
			'total' => $total,
			'id_alamat' => $alamat[0]['id_alamat']
			);
		$pesanan = $this->M_bengkel->tambah_pesanan($data2);
		redirect(base_url('index.php/Bengkel/detail_kirim/'.$pesanan));
	}

	function detail_kirim($id) {
		$pesanan = $this->M_bengkel->get_pesanan($id);
		$barang = $this->M_bengkel->get_barangbykodeproduk($pesanan[0]['kode_pesanan']);
		$totber = 0;
		foreach($barang as $barang) {

			$totber = $totber + $barang['beratgr']*$barang['jumlah'];
		}
		$totberat = ceil($totber/1000);
		$alamat = $this->M_bengkel->get_alamatbyid($pesanan[0]['id_alamat']);
		$jml_alamat = count($this->M_bengkel->get_alamat($this->session->userdata('username')));
		$data = array (
			'pesanan' => $pesanan[0],
			'alamat' => $alamat,
			'address' => $this->M_bengkel->get_alamat($this->session->userdata('username')),
			'jmlala' => count($alamat),
			'berat' => $totberat,
			'jml' => $jml_alamat 
			);
		$this->load->view('public/detail_kirim',$data);

	}

	function ganti_alamat($id_alamat, $id_pesanan) {
		$data = array (
			'id_alamat' => $id_alamat
			);
		$this->M_bengkel->ganti_alamat($id_pesanan, $data);
		redirect(base_url('index.php/Bengkel/detail_kirim/'.$id_pesanan));
	}

	function hapus_keranjang($id) {
		$this->M_bengkel->hapus_keranjang($id);
		redirect (base_url());
	}


	function bukti_pembayaran($id, $totalongkir) {
		$bukti = $this->M_bengkel->get_data_bukti($id);
		$bukti = $bukti[0];
		$alamat = $this->M_bengkel->get_alamatbyid($bukti['id_alamat']);
		$alamat = $alamat[0];

		$total = $alamat['ongkir'] + $bukti['total'];
		$update = array(
			'status' => '1',
			'total' => $totalongkir,
			'tgl_beli' => date('Y-m-d')
			);

		$this->M_bengkel->update_pesanan($id, $update);
		$kode = $bukti['kode_pesanan'];
		$produk_pesan = $this->M_bengkel->get_pesananbykodeproduk($kode);
		foreach($produk_pesan as $produk_pes) {
			$barang = $this->M_bengkel->produk($produk_pes['id_produk']);
			$data = array (
				'stok' => $barang[0]['stok'] - $produk_pes['jumlah']
				);
			$this->M_bengkel->update_stok($barang[0]['id_produk'], $data);
		}
		$produk = $this->M_bengkel->get_data_bukti($id);
		$produk = $produk[0];
		$data = array (
			'produk' =>$produk
			);
		redirect(base_url('index.php/Bengkel/data_pembayaran/'.$id));
	}

	function data_pembayaran($id) {
		$produk = $this->M_bengkel->get_data_bukti($id);
		$produk = $produk[0];
		$barang = $this->M_bengkel->get_barangbykodeproduk($produk['kode_pesanan']);
		$data = array (
			'produk' =>$produk,
			'barang' => $barang
			);
		if($this->session->userdata('username') != $produk['pemesan']) {
			$this->load->view('public/akses');
		} else {
			$this->load->view('public/bukti_bayar', $data);
		}
		
	}

	function form_add_alamat() {
		$data = array (
			'provinsi' => $this->M_bengkel->provinsi(),
			'kabupaten' => $this->M_bengkel->getkabupaten()
			);
		$this->load->view('public/form_add_alamat', $data);
	}
	
	function lihat_keranjang($username) {
		$data = $this->M_bengkel->cek_keranjang($username);
		$data = array (
			'produk' => $data
			);
		$this->load->view('public/keranjang', $data);
	}

	function lihat_keranjangnonlogin() {
		$data = $this->cart->contents();
		echo $data['d3d9446802a44259755d38e6d163e820']['id'];
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function admin() {
		$this->load->view('admin/login_form');
	}

	function ambil_data() {
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');
		if($modul=="kabupaten"){
			echo $this->M_bengkel->kabupaten($id);
		} else if($modul=="kecamatan"){
			echo $this->M_bengkel->kecamatan($id);
		} 
	}

	function add_alamat_proses() {
		$data = array (
			'username' => $this->session->userdata('username'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'nama_alamat' => $this->input->post('nama_alamat'),
			'telp' => $this->input->post('telp'),
			'kodepos' => $this->input->post('kode_pos'),
			'id_kec' => $this->input->post('kecamatan'),
			'alamat' => $this->input->post('alamat'),

			);
		$this->M_bengkel->add_alamat($data);
		redirect(base_url());
	}

	function tgl() {
		$data = $this->M_bengkel->tgl();
		print_r($data);
	}

	function upload_gambar() {
		$nama_file = $this->input->post('id_pesanan');
		$config['upload_path']          = './file_bukti/';
		$config['allowed_types']        = 'jpg|png|gif';
		$config['file_name']			= $nama_file;
		$this->load->library('upload', $config);
		$data = $this->upload->do_upload('bukti');
		$file_bukti = $this->upload->data();
		$file_bukti=$file_bukti['file_name'];
		$nama_bukti = array(
			'bukti' => $file_bukti
			);
		$this->M_bengkel->update_bukti($nama_file, $nama_bukti);
		redirect(base_url('index.php/Bengkel/data_pembayaran/'.$nama_file));
	}

	function ganti_gambar() {
		$nama_file = $this->input->post('id_pesanan');
		$config['upload_path']          = './file_bukti/';
		$config['overwrite'] 			= TRUE;
		$config['allowed_types']        = 'jpg|png|gif';
		$config['file_name']			= $nama_file;
		$this->load->library('upload', $config);
		$data = $this->upload->do_upload('bukti');
		redirect(base_url('index.php/Bengkel/data_pembayaran/'.$nama_file));
	}

	function produk_bykat($id) {
		$data = $this->M_bengkel->produk_bykat($id);
		$data = array (
			'produk' => $data
			);
		$this->load->view('public/index', $data);
	}

	function profile($username) {
		if($this->session->userdata('username') != $username) {
			$this->load->view('public/akses');
		} else {
			$profile = $this->M_bengkel->profile($username);
			$data = array (
				'profile' => $profile[0]
				);
			$this->load->view('public/profile', $data);
		}
	}

	function search() {
		$keyword = $this->input->post('keyword');
		$data = $this->M_bengkel->search($keyword);
		$data = array(
			'produk' => $data
			);
		$this->load->view('public/index', $data);
	}

	function update_akhir($id) {
		$data = array ('status' => '3');
		$this->M_bengkel->status_akhir($id, $data);
		redirect(base_url());
	}

	function login_page() {
		$this->load->view('public/login_page');
	}

	function tesliat() {
		$data = $this->M_bengkel->getkabupaten();
		//print_r($data);
		$json = json_encode($data);
		$jso= json_decode($json);
		print_r($jso);echo "<br>";
		print_r($jso[0]->name);
		
	}

	function cart() {
		$data = array(
			'id'      => 'sku_123ABC',
        	'qty'     => 1,
        	'price'   => 39.95,
        	'name'    => 'T-Shirt',
        	'options' => array('Size' => 'L', 'Color' => 'Red')
        );
        $this->cart->insert($data);
	}

	function cart2() {
		$data = array(
			'id'      => 'sku55',
        	'qty'     => 1,
        	'price'   => 39.95,
        	'name'    => 'Baju Besar',
        	'options' => array('Size' => 'L', 'Color' => 'Red')
        );
        $this->cart->insert($data);
	}

	function lihatcart() {
		$keranjang = $this->cart->contents();
		//print_r($keranjang);
		//echo  '<br/>'.count($data);
		//echo '<br><br>';
		$data = array(
			'ker' => $keranjang
			);
		$this->load->view('public/keranjangnonlogin', $data);
	}

	function hapuscart($rowid) {
		$data = array (
			'rowid' => $rowid,
			'qty' => 0
			);
		$this->cart->update($data);
		redirect(base_url('index.php/Bengkel/lihatcart'));
	}

	function destroy() {
		$this->cart->destroy();
	}

	function barang_terlaris() {
		$data = $this->M_bengkel->barang_terlaris();
		print_r($data);
		echo '<br><br><br>';
		echo '<table><tr><th>Produk</th><th>Laku</th></tr>';
		foreach ($data as $produk ) {
			echo '<tr><td>'.$produk['nama_produk'].'</td><td>'.$produk['jml'].'</td></tr>';
		}
		echo '</table>';
	}

	function camat() {
		$no = 1;
		$data = $this->M_bengkel->allcamat();
		foreach($data as $data) {
			echo $no.'. '.$data['kecamatan'].' ---> '.$data['kabupaten'].'<br>';
			$no++;
		}
	} 

}