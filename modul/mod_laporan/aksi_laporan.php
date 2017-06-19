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

$tglawal=$_POST[awal];
$tglakhir=$_POST[akhir];


echo"<h1>Data Jadwal</h1>
	<div class='panel panel-default'>
	
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>ID Pesan</th>
			<th>ID Jadwal</th>
			<th>Qty</th>
			<th>Tanggal Pesan </th>
			<th>ID Member </th>
			<th>Total (Rp.) </th>
        </tr>
    </thead>";

		
    $tampil=mysql_query("SELECT * FROM pesan WHERE tanggal_pesan BETWEEN '$tglawal' AND '$tglakhir'");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$r[id]</td>
			 <td>$r[id_jadwal]</td>
			 <td>$r[qty]</td>
			  <td>$r[tanggal_pesan]</td>
			  <td>$r[id_member]</td>
			  <td>$r[total]</td>
             <td><a class='btn btn-xs btn-warning' href=?module=pesan&act=editpesan&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=pesan&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
    }
    echo "</table></div>";

}
?>
