<?php 
	
	require_once "../../functions/function.php";
	require_once "../../functions/function_guru.php";

	if (!isset($_SESSION['user'])) {
		header("Location: ../../login.php");

	}elseif ($_SESSION['user'] == "guru") {
		$data = select_data($_SESSION['user'], $_SESSION['id']);
		if (sizeof($data) > 0){

			$id_presensi = $_GET['id_presensi'];
            $kehadiran = $_GET['kehadiran'];
            $id_gpresensi = $_GET['id_gpresensi'];
            $id_kelas = $_GET['id_kelas'];


				if ($kehadiran==1) {
                    editKehadiran($id_presensi, 0);
                    header("location:detail_presensi.php?id_gpresensi=".$id_gpresensi."&id_kelas=".$id_kelas);
                } elseif($kehadiran==0) {
                    editKehadiran($id_presensi, 1);
                    header("location:detail_presensi.php?id_gpresensi=".$id_gpresensi."&id_kelas=".$id_kelas);
                }else{
                    echo"gagal melakukan presensi";
                }
            
		}
	}else{
		echo "You have no access<br>
		<a href='../../index.php'>Back Home</a>
		";
	} 
?>