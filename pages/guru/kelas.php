<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presensi Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/a.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>

<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../../assets/img/a.png" alt="" class="img-fluid ">
        <h1 class="text-light"><a href="../../index.php">Sistem Akademik</a></h1>

      </div>

      <nav class="nav-menu">
        <ul>
          <li><a href="../../index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li class="active"><a href="kelas.php"><i class="bx bx-user"></i> <span>Kelas</span></a></li>
		  <li><a href="../../logout.php"><i class="bx bx-exit"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="about" class="about">
    <div class="container">
      
    
	<?php 
	
	require_once "../../functions/function_guru.php";

	if (!isset($_SESSION['user'])) {
		header("Location: login.php");

	}elseif ($_SESSION['user'] == "guru") {
            
            ?>
	<!-- Ini adalah halaman Kelas<br>

	<a href="kelas.php">Kelas</a><br>
	<br> -->


	<?php
            $data_table = '';
			$data2 = selectKelas($_SESSION['id']);
            foreach ($data2 as $key => $val) {
				$data_table .= '
				<tr>
				<td><center>'.$val['id_kelas'].'</center></td>
				<td><center>'.$val['id_mapel'].'</center></td>
				<td><center>'.$val['ruang'].'</center></td>
				<td><center>'.$val['jadwal'].'</center></td>
				<td><a href="presensi.php?id_kelas='.$val['id_kelas'].'"><center>Presensi</center></td>
				</tr>
				';	
			}
			if ($data_table == "") {
				$data_table = '<tr class="table-danger"><th colspan="5"><center>NO DATA</center></th></tr>';
			}
	}else{
        echo "You have no access<br>
                <a href='../../index.php'>Back Home</a>
        ";
    } 
            ?>

	<!-- <a href="../../logout.php">logout</a> -->


	<?php
	echo '
	<table class="table table-bordered table-hover">
		<tr class="table-success">
			<th width="15%" nowrap>
				<center>ID Kelas</center>
			</th>
			<th width="20%" nowrap>
				<center>Mata Pelajaran</center>
			</th>
			<th width="15%" nowrap>
				<center>ruang</center>
			</th>
			<th width="15%" nowrap>
				<center>jadwal</center>
			</th>
			<th width="15%" nowrap>
				<center>Presensi</center>
			</th>
		</tr>
		'.$data_table.'
	</table>
	';
    ?>

    </div>
  </section><!-- End Hero -->
  </div>

<!-- Vendor JS Files -->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../assets/vendor/typed.js/typed.min.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
</body>

</html>