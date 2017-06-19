<?php
include("koneksi.php");

//buat array untuk menampung respon dari JSON
$response = array();

//  cek apakah nilai yang dikirimkan android sudah terisi
if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // query update berdasarkan id
    $result = mysql_query("SELECT * FROM tbl_member WHERE username = '$username' AND password= '$password'");

     if (!empty($result)) {
		if (mysql_num_rows($result) > 0) {
        // jika sukses login
        $response["success"] = 1;
         $response["message"] = "Login Berhasil.";
        
        // memprint/mencetak JSON respon
        echo json_encode($response);
    	} if (mysql_num_rows($result) == 0)  {
		// gagal update data
         $response["success"]  = 0;
        $response["message"]= "Gagal login, username atau password salah atau belum terisi.";
        
        // memprint/mencetak JSON respon
        echo json_encode($response);
    }
  }

} 

?>

<h1>Login</h1> 
		<form action="login.php" method="post"> 
		    Username:<br /> 
		    <input type="text" name="username" placeholder="username" /> 
		    <br /><br /> 
		    Password:<br /> 
		    <input type="password" name="password" placeholder="password" value="" /> 
		    <br /><br /> 
		    <input type="submit" value="Login" /> 
		</form> 

		
