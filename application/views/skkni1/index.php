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
		
		<!-- Panel Form -->
		<div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Fungsi Aritmatika  </h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('index.php/skkni1/proses') ?>">
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bilangan 1</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="bil1">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bilangan 2</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="bil2">
                              </div>
                          </div>
                          
                         <div class="form-group">
                             
                              <div class="col-sm-10 pull-right">
                                  <!-- Tombol untuk Penjumlahan -->
                                  <button type="submit" name="arit" value="jumlah" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>&nbsp;
                                  <!-- Tombol Pengurangan -->
                                  <button type="submit" name="arit" value="kurang" class="btn btn-primary"><i class="fa fa-minus" aria-hidden="true"></i></button>&nbsp;
                                  <!-- Tombol Perkalian  -->
                                  <button type="submit" name="arit" value="kali" class="btn btn-primary"><i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;

                                  <!-- Tombol Pembagian -->
                                  <button type="submit" name="arit" value="bagi" class="btn btn-primary"><i class="fas fa-divide"></i></button>&nbsp;
                              </div>
                          </div>

                          
                      </form>
                  </div>

	

	<!-- Akhir dari Konten -->
	</section>
	<!-- Jquery JS -->
	<script src="<?php echo base_url('assets/admin') ?>/assets/js/jquery.js"></script>
	<!-- Javascript dari Bootstrap -->
    <script src="<?php echo base_url('assets/admin') ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>