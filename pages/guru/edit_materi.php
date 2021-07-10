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
        <h1 class="text-light"><a href="../../index.html">Sistem Akademik</a></h1>

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
        $id_gpresensi = $_GET['id_gpresensi'];
        $id_kelas = $_GET['id_kelas'];
        if(isset($_POST['submit'])){
            $materi = $_POST['materi'];
            editMateri($id_gpresensi, $materi);
            header("location: presensi.php?id_kelas=".$id_kelas);
        }            
    ?>
	<!-- Ini adalah halaman Edit Materi<br> -->

	<!-- <a href="kelas.php">Kelas</a><br>
    <br>
    <a href="../../logout.php">logout</a> -->

    <div class="container">

				<form method='post'>
					<!-- <div>
						<label for="pwd">Materi</label>
						<input type="text" placeholder="Input materi" name="materi" required>
					</div> -->

					<div class="mb-3 form-group">
					<label for="exampleFormControlTextarea1" class="form-label">Masukkan judul materi</label>
					<textarea name="materi" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
					</div>

					<button type="submit" class='btn btn-primary' name="submit">Submit</button>
				</form>
	
	</div>
    
    <?php
    
	}else{
        echo "You have no access<br>
                <a href='../../index.php'>Back Home</a>
        ";
    } 

    ?>

    </div>
  </section><!-- End Hero -->
  </div>

</body>

</html>