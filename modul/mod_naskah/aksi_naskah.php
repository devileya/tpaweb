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

// Hapus soal
if ($module=='naskah' AND $act=='hapus'){
  mysql_query("DELETE FROM tbl_soal WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

//input soal dan gambar
if ($module=='naskah' AND $act=='input'){
 /* $file_max_weight = 200000; //limit the maximum size of file allowed (20Mb)

$ok_ext = array('jpg','png','gif','jpeg'); // allow only these types of files

$destination = '../../../kuis/images/'; // where our files will be stored



// PHP sets a global variable $_FILES['file'] which containes all information on the file
// The $_FILES['file'] is also an array, so to have the file name we're supposed to write $_FILES['file']['name']
// To shorten that I added the following line. With that I could just do $file['name']
$file = $_FILES['gambar'];

$filename = explode(".", $file["name"]); 

$file_name = $file['name']; // file original name

$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension

$file_extension = $filename[count($filename)-1];

$file_weight = $file['size'];

$file_type = $file['type'];



// If there is no error
if( $file['error'] == 0 )
{
    // check if the extension is accepted
    if( in_array($file_extension, $ok_ext)):

        // check if the size is not beyond expected size
        if( $file_weight <= $file_max_weight ):


                // rename the file
               // $fileNewName = md5( $file_name_no_ext[0].microtime() ).'.'.$file_extension ;


                // and move it to the destination folder
                if( move_uploaded_file($file['tmp_name'], $destination.$file_name) ):

                    echo" File uploaded !";

                else:

                    echo "can't upload file.";

                endif;


        else:

           echo "File too heavy.";

        endif;


    else:

        echo "File type is not supported.";

    endif;
}*/

$a=$_POST[teks];

//echo "<script>alert('$a');</script>";
 mysql_query("INSERT INTO tbl_teks(teks) 
                            VALUE('$_POST[teks]')");
  header('location:../../media.php?module='.$module);
}

// Update soal
elseif ($module=='naskah' AND $act=='update'){
  mysql_query("UPDATE tbl_teks SET teks = '$_POST[teks]'
  							   WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
