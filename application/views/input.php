<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- Judul -->
  <title>Manajemen Sertifikasi</title>
   <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/admin') ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
    <!-- CSS Template -->
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin') ?>/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>DASHGUM FREE</b></a>
            <!--logo end-->
            
            
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
     <?php $this->load->view('sidebar'); ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Form Input</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Input Peserta </h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('index.php/Sertifikasi/input_proses') ?>">
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nik" required pattern="[0-9]{16}" oninvalid="this.setCustomValidity('NIK terdiri dari 16 Digit Angka')" oninput="setCustomValidity('')">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Hp</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="hp" required pattern="[0-9]{10,12}" oninvalid="this.setCustomValidity('Nomor Hp terdiri dari 10-12 Digit Angka')" oninput="setCustomValidity('')">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Skema Sertifikasi</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="skema" required="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat Uji Kompetensi</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lokasi_ujian" required="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rekomendasi</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="rekomendasi" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Terbit</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="tgl_terbit" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="tgl_lahir" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Organisasi</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="organisasi" required>
                              </div>
                          </div>
                          
                          
                         <div class="form-group">
                             
                              <div class="col-sm-10 pull-right">
                                  <input type="submit" class="btn btn-primary" name="Simpan" value="Simpan">&nbsp; &nbsp;
                                  <button class="btn btn-danger">Batal</button>
                              </div>
                          </div>

                          
                      </form>
                  </div>
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
        
        

    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
