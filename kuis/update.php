<?php

    include "koneksi.php";
    $response = array();

    if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['telpon']) && isset($_POST['username'])  && isset($_POST['password'])) {

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

$query =   "UPDATE tbl_member SET nama='$nama', alamat='$alamat', telpon='$telpon' username='$username', password='$password' WHERE id='$id'";     
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