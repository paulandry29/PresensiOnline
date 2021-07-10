<?php 
	
	require_once "../../functions/function.php";
	require_once "../../functions/function_siswa.php";

	if (!isset($_SESSION['user'])) {
		header("Location: ../../login.php");

	}elseif ($_SESSION['user'] == "siswa") {
		$data = select_data($_SESSION['user'], $_SESSION['id']);
		if (sizeof($data) > 0){

			$id_presensi = $_GET['id_presensi'];
            $kehadiran = $_GET['kehadiran'];
            $id_kelas = $_GET['id_kelas'];


				if ($kehadiran==1) {
                    echo "<script>alert('Anda Sudah Mencatat Kehadiran');window.location='presensi.php?id_kelas=".$id_kelas."'</script>";
                } elseif($kehadiran==0) {
                    editKehadiran($id_presensi);
                    echo "<script>alert('Presensi Sukses');window.location='presensi.php?id_kelas=".$id_kelas."'</script>";
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