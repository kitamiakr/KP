<?php
$myHost = "localhost";
$myUser = "root";
$myPass = "";
$myDbs = "sia_muhkayen";

$koneksidb = mysql_connect($myHost, $myUser, $myPass) or die ("Koneksi Gagal".mysql_error());
mysql_select_db($myDbs, $koneksidb) or die ("Koneksi Gagal DB".mysql_error());
?>