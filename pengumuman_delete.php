<?php
include_once "library/inc.sesadmin.php";

//kode di url harus Ada
if (empty($_GET['Kode'])) {
	echo "Data yang anda maksud tidak ada";
}
else {
	//membaca kode dari url
	$Kode = $_GET['Kode'];
	$sql=mysql_query(" SELECT * FROM pengumuman WHERE id_peng='$Kode'");
	$data=mysql_fetch_array($sql);
	@unlink('gambar/'.$data['gambar']);
	//menghapus sesuai url
	$mySql = "DELETE FROM pengumuman WHERE id_peng = '$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());
	

	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Pengumuman-tampil'>";
	}
}
?>