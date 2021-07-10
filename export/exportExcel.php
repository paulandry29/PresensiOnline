<html>

<head>
    <title>Coba Export</title>
</head>

<body>
    <?php

    require_once "../functions/function.php";

    $id_kelas = $_GET['id_kelas'];

    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Presensi ".$id_kelas.".xls");

    ?>   
	
	

<table class="table table-bordered table-hover">
		<tr class="table-success">
			<th width="15%" nowrap>
				<center>ID</center>
			</th>
			<th width="30%" nowrap>
				<center>Nama</center>
			</th>

            <?php
            for ($i=1; $i <= 26 ; $i++) { 
                echo'
                <th width="40" nowrap>
				    <center>'.$i.'</center>
			    </th>
                ';
            }
            ?>

		</tr>
		<?php 
        $data = getSiswaPresensi($id_kelas);
        foreach ($data as $key => $val) {
            $kehadiran = getPresensi($val['id_siswa'], $id_kelas);
            ?>
            <tr>
            <td><center><?= $val['id_siswa']?></center></td>
            <td><center><?= $val['nama']?></center></td>
            <?php
            foreach ($kehadiran as $key => $val2) {
                $hadir = ($val2['kehadiran']==1) ? "<label style='color:green'>V</label>" : "<label style='color:red'>X</label>" ;
                echo'<td><center>'.$hadir.'</center></td>';
            }
            ?>
            </tr>
        <?php
        }

        ?>
	</table>
    <!-- <script>
        print();
    </script> -->
</body>

</html>