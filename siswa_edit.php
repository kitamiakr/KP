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
	$Kode = $_POST['txtKode'];
	$sqlCek = "SELECT * FROM siswa WHERE nis = '$txtNis' AND NOT(kode_siswa='$Kode') ";
	$qryCek = mysql_query($sqlCek, $koneksidb) or die ("Query Error".mysql_error());
	if (mysql_num_rows($qryCek) >= 1) {
		$pesanError[] = "Maaf, NIS <b> $txtNis </b> sudah ada, mohon diganti!";
	}

	if (trim($cmbKelamin)=="KOSONG") {
		$pesanError[] = "Data <b>Jenis Kelamin</b> Belum dipilih";
	}
	if (trim($cmbStatus)=="KOSONG") {
		$pesanError[] = "Data <b>Status</b> Belum dipilih";
	}
	if (trim($cmbAngkatan)=="KOSONG") {
		$pesanError[] = "Data <b>Angkatan</b> Belum dipilih";
	}
	if (trim($cmbAgama)=="KOSONG") {
		$pesanError[] = "Data <b>Agama</b> Belum dipilih";
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
		//membaca dari hidden type input
		$Kode = $_POST['txtKode'];
		#untuk simpan foto
		if (empty($_FILES['namaFile']['tmp_name'])) {
			//jika tidak ada file baru, baca nama yang sebelumnya
			$file_foto = $_POST['txtNamaFile'];
		} else { 
			//jika ada file lama, maka akan dihapus
			if (! $_POST['txtNamaFile']=="") {
				if (file_exists("foto/".$_POST['txtNamaFile'])) {
					unlink("foto/".$_POST['txtNamaFile']);
				}
			}
		}
		//membaca nama file
		$file_foto = $_FILES['namaFile']['name'];
		$file_foto = stripslashes($file_foto);
		$file_foto = str_replace("'", "", $file_foto);

		//simpan gambar
		$file_foto = $Kode.".".$file_foto;
		copy($_FILES['namaFile']['tmp_name'] , "foto/".$file_foto);

		$mySql = "UPDATE siswa SET nis = '$txtNis', nama_siswa = '$txtNama', kelamin = '$cmbKelamin', agama = '$cmbAgama', tempat_lahir = '$txtTempatLahir', tanggal_lahir = '".InggrisTgl($txtTanggal)."', alamat = '$txtAlamat', no_telepon = '$txtNoTelepon', foto = '$file_foto', tahun_angkatan = '$cmbAngkatan', status = '$cmbStatus' WHERE kode_siswa = '$Kode' ";
		$myQry = mysql_query($mySql, $koneksidb) or die("gagal Query!".mysql_error());
		if ($myQry) {
			#refresh
			echo "<meta http-equiv='refresh' content='0; url=?open=Data-Siswa'>";
		}
		exit;
	}
}

//skrip membaca variable url
$Kode = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
#menampilkan data untuk diedit
$mySql = "SELECT * FROM siswa WHERE kode_siswa = '$Kode'";
$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal !".mysql_error());
$myData = mysql_fetch_array($myQry);

#Membuat Nilai pada Form
$dataKode = $myData['kode_siswa'];
$dataNis = isset($_POST['txtNis']) ? $_POST['txtNis'] : $myData['nis'];
$dataNama = isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nama_siswa'];
$dataKelamin = isset($_POST['cmbKelamin']) ? $_POST['cmbKelamin'] : $myData['kelamin'];
$dataAgama = isset($_POST['cmbAgama']) ? $_POST['cmbAgama'] : $myData['agama'];
$dataTempatLahir = isset($_POST['txtTempatLahir']) ? $_POST['txtTempatLahir'] : $myData['tempat_lahir'];
$dataTanggal = isset($_POST['txtTanggal']) ? $_POST['txtTanggal'] : IndonesiaTgl($myData['tanggal_lahir']);
$dataAlamat = isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : $myData['alamat'];
$dataNoTelepon = isset($_POST['txtNoTelepon']) ? $_POST['txtNoTelepon'] : $myData['no_telepon'];
$dataAngkatan = isset($_POST['cmbAngkatan']) ? $_POST['cmbAngkatan'] : $myData['tahun_angkatan'];
$dataStatus = isset($_POST['cmbStatus']) ? $_POST['cmbStatus'] : $myData['status'];

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
				  <button type="submit" name="btnSimpan" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='?open=Data-Siswa'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>


