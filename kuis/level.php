<?php
include("koneksi.php");

$arr = array();
$kategori = $_POST['kategori'];
$q = mysql_query("select max(level) lvl from tbl_soal where nama_kategori='$kategori'");
        if ($row = mysql_fetch_assoc($q)) {
            $response["success"] = 1;
            $response["level"] = $row['lvl'];
            $response["message"] = "Level berhasil dibaca.";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["message"] = "Koneksi internet tidak ada!";
            echo json_encode($response);
        }
?>
