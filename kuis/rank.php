<?php
include("koneksi.php");
$arr = array();
$q = mysql_query("select m.nama,m.alamat,m.sekolah,u.nilai from tbl_ujian u,tbl_member m where m.username=u.username order by nilai desc limit 10");
        while ($row = mysql_fetch_assoc($q)) {
            $temp = array(
                "nama" => $row['nama'],
                "alamat" => $row['alamat'],
				"sekolah"=>$row['sekolah'],
				"skor"=>$row['nilai']
            );
            array_push($arr, $temp);
        }	
	$data = json_encode($arr);
    $data = str_replace("\\", "", $data);
    echo "{\"daftar_peringkat\":" . $data . "}";
?>
