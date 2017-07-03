<?php
$aksi="modul/mod_soal/aksi_soal.php";


switch($_GET[act]){
   //Tampil Data soal
  default:
    echo"<h1>Data Soal</h1>


    
	<div class='panel panel-default'>
	<div class='panel-heading'>        
        <form class='form-inline'>
            <div class='form-group'>
           <a class='btn btn-primary' onclick=\"window.location.href='?module=soal&act=tambahsoal';\"><span class='glyphicon glyphicon-plus'></span> Tambah</a>
            </div>
        </form>
		</div>
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>No</th>
      <th>Kategori soal</th>
      <th>soal</th>
      <th>a</th>
      <th>b</th>
      <th>c</th>
      <th>d</th>
      <th>e</th>
      <th>pmbahasn</th>
      <th>jwaban</th>
      <th>gambar</th>
      <th>level</th>
			<th>Aksi </th>
        </tr>
    </thead>";
		
    $tampil=mysql_query("SELECT * FROM tbl_soal ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
         <td>$r[nama_kategori]</td>
         <td>$r[soal]</td>
         <td>$r[a]</td>
         <td>$r[b]</td>
         <td>$r[c]</td>
         <td>$r[d]</td>
         <td>$r[e]</td>
         <td>$r[pmbahasn]</td>
         <td>$r[jwaban]</td>
         <td>$r[gambar]</td>
         <td>$r[level]</td>
               <td><a class='btn btn-xs btn-warning' href=?module=soal&act=editsoal&id=$r[id]><span class='glyphicon glyphicon-edit'></span></a> 
	               <a class='btn btn-xs btn-danger' href=$aksi?module=soal&act=hapus&id=$r[id]><span class='glyphicon glyphicon-trash'></span></a>

             </td></tr>";
      $no++;
    }
    echo "</table></div>";
    break;
	


	// Form Tambah soal
  case "tambahsoal":
  echo "<h1>Tambah Soal</h1>
<div class='row'>
<div class='col-sm-6'>
<form method='POST' enctype='multipart/form-data' action='$aksi?module=soal&act=input'>

<div class='form-group'>
    <label>Kategori Soal<span class='text-danger'></span></label>
    <select class='form-control' id='select' name='nama_kategori' onchange='cekKategori(this.value)'>
          <option value=0 selected>- Pilih Kategori -</option>";
       $tampil=mysql_query("SELECT * FROM tbl_kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[nama_kategori]>$r[nama_kategori]</option>";
            }
        echo"</select>
</div>

<div class='form-group'>
    <label>Naskah Soal<span class='text-danger'></span></label>
    <select class='form-control' id='select' name='teks'>
          <option value=0 selected>- Pilih Naskah (abaikan jika tidak ada) -</option>";
       $tampil=mysql_query("SELECT * FROM tbl_teks");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id]>$r[judul]</option>";
            }
        echo"</select>
</div>

<div class='form-group' id='levell'>
    <label>Level<span class='text-danger'></span></label>
    <select class='form-control' id='level' name='level' onchange='cekKategori(this.value)' required>
          <option value=0 selected>- Pilih Level -</option>";
       $tampil=mysql_query("SELECT max(level) level FROM tbl_soal");
       $temp=1;
       if($r=mysql_fetch_array($tampil))
        $temp=$r[level];

      for($i=1;$i<=$temp+1;$i++){
        echo "<option value=$i>Level $i</option>";
      }
        echo"</select>
</div>

<div class='form-group'>
    <label>soal<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='soal' value='' required/>
</div>

<div class='form-group'>
    <label>a<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='a' value='' required/>
</div>

<div class='form-group'>
    <label>b<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='b' value='' required/>
</div>

<div class='form-group'>
    <label>c<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='c' value='' required/>
</div>

<div class='form-group'>
    <label>d<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='d' value='' required/>
</div>

<div class='form-group'>
    <label>e<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='e' value='' required/>
</div>

<div class='form-group' id='pembahasan'>
    <label>pembahasan<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='pmbahasn' value=''/>
</div>

<div class='form-group'>
    <label>jawaban <span class='text-danger'></span></label>";
   if ($r[jwaban]=='1'){
  echo"<div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='option1' checked=''>
            a
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='option2'>
           b
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='option3'>
           c
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='option4'>
           d
          </label>
        </div>
        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='option5'>
           e
          </label>
        </div>";
    }
  else {
  echo"<div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='1' >
            a
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='2' checked=''>
           b
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='3' checked=''>
           c
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='4' checked=''>
           d
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' name='jwaban' value='5' checked=''>
           e
          </label>
        </div>";
  } 
echo "</div>  

<div class='form-group'>
    <label>gambar<span class='text-danger'></span></label>
    <input class='form-control' type='file' name='gambar' />

</div>

<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

break;


// Form Edit soal 
  case "editsoal":
  $edit=mysql_query("SELECT * FROM tbl_soal WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  echo "<h1>Edit Data Soal</h1>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=$aksi?module=soal&act=update>
<input type=hidden name=id value='$r[id]'>

<div class='form-group'>
    <label>nama Kategori<span class='text-danger'></span></label>
    <select class='form-control' name='nama_kategori' onchange='cekKategori(this.value)'>";
      $tampil=mysql_query("SELECT * FROM tbl_kategori ORDER BY nama_kategori");
          if (empty($r[nama_kategori])){
            echo "<option value=0>- Pilih kategori  -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[nama_kategori]==$w[nama_kategori]){
              echo "<option value=$w[nama_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[nama_kategori]>$w[nama_kategori]</option>";
            }
          }
        echo"</select>
</div>

<div class='form-group'>
    <label>soal<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='soal' value='$r[soal]'/>
</div>

<div class='form-group'>
    <label>a<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='a' value='$r[a]'/>
</div>

<div class='form-group'>
    <label>b<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='b' value='$r[b]'/>
</div>

<div class='form-group'>
    <label>c<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='c' value='$r[c]'/>
</div>

<div class='form-group'>
    <label>d<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='d' value='$r[d]'/>
</div>

<div class='form-group'>
    <label>e<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='e' value='$r[e]'/>
</div>

<div class='form-group' id='pembahasan'>
    <label>pmbahasn<span class='text-danger' ></span></label>
    <input class='form-control' type='text' name='pmbahasn' value='$r[pmbahasn]'/>
</div>

<div class='form-group'>
    <label>jwaban <span class='text-danger'></span></label>";
  
  echo"<div class='radio'>
          <label>
            <input type='radio' id='1' name='jwaban' value='1' >
            a
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' id='2' name='jwaban' value='2' >
           b
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' id='3' name='jwaban' value='3' >
           c
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' id='4' name='jwaban' value='4' >
           d
          </label>
        </div>

        <div class='radio'>
          <label>
            <input type='radio' id='5' name='jwaban' value='5' >
           e
          </label>
        </div>";

echo "</div>  

<div class='form-group'>
    <label>gambar<span class='text-danger'></span></label>
    <input class='form-control' type='text' name='gambar' value='$r[gambar]'/>    
</div>

<button class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> Simpan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";
  
  break;

}  
  $id='#'.$r[jwaban];
  echo "<script>$('".$id."').prop('checked',true);</script>";
	?>

   <!--/.wrapper--><br />
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"ajax-grid-data1.php", // json datasour
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('');
              $("#lookup_processing").css("display","none");
              
            }
          }
        } );
      } );
        </script>
      
      
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
    <script>
function cekKategori(str) {
    if (str == "ujian") {
        document.getElementById("pembahasan").hidden = true;
        document.getElementById("levell").hidden=true
        return;
    }else{
        document.getElementById("pembahasan").hidden = false;
        document.getElementById("levell").hidden=false;
        return;   
    }

    
}
</script>

 
