<?php
echo "<h2>Input Pendapatan Periode</h2>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=''>
<div class='form-group'>
    <label>Masukkan Tanggal Awal<span class='text-danger'></span></label>
	<div class='input-group date'>
    <input class='form-control' type='text' name='awal' id='awal'>
	<span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
	</div>
</div>	
<div class='form-group'>
    <label>Masukkan Tanggal Akhir<span class='text-danger'></span></label>
	<div class='input-group date'>
    <input class='form-control' type='text' name='akhir' id='akhir'>
	<span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
	</div>
</div>	

<button class='btn btn-primary'><span class='glyphicon glyphicon-print'></span> Tampilkan</button>
<a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
</form>
</div>
</div>";

$tglawal=$_POST[awal];
$tglakhir=$_POST[akhir];


echo"<h2>Laporan Periode $tglawal s/d $tglakhir</h2>
	<div class='panel panel-default'>
	
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>ID Pesan</th>
			<th>ID Jadwal</th>
			<th>Qty</th>
			<th>Tanggal Pesan </th>
			<th>ID Member </th>
			<th>Total (Rp.) </th>
        </tr>
    </thead>";

	$subtotal=0;	
    $tampil=mysql_query("SELECT * FROM pesan WHERE status='Lunas' AND tanggal_pesan BETWEEN '$tglawal' AND '$tglakhir'");
    while ($r=mysql_fetch_array($tampil)){
	$subtotal= $r[total] + $subtotal;
       echo "<tr><td>$r[id]</td>
			 <td>$r[id_jadwal]</td>
			 <td>$r[qty]</td>
			  <td>$r[tanggal_pesan]</td>
			  <td>$r[id_member]</td>
			  <td>$r[total]</td>
            </tr>";
    }
	echo"<tr>
	<td colspan='4' align='right'></td>
	<td><b>Grand Total :</td>
	<td>$subtotal</td></b>
    </tr>";
    echo "</table></div>";

?>

 