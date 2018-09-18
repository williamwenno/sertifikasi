<?php
class M_bengkel extends CI_Model {

	function register($data) {
		return $this->db->insert('member', $data);
	}

	function update_pas($username, $data) {
		$this->db->where('username', $username);
		return $this->db->update('member', $data);
	}

	function cek_login($where) {
		$res = $this->db->get_where('member',$where);
		return $res;
	}
	function cek_admin($where) {
		$res = $this->db->get_where('admin',$where);
		return $res;
	}

	function get_produk() {
		//$this->db->where('id_kategori',$kat);
		$this->db->where('stok >', '0');
		$res = $this->db->get('produk');
		return $res->result_array();
	}

	function produk($id) {
		$this->db->where('id_produk', $id);
		$res = $this->db->get('produk');
		return $res->result_array();
	}

	function ganti_alamat($id, $data) {
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data);
	}

	function keranjang($data) {
		$this->db->insert('keranjang', $data);
		return $this->db->insert_id();
	}

	function tambah_pesanan($data) {
		$this->db->insert('pesanan', $data);
		return $this->db->insert_id();
	}

	function get_pesanan($id) {
		$this->db->where('id_pesanan', $id);
		return $this->db->get('pesanan')->result_array();
	}

	

	function hapus_keranjang($id) {
		$this->db->where('id_keranjang', $id);
		return $this->db->delete('keranjang');
	}

	function get_keranjang($id) {
		$this->db->where('id_keranjang', $id);
		return $this->db->get('keranjang')->result_array();
	}

	function bayar($id, $data) {
		$this->db->where('id_keranjang', $id);
		return $this->db->update('keranjang', $data);
	}

	function get_alamat($username) {
		$this->db->where('username', $username);
		$this->db->select('*, kabupaten.name as kab, provinsi.name as prov,kecamatan.name as kecamatan');
		$this->db->join('kecamatan','kecamatan.id = alamat.id_kec');
		$this->db->join('kabupaten', 'kabupaten.id = kecamatan.regency_id');
		$this->db->join('provinsi', 'provinsi.id = kabupaten.province_id');

		return $this->db->get('alamat')->result_array();
	}

	function get_alamatbyid($id) {
		$this->db->where('id_alamat', $id);
		$this->db->select('*, kabupaten.name as kab, provinsi.name as prov,kecamatan.name as kecamatan');
		$this->db->join('kecamatan','kecamatan.id = alamat.id_kec');
		$this->db->join('kabupaten', 'kabupaten.id = kecamatan.regency_id');
		$this->db->join('provinsi', 'provinsi.id = kabupaten.province_id');

		return $this->db->get('alamat')->result_array();
	}

	function cek_keranjang($user) {
		$this->db->where('username', $user);
		$this->db->where('status_pesanan', '0');
		$this->db->join('produk', 'produk.id_produk=keranjang.id_produk');
		return $this->db->get('keranjang')->result_array();
	}

	function provinsi(){
		$this->db->order_by('name','ASC');
		$this->db->where('id', '71');
		$provinsi= $this->db->get('provinsi');
		return $provinsi->result_array();
	}

	function getkabupaten() {
		$this->db->order_by('name', 'ASC');
		$this->db->where('province_id', '71');
		$kab = $this->db->get('kabupaten');
		return $kab->result_array();
	}

	function pesanan($user) {
		$this->db->where('pemesan', $user);
		$this->db->where('status', '0');
		return $this->db->get('pesanan')->result_array();
	}

	function verif_wait($user) {
		$this->db->where('pemesan', $user);
		//$this->db->where('status', '1');
		$where = '(status="1" or status = "2")';
		$this->db->order_by('id_pesanan', 'desc');
       $this->db->where($where);
		return $this->db->get('pesanan')->result_array();
	}

	function get_data_bukti($id) {
		$this->db->where('id_pesanan', $id);
		return $this->db->get('pesanan')->result_array();
	}

	function update_pesanan($id, $data) {
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data);
	}


	function kabupaten($provId){
		$kabupaten="<option value='0'>--pilih--</pilih>";
		$this->db->order_by('name','ASC');
		$kab= $this->db->get_where('kabupaten',array('province_id'=>$provId));
		foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kabupaten;
	}

	function kecamatan($kabId){
		$kecamatan="<option value='0'>--pilih--</pilih>";
		$this->db->order_by('name','ASC');
		$kec= $this->db->get_where('kecamatan',array('regency_id'=>$kabId));
		foreach ($kec->result_array() as $data ){
			$kecamatan.= "<option value='$data[id]'>$data[name]</option>";
		}
		return $kecamatan;
	}

	function add_alamat($data) {
		return $this->db->insert('alamat', $data);
	}

	function update_stok($id, $data) {
		$this->db->where('id_produk', $id);
		return $this->db->update('produk', $data);
	}

	function get_pesananbykodeproduk($kode) {
		$this->db->where('kode_pesanan' ,$kode);
		return $this->db->get('keranjang')->result_array();
	}

	function get_barangbykodeproduk($kode) {
		$this->db->where('kode_pesanan' ,$kode);
		$this->db->join('produk', 'produk.id_produk=keranjang.id_produk');
		return $this->db->get('keranjang')->result_array();
	}

	function tgl() {
		$this->db->select('MONTH(pesanan.tgl_beli) AS bulan, YEAR(pesanan.tgl_beli) AS tahun, count(*) as jumlah');
		$this->db->group_by('MONTH(pesanan.tgl_beli), YEAR(pesanan.tgl_beli)');
		$this->db->where('status', '2');
		$this->db->order_by('tgl_beli', 'desc');
		return $this->db->get('pesanan')->result_array();
	}

	function update_bukti($id, $data) {
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data);
	}

	function list_kategori() {
		return $this->db->get('kategori')->result_array();
	}

	function produk_bykat($id) {
		$this->db->where('kategori', $id);
		$this->db->where('stok >', '0');
		return $this->db->get('produk')->result_array();
	}

	function profile($username) {
		$this->db->where('username', $username);
		return $this->db->get('member')->result_array();
	}

	function search($keyword) {
		$this->db->like('nama_produk', $keyword);
		$this->db->where('stok >', '0');
		return $this->db->get('produk')->result_array();
	}

	function status_akhir($id, $data) {
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data);
	}

	function barang_terlaris() {
		$this->db->select('*,SUM(jumlah) as jml');
		$this->db->where('status_pesanan', '1');
		$this->db->join('produk', 'keranjang.id_produk=produk.id_produk');
		$this->db->group_by('keranjang.id_produk');
		$this->db->order_by('jml', 'DESC');
		$this->db->limit(5);
		return $this->db->get('keranjang')->result_array();
	}

	function allcamat() {
		$this->db->select('*, kabupaten.name as kabupaten, kecamatan.name as kecamatan');
		$this->db->join('kabupaten', 'kabupaten.id = kecamatan.regency_id');
		$data = $this->db->get('kecamatan')->result_array();
		return $data;
	}
}