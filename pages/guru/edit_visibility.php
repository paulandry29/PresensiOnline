<?php
    
    require_once "../../functions/function.php";
    require_once "../../functions/function_guru.php";

    if (!isset($_SESSION['user'])) {
        header("Location: ../../login.php");
    } elseif ($_SESSION['user'] == "guru") {
        $data = select_data($_SESSION['user'], $_SESSION['id']);
        //echo $_SESSION['user'];
        if (sizeof($data) > 0) {
            $id_presensi = $_GET['idPresensi'];
            $id_kelas = $_GET['idKelas'];
            $visibility = $_GET['visibility'];
            //$check = checkDetailPresensi($id_presensi);
            //echo $check;

            if ($visibility==0) {
                editVisibilityPresensi($id_presensi, 1);
                header("location:presensi.php?id_kelas=".$id_kelas);
            } elseif ($visibility==1) {
                editVisibilityPresensi($id_presensi, 0);
                header("location:presensi.php?id_kelas=".$id_kelas);
            } else {
                echo"gagal mengubah visibility";
            }
        }
    } else {
        echo "You have no access<br>
		<a href='../../index.php'>Back Home</a>
		";
    }
