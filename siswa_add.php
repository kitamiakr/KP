<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#saat simpan terklik
if (isset($_POST['btnSimpan'])) {
	$txtNis = $_POST['txtNis'];
	$txtNama = $_POST['txtNama'];
	$cmbKelamin = $_POST['cmbKelamin'];
	$cmbAgama = $_POST['cmbAgama'];
	$txtTempatLahir = $_POST['txtTempatLahir'];
	$txtTanggal = $_POST['txtTanggal'];
	$txtAlamat = $_POST['txtAlamat'];
	$txtNoTelepon = $_POST['txtNoTelepon'];
	$cmbAngkatan = $_POST['cmbAngkatan'];
	$cmbStatus = $_POST['cmbStatus'];

	$pesanError = array();
	$sqlCek = "SELECT * FROM siswa WHERE nis = '$txtNis'";
	$qryCek = mysql_query($sqlCek, $koneksidb) or die ("Query Error".mysql_error());
	if (mysql_num_rows($qryCek) >= 1) {
		$pesanError[] = "Maaf, NIS <b> $txtNis </b> sudah ada, mohon diganti!";
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
		$kodeBaru = buatKode("siswa", "S");
		#untuk simpan foto
		if (! empty($_FILES['namaFile']['tmp_name'])) {
			#membaca nama file
			$file_foto = $_FILES['namaFile']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'", "", $file_foto);

			//simpan gambar
			$file_foto = $kodeBaru.".".$file_foto;
			copy($_FILES['namaFile']['tmp_name'] , "foto/".$file_foto);
		} else { 
			//jika foto kosong
			$file_foto="";
		}

		$mySql = "INSERT INTO siswa (
		kode_siswa, nis, nama_siswa, kelamin, agama, tempat_lahir, tanggal_lahir, alamat, no_telepon, foto, tahun_angkatan, status
		) VALUES ('$kodeBaru', '$txtNis', '$txtNama', '$cmbKelamin', '$cmbAgama', '$txtTempatLahir', '".InggrisTgl($txtTanggal)."' , '$txtAlamat', '$txtNoTelepon', '$file_foto', '$cmbAngkatan', '$cmbStatus') ";
		$myQry = mysql_query($mySql, $koneksidb) or die("gagal Query!".mysql_error());
		if ($myQry) {
			#refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=Data-Siswa'>";
		}
		exit;
	}
}
#Membuat Nilai pada Form
$dataKode = buatKode("siswa", "S");
$dataNis = isset($_POST['txtNis']) ? $_POST['txtNis'] : '';
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : '';
$dataAgama = isset($_POST['cmbAgama']) ? $_POST['cmbAgama'] : '';
$dataTempatLahir = isset($_POST['txtTempatLahir']) ? $_POST['txtTempatLahir'] : '';
$dataTanggal = isset($_POST['txtTanggal']) ? $_POST['txtTanggal'] : date('d-m-Y');
$dataAlamat = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataNoTelepon = isset($_POST['txtNoTelepon']) ? $_POST['txtNoTelepon'] : '';
$dataAngkatan = isset($_POST['cmbAngkatan']) ? $_POST['cmbAngkatan'] : date('Y');
$dataStatus = isset($_POST['cmbStatus']) ? $_POST['cmbStatus'] : '';

?>

<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>UBAH DATA SISWA</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" enctype = "multipart/form-data" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				    <input type="hidden" name="txtKode" value="<?php echo $dataKode; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="txtNis">NIS</label>
				  	<input class="form-control" name="txtNis" value="<?php echo $dataNis;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtNama">Nama Siswa</label>
				  	<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" required />
				  </div>
				  
				  <div class="form-group">
				  	<label for="cmbKelamin">Jenis Kelamin</label>
				  	<select class="form-control" id="cmbKelamin" name="cmbKelamin">
						<?php
						$pilihan = array("Laki-laki", "Perempuan");
						foreach ($pilihan as $kelamin) {
							if ($dataKelamin == $kelamin) {		
								$cek = "selected";
								} else {$cek = "";}
							echo "<option value='$kelamin' $cek> $kelamin </option> ";
							}
						?>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="cmbAgama">Agama</label>
				  	<select class="form-control" id="cmbAgama" name="cmbAgama">
						<?php
						$pilihan = array("Islam", "Kristen", "Katolik", "Hindu", "Budha");
							foreach ($pilihan as $agama) {
							if ($dataAgama == $agama) {		
								$cek = "selected";
								} else {$cek = "";}
							echo "<option value='$agama' $cek> $agama </option> ";
							}
						?>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="txtTempatLahir">Tempat Tanggal Lahir</label>
				  	<input class="form-control" name="txtTempatLahir" value="<?php echo $dataTempatLahir; ?>" required />
				  	<input name="txtTanggal" class="form-control tcal" value="<?php echo $dataTanggal; ?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtAlamat">Alamat</label>
				  	<input class="form-control" name="txtAlamat" value="<?php echo $dataAlamat;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtNoTelepon">Nomor Telepon</label>
				  	<input class="form-control" name="txtNoTelepon" value="<?php echo $dataNoTelepon;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="namaFile">Foto Siswa</label>
				  	<input type="file" name="namaFile" > <input type="hidden" name="txtNamaFile" value="<?php echo $myData['foto']; ?>">
				  </div>
				  <div class="form-group">
				  	<label for="cmbAngkatan">Angkatan</label>
				  	<select class="form-control" id="cmbAngkatan" name="cmbAngkatan">
						<?php
						for ($thn=date('Y') - 4; $thn<=date('Y'); $thn++) {
							if ($thn == $dataAngkatan) {
								$cek = "selected";
								} else {$cek = "";}
							echo "<option value='$thn' $cek> $thn </option> ";
							}
						?>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="cmbStatus">Status</label>
				  	<select class="form-control" id="cmbStatus" name="cmbStatus">
						<?php
						$pilihan = array("Aktif", "Lulus", "Keluar");
						foreach ($pilihan as $status) {
							if ($dataStatus == $status) {		
								$cek = "selected";
								} else {$cek = "";}
							echo "<option value='$status' $cek> $status </option> ";
							}
						?>
				  	</select>
				  </div>
				  <button type="submit" name="btnSimpan" class="btn btn-primary">SIMPAN</button>
				  <button type="button" onclick="location.href='?open=Data-Siswa'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>


