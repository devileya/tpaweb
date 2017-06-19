<?php
$aksi="modul/mod_tips/aksi_tips.php";
switch($_GET[act]){
   //Tampil Data tips
  default:
    echo"<h1>Data Tips dan Trik</h1>
	<div class='panel panel-default'>
	<div class='panel-heading'>        
        <form class='form-inline'>
            <div class='form-group'>
           <a class='btn btn-primary' onclick=\"window.location.href='?module=tips&act=tambahtips';\"><span class='glyphicon glyphicon-plus'></span> Tambah</a>
            </div>
        </form>
		</div>
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
      <th>tanggal </th>
      <th>judul</th>
      <th>isi tips dan trik </th>
			<th>Aksi </th>
        </tr>
    </thead>";

		
    $tampil=mysql_query("SELECT * FROM tbl_tips ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
         <td>$r[tgl_tips]</td>
         <td>$r[judul_tips]</td>
         <td>$r[isi_tips]</td>
          <td><a class='btn btn-xs btn-warning' href=?module=tips&act=edittips&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=tips&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;
	
	// Form Tambah tips
  case "tambahtips":
  echo "<h1>Tambah Tips</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action='$aksi?module=tips&act=input'>

<div class='form-group'>
    <label>tanggal <span class='text-danger'></span></label>
  <div class='input-group date'>
    <input class='form-control' type='text' name='tanggal' id='tanggal'>
  <span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
  </div>


<div class='form-group'>
    <label>judul_tips<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='judul_tips' value=''/>
</div>

<div class='form-group'>
    <label>isi_tips<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='isi_tips' value=''/>
</div>


<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

break;


// Form Edit tips 
  case "edittips":
  $edit=mysql_query("SELECT * FROM tbl_tips WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Data Tips</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=tips&act=update>
<input type=hidden name=id value='$r[id]'>

<div class='form-group'>
    <label>Tanggal <span class='text-danger'></span></label>
  <div class='input-group date'>
    <input class='form-control' type='text' name='tanggal' id='tanggal' value='$r[tgl_tips]'>
  <span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
  </div>

<div class='form-group'>
    <label>judul_tips<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='judul_tips' value='$r[judul_tips]'/>
</div>

<div class='form-group'>
    <label>isi_tips<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='isi_tips' value='$r[isi_tips]'/>
</div>


<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;

}  

  
	?>

 