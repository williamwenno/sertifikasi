<?php
/**
* 
*/
class Sertifikasi extends CI_Controller {
	function index() {
		//tampilkan view
		$this->load->view("skkni1/index");
	}

	function proses() {
		//Mendefenisikan bilangan pertama yang diisi dari form
		$bil1 = $this->input->post('bil1');
		//Mendefenisikan bilangan pertama yang diisi dari form
		$bil2 = $this->input->post('bil2');

		//Menggukan decision untuk memanggil fungsi aritmatika mana yang akan digunakan
		if($this->input->post('arit') == "jumlah") {
			$hasil = $this->jumlah($bil1, $bil2);
		} elseif($this->input->post('arit') == "kurang") {
			$hasil = $this->kurang($bil1, $bil2);
		} elseif($this->input->post('arit') == "kali") {
			$hasil = $this->kali($bil1, $bil2);
		} elseif($this->input->post('arit') == "bagi") {
			$hasil = $this->bagi($bil1, $bil2);
		}
		$data = array(
			'hasil' => $hasil,
			'terbilang' => $this->terbilang($hasil)
			); 
		$this->load->view('skkni1/hasil', $data);
	}

	//fungsi untuk terbilang
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			//penggunaan mminus untuk hasil minus
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}

	//fungsi untuk penjumlahan
	function jumlah($a, $b) {
		return $a + $b;
	}

	//fungsi untuk pengurangan
	function kurang($a, $b) {
		return $a - $b;
	}

	//fungsi untuk perkalian
	function kali($a, $b) {
		return $a * $b;
	}

	//fungsi untuk pembagian
	function bagi($a, $b) {
		return $a / $b;
	}
}

 
?>