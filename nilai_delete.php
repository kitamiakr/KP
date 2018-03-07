<?php
include_once "library/inc.sesadmin.php";

//kode di url harus Ada
if (empty($_GET['Kode'])) {
	echo "Data yang anda maksud tidak ada";
}
else {
	//membaca kode dari url
	$Kode = $_GET['Kode'];
	//menghapus sesuai url
	$mySql = "DELETE FROM nilai WHERE id = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());
	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Nilai'>";
	}
}
?>