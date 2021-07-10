<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Presensi</title>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
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

<!-- <style>
#header {
  color: #fff;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  width: 300px;
  transition: all ease-in-out 0.5s;
  z-index: 9997;
  transition: all 0.5s;
  padding: 0 25px;
  background: #040b14;
  overflow-y: auto;
}

#header img {
  margin: 15px auto;
  display: block;
  width: 110px;
  /* border: 4px solid #2c2f3f; */
}

#header .profile h1 {
  font-size: 24px;
  margin: 0;
  padding: 0;
  font-weight: 600;
  -moz-text-align-last: center;
  text-align-last: center;
  font-family: "Poppins", sans-serif;
}
</style> -->


<body>

<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/a.png" alt="" class="img-fluid ">
        <h1 class="text-light"><a href="#">Sistem Akademik</a></h1>

      </div>
    </div>
  <!-- </header> -->
  <!-- End Header -->

  
	<?php
	require_once "functions/config.php";

	global $con;

	if (isset($_SESSION['user'])) {
		header("Location: index.php");
	} else {
		if (isset($_POST['login'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			
			$sql2 = $con -> prepare("SELECT * FROM siswa WHERE id_siswa=:a AND password=:b");
			$sql2->bindParam(':a', $user);
			$sql2->bindParam(':b', $pass);
			$sql2->execute();

			$data2 = $sql2->fetch();

			$sql3 = $con -> prepare("SELECT * FROM guru WHERE id_guru=:a AND password=:b");
			$sql3->bindParam(':a', $user);
			$sql3->bindParam(':b', $pass);
			$sql3->execute();

			$data3 = $sql3->fetch();
			

			if(! empty($data2)){
				$_SESSION['user'] = $data2['privilege'];
				$_SESSION['id'] = $data2['id_siswa'];
				echo "<script>alert('Login Siswa Sukses!!!');window.location='index.php'</script>";

			}else if(! empty($data3)){
				$_SESSION['user'] = $data3['privilege'];
				$_SESSION['id'] = $data3['id_guru'];
				echo "<script>alert('Login Guru Sukses!!!');window.location='index.php'</script>";
				
			}  else {
				echo "<script>alert('Login gagal!!!');window.location='login.php'</script>";
			}
		}?>

	<div class="container">

	<br>
				<form method='post'>
					<div class='form-group'>
						<label for="text" style="color: white">Username:</label><br>
						<input class='form-control' type="text" placeholder="Input Username" name="user" required>
					</div><br>
					<div class='form-group'>
						<label for="pwd" style="color: white">Password:</label><br>
						<input class='form-control' type="password" placeholder="Input password" name="pass" required>
					</div><br>
					<button class='btn btn-primary' type="submit" name="login">Login</button>
				</form>


	</div>
	<?php } ?>
	</header>

	<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><span class="typed" data-typed-items="WELCOME"></span></h1>
      <p> <span>Unggul dalam prestasi dan berbudi dalam perilaku</span></p>
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