-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 02:06 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventaris_sekolah`
--
CREATE DATABASE `inventaris_sekolah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventaris_sekolah`;

-- --------------------------------------------------------

--
-- Table structure for table `aset_tetap_lain`
--

CREATE TABLE IF NOT EXISTS `aset_tetap_lain` (
  `id_aset` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_registrasi` varchar(150) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tahun_perolehan` varchar(20) NOT NULL,
  `harga_satuan` varchar(100) NOT NULL,
  `nilai_semester` varchar(100) NOT NULL,
  `mutasi_semester_bertambah` varchar(100) NOT NULL,
  `mutasi_semester_berkurang` varchar(100) NOT NULL,
  `harga_perolehan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_aset`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aset_tetap_lain`
--

INSERT INTO `aset_tetap_lain` (`id_aset`, `nomor_registrasi`, `id_sekolah`, `jumlah`, `tahun_perolehan`, `harga_satuan`, `nilai_semester`, `mutasi_semester_bertambah`, `mutasi_semester_berkurang`, `harga_perolehan`, `keterangan`) VALUES
(1, '09i78g66', 0, '3', '2018', '18000000', '70', 'Genap', 'Genap', '10000000', 'zfdsgdgs');

-- --------------------------------------------------------

--
-- Table structure for table `buku_perpustakaan`
--

CREATE TABLE IF NOT EXISTS `buku_perpustakaan` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) NOT NULL,
  `penulis` varchar(120) NOT NULL,
  `penerbit` varchar(120) NOT NULL,
  `spesifik_asal` varchar(400) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `buku_perpustakaan`
--

INSERT INTO `buku_perpustakaan` (`id_buku`, `id_sekolah`, `penulis`, `penerbit`, `spesifik_asal`) VALUES
(1, 0, 'William Wenno', 'Bintang Pariwara', 'Asal Buku dari Indonesia Manado-Ambon');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(300) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_foto`, `judul`, `file`, `id_sekolah`) VALUES
(1, 'Struktur Kaki', '7997b0fde7f656aef6734e6aaad4b1fc.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gedung_bangunan`
--

CREATE TABLE IF NOT EXISTS `gedung_bangunan` (
  `id_gb` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_reg` varchar(120) NOT NULL,
  `kondisi_bangunan` varchar(300) NOT NULL,
  `konstruksi_bangunan` varchar(120) NOT NULL,
  `luas_lantai` varchar(120) NOT NULL,
  `letak_lokasi` varchar(120) NOT NULL,
  `dokumen_gedung` varchar(120) NOT NULL,
  `luas` varchar(120) NOT NULL,
  `status_tanah` varchar(120) NOT NULL,
  `tahun_perolehan` varchar(120) NOT NULL,
  `asal_usul` varchar(120) NOT NULL,
  `mutasi_semester_bertambah` varchar(120) NOT NULL,
  `mutasi_semester_berkurang` varchar(120) NOT NULL,
  `harga_perolehan` varchar(120) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_gb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gedung_bangunan`
--

INSERT INTO `gedung_bangunan` (`id_gb`, `nomor_reg`, `kondisi_bangunan`, `konstruksi_bangunan`, `luas_lantai`, `letak_lokasi`, `dokumen_gedung`, `luas`, `status_tanah`, `tahun_perolehan`, `asal_usul`, `mutasi_semester_bertambah`, `mutasi_semester_berkurang`, `harga_perolehan`, `keterangan`) VALUES
(1, '1234', 'Bagus', '', '45m2', 'Jauh', 'Tidak ada', '123M2', 'Rusak', '2018', 'Barhu', 'Ganjil', 'Ganjil', '10000000', 'dsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `hewan_ternak_tumbuhan`
--

CREATE TABLE IF NOT EXISTS `hewan_ternak_tumbuhan` (
  `id_hewan` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` varchar(12) NOT NULL,
  PRIMARY KEY (`id_hewan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hewan_ternak_tumbuhan`
--

INSERT INTO `hewan_ternak_tumbuhan` (`id_hewan`, `id_sekolah`, `nama`, `jenis`, `jumlah`) VALUES
(1, 0, 'Kambing', 'Hewan Ternak', '20');

-- --------------------------------------------------------

--
-- Table structure for table `kesenian_kebudayaan`
--

CREATE TABLE IF NOT EXISTS `kesenian_kebudayaan` (
  `id_seni` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) NOT NULL,
  `nama_tarian` varchar(200) NOT NULL,
  `alat_musik` varchar(200) NOT NULL,
  PRIMARY KEY (`id_seni`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kesenian_kebudayaan`
--

INSERT INTO `kesenian_kebudayaan` (`id_seni`, `id_sekolah`, `nama_tarian`, `alat_musik`) VALUES
(1, 0, 'Kapita', 'Rebana');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(80) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  PRIMARY KEY (`id_pengadaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `jenis`, `tahun`, `id_sekolah`) VALUES
(1, 'Kursi dan Meja', 2015, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_mesin`
--

CREATE TABLE IF NOT EXISTS `peralatan_mesin` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nm_barang` varchar(140) NOT NULL,
  `nomor_reg` varchar(150) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `merk_jenis` varchar(120) NOT NULL,
  `ukuran` varchar(120) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `tahun_beli` varchar(100) NOT NULL,
  `nomor_pabrik` varchar(100) DEFAULT NULL,
  `nomor_rangka` varchar(120) DEFAULT NULL,
  `nomor_mesin` varchar(120) DEFAULT NULL,
  `nomor_polisi` varchar(25) NOT NULL,
  `nomor_bpkb` varchar(120) NOT NULL,
  `asal_usul_perolehan` text NOT NULL,
  `jumlah_unit` varchar(16) NOT NULL,
  `harga_satuan` varchar(200) NOT NULL,
  `nilai_semester` varchar(134) NOT NULL,
  `mutasi_semester_bertambah` varchar(123) NOT NULL,
  `mutasi_semester_berkurang` varchar(123) NOT NULL,
  `harga_perolehan` varchar(123) NOT NULL,
  `keterangan` varchar(123) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `peralatan_mesin`
--

INSERT INTO `peralatan_mesin` (`id_barang`, `nm_barang`, `nomor_reg`, `id_sekolah`, `merk_jenis`, `ukuran`, `bahan`, `tahun_beli`, `nomor_pabrik`, `nomor_rangka`, `nomor_mesin`, `nomor_polisi`, `nomor_bpkb`, `asal_usul_perolehan`, `jumlah_unit`, `harga_satuan`, `nilai_semester`, `mutasi_semester_bertambah`, `mutasi_semester_berkurang`, `harga_perolehan`, `keterangan`) VALUES
(1, 'Yamaha GT 125', 'iod22', 0, 'Yamaha', '123', 'Besi, Plastik, Karet', '2014', 'sasda', 'sdas', 'sasda', 'asda', 'sdas', 'sadas', '2', '18000000', '70', 'Genap', 'Ganjil', '10000000', 'dsfsdfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_penata`
--

CREATE TABLE IF NOT EXISTS `petugas_penata` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(90) NOT NULL,
  `password` varchar(40) NOT NULL,
  `telepon` varchar(21) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petugas_penata`
--

INSERT INTO `petugas_penata` (`id_petugas`, `user`, `password`, `telepon`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '08124791231', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
  `id_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sekolah` varchar(100) NOT NULL,
  `email_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(60) NOT NULL,
  `user` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nm_sekolah`, `email_sekolah`, `alamat`, `status`, `user`, `password`, `id_kecamatan`) VALUES
(1, 'SMK Negeri 1 Tidore', 'smk1@tidore.com', 'Jl. Sultan Bahmid, Kelurahan Indonesiana, Tidore', 'Negeri', 'smk1', 'c3aa7144b377c7c2e1dbcddd2ffdaa99', 1),
(2, 'SMK Negeri 2 Tidore', 'smk2tidore@tidore.go.id', 'Jl. Kasukaki', 'Negeri', 'smk2', 'f6782333aba2c8d990742d006bb1265b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nm_suplier` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `id_sekolah`, `nm_suplier`, `alamat`, `telepon`) VALUES
(1, 1, 'Bahmid Hadi', 'JL. Manado BBitung', '09881222'),
(2, NULL, 'William Wenno', 'Jl. Bulurokeng', '091231'),
(3, NULL, 'Sagha Ataladi', 'Jl. Kuncureko', '091234233');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
