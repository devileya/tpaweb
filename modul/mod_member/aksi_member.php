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

// Hapus Member
if ($module=='member' AND $act=='hapus'){
  mysql_query("DELETE FROM tbl_member WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Update kota Asal
elseif ($module=='member' AND $act=='update'){
  mysql_query("UPDATE tbl_member SET 
							   password = '$_POST[password]'  
  							   WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
