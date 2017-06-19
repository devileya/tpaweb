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

// Hapus pesan
if ($module=='pesan' AND $act=='hapus'){
  mysql_query("DELETE FROM pesan WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Update pesan
elseif ($module=='pesan' AND $act=='update'){
  mysql_query("UPDATE pesan SET status = '$_POST[status]' WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
