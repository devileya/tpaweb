<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tpa";
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

//buat array untuk menampung respon dari JSON
$response = array();

// cek apakah nilai yang dikirimkan android sudah terisi
 if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['nama']) || empty($_POST['alamat']) || empty($_POST['telpon']) || empty($_POST['jenkel']) || empty($_POST['sekolah'])) {
     // jika data tidak terisi/tidak terset
    $response["success"]= 0;
    $response["message"] = "Pastikan semua data terisi";

    //  memprint/mencetak JSON respon
    echo json_encode($response);	
	}else {
    
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
	$jenkel = $_POST['jenkel'];
	$telpon = $_POST['telpon'];
	$username = $_POST['username'];
	$password = $_POST['password'];
  $sekolah = $_POST['sekolah'];
	
	$cek_email=mysql_query("SELECT * FROM tbl_member WHERE username = '$username'");
	if (mysql_num_rows($cek_email) > 0) {
	$response["success"] = 0;
    $response["message"]= "Username sudah pernah terdaftar.";
	echo json_encode($response);
     }
	 if (mysql_num_rows($cek_email) == 0) {
	  // query menambah data member
    $result = mysql_query("INSERT INTO tbl_member(nama, alamat, telpon, jenkel, username, password,sekolah) VALUES('$nama', '$alamat','$jenkel', '$telpon', '$username', '$password','$sekolah')");
    // cek apakah query berhasil menambah data
    if ($result) {
        // jika berhasil menambah data ke mysql
        $response["success"] = 1;
       $response["message"] = "Berhasil menambah data member.";

        // memprint/mencetak JSON respon
        echo json_encode($response);
    } else {
        // gagal menambah data member
        $response["success"] = 0;
        $response["message"]= "Gagal menambah data.";
        
        // memprint/mencetak JSON respon
        echo json_encode($response);
  } 
  }
  }
?>
