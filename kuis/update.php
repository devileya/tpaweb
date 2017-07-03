<?php

    include "koneksi.php";
    $response = array();

    if (isset($_POST['sekolah']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['telpon']) && isset($_POST['username'])  && isset($_POST['password'])) {

        $sekolah = $_POST['sekolah'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $jenkel = $_POST['jenkel']
        

$query =   "UPDATE tbl_member SET nama='$nama', alamat='$alamat', telpon='$telpon',jenkel='$jenkel', sekolah='$sekolah', password='$password' WHERE username='$username'";     
 $result = mysql_query($query);
    }

    if($result) {
        $response["success"] = "1";
        $response["message"] = "Data sukses di update";
        echo json_encode($response);
    }
    else {
        $response["success"] = "0";
        $response["message"] = "Maaf , terjadi kesalahan";
        echo json_encode($response);
    }

?>
