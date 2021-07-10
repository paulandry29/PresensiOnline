<?php
    
    require_once "../functions/function.php";
    require_once "../functions/sendEmail.php";

        //date
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        //time
        $hour = date('H');
        $minute = date('i');
        $second = date('s');

        $guru = getGuru();
        
        foreach ($guru as $key => $valGuru) {
            $dom = new DOMDocument();
            $dom->encoding = 'utf-8';
            $dom->xmlVersion = '1.0';
            $dom->formatOutput = true;
            $xml_file_name = './rekapXML/'.$valGuru['id_guru'].'_'.$year.''.$month.''.$day.'_'.$hour.''.$minute.'.xml';
            $siswa = getSiswa($valGuru['id_guru']);

            if (sizeof($siswa)>0) {
                foreach ($siswa as $key => $val) {
                    $root = $dom->createElement('Presensi_Siswa');
                    $siswa_node = $dom->createElement($val['nama_siswa']);
                    $attr_id_siswa = new DOMAttr('id_siswa', $val['id_siswa']);
                    $siswa_node->setAttributeNode($attr_id_siswa);
        
                    $child_node_kehadiran = $dom->createElement('kehadiran', $val['kehadiran']);
                    $siswa_node->appendChild($child_node_kehadiran);
        
                    $child_node_waktu = $dom->createElement('waktu', $val['waktu']);
                    $siswa_node->appendChild($child_node_waktu);
            
                    $root->appendChild($siswa_node);
                    $dom->appendChild($root);
                }
            }else{
                $root = $dom->createElement('Presensi_Siswa');
                $siswa_node = $dom->createElement('keterangan', 'TIDAK ADA DATA');
                $root->appendChild($siswa_node);
                $dom->appendChild($root);

            }
            $dom->save($xml_file_name);
            sendEmail($valGuru['email'], $valGuru['nama'], $xml_file_name);
        }
