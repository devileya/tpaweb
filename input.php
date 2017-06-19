<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Sistem Pendukung Keputusan(SPK) Metode Simple Additive Weighting (SAW). Studi kasus: Penentuan beasiswa untuk mahasiswa."/>
    <meta name="keywords" content="spk, saw, ta, tugas akhir, skripsi, source code"/>
    <meta name="author" content="herdikayan"/>
    <link rel="icon" href="../favicon.ico"/>
    <link rel="canonical" href="http://tugasakhir.web.id/spk-saw/" />

    <title>Source Code SPK Metode SAW</title>
    <link href="../assets/css/united-bootstrap.min.css" rel="stylesheet"/>
    <link href="../assets/css/general.css" rel="stylesheet"/>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>           
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
          <a class="navbar-brand" href="?">SPK-SAW</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
                    <li><a href="?m=crips"><span class="glyphicon glyphicon-star"></span> Nilai Crips</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
                    <li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-user"></span> Nilai Alternatif</a></li>
                </ul>
            </li>
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>    
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Contoh Login Form</a></li>
            <li><a href="http://herdikayan.wordpress.com" target="_blank"><span class="glyphicon glyphicon-bookmark"></span> Rp 275.000,-</a></li>      
          </ul>          
          <!--<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="aksi.php?act=reset"><span class="glyphicon glyphicon-refresh"></span> Reset Database</a></li> 
              </ul>
            </li>             
          </ul>-->
        </div><!--/.nav-collapse -->
    </nav>

    <div class="container">
    <h1>Kriteria</h1>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="kriteria" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Atribut</th>
            <th>Bobot</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <tr>
        <td>1</td>
        <td>Nilai IPK</td>
        <td>benefit</td>
        <td>Cukup</td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=23"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=23" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
        <tr>
        <td>2</td>
        <td>Penghasilan Ortu</td>
        <td>cost</td>
        <td>Rendah</td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=24"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=24" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
        <tr>
        <td>3</td>
        <td>Semester</td>
        <td>benefit</td>
        <td>Sangat Rendah</td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=25"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=25" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
        <tr>
        <td>4</td>
        <td>Jumlah Tanggungan</td>
        <td>cost</td>
        <td>Tinggi</td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=26"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=26" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
        <tr>
        <td>5</td>
        <td>Usia</td>
        <td>benefit</td>
        <td>Sangat Tinggi</td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=27"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=27" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
        </table>
</div>    </div>
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; 2015 tugasakhir.web.id</p>
      </div>
    </footer>
</html>