<?php
class M_admin extends CI_Model {
	
	function get_admin($user) {
		$this->db->where('username',$user);
		$res=$this->db->get('admin');
		return $res->result_array();
	}

	function get_kat() {
		return $this->db->get('kategori')->result_array();
	}

	function add_produk($data) {
		$this->db->insert('produk', $data);
		return $this->db->insert_id();
	}

	function get_produk() {
		return $this->db->get('produk')->result_array();
	}

	function file_gbr($data, $where) {
		$this->db->where('id_produk',$where);
		$this->db->update('produk', $data);
	}

	function get_produkbyid($id) {
		$this->db->where('id_produk', $id);
		return $this->db->get('produk')->result_array();
	}

	function insert_pesanan_manual($data) {
		return $this->db->insert('pesanan', $data);
	} 

	function pesanan() {
		$this->db->join('member', 'member.username=pesanan.pemesan');
		$this->db->join('status_pesanan', 'status_pesanan.id = pesanan.status');
		return $this->db->get('pesanan')->result_array();
	}

	function update_stok($id, $data) {
		$this->db->where('id_produk', $id);
		return $this->db->update('produk', $data);
	}

	function tgl() {
		$this->db->select('pesanan.tgl_beli as tgl, MONTH(pesanan.tgl_beli) AS bulan, YEAR(pesanan.tgl_beli) AS tahun, count(*) as jumlah');
		$this->db->group_by('MONTH(pesanan.tgl_beli), YEAR(pesanan.tgl_beli)');
		$where = '(status="2" or status = "3")';
		$this->db->where($where);
		
		$this->db->order_by('tgl_beli', 'desc');
		return $this->db->get('pesanan')->result_array();
	}

	function detail_tgl($bln, $thn) {
		$this->db->select('*,produk.id_produk as id_prod, produk.nama_produk as produk, SUM(jumlah) as jml');
		$this->db->group_by('keranjang.id_produk');
		$this->db->join('pesanan','pesanan.kode_pesanan = keranjang.kode_pesanan');
		$this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
		$this->db->order_by('jml', 'DESC');
		$this->db->where('MONTH(pesanan.tgl_beli)', $bln);
		$this->db->where('YEAR(pesanan.tgl_beli)', $thn);
		
		return $this->db->get('keranjang')->result_array();
	}

	function detail_tglprod($bln, $thn, $idprod) {
		//$this->db->select('produk.nama_produk as produk, count(*) as jml');
		//$this->db->group_by('keranjang.id_produk');
		$this->db->join('pesanan','pesanan.kode_pesanan = keranjang.kode_pesanan');
		$this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
		$this->db->where('produk.id_produk', $idprod);
		$this->db->where('MONTH(pesanan.tgl_beli)', $bln);
		$this->db->where('YEAR(pesanan.tgl_beli)', $thn);
		return $this->db->get('keranjang')->result_array();
	}

	function data_verif() {
		$this->db->where('status', '1');
		return $this->db->get('pesanan')->result_array();
	}

	function proses_verif($id, $data) {
		$this->db->where('id_pesanan', $id);
		return $this->db->update('pesanan', $data);
	}

	function produk_kirim() {
		$this->db->where('pemesan !=', 'administrator');
		$this->db->where('status', '2');
		$this->db->or_where('status','3');
		
		return $this->db->get('pesanan')->result_array();
	}

	function detail_kirim($kode) {
		$this->db->select('*, produk.id_produk as produkbrg');
		$this->db->where('kode_pesanan', $kode);
		$this->db->join('produk', 'produk.id_produk=keranjang.id_produk');
		return $this->db->get('keranjang')->result_array();
	}

	function detail_pesanan($kode) {
		$this->db->where('kode_pesanan', $kode);
		return $this->db->get('pesanan')->result_array();
	}

	function get_alamatbyid($id) {
		$this->db->where('id_alamat', $id);
		$this->db->select('*, kabupaten.name as kab, provinsi.name as prov,kecamatan.name as kecamatan');
		$this->db->join('kecamatan','kecamatan.id = alamat.id_kec');
		$this->db->join('kabupaten', 'kabupaten.id = kecamatan.regency_id');
		$this->db->join('provinsi', 'provinsi.id = kabupaten.province_id');

		return $this->db->get('alamat')->result_array();
	}

	function outofdate() {
		$this->db->where('tgl_beli <', date('Y-m-d'));
		$this->db->where('status !=', '2');
		return $this->db->delete('pesanan');
		
	}

	function pesanan_outofdate() {
		$this->db->where('tgl_beli <', date('Y-m-d'));
		$this->db->where('status !=', '2');
		return $this->db->get('pesanan')->result_array();
	}

	function outofdate2() {
		$this->db->where('tgl_beli IS NULL ');
		
		return $this->db->delete('pesanan');
		
	}

	function bukti_unverif() {
		$this->db->where('status', '1');
		$this->db->where('bukti IS NOT NULL');
		$this->db->where('bukti !=', '');
		return $this->db->get('pesanan')->result_array();
	}

	function proses_tolak($id) {
		$this->db->where('id_pesanan', $id);
		return $this->db->delete('pesanan');
	}

	function max_jml($id) {
		$this->db->where('id_produk', $id);
		$prod = $this->db->get('produk')->result_array();
		$prod = $prod[0];
		$stok = $prod['stok'];
		$tulis= '<input name="jumlah" type="number" min="0" max="'.$stok.'" class="form-control">';
		$tulis2= "kdslds";
		return $tulis;
	}

	function get_pesananbyid($id) {
		$this->db->where('id_pesanan', $id);
		return $this->db->get('pesanan')->result_array();
	}

	function delete_keranjang($kode) {
		$this->db->where('kode_pesanan', $kode);
		return $this->db->delete('keranjang');
	}

	function isi_keranjang($data) {
		return $this->db->insert('keranjang', $data);
	}

	function ongkirprov($id) {
		$this->db->where('province_id', $id);
		return $this->db->get('kabupaten')->result_array();
	}

	function sortkec($idkab) {
		$this->db->where('regency_id', $idkab);
		$this->db->order_by('id', 'DESC');
		return $this->db->get('kecamatan')->result_array();
	}

	function sortkab($idprov) {
		$this->db->where('province_id', $idprov);
		$this->db->order_by('id', 'DESC');
		return $this->db->get('kabupaten')->result_array();
	}

	function sortprov() {
		$this->db->order_by('id', 'DESC');
		return $this->db->get('provinsi')->result_array();
	}



	function id_prov($id) {
		$this->db->where('id', $id);
		$prov = $this->db->get('provinsi')->result_array();
		return $prov[0];
	}

	function provinsi() {
		return $this->db->get('provinsi')->result_array();
	}

	function update_ongkir($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('kabupaten', $data);
	}

	function insert_prov($prov) {
		$this->db->insert('provinsi', $prov);
		return $this->db->insert_id();
	}

	function insert_kota($kota) {
		$this->db->insert('kabupaten', $kota);
		return $this->db->insert_id();
	}

	function insert_kec($kec) {
		return $this->db->insert('kecamatan', $kec);
	}
}			