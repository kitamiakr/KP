<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#tombol simpan di klik
if (isset($_POST['btnSimpan'])) {
	#baca variable form
	$cmbSemester = $_POST['cmbSemester'];
	$cmbKelas = $_POST['cmbKelas'];
	$cmbPelajaran = $_POST['cmbPelajaran'];
	$cmbGuru = $_POST['cmbGuru'];
	$cmbSiswa = $_POST['cmbSiswa'];
	$txtTugas1 = $_POST['txtTugas1'];
	$txtTugas2 = $_POST['txtTugas2'];
	$txtKepribadian = $_POST['txtKepribadian'];
	$txtNilaiUTS = $_POST['txtNilaiUTS'];
	$txtNilaiUAS = $_POST['txtNilaiUAS'];
	$txtKeterangan = $_POST['txtKeterangan'];

	$pesanError = array();
	if (trim($cmbSemester) == "KOSONG") {
		$pesanError = "Data semester kosong!";
	}
	if (trim($cmbKelas) == "KOSONG") {
		$pesanError = "Data Kelas kosong!";
	}
	if (trim($cmbPelajaran) == "KOSONG") {
		$pesanError = "Data Pelajaran kosong!";
	}
	if (trim($cmbGuru) == "KOSONG") {
		$pesanError = "Data Guru kosong!";
	}
	if (trim($cmbSiswa) == "KOSONG") {
		$pesanError = "Data siswa kosong!";
	}
	#validasi nilai
	$sqlCek = "SELECT * FROM nilai WHERE semester = '$cmbSemester'
	AND kode_pelajaran = '$cmbPelajaran'
	AND kode_kelas = '$cmbKelas'
	AND kode_siswa = '$cmbSiswa'
	";
	$qryCek = mysql_query($sqlCek, $koneksidb) or die ("Gagal Query ".mysql_error());
	if (mysql_num_rows($qryCek)>=1) {
		$pesanError[] = "Data Nilai untuk siswa tersebut sudah ada!";
	}
	if (count($pesanError)>=1) {
		echo "<div class= 'mssgBox'>";
		echo "<img src = 'images/attention.png'> <br><hr>";
		$noPesan = 0;
		foreach ($pesanError as $indeks => $pesan_tampil) {
			$noPesan++;
			echo "&nbsp; $noPesan. $pesan_tampil<br>";
		}
		echo "</div> <br>";
	} else {
		#simpan data ke database
		$mySql = "INSERT INTO nilai (
		semester, kode_pelajaran, kode_guru, kode_kelas,
		kode_siswa, nilai_tugas1, nilai_tugas2, kepribadian,
		nilai_uts, nilai_uas, keterangan)
		VALUES (
		'$cmbSemester', '$cmbPelajaran', '$cmbGuru', '$cmbKelas', '$cmbSiswa',
		'$txtTugas1', '$txtTugas2', '$txtKepribadian', '$txtNilaiUTS',
		'$txtNilaiUAS', '$txtKeterangan'
		)";
		$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());
		if ($myQry) {
			echo "<meta http-equiv='refresh' content='0; url=?open=Nilai-Add'>";
		}
		exit;
	}
}


#Membuat nilai pada variable form
$dataSemester = isset($_POST['cmbSemester']) ? $_POST['cmbSemester'] : '';
$dataPelajaran = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : '';
$dataGuru = isset($_POST['cmbGuru']) ? $_POST['cmbGuru'] : '';
$dataKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
$dataSiswa = isset($_POST['cmbSiswa']) ? $_POST['cmbSiswa'] : '';
$dataTugas1 = isset($_POST['txtTugas1']) ? $_POST['txtTugas1'] : '';
$dataTugas2 = isset($_POST['txtTugas2']) ? $_POST['txtTugas2'] : '';
$dataKepribadian = isset($_POST['txtKepribadian']) ? $_POST['txtKepribadian'] : '';
$dataNilaiUTS = isset($_POST['txtNilaiUTS']) ? $_POST['txtNilaiUTS'] : '';
$dataNilaiUAS = isset($_POST['txtNilaiUAS']) ? $_POST['txtNilaiUAS'] : '';
$dataKeterangan = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';


?>

<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>MENAMBAH DATA NILAI</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <label>DATA PELAJARAN</label>
				  <div class="form-group">
				  	<label for="cmbSemester">Semester</label>
				  	<select name="cmbSemester" id="cmbSemester" class="form-control">
					  	<?php
						$pilihan = array ("1" => "Ganjil", "2" => "Genap");
						foreach ($pilihan as $isi => $info) {
							if ($isi == $dataSemester) {
								$cek = " selected";
							} else { $cek = ""; }
							echo "<option value='$isi' $cek> $isi - $info </option>";
						}
						?>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="cmbPelajaran">Pelajaran</label>
				  	<select name="cmbPelajaran" id="cmbPelajaran" class="form-control">
						<?php
						$dataSql = "SELECT * FROM pelajaran ORDER BY kode_pelajaran";
						$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query ".mysql_error());
						while ($dataRow = mysql_fetch_array($dataQry)) {
							if ($dataRow['kode_pelajaran'] == $dataPelajaran) {
								$cek = " selected";
							} else { $cek = ""; }
							echo "<option value= '$dataRow[kode_pelajaran]' $cek> $dataRow[nama_pelajaran] </option>";
						}
						?>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="cmbGuru">Guru Pelajaran</label>
				  	<select name="cmbGuru" id="cmbGuru" class="form-control">
						<?php
						$dataSql = "SELECT * FROM guru ORDER BY kode_guru";
						$dataQry = mysql_query($dataSql, $koneksidb) or die ("Koneksi Gagal!".mysql_error());
						while ($dataRow = mysql_fetch_array($dataQry)) {
							if ($dataGuru == $dataRow['kode_guru']) {
								$cek = "selected";
							}else {$cek ="";}
							echo "<option value = '$dataRow[kode_guru]' $cek>$dataRow[nama_guru] </option>";
						}
						?>
				  	</select>
				  </div>
				  <label>DATA SISWA</label>
				  <div class="form-group">
				  	<label for="cmbKelas">Pilih Kelas</label>
				  	<select name="cmbKelas" id="cmbKelas" class="form-control">
						<?php 
						$dataSql = "SELECT * FROM kelas ORDER BY tahun_ajar";
						$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query  ".mysql_error());
						while ($dataRow = mysql_fetch_array($dataQry)) {
							if ($dataRow['kode_kelas'] == $dataKelas) {
								$cek = " selected";
							} else { $cek = ""; }
							echo "<option value='$dataRow[kode_kelas]' $cek> $dataRow[kelas] | $dataRow[nama_kelas] ($dataRow[tahun_ajar]) </option>";
						}
						?>
					</select>
					<input type="submit" name="btnPilih" class="btn-success" value="Pilih">
				  </div>
				  <div class="form-group">
				  	<label for="cmbSiswa">Siswa</label>
				  	<select name="cmbSiswa" id="cmbSiswa" class="form-control">
						<?php
						$dataSql = "SELECT * FROM siswa, kelas_siswa WHERE siswa.kode_siswa = kelas_siswa.kode_siswa AND kelas_siswa.kode_kelas = '$dataKelas' ORDER BY nis";
						$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query ".mysql_error());
						while ($dataRow = mysql_fetch_array($dataQry)) {
							if ($dataRow['kode_siswa'] == $dataSiswa) {
								$cek = " selected";
							} else { $cek = ""; }
							echo "<option value='$dataRow[kode_siswa]' $cek> $dataRow[nis] - $dataRow[nama_siswa] </option>";
						}
						?>
				  	</select>
				  </div>
				  <label>INPUT NILAI</label>
				  <div class="form-group"> 
				  	<label for="txtTugas1">Nilai Tugas 1</label>
				  	<input name="txtTugas1" class="form-control" value="<?php echo $dataTugas1; ?>" />
				  </div>
				  <div class="form-group"> 
				  	<label for="txtTugas2">Nilai Tugas 2</label>
				  	<input name="txtTugas2" class="form-control" value="<?php echo $dataTugas2; ?>" />
				  </div>
				  <div class="form-group"> 
				  	<label for="txtKepribadian">Nilai Kepribadian</label>
				  	<input name="txtKepribadian" class="form-control" value="<?php echo $dataKepribadian; ?>" />
				  </div>
				  <div class="form-group"> 
				  	<label for="txtNilaiUTS">Nilai UTS</label>
				  	<input name="txtNilaiUTS" class="form-control" value="<?php echo $dataNilaiUTS; ?>" />
				  </div>
				  <div class="form-group"> 
				  	<label for="txtNilaiUAS">Nilai UAS</label>
				  	<input name="txtNilaiUAS" class="form-control" value="<?php echo $dataNilaiUAS; ?>" />
				  </div>
				  <div class="form-group"> 
				  	<label for="txtKeterangan">Keterangan</label>
				  	<input name="txtKeterangan" class="form-control" value="<?php echo $dataKeterangan; ?>" />
				  </div>

				  <button type="submit" name="btnSimpan" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='?open=Data-Nilai'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>

