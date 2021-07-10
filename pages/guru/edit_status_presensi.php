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
            $status = $_GET['status'];
            $pertemuan = $_GET['pertemuan'];
            
            if ($status==0) {
                editStatusPresensi($id_presensi, 1);
                header("location:presensi.php?id_kelas=".$id_kelas);
            } elseif ($status==1) {
                editStatusPresensi($id_presensi, 0);
                sendPesan($id_presensi, $id_kelas, $pertemuan);
                header("location:presensi.php?id_kelas=".$id_kelas);
            } else {
                echo"gagal mengubah status";
            }

        }
    } else {
        echo "You have no access<br>
		<a href='../../index.php'>Back Home</a>
		";
    }
