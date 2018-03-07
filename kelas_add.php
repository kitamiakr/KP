<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {
	$cmbKelas = $_POST['cmbKelas'];
	$txtNamaKls = $_POST['txtNamaKls'];
	$txtNamaKls = str_replace("'", "&acute;", $txtNamaKls);
	$txtTahunAjar = $_POST['txtTahunAjar'];
	$cmbGuru = $_POST['cmbGuru'];

	$pesanError = array();
	if (trim($cmbKelas)=="KOSONG") {
		$pesanError[] = "Data kelas kosong!";
	}
	if (trim($cmbGuru)=="KOSONG") {
		$pesanError[] = "Data guru kosong!";
	}
	if (! isset($_POST['cbSiswa'])) {
		$pesanError = "Data siswa belum anda isi!";
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
	}
	else {
		#SIMPAN KE DATABASE
		//simpan kea tabel kelas
		$kodeKelas = buatKode("kelas", "K");
		$mySql = "INSERT INTO kelas (kode_kelas, kelas, nama_kelas, tahun_ajar, kode_guru) VALUES ('$kodeKelas', '$cmbKelas', '$txtNamaKls', '$txtTahunAjar', '$cmbGuru')";
		$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());

		//membaca data dari checkbox
		$cbSiswa = $_POST['cbSiswa'];
		$jumlahTerpilih = count($cbSiswa);

		foreach ($cbSiswa as $kodeSiswa) {
			//perintah untuk mendapatkan relasi
			$mySql = "SELECT * FROM kelas_siswa WHERE kode_kelas = '$kodeKelas' AND kode_siswa = '$kodeSiswa'";
			$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query ".mysql_error());

			//gejala baru yang akan disimpan
			if (mysql_num_rows($myQry) <1) {
				$tambahSql = "INSERT INTO kelas_siswa (kode_kelas, kode_siswa) VALUES ('$kodeKelas','$kodeSiswa')";
				mysql_query($tambahSql, $koneksidb) or die ("gagal query".mysql_error());
				// refresh
				echo "<meta http-equiv='refresh' content='0; url=?open=Data-Kelas'>";
			}
		}
	}
}


#MEMBUAT NILAI VARIABLE
$dataKode = buatKode("kelas", "K");
$dataKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
$dataNamaKls = isset($_POST['txtNamaKls']) ? $_POST['txtNamaKls'] : '';
$dataTahunAjar = isset($_POST['txtTahunAjar']) ? $_POST['txtTahunAjar'] : '';
$dataGuru = isset($_POST['cmbGuru']) ? $_POST['cmbGuru'] : '';
$dataAngkatan = isset($_POST['txtTahunAjar']) ? $_POST['txtTahunAjar'] : date('Y');



?>


<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>TAMBAH DATA KELAS</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				    <input type="hidden" name="txtKode" value="<?php echo $dataKode; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="txtTahunAjar">Tahun Ajaran</label>
				  	<select class="form-control" id="txtTahunAjar" name="txtTahunAjar">
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
				  	<label for="cmbKelas" class="col-md-6">Pilih Kelas</label>
				  	<label for="txtNamaKls" class="col-md-6">   Nama Kelas</label>
					  	<div class="row">
					  	<div class="col-md-6">
						  	<select name="cmbKelas" class="form-control" id="cmbKelas"">
							  	<?php
								$pilihan = array("I", "II", "III", "IV", "V", "VI");
								foreach ($pilihan as $kelas) {
									if ($dataKelas==$kelas) {
										$cek = "selected";
									} else {$cek = "";}
								echo "<option value = '$kelas' $cek>$kelas </option>";
								}
								?>
						  	</select>
						  	</div>
						  	<div class="col-md-6">
						  	<input type="text" class="form-control" name="txtNamaKls" value="<?php echo $dataNamaKls; ?>" required />
						  	</div>
					  	</div>
				  </div>
				  <div class="form-group">
				  	<label for="cmbGuru">Guru Wali Kelas</label>
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

					<div class="well">
						<label for="select-all">Check All</label>
						<input type="checkbox" name="select-all" id="select-all" />
						<table width="100%" class="table table-striped table-bordered" id="tabeldata">
							<thead>
						            <tr>
						                <th width="30px">No</th>
						                <th>Pilih</th>
						                <th>NIS</th>
						                <th>Nama Siswa</th>
						                <th>Jenis Kelamin</th>
						                <th>Agama</th>
						                <th>Angkatan</th>
						                <th width="100px" >Kelas</th>
						            </tr>
						        </thead>

						        <tfoot>
						            <tr>
						                <th>No</th>
						                <th>Pilih</th>
						                <th>NIS</th>
						                <th>Nama Siswa</th>
						                <th>Jenis Kelamin</th>
						                <th>Agama</th>
						                <th>Angkatan</th>
						                <th>Kelas</th>
						            </tr>
						        </tfoot>

						        <tbody>
								<?php
								//menampilkan semua data siswa yang ada
								$bacaSql = "SELECT * FROM siswa ORDER BY kode_siswa ASC";
								$bacaQry = mysql_query($bacaSql, $koneksidb) or die ("Gagal Query!".mysql_error());
								$nomor = 0;
								while ($bacaData = mysql_fetch_array($bacaQry)) {
									$nomor++;
									$kodeSiswa = $bacaData['kode_siswa'];

									//skrip membaca posisi kelas siswa
									$infoSql = "SELECT kelas.* FROM kelas, kelas_siswa WHERE kelas.kode_kelas = kelas_siswa.kode_kelas AND  kelas_siswa.kode_siswa = '$kodeSiswa'";
									$infoQry = mysql_query($infoSql, $koneksidb) or die ("Gagal Koneksi".mysql_error());
									$infoData = mysql_fetch_array($infoQry);

									//Status mematikan checkbox jika sudah memiliki kelas
									$mati ="";
									if (mysql_num_rows($infoQry) >=1) {
										$mati = " disabled";
									}

								?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td>
										<input type="checkbox" name="cbSiswa[]" value="<?php echo $kodeSiswa; ?>">
									</td>
									<td><?php echo $bacaData['nis']; ?></td>
									<td><?php echo $bacaData['nama_siswa']; ?></td>
									<td><?php echo $bacaData['kelamin']; ?></td>
									<td><?php echo $bacaData['agama']; ?></td>
									<td><?php echo $bacaData['tahun_angkatan']; ?></td>
									<td><?php echo $infoData['kelas']."-".$infoData['nama_kelas']; ?></td>
								</tr>
								<?php } ?>
						    </tbody>
						</table>
						<button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
						<button type="button" onclick="location.href='?open=Data-Kelas'" class="btn btn-success">Kembali</button>
					</div>
				</form>
			  
		  </div>
	</div>