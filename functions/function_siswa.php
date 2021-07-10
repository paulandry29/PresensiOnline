<?php

require_once('config.php');

function getMapel($id_siswa){
    global $con;
    $hasil = array();
    $sql = "SELECT kelas.id_kelas, mapel.nama, kelas.jadwal 
	            FROM mapel 
		            JOIN kelas ON mapel.id_mapel=kelas.id_mapel 
		            JOIN kelasambil ON kelas.id_kelas=kelasambil.id_kelas
                WHERE kelasambil.id_siswa=:id";
    try {
        $stmt = $con ->prepare($sql);
        $stmt->bindValue(':id', $id_siswa, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt->fetchAll();

        if($rs != null){
            $i=0;
            foreach ($rs as $val) {
                $hasil[$i]['id_kelas'] = $val['id_kelas'];
                $hasil[$i]['mapel'] = $val['nama'];
                $hasil[$i]['jadwal'] = $val['jadwal'];
                $i++;
            }
        }

    } catch (Exception $e) {
        echo 'Error getMapel = '.$e->getMessage();
    }
    return $hasil;
}

function getPresensiSiswa($id_kelas, $id_siswa){
    global $con;
    $hasil = array();
    $sql = "SELECT generatepresensi.pertemuan, generatepresensi.materi, presensisiswa.kehadiran, presensisiswa.waktu, presensisiswa.id_presensi
	            FROM generatepresensi
    		        JOIN presensisiswa ON generatepresensi.id_gpresensi = presensisiswa.id_gpresensi
                WHERE generatepresensi.id_kelas = :id_kelas AND generatepresensi.visibility = 1 AND presensisiswa.id_siswa = :id_siswa";
    try {
        
        $stmt = $con ->prepare($sql);
        $stmt -> bindValue(':id_kelas', $id_kelas, PDO::PARAM_STR);
        $stmt -> bindValue(':id_siswa', $id_siswa, PDO::PARAM_STR);
        $stmt ->execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt ->fetchAll();

        if ($rs != null) {
            $i=0;
            foreach ($rs as $val) {
                $hasil[$i]['pertemuan'] = $val['pertemuan'];
                $hasil[$i]['materi'] = $val['materi'];
                $hasil[$i]['kehadiran'] = $val['kehadiran'];
                $hasil[$i]['waktu'] = $val['waktu'];
                $hasil[$i]['id_presensi'] = $val['id_presensi'];
                $i++;
            }
        }

    } catch (Exception $e) {
        echo 'Error getPresensi = '.$e->getMessage();
    }                
    return $hasil;
}

function editKehadiran($id_presensi){
	global $con;
	$date = date('Y-m-d H:i:s');
	try{
		$sql = "UPDATE presensisiswa SET kehadiran=:kehadiran, waktu=:waktu WHERE id_presensi=:id";
		$stmt= $con->prepare($sql);
		$stmt->bindValue(':kehadiran', 1 , PDO::PARAM_STR);
		$stmt->bindValue(':waktu', $date, PDO::PARAM_STR);
		$stmt->bindValue(':id', $id_presensi, PDO::PARAM_STR);
		$stmt->execute();
	}catch(Exception $e){
		echo 'Error editKehadiran = '.$e->getMessage();
	}
}

function getPesan($id_siswa){
    global $con;
    $hasil = array();
    $sql = "SELECT pesan.id_pesan, pesan.pesan FROM pesan 
                JOIN generatepresensi ON pesan.id_gpresensi = generatepresensi.id_gpresensi
                JOIN kelas ON generatepresensi.id_kelas = kelas.id_kelas
                JOIN kelasambil ON kelas.id_kelas = kelasambil.id_kelas
            WHERE kelasambil.id_siswa = :id";
    try {
        $stmt = $con -> prepare($sql);
        $stmt->bindValue(':id', $id_siswa, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rs = $stmt->fetchAll();

        if($rs != null){
            $i=0;
            foreach ($rs as $val) {
                $hasil[$i]['id_pesan'] = $val['id_pesan'];
                $hasil[$i]['pesan'] = $val['pesan'];
                $i++;
            }
        }
    } catch (Exception $e) {
        echo 'Error getPesan = '.$e->getMessage();
    }
    return $hasil;
}

function deletePesan($id_pesan){
	global $con;
	try{
		$sql = "DELETE FROM pesan WHERE id_pesan = :id";
		$stmt= $con->prepare($sql);
		$stmt->bindValue(':id', $id_pesan , PDO::PARAM_STR);
		$stmt->execute();
	}catch(Exception $e){
		echo 'Error editKehadiran = '.$e->getMessage();
	}
}

?>