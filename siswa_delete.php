<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
//kode url harus ada
if (empty($_GET['Kode'])) {
	echo "<b>Data yang dihapus tidak ada</b>";
}
else {
	//membaca kode dari url
	$Kode = $_GET['Kode'];
	#menghapus data gambar
	$mySql = "SELECT * FROM siswa WHERE kode_siswa = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal!".mysql_error());
	$myData = mysql_fetch_array($myQry);
	if (!$myData['foto'] == "") {
		if (file_exists("foto/".$myData['foto'])) {
			//jika foto ada maka akan dihapus
			unlink("foto/".$myData['foto']);
		}
	}
	//menghapus data
	$mySql = "DELETE FROM siswa WHERE kode_siswa= '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die("gagal Query!".mysql_error());
		if ($myQry) {
			#refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=Data-Siswa'>";
		}
}

?>