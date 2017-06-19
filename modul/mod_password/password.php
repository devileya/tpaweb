<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    echo "<h1>Ganti Password</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=modul/mod_password/aksi_password.php>
<div class='form-group'>
    <label>Masukkan Password Lama<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='pass_lama' value=''/>
</div>
<div class='form-group'>
    <label>Masukkan Password Baru<span class='text-danger'>*</span></label>
    <input class='form-control' type='text' name='pass_baru' value=''/>
</div><div class='form-group'>
    <label>Masukkan Lagi Password Baru</label>
      <input class='form-control' type='text' name='pass_ulangi' value=''/>
</div>
<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
}
?>

