<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presensi Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/a.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>


<body>

<header id="header">
	<div class="d-flex flex-column">

		<div class="profile">
			<img src="assets/img/a.png" alt="" class="img-fluid ">
			<h1 class="text-light"><a href="index.php">Sistem Akademik</a></h1>
		</div>
		<nav class="nav-menu">

			<?php 
			
			require_once "functions/function.php";

			if (!isset($_SESSION['user'])) {
				header("Location: login.php");

			}elseif ($_SESSION['user'] == "siswa") {
				$data = select_data($_SESSION['user'], $_SESSION['id']);
				//echo $_SESSION['id'];
				if (sizeof($data) > 0){?>
					
					<ul>
					<li class="active"><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
					<li><a href="pages/siswa/mapel.php"><i class="bx bx-user"></i> <span>Mapel</span></a></li>
					<li><a href="logout.php"><i class="bx bx-exit"></i> <span>Logout</span></a></li>
				
					</ul>
					<!-- <a href="pages/siswa/mapel.php">Kelas</a><br>
					<br> -->

					<?php
				}

			}elseif ($_SESSION['user'] == "guru") {
				$data = select_data($_SESSION['user'], $_SESSION['id']);
				//echo $_SESSION['user'];
				if (sizeof($data) > 0){?>
					

					<ul>
					<li class="active"><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
					<li><a href="pages/guru/kelas.php"><i class="bx bx-user"></i> <span>Kelas</span></a></li>
					<li><a href="logout.php"><i class="bx bx-exit"></i> <span>Logout</span></a></li>
				
					</ul>
					<!-- <a href="pages/guru/kelas.php">Kelas</a><br>
					<br> -->

					<?php
				}
			} ?>
			
		</nav><!-- .nav-menu -->
		<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>

	</header>

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Sistem Akademik</h1>
      <p> <span class="typed" data-typed-items="Jangan Lupa Presensi Yaa!"></span></p>
    

	<?php 
	
	require_once "functions/function.php";

	if (!isset($_SESSION['user'])) {
		header("Location: login.php");

	}elseif ($_SESSION['user'] == "siswa") {
		$data = select_data($_SESSION['user'], $_SESSION['id']);
		//echo $_SESSION['id'];
		if (sizeof($data) > 0){?>
			<!-- haii saya siswa disini, <?= $data[0]['nama']; ?> <?=$_SESSION['id'];?><br> -->

			<lable style="color: white"> ID 	: <?=$_SESSION['id'];?></lable><br>
			<lable style="color: white"> Nama 	: <?= $data[0]['nama']; ?></lable>
			<!-- <a href="pages/siswa/mapel.php">Kelas</a><br>
			<br> -->

			<?php
		}

	}elseif ($_SESSION['user'] == "guru") {
		$data = select_data($_SESSION['user'], $_SESSION['id']);
		//echo $_SESSION['user'];
		if (sizeof($data) > 0){?>
			<!-- ini adalah halaman dashboard <br>
			saya guru yang berdedikasi tinggi, <?= $data[0]['nama']; ?> <?=$_SESSION['id'];?><br> -->

			<lable style="color: white"> ID 	: <?=$_SESSION['id'];?></lable><br>
			<lable style="color: white"> Nama	: <?= $data[0]['nama']; ?></lable>
			<!-- <a href="pages/guru/kelas.php">Kelas</a><br>
			<br> -->

			<?php
		}
	} ?>

	<!-- <a href="logout.php">logout</a> -->
	
	</div>
  </section><!-- End Hero -->


   <!-- Vendor JS Files -->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>