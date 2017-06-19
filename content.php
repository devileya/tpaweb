<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){
	
?>

<h1 class="entry-title">Aplikasi Tes Potensial Akademik - Sisi Server </h1>
<div class="entry-body">
<p>Selamat datang di halaman dashboard aplikasi tes potensial akademik, disini Anda bisa mengelola data untuk keperluan server dan client untuk aplikasi TPA berbasis Android.</p>

  </div>		

<?php
	}
}
// Bagian Ganti Password
elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Kota Asal
elseif ($_GET[module]=='asal'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_asal/asal.php";
  }
}

// Bagian Kota Tujuan
elseif ($_GET[module]=='tujuan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tujuan/tujuan.php";
  }
}

// Bagian Member
elseif ($_GET[module]=='member'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_member/member.php";
  }
}

// Bagian Jadwal
elseif ($_GET[module]=='soal'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_soal/soal.php";
  }
}

elseif ($_GET[module]=='naskah'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_naskah/naskah.php";
  }
}

// Bagian pesan
elseif ($_GET[module]=='pesan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pesan/pesan.php";
  }
}

// Bagian laporan
elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}

elseif ($_GET[module]=='tips'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tips/tips.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
