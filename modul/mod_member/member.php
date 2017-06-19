<?php
$aksi="modul/mod_member/aksi_member.php";
switch($_GET[act]){
   //Tampil Data Member
  default:
    echo"<h1>Data Member</h1>
	<div class='panel panel-default'>
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
			<th>Nama</th>
			<th>Aksi</th>
        </tr>
    </thead>";
		
    $tampil=mysql_query("SELECT * FROM tbl_member ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
			 <td>$r[nama]</td>
             <td><a class='btn btn-xs btn-warning' href=?module=member&act=editmember&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=member&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;

// Form Edit Member 
  case "editmember":
  $edit=mysql_query("SELECT * FROM tbl_member WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Data Member</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=member&act=update>
<input type=hidden name=id value='$r[id]'>
<div class='form-group'>
    <label>Nama <span class='text-danger'></span></label>
    <input class='form-control' type='text' name='nama' value='$r[nama]'/>
</div>
<div class='form-group'>
    <label>Alamat <span class='text-danger'></span></label>
    <input class='form-control' type='text' name='alamat' value='$r[alamat]'/>
</div>
<div class='form-group'>
    <label>Telepon <span class='text-danger'></span></label>
    <input class='form-control' type='text' name='telpon' value='$r[telpon]'/>
</div>
<div class='form-group'>
    <label>Jenis Kelamin <span class='text-danger'></span></label>";
	 if ($r[jenkel]=='Pria'){
	echo"<div class='radio'>
          <label>
            <input type='radio' name='jenkel' value='option1' checked=''>
            Pria
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jenkel' value='option2'>
           Wanita
          </label>
        </div>";
		}
	else {
	echo"<div class='radio'>
          <label>
            <input type='radio' name='jenkel' value='Pria' >
            Pria
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jenkel' value='Wanita' checked=''>
           Wanita
          </label>
        </div>";
	}	
echo "</div>	
<div class='form-group'>
    <label>Username <span class='text-danger'></span></label>
    <input class='form-control' type='text' name='username' value='$r[username]'/>
</div>
<div class='form-group'>
    <label>Password <span class='text-danger'></span></label>
    <input class='form-control' type='text' name='password' value='$r[password]'/>
</div>
<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;

}  

  
	?>
 