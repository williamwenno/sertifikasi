<!DOCTYPE html>
<html>
<head>
	<!-- Judul -->
	<title>Perhitungan Aritmatika</title>
	 <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/admin') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
    <!-- CSS Template -->
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/style-responsive.css" rel="stylesheet">
</head>
<body>
	<!-- Mulai Konten -->
	<section id="container">
	
		<div class="form-panel">
      <h4 class="mb"><a href="<?php echo base_url() ?>">Kembali</a></h4>

      <!-- Menampilkan Hasil Aritmatika -->
      <h4>Hasil = <?php echo $hasil ?></h4>
      <h5>Terbilang: <?php echo $terbilang ?></h5>
    </div>

	

	<!-- Akhir dari Konten -->
	</section>
	<!-- Jquery JS -->
	<script src="<?php echo base_url('assets/admin') ?>/assets/js/jquery.js"></script>
	<!-- Javascript dari Bootstrap -->
    <script src="<?php echo base_url('assets/admin') ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>