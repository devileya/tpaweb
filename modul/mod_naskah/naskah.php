<?php
$aksi="modul/mod_naskah/aksi_naskah.php";


switch($_GET[act]){
   //Tampil Data soal
  default:
    echo"<h1>Data Naskah</h1>


    
	<div class='panel panel-default'>
	<div class='panel-heading'>        
        <form class='form-inline'>
            <div class='form-group'>
           <a class='btn btn-primary' onclick=\"window.location.href='?module=naskah&act=tambahnaskah';\"><span class='glyphicon glyphicon-plus'></span> Tambah</a>
            </div>
        </form>
		</div>
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
	    <th>Judul</th>
      <th>Teks Naskah</th>
			<th>Aksi </th>
        </tr>
    </thead>";
		
    $tampil=mysql_query("SELECT * FROM tbl_teks");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
       <td>$r[judul]</td>
         <td>$r[teks]</td>
               <td><a class='btn btn-xs btn-warning' href=?module=soal&act=editsoal&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=soal&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;
	


	// Form Tambah soal
  case "tambahnaskah":
  echo "<h1>Tambah Naskah</h1>
<div class='row'>
<div class='col-sm-6'>
<form method='POST' enctype='multipart/form-data' action='$aksi?module=naskah&act=input'>


<div class='form-group'>
    <label>Judul naskah<span class='text-danger'></span></label><br>
    <input type=\"text\" name=\"judul\"/>
</div>

<div class='form-group'>
    <label>Naskah Soal<span class='text-danger'></span></label><br>
    <textarea rows=\"10\" cols=\"150\" name=\"teks\"></textarea>
</div>

<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

break;


// Form Edit soal 
  case "editsoal":
  $edit=mysql_query("SELECT * FROM tbl_teks WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Naskah Soal</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=soal&act=update>
<input type=hidden name=id value='$r[id]'>

<div class='form-group'>
    <label>Judul naskah<span class='text-danger'></span></label><br>
    <input type=\"text\" name=\"judul\"/>
</div>

<div class='form-group'>
    <label>soal<span class='text-danger'></span></label>
    <textarea class='form-control'  name='teks' value='$r[teks]'/>
</div>";


echo "</div>  


<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;

}  
	?>

   <!--/.wrapper--><br />
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
      
      
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
   <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

 
