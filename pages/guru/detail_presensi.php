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
    
    require_once "../../functions/function.php";
    require_once "../../functions/function_guru.php";

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    } elseif ($_SESSION['user'] == "guru") {
        $data = select_data($_SESSION['user'], $_SESSION['id']);
        //echo $_SESSION['user'];
        if (sizeof($data) > 0) {
            $id_gpresensi = $_GET['id_gpresensi']; 
			$id_kelas = $_GET['id_kelas'];
			
			$check = checkDetailPresensi($id_gpresensi);
            //echo $check;

            if ($check == false) {
                $return = generateDetailPresensi($id_gpresensi, $id_kelas);
				$data_table = '';
                //echo $return.'-- ';
            	echo" Generating Presensi Mohon tunggu...<br>";
            	header("Refresh:2");
            }else{
                ?>
				Ini adalah halaman detail presensi<br>

				<!-- <a href="kelas.php">Kelas</a><br> -->
				<br>


				<?php

                $data_table = '';
                $data2 = getDetailPresensi($id_gpresensi);
                foreach ($data2 as $key => $val) {
                    $kehadiran = ($val['kehadiran']==1) ? "Hadir" : "Tidak Hadir";
                    $waktu = ($val['kehadiran']==1) ? $val['waktu'] : " ";
                    $data_table .= '
					<tr>
					<td><center>'.$val['id_siswa'].'</center></td>
					<td><center>'.$val['nama_siswa'].'</center></td>
					<td><center>'.$kehadiran.'</center></td>
					<td><center>'.$waktu.'</center></td>
					<td><center>
						<a style="button" href="kehadiran.php?id_presensi='.$val['id_presensi'].'&kehadiran='.$val['kehadiran'].'&id_gpresensi='.$id_gpresensi.'&id_kelas='.$id_kelas.'">Presensi</a>
						</center>
					</td>
					</tr>
					';
                }
                if ($data_table == "") {
                    $data_table = '<tr class="table-danger"><th colspan="5"><center>NO DATA, silahkan mengaktifkan status presensi</center></th></tr>';
                }
            }
        }
    } else {
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
				<center>ID Siswa</center>
			</th>
			<th width="20%" nowrap>
				<center>Nama Siswa</center>
			</th>
			<th width="15%" nowrap>
				<center>Kehadiran</center>
			</th>
			<th width="15%" nowrap>
				<center>Waktu</center>
			</th>
			<th width="15%" nowrap>
				<center>Aksi</center>
			</th>
			
		</tr>
		'.$data_table.'
	</table>
	';
    ?>

</div>
  </section><!-- End Hero -->
  </div>

</body>

</html>