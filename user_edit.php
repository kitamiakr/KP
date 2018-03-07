<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
$dataKode = buatKode("user", "U");
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';

if (isset($_POST['btnSimpan'])) {
	$txtNama = $_POST['txtNama'];
	$txtUsername = $_POST['txtUsername'];
	$txtPassword = $_POST['txtPassword'];
	$pesanError = array();

	#VALIDASI USERNAME
	$Kode = $_POST['txtKode'];
	$cekSql = "SELECT * FROM user WHERE username='$txtUsername' AND NOT(kode_user='$Kode') ";
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

		#SIMPAN KE DATABASE
		#skrip update password baru
		if (trim($txtPassword)== "") {
			$txtPassLama = $_POST['txtPassLama'];
			$sqlSub = "password = '$txtPassLama'";
		}
		else{
			$sqlSub = " password = '".md5($txtPassword)."'";
		}
		#simpan data
		$kodeBaru = $_POST['txtKode'];
		$mySql = "UPDATE user SET nama_user = '$txtNama',username = '$txtUsername', $sqlSub WHERE kode_user = '$Kode' ";
		$myQry = mysql_query($mySql, $koneksidb) or die("Gagal Query! ".mysql_error());
		if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-User'>";
			}
		exit;
	}
}

#MEMBACA DATA DARI DATABASE
$Kode = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
$mySql = "SELECT * FROM user WHERE kode_user = '$Kode'";
$myQry = mysql_query($mySql, $koneksidb) or die("Query Gagal!". mysql_error());
$myData = mysql_fetch_array($myQry);

#MEMBUAT NILAI DATA PADA FORM
$dataKode = $myData['kode_user'];
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nama_user'];
$dataUsername = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : $myData['username'];

?>

<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>UBAH DATA USER</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				    <input type="hidden" name="txtKode" value="<?php echo $dataKode; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="txtNama">Nama</label>
				  	<input class="form-control" name="txtNama" value="<?php echo $dataNama;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtUsername">Username</label>
				  	<input class="form-control" name="txtUsername" value="<?php echo $dataUsername; ?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtPassword">Password</label>
				  	<input class="form-control" type = "password" name="txtPassword" />
				  	<input type="hidden" name="txtPassLama" value="<?php echo $myData['password']; ?>" />
				  </div>
				  <button type="submit" name="btnSimpan" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='?open=Data-User'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>