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
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

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
    error_reporting(0);

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    } elseif ($_SESSION['user'] == "guru") {
        $data = select_data($_SESSION['user'], $_SESSION['id']);
        //echo $_SESSION['user'];
        if (sizeof($data) > 0) {
            $id_kelas = $_GET['id_kelas'];
            $check = checkGenerate($id_kelas);
            //$data_table = '';
            
            //echo $check;

            if ($check == false) {
                generatePresensi($id_kelas);
                $data_table = '';
                echo"Mohon tunggu...<br>";
                header("Refresh:3");
            } else {
                ?>
				<div class="d-flex flex-row-reverse">
					<a type="button" class="p-2 bg-primary text-white" target="_blank" href="../../export/exportExcel.php?id_kelas=<?php echo $id_kelas; ?>">EXPORT</a>
					<a type="button" class="p-2 bg-success text-white" target="_blank" href="../../export/printFile.php?id_kelas=<?php echo $id_kelas; ?>">PRINT</a>
				</div>
				<br>
				<!-- <a href="kelas.php">Kelas</a><br>
				<br> -->
				<?php

                $data_table = '';
                $data2 = getGeneratePresesnsi($id_kelas);
                foreach ($data2 as $key => $val) {
                    $status = ($val['status']==1) ? 'Aktif' : 'Non Aktif' ;
                    $visiblility = ($val['visibility']==1) ? 'Visible' : 'Invisible' ;
                    $data_table .= '
					<tr>
					<td><center>'.$val['pertemuan'].'</center></td>
					<td><center>'.$val['materi'].'</center></td>
					<td><center>'.$status.'</center></td>
					<td><center>'.$visiblility.'</center></td>
					<td><a href="detail_presensi.php?id_kelas='.$id_kelas.'&id_gpresensi='.$val['id_gpresensi'].'"><center>Presensi</center></td>
					<td><center>
						<a style="button" href="edit_materi.php?id_gpresensi='.$val['id_gpresensi'].'&id_kelas='.$id_kelas.'">Edit Materi</a> | 
						<a style="button" href="edit_status_presensi.php?idKelas='.$id_kelas.'&idPresensi='.$val['id_gpresensi'].'&status='.$val['status'].'&pertemuan='.$val['pertemuan'].'">Edit Status</a> |
						<a style="button" href="edit_visibility.php?idKelas='.$id_kelas.'&idPresensi='.$val['id_gpresensi'].'&visibility='.$val['visibility'].'">Edit Visibility</a>
						</center>
					</td>
					</tr>
					';
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
                if ($data_table == '') {
                    $data_table = '<tr class="table-danger"><th colspan="4"><center>NO DATA</center></th></tr>';
                }
                
    echo '
	<table class="table table-bordered table-hover">
		<tr class="table-success">
			<th width="15%" nowrap>
				<center>Pertemuan</center>
			</th>
			<th width="20%" nowrap>
				<center>Materi</center>
			</th>
			<th width="10%" nowrap>
				<center>Status</center>
			</th>
			<th width="5%" nowrap>
				<center>Visibility</center>
			</th>
			<th width="10%" nowrap>
				<center>Presensi</center>
			</th>
			<th width="30%" nowrap>
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