<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#saat simpan terklik
if (isset($_POST['btnSimpan'])) {
	$txtNIP = $_POST['txtNIP'];
	$txtNama = $_POST['txtNama'];
	$cmbKelamin = $_POST['cmbKelamin'];
	$txtAlamat = $_POST['txtAlamat'];
	$txtNoTelp = $_POST['txtNoTelp'];
	$rbAktif = $_POST['rbAktif'];

	$pesanError = array();
	if (trim($cmbKelamin)=="KOSONG") {
		$pesanError[] = "Data <b>Jenis Kelamin</b> Belum dipilih";
	}
	if (count($pesanError) >= 1) {
		echo "<div class= 'mssgBox'>";
		echo "<img src = 'images/attention.png'> <br><hr>";
		$noPesan = 0;
		foreach ($pesanError as $indeks => $pesan_tampil) {
			$noPesan++;
			echo "&nbsp; $noPesan. $pesan_tampil<br>";
		}
		echo "</div> <br>";
	}
	else {
		#simpan
		$kodeBaru = buatKode("guru", "G");
		$mySql = "INSERT INTO guru (
		kode_guru, nip, nama_guru, kelamin, alamat, no_telepon, status_aktif
		) VALUES (
		'$kodeBaru', '$txtNIP', '$txtNama', '$cmbKelamin', '$txtAlamat', '$txtNoTelp', '$rbAktif'
		)";
		$myQry = mysql_query($mySql, $koneksidb) or die("gagal Query!".mysql_error());
		if ($myQry) {
			#refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=Data-Guru'>";
		}
		exit;
	}
}

$dataKode = buatKode("guru", "G");
$dataNIP = isset($_POST['txtNIP']) ? $_POST['txtNIP'] : '';
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : '';
$dataAlamat = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataNoTelp = isset($_POST['txtNoTelp']) ? $_POST['txtNoTelp'] : '';
$dataAktif = isset($_POST['rbAktif']) ? $_POST['rbAktif'] : '';

?>

<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>UBAH DATA GURU</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtNIP">NIP</label>
				  	<input class="form-control" name="txtNIP" value="<?php echo $dataNIP;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtNama">Nama Guru</label>
				  	<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" required />
				  </div>
				  <div class="form-group">
				    <label for="cmbKelamin">Jenis Kelamin</label>
				    <select class="form-control" id="cmbKelamin" name="cmbKelamin">
						<?php
						$pilihan = array("Laki-laki", "Perempuan");
						foreach ($pilihan as $kelamin) {
							if ($dataKelamin==$kelamin) {
								$cek = "selected";
							} else {$cek = ""; }
							echo "<option value='$kelamin' $cek> $kelamin</option>";
						}
						?>
				    </select>
				  </div>
				  <div class="form-group">
				  	<label for="txtAlamat">Alamat Tinggal</label>
				  	<input class="form-control" type = "text" name="txtAlamat" value="<?php echo $dataAlamat; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="txtNoTelp">No. Telp</label>
				  	<input class="form-control" type = "text" name="txtNoTelp" value="<?php echo $dataNoTelp; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="rbAktif">Status</label>
				  	<input type="radio"  name="rbAktif" value="Aktif" checked="true" >Aktif
				  	<input type="radio"  name="rbAktif" value="Tidak Aktif">Tidak Aktif
				  </div>
				  <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='?open=Data-Guru'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
</div>