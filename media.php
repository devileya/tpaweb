<?php
error_reporting(0);

session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Aplikasi Server Tes Potensial Akademik"/>
    <meta name="keywords" content="TPA"/>
    <meta name="author" content="Elka Mariani"/>
	<link rel="canonical" href="" />

    <title>Aplikasi Server Tes Potensial Akademik </title>
    <link href="assets/css/united-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
	<link rel="stylesheet" href="assets/css/datepicker.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  
	<script src="assets/js/bootstrap-datepicker.js"></script>     
 <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#tanggal').datepicker({
                    format: "yyyy-mm-dd"
                });
				
				$('#awal').datepicker({
                    format: "yyyy-mm-dd"
                }); 
				
				$('#akhir').datepicker({
                    format: "yyyy-mm-dd"
                });   
				
            
            });
        </script>

		  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tes Potensial Akademik</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
		  <li><a href="media.php?module=home"><span class="glyphicon glyphicon-home"></span> Home</a></li>  
            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Olah User <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <!-- <li><a href="media.php?module=asal"><span class="glyphicon glyphicon-road"></span> Kota Asal </a></li> -->
                    <!-- <li><a href="media.php?module=tujuan"><span class="glyphicon glyphicon-road"></span> Kota Tujuan </a></li> -->
					<li><a href="media.php?module=member"><span class="glyphicon glyphicon-user"></span> Member </a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-signal"></span> Olah Soal <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="media.php?module=soal"><span class="glyphicon glyphicon-briefcase"></span> Soal</a></li>
                     <li><a href="media.php?module=naskah"><span class="glyphicon glyphicon-briefcase"></span> Naskah</a></li>
                   <!--  <li><a href="media.php?module=pesan"><span class="glyphicon glyphicon-tasks"></span> Pemesanan</a></li> -->
                </ul>
            </li>
            <li><a href="media.php?module=tips"><span class="glyphicon glyphicon-calendar"></span> Olah Tips&Trik </a></li>   
      
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Utility <span class="caret"></span></a>
			 <ul class="dropdown-menu" role="menu">
			  <li><a href="media.php?module=password"><span class="glyphicon glyphicon-edit"></span> Ganti Password</a></li>   
     		</ul>
          </ul>          
         <ul class="nav navbar-nav navbar-right">
           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>    
              </ul>
            </li>             
          </ul>
        </div>
    </nav>

    <div class="container">
<?php include "content.php"; ?>
</div>
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; 2017 Elka Mariani</p>
      </div>
    </footer>
</html>
<?php } ?>