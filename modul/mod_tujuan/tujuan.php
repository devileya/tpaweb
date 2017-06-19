<?php
$aksi="modul/mod_tujuan/aksi_tujuan.php";
switch($_GET[act]){
   //Tampil Kota Tujuan
  default:
    echo"<h1>Kota Tujuan</h1>
	<div class='panel panel-default'>
    <div class='panel-heading'>        
        <form class='form-inline'>
            <div class='form-group'>
           <a class='btn btn-primary' onclick=\"window.location.href='?module=tujuan&act=tambahtujuan';\"><span class='glyphicon glyphicon-plus'></span> Tambah</a>
            </div>
        </form>
		</div>
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kota</th>
			 <th>Aksi</th>
        </tr>
    </thead>";
		
    $tampil=mysql_query("SELECT * FROM kota_tujuan ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[kota]</td>
             <td><a class='btn btn-xs btn-warning' href=?module=tujuan&act=edittujuan&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=tujuan&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;
  
  // Form Tambah Kota Tujuan
  case "tambahtujuan":
  echo "<h1>Tambah Kota Tujuan</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action='$aksi?module=tujuan&act=input'>
<div class='form-group'>
    <label>Masukkan Nama Kota Tujuan<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='kota' value=''/>
</div>
<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

break;

// Form Edit kota tujuan 
  case "edittujuan":
  $edit=mysql_query("SELECT * FROM kota_tujuan WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Kota Tujuan</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=tujuan&act=update>
<input type=hidden name=id value='$r[id]'>
<div class='form-group'>
    <label>Masukkan Nama Kota Tujuan<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='kota' value='$r[kota]'/>
</div>
<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;
}  

  
	?>
 