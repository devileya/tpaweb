<?php

//error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tpa";
$conn = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

//buat array untuk menampung respon dari JSON
$response = array();
		
		
// cek apakah nilai yang dikirimkan android sudah terisi
 if (isset($_POST['username']) && isset($_POST['nilai'])) {
	 
	 $username = $_POST['username'];
    
	$nilai = $_POST['nilai'];
	
	$query=mysql_query("SELECT alamat FROM tbl_member WHERE username = '$username' limit 1");
	$value = mysql_fetch_array($query);
	$alamat = $value['alamat'];
	
	 $result = mysql_query("INSERT INTO tbl_ujian(username, alamat, nilai) VALUES('$username', '$alamat','$nilai')");
    // cek apakah query berhasil menambah data
    if ($result) {
        // jika berhasil menambah data ke mysql
        $response["success"] = 1;
       $response["message"] = "Berhasil menambah data ujian.";

        // memprint/mencetak JSON respon
        echo json_encode($response);
    } else {
        // gagal menambah data member
        $response["success"] = 0;
        $response["message"]= "Gagal menambah data ujian";
        
        // memprint/mencetak JSON respon
        echo json_encode($response);
	}
		
	}else {
		
		
     // jika data tidak terisi/tidak terset
    $response["success"]= 0;
    $response["message"] = "Pastikan semua data terisi";

    //  memprint/mencetak JSON respon
    echo json_encode($response);	
    
  } 
    
mysql_close($conn); 

?>
