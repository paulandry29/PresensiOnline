<?php
require_once 'config.php';

function select_data($user="", $id)
{
    global $con;

    $hasil = array();

    if ($user == "siswa") {
        if ($id != null) {
            $sql = "SELECT * FROM siswa WHERE id_siswa = :user";
        } else {
            $sql = "SELECT * FROM siswa";
        }
        try {
            $stmt = $con->prepare($sql);
            if ($id != null) {
                $stmt->bindValue(':user', $id, PDO::PARAM_STR);
            }

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rs = $stmt->fetchAll();

                if ($rs != null) {
                    $i = 0;
                    foreach ($rs as $val) {
                        $hasil[$i]['id_siswa'] = $val['id_siswa'];
                        $hasil[$i]['nama'] = $val['nama'];
                        $hasil[$i]['alamat'] = $val['alamat'];
                        $hasil[$i]['email'] = $val['email'];
                        $i++;
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Error select_data siswa : '.$e->getMessage();
        }
    } elseif ($user == "guru") {
        if ($id != null) {
            $sql = "SELECT * FROM guru WHERE id_guru = :user";
        } else {
            $sql = "SELECT * FROM guru";
        }

        try {
            $stmt = $con->prepare($sql);
            if ($id != null) {
                $stmt->bindValue(':user', $id, PDO::PARAM_STR);
            }

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rs = $stmt->fetchAll();

                if ($rs != null) {
                    $i = 0;
                    foreach ($rs as $val) {
                        $hasil[$i]['id_guru'] = $val['id_guru'];
                        $hasil[$i]['nama'] = $val['nama'];
                        $hasil[$i]['alamat'] = $val['alamat'];
                        $hasil[$i]['email'] = $val['email'];
                        $i++;
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Error select_data guru : '.$e->getMessage();
        }
    } else {
        $sql = "SELECT * FROM siswa";
        try {
            $stmt = $con->prepare($sql);
            if ($user != "") {
                $stmt->bindValue(':user', $user, PDO::PARAM_STR);
            }

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rs = $stmt->fetchAll();

                if ($rs != null) {
                    $i = 0;
                    foreach ($rs as $val) {
                        $hasil[$i]['id_admin'] = $val['id_admin'];
                        $hasil[$i]['nama'] = $val['nama'];
                        $i++;
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Error select_data : '.$e->getMessage();
        }
    }
    return $hasil;
}

function getGuru(){
	global $con;
	$hasil = array();
	$sql = "SELECT * FROM guru";
	try {
		$stmt = $con->prepare($sql);
		$stmt -> execute();
		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$rs = $stmt -> fetchAll();

		if($rs != null){
			$i=0;
			foreach ($rs as $val) {
				$hasil[$i]['id_guru'] = $val['id_guru'];
				$hasil[$i]['nama'] = $val['nama'];
				$hasil[$i]['email'] = $val['email'];
				$hasil[$i]['alamat'] = $val['alamat'];
				$i++;
			}
		}

	} catch (Exception $e) {
		echo 'Error getGuru = '.$e->getMessage();
	}
	return $hasil;
}

function getSiswa($id_guru){
	global $con;
	$hasil = array();
	$sql = "SELECT siswa.nama, siswa.id_siswa, presensisiswa.kehadiran, presensisiswa.waktu 
				FROM siswa 
					JOIN presensisiswa ON siswa.id_siswa = presensisiswa.id_siswa
					JOIN generatepresensi ON presensisiswa.id_gpresensi = generatepresensi.id_gpresensi
					JOIN kelas ON generatepresensi.id_kelas = kelas.id_kelas  
				WHERE id_guru = :id 
			ORDER BY generatepresensi.id_gpresensi ASC , siswa.id_siswa ASC";
	try {
		$stmt = $con ->prepare($sql);
		$stmt -> bindValue(':id', $id_guru, PDO::PARAM_STR);
		$stmt ->execute();
		$stmt ->setFetchMode(PDO::FETCH_ASSOC);
		$rs = $stmt -> fetchAll();

		if($rs != null){
			$i=0;
			foreach ($rs as $val) {
				$hasil[$i]['id_siswa'] = $val['id_siswa'];
				$hasil[$i]['nama_siswa'] = $val['nama'];
				$hasil[$i]['kehadiran']  = ($val['kehadiran'] == 1) ? 'Hadir' : 'Tidak Hadir';
				$hasil[$i]['waktu'] = $val['waktu'];
				$i++;
			}
		}

	} catch (Exception $e) {
		echo 'Error getSiswa = '.$e->getMessage();
	}
	return $hasil;
}

function getSiswaPresensi($id_kelas){
    global $con;
    $hasil = array();
    $sql = "SELECT siswa.id_siswa, siswa.nama 
                FROM siswa
                    JOIN kelasambil ON siswa.id_siswa = kelasambil.id_siswa
                WHERE kelasambil.id_kelas = :id ";

    try {
        $stmt = $con ->prepare($sql);
        $stmt -> bindValue(':id', $id_kelas, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt->fetchAll();

        if ($rs != null) {
            $i=0;
            foreach ($rs as $val) {
                $hasil[$i]['id_siswa'] = $val['id_siswa'];
                $hasil[$i]['nama'] = $val['nama'];
                $i++;
            }
        }

    } catch (Exception $e) {
        echo 'Error getSiswa = '.$e->getMessage();
    }
    return $hasil;
}

function getPresensi($id_siswa, $id_kelas){
    global $con;
    $hasil = array();
    $sql = "SELECT presensisiswa.kehadiran
                FROM presensisiswa
                    JOIN generatepresensi ON presensisiswa.id_gpresensi = generatepresensi.id_gpresensi
                WHERE presensisiswa.id_siswa = :id AND generatepresensi.id_kelas = :id_kelas
                ORDER BY generatepresensi.id_gpresensi ASC";

    try {
        $stmt = $con ->prepare($sql);
        $stmt -> bindValue(':id', $id_siswa, PDO::PARAM_STR);
        $stmt -> bindValue(':id_kelas', $id_kelas, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt->fetchAll();

        if ($rs != null) {
            $i=0;
            foreach ($rs as $val) {
                $hasil[$i]['kehadiran'] = $val['kehadiran'];
                $i++;
            }
        }

    } catch (Exception $e) {
        echo 'Error getSiswa = '.$e->getMessage();
    }
    return $hasil;
}
