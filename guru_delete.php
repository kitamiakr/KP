<?php
include_once "library/inc.sesadmin.php";

//Kode di url dibaca
if (empty($_GET['Kode'])) {
	echo "<b>Data yang dihapus tidak ada!</b>";
}
else{
	$Kode = $_GET['Kode'];

	//menghapus data sesuai kode nya
	$mySql = "DELETE FROM guru WHERE kode_guru = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("gagal query !". mysql_error());
	if ($myQry) {
		//refresh halaman
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Guru'>";
	}
}
?>