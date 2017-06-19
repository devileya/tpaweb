<?php
include("koneksi.php");
$arr = array();
$level = $_GET['level'];
$q = mysql_query("select * from tbl_soal LEFT JOIN tbl_teks ON tbl_soal.id_teks=tbl_teks.id where nama_kategori='kuantitatif' and level = $level order by rand()");
        while ($row = mysql_fetch_assoc($q)) {
            $temp = array(
                "soal_id" => $row['id'],
				"soal"=>$row['soal'],
				"a"=>$row['a'],
				"b"=>$row['b'],
                "c" => $row['c'],
                "d" => $row['d'],
                "e" => $row['e'],
                "pembahasan" => $row['pmbahasn'],
                "jawaban" => $row['jwaban'],
                "gambar" =>  $row['gambar']."",
                "teks" => $row['teks']
            );
            array_push($arr, $temp);
        }	
	$data = json_encode($arr);
    $data = str_replace("\\", "", $data);
    echo "{\"daftar_soal\":" . $data . "}";
?>