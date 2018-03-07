<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
$dataKode = buatKode("user", "U");


if (isset($_POST['btnSimpan'])) {
	$txtNama = $_POST['txtNama'];
	$txtUsername = $_POST['txtUsername'];
	$txtPassword = $_POST['txtPassword'];
	$pesanError = array();

	$cekSql = "SELECT * FROM user WHERE username='$txtUsername' ";
	$cekQry = mysql_query($cekSql, $koneksidb) or die ("Query Cek Gagal!");
	if (mysql_num_rows($cekQry) >= 1 ) {
		$pesanError[] = "Maaf username sudah terpakai, dimohon untuk mengganti username yang lain";
	}
	if (count($pesanError) >= 1 ) {
		echo "<div class = 'mssgBox'>";
		echo "<img src = 'images/attention.png'> <br><hr>";
		$noPesan = 0;
		foreach ($pesanError as $indeks => $pesan_tampil) {
			$noPesan++;
			echo "&nbsp; $noPesan. $pesan_tampil<br>";
		}
		echo "</div> <br>";
	}
	else {
	$kodeBaru = buatKode("user", "U");
	$mySql = "INSERT INTO user (kode_user, nama_user, username, password) VALUES ('$kodeBaru', '$txtNama', '$txtUsername', md5('$txtPassword'))";
	$myQry = mysql_query($mySql, $koneksidb) or die("Gagal Query! ".mysql_error());
	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-User'>";
		}
	exit;
	}
}
?>

<div class="row">
		  <div class="well">
		  	<div class="page-header">
			  <h3>TAMBAH DATA USER</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self">
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class= "form-control" type="text" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				  </div>
				  <div class="form-group">
				    <label for="txtNama">Nama</label>
				    <input class= "form-control" type="text" name="txtNama" required />
				  </div>
				  <div class="form-group">
				    <label for="txtUsername">Username</label>
				    <input class= "form-control" type="text" name="txtUsername" required />
				  </div>
				  <div class="form-group">
				    <label for="txtPassword">Password</label>
				    <input class= "form-control" type="password" name="txtPassword" required />
				  </div>
				  <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
				  <button type="button" onclick="location.href='?open=Data-User'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
</div>