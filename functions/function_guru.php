<?php
require_once 'config.php';

function generatePresensi($id_Kelas){
	global $con;
	$jmlPertemuan = (int)selectPertemuan();
	try {
		for ($i=1; $i <= $jmlPertemuan; $i++) { 
			$pertemuan = 'Pertemuan Ke-'.$i;
			$sql = "INSERT INTO generatepresensi VALUES('', :kelas, :pertemuan, '', 1, 0)";
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':kelas', $id_Kelas, PDO::PARAM_STR);
			$stmt->bindValue(':pertemuan', $pertemuan, PDO::PARAM_STR);

			$stmt->execute();
		}
	} catch (Exception $e) {
		echo 'Error generatePresensi : '.$e->getMessage();
	}
}

function generateDetailPresensi($id_generate, $id_kelas){
	global $con;
	$jmlSiswa = (int)getRowSiswaKelas($id_kelas);
	$siswa = getSiswaKelas($id_kelas, false);
	//return $id_generate;
	try {
		for ($i=0; $i < $jmlSiswa; $i++) { 
			
			$id_siswa = $siswa[$i]['id_siswa'];
			//return $id_siswa;
			$sql = "INSERT INTO presensisiswa(id_presensi, id_siswa, id_gpresensi, kehadiran, waktu) VALUES('', :id, :idG, '', '')";
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':id', $id_siswa, PDO::PARAM_STR);
			$stmt->bindValue(':idG', $id_generate, PDO::PARAM_STR);
			$stmt->execute();
		}
	} catch (Exception $e) {
		echo 'Error generateDetailPresensi : '.$e->getMessage();
	}
}

function checkGenerate($id_Kelas){
	global $con;
	try {
		$sql = "SELECT * FROM generatepresensi WHERE id_kelas =:id";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_Kelas, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
	} catch (Exception $e) {
		echo 'Error checkGenerate : '.$e->getMessage();
		return false;
	}
}

function checkDetailPresensi($id_generate){
	global $con;
	try {
		$sql = "SELECT * FROM presensisiswa WHERE id_gpresensi =:id";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_generate, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
	} catch (Exception $e) {
		echo 'Error checkDetailPresensi : '.$e->getMessage();
		return false;
	}
}

function getDetailPresensi($id_gpresensi){
	global $con;
	$hasil=array();
	try {
		$sql = "SELECT * FROM presensisiswa WHERE id_gpresensi =:id";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_gpresensi, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rs = $stmt->fetchAll();

		if($rs != null){
			$i=0;
			foreach ($rs as $val){
				$hasil[$i]['id_presensi'] = $val['id_presensi'];
				$hasil[$i]['id_siswa'] = $val['id_siswa'];
				$hasil[$i]['nama_siswa'] = getNamaSiswa($val['id_siswa']);
				$hasil[$i]['kehadiran'] = $val['kehadiran'];
				$hasil[$i]['waktu'] = $val['waktu'];
				$i++;
			}	
		}
		
	} catch (Exception $e) {
		echo 'Error getDetailPresensi = '.$e->getMessage();
	}
	return $hasil;
}

function selectKelas($id){
	global $con;

	$hasil = array();

	$sql = "SELECT * FROM kelas WHERE id_guru = :param";
	try{

		$stmt = $con->prepare($sql);
		$stmt->bindValue(':param', $id, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				$i = 0;
				foreach ($rs as $val) {
					$hasil[$i]['id_kelas'] = $val['id_kelas'];
					$hasil[$i]['id_mapel'] = getNamaMapel($val['id_mapel']);
					$hasil[$i]['ruang'] = $val['ruang'];
					$hasil[$i]['jadwal'] = $val['jadwal'];
					$i++;
				}
			}
		}

	}catch(Exception $e){
		echo 'Error selectKelas : '.$e->getMessage();
	}
	return $hasil;
}

function getNamaMapel($id_mapel){
	global $con;
	$hasil="";
	$sql = "SELECT nama FROM mapel WHERE id_mapel = :id";
	try {
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_mapel, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				foreach ($rs as $val) {
					$hasil = $val['nama'];
				}
			}
		}
	} catch (Exception $e) {
		echo 'Error getNamaSiswa : '.$e->getMessage();
	}
	return $hasil;
}

function selectPertemuan(){
	global $con;
	$hasil=0;
	$sql = "SELECT pertemuan FROM periode ORDER BY id_periode DESC LIMIT 1";
	try {
		$stmt = $con->prepare($sql);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				foreach ($rs as $val) {
					$hasil = $val['pertemuan'];
				}
			}
		}
	} catch (Exception $e) {
		echo 'Error selectPertemuan : '.$e->getMessage();
	}
	return $hasil;
}

function getGeneratePresesnsi($id_Kelas){
	global $con;
	$hasil = array();
	$sql = "SELECT * FROM generatepresensi WHERE id_kelas =:id";
	try {
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_Kelas, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				$i = 0;
				foreach ($rs as $val) {
					$hasil[$i]['id_gpresensi'] = $val['id_gpresensi'];
					$hasil[$i]['id_kelas'] = $val['id_kelas'];
					$hasil[$i]['pertemuan'] = $val['pertemuan'];
					$hasil[$i]['materi'] = $val['materi'];
					$hasil[$i]['status'] = $val['status'];
					$hasil[$i]['visibility'] = $val['visibility'];
					$i++;
				}
			}
		}
	} catch (Exception $e) {
		echo 'Error getGeneratePresensi : '.$e->getMessage();
	}
	return $hasil;
}

function getSiswaKelas($id_kelas, $row){
	global $con;
	$hasil =array();
	$sql = "SELECT * FROM kelasambil WHERE id_kelas= :id";
	try {
		$stmt = $con->prepare($sql);
		$stmt -> bindValue(':id', $id_kelas, PDO::PARAM_STR);
		$stmt -> execute();
		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$rs = $stmt->fetchAll();
		$rr = $stmt->fetchColumn();

		if ($rs != null) {
			$i=0;
			foreach ($rs as $val) {
				$hasil[$i]['id_siswa'] = $val['id_siswa'];
				$hasil[$i]['nama'] = getNamaSiswa($val['id_siswa']);
				$i++;
			}
		}

		if ($row == true) {
			return $rr;
		} else {
			return $hasil;
		}
		

	} catch (Exception $e) {
		echo 'Error getSiswaKelas : '.$e->getMessage();
	}
}

function getRowSiswaKelas($id_Kelas){
	global $con;
	$hasil=0;
	$sql = "SELECT COUNT(*) AS hasil FROM kelasambil WHERE id_kelas = :id";
	try {
		$stmt = $con->prepare($sql);
		$stmt -> bindValue(':id', $id_Kelas, PDO::PARAM_STR);
		$stmt -> execute();
		$row = $stmt->fetch();
		$hasil = $row['hasil'];
		return $hasil;
	} catch (Exception $e) {
		echo 'Error getRowSiswaKelas : '.$e->getMessage();
	}
	
}

function getNamaSiswa($id_siswa){
	global $con;
	$hasil="";
	$sql = "SELECT nama FROM siswa WHERE id_siswa = :id";
	try {
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_siswa, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				foreach ($rs as $val) {
					$hasil = $val['nama'];
				}
			}
		}
	} catch (Exception $e) {
		echo 'Error getNamaSiswa : '.$e->getMessage();
	}
	return $hasil;
}

function editStatusPresensi($id, $status){
	global $con;
	try {
		$sql="UPDATE generatepresensi SET status = :status WHERE id_gpresensi =:id";
		$stmt= $con->prepare($sql);
		$stmt->bindValue(':status', $status, PDO::PARAM_STR);
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
	} catch (Exception $e) {
		echo 'Error editStatusPresensi : '.$e->getMessage();
	}
}

function editVisibilityPresensi($id, $visibility){
	global $con;
	try {
		$sql="UPDATE generatepresensi SET visibility = :visibility WHERE id_gpresensi =:id";
		$stmt= $con->prepare($sql);
		$stmt->bindValue(':visibility', $visibility, PDO::PARAM_STR);
		$stmt->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
	} catch (Exception $e) {
		echo 'Error editVisibilityPresensi : '.$e->getMessage();
	}
}

function editKehadiran($id_presensi, $kehadiran){
	global $con;
	$date = date('Y-m-d H:i:s');
	try{
		$sql = "UPDATE presensisiswa SET kehadiran=:kehadiran, waktu=:waktu WHERE id_presensi=:id";
		$stmt= $con->prepare($sql);
		$stmt->bindValue(':kehadiran', $kehadiran, PDO::PARAM_STR);
		$stmt->bindValue(':waktu', $date, PDO::PARAM_STR);
		$stmt->bindValue(':id', $id_presensi, PDO::PARAM_STR);
		$stmt->execute();
	}catch(Exception $e){
		echo 'Error editKehadiran = '.$e->getMessage();
	}
}

function editMateri($id_gpresensi, $materi){
	global $con;
	try {
		$sql="UPDATE generatepresensi SET materi =:materi WHERE id_gpresensi =:id";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':materi', $materi, PDO::PARAM_STR);
		$stmt->bindValue(':id', $id_gpresensi, PDO::PARAM_STR);
		$stmt->execute();
	} catch (Exception $e) {
		echo 'Error editMateri = '.$e->getMessage();
	}
}

function getPertemuan($id_gpresensi){
	global $con;
	$hasil="";
	$sql = "SELECT pertemuan FROM generatepresensi WHERE id_gpresensi = :id";
	try {
		$stmt = $con->prepare($sql);
		$stmt->bindValue(':id', $id_gpresensi, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rs = $stmt->fetchAll();

			if ($rs != null) {
				foreach ($rs as $val) {
					$hasil = $val['pertemuan'];
				}
			}
		}
	} catch (Exception $e) {
		echo 'Error getNamaSiswa : '.$e->getMessage();
	}
	return $hasil;
}

function sendPesan($id_gpresensi, $id_kelas){
	global $con;
	$pertemuan = getPertemuan($id_gpresensi);
	$sql = "INSERT INTO pesan(id_pesan, pesan, id_gpresensi) VALUES('', :pesan, :id_gpresensi)";
	$pesan = 'Kelas '.$id_kelas.' untuk '.$pertemuan.' ditiadakan';
	try {
		$stmt = $con -> prepare($sql);
		$stmt->bindValue(':pesan', $pesan, PDO::PARAM_STR);
		$stmt->bindValue(':id_gpresensi', $id_gpresensi, PDO::PARAM_STR);
		$stmt->execute();
	} catch (Exception $e) {
		echo 'Error sendPesan = '.$e->getMessage();
	}
}

?>