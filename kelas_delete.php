<?php 
include_once "library/inc.sesadmin.php";
//kode di url harus ada
if (empty($_GET['Kode'])) {
	echo "data apa yang anda maksud";
}
else {
	//membaca kode di url
	$Kode = $_GET['Kode'];
	//menghapus data utama
	$mySql = "DELETE FROM kelas WHERE kode_kelas = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("error pak ".mysql_error());
	if ($myQry) {
		//data di kelas siswa juga
		$my2Sql = "DELETE FROM kelas_siswa WHERE kode_kelas = '$Kode'";
		mysql_query($my2Sql, $koneksidb);
		//refresh
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Kelas'>";
	}
}
?>
