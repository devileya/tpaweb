<?php
include("koneksi.php");
$arr = array();
$q = mysql_query("select * from tbl_tips ");
        while ($row = mysql_fetch_assoc($q)) {
            $temp = array(
                "soal_id" => $row['id'],
				"judul"=>$row['judul_tips'],
			   // "a"=>$row['a'],
				//"b"=>$row['b'],
               // "c" => $row['c'],
               // "d" => $row['d'],
               // "e" => $row['e'],
                "isi" => $row['isi_tips'],
                "tgl" => $row['tgl_tips'],
               // "jawaban" => $row['jwaban'],
               // "gambar" => "http://10.0.2.2/kuis/images/".$row['gambar'].""
            );
            array_push($arr, $temp);
        }	
	$data = json_encode($arr);
    $data = str_replace("\\", "", $data);
    echo "{\"daftar_tips\":" . $data . "}";
?>