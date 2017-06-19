<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kota Asal
if ($module=='asal' AND $act=='hapus'){
  mysql_query("DELETE FROM kota_Asal WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input Kota Asal
elseif ($module=='asal' AND $act=='input'){
  mysql_query("INSERT INTO kota_asal(kota) VALUES('$_POST[kota]')");
  header('location:../../media.php?module='.$module);
}

// Update kota Asal
elseif ($module=='asal' AND $act=='update'){
  mysql_query("UPDATE kota_asal SET kota = '$_POST[kota]' WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
