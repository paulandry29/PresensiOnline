<?php
    
    require_once "../../functions/function.php";
    require_once "../../functions/function_siswa.php";

    if (!isset($_SESSION['user'])) {
        header("Location: ../../login.php");
    } elseif ($_SESSION['user'] == "siswa") {
        $data = select_data($_SESSION['user'], $_SESSION['id']);
        if (sizeof($data) > 0) {
            $id_pesan = $_GET['id_pesan'];

            deletePesan($id_pesan);
            header('Location:pesan.php');

        }
    } else {
        echo "You have no access<br>
		<a href='../../index.php'>Back Home</a>
		";
    }
