<?php
include_once "library/inc.sesadmin.php";

if (empty($_GET['Kode'])) {
	echo "Apa Data Yang Anda Maksud Sih?";
}
else {
	$Kode = $_GET['Kode'];

	$mySql = "DELETE FROM pelajaran WHERE kode_pelajaran = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal! ".mysql_error());
	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Pelajaran'>";
	}
	
}
?>