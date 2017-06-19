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

// Hapus tips
if ($module=='tips' AND $act=='hapus'){
  mysql_query("DELETE FROM tbl_tips WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// input tips
elseif ($module=='tips' AND $act=='input'){
 mysql_query("INSERT INTO tbl_tips	(tgl_tips, judul_tips, isi_tips) 
                            VALUES('$_POST[tgl_tips]', '$_POST[judul_tips]', '$_POST[isi_tips]')");
  header('location:../../media.php?module='.$module);
}

// Update tips
elseif ($module=='tips' AND $act=='update'){
  mysql_query("UPDATE tbl_tips SET tgl_tips = '$_POST[tgl_tips]',
                 judul_tips = '$_POST[judul_tips]',
                 tgl_tips = '$_POST[tgl_tips]'
  							   WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
