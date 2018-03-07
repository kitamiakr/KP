<?php
include_once "library/inc.sesadmin.php";

//kode di url harus Ada
if (empty($_GET['Kode'])) {
	echo "Data yang anda maksud tidak ada";
}
else {
	//membaca kode dari url
	$Kode = $_GET['Kode'];
	$sql=mysql_query(" SELECT * FROM prestasi WHERE id_prestasi='$Kode'");
	$data=mysql_fetch_array($sql);
	@unlink('gambar2/'.$data['gambar']);
	//menghapus sesuai url
	$mySql = "DELETE FROM prestasi WHERE id_prestasi= '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());
	

	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Prestasi-tampil'>";
	}
}
?>