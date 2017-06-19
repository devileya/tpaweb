<?php
$aksi="modul/mod_pesan/aksi_pesan.php";
switch($_GET[act]){
   //Tampil Data Pemesanan
  default:
    echo"<h1>Data Pemesanan</h1>
	<div class='panel panel-default'>
	
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
			<th>Telpon</th>
			<th>ID Jadwal</th>
			<th>Qty</th>
			<th>Status Bayar</th>
			<th>Tanggal Pesan </th>
			<th>ID Member </th>
			<th>Total (Rp.) </th>
			<th>Aksi </th>
        </tr>
    </thead>";

		
    $tampil=mysql_query("SELECT * FROM pesan ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama]</td>
			 <td>$r[telpon]</td>
			 <td>$r[id_jadwal]</td>
			  <td>$r[qty]</td>";
			  
			  if ($r[status]=="Belum") { 
			  echo "<td align='center'><a href='#' class='btn btn-danger'> $r[status]</a>";
			  }
			  else {
			   echo "<td align='center'><a href='#' class='btn btn-warning'> $r[status]</a>";
			  }
			   echo" <td>$r[tanggal_pesan]</td>
			   <td>$r[id_member]</td>
			   <td>$r[total]</td>
             <td><a class='btn btn-xs btn-warning' href=?module=pesan&act=editpesan&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=pesan&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;
// Form Edit Pesan
  case "editpesan":
  $edit=mysql_query("SELECT * FROM pesan WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Data Jadwal</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=pesan&act=update>
<input type=hidden name=id value='$r[id]'>	
<div class='form-group'>
    <label>ID Pesan<span class='text-danger'></span></label>
    <input class='form-control' disabled='' type='text' name=id value='$r[id]'/>
</div>

<div class='form-group'>
    <label>Nama Pemesan<span class='text-danger'></span></label>
    <input class='form-control' disabled='' type='text' name='nama' value='$r[nama]'/>
</div>

<div class='form-group'>
    <label>Telpon<span class='text-danger'></span></label>
    <input class='form-control' disabled='' type='text' name='telpon' value='$r[telpon]'/>
</div>

<div class='form-group'>
    <label>Status Pemesanan<span class='text-danger'></span></label>
    <select class='form-control' name='status'>
            <option value=0 selected>- Pilih Status Pemesanan -</option>
            <option value='Lunas'>Lunas</option>
			<option value='Belum'>Belum</option>
        </select>
</div>

</div></div>

<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;
}  
?>

 