<?php
$koneksi = mysql_connect('tpawebserver.mysql.database.azure.com','tpaweb@tpawebserver','@gakjelas12') or die(mysql_error());
$db = mysql_select_db('tpa') or die (mysql_error());
?>
