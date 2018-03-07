<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#Tahun Terpilih
$dataKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
$dataPelajaran = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : '';
$dataSemester = isset($_POST['cmbSemester']) ? $_POST['cmbSemester'] : '';
$filterSQL = "";
if (isset($_POST['btnPilih1'])) {
	$filterSQL = "WHERE nilai.kode_kelas = '$dataKelas'";
}
elseif (isset($_POST['btnPilih2'])) {
	$filterSQL = "WHERE nilai.kode_kelas = '$dataKelas' AND nilai.kode_pelajaran = '$dataPelajaran' ";
}
elseif (isset($_POST['btnPilih3'])) {
	$filterSQL = "WHERE nilai.kode_kelas = '$dataKelas' AND nilai.kode_pelajaran = '$dataPelajaran' AND nilai.semester = '$dataSemester' ";
}
else {
	$filterSQL = "";
}
?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Nilai</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Nilai-Add" target="_self" class="btn btn-primary">Tambah Data</a>
		</div>
	</div>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" target = "_self" method = "POST">
		<div class="form-group-sm col-md-4">
			<label for="cmbKelas">Pilih Kelas</label>
			<select name="cmbKelas" id="cmbKelas" class="form-control">
					<?php
					$dataSql = "SELECT * FROM kelas ORDER BY tahun_ajar";
					$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					while ($dataRow=mysql_fetch_array($dataQry)) {
						if ($dataRow['kode_kelas']==$dataKelas) {
							$cek = "selected";
						} else { $cek = ""; }
						echo "<option value = '$dataRow[kode_kelas]' $cek> $dataRow[kelas] | $dataRow[nama_kelas] ($dataRow[tahun_ajar]) </option>";
					}
					?>
			</select>
			<input type="submit" class="btn btn-success btn-xs" name="btnPilih1" value="Pilih" />
		</div>
	<div class="row">
		<div class="form-group-sm col-md-4">
			<label for="cmbPelajaran">Pilih Pelajaran</label>
			<select name="cmbPelajaran" id="cmbPelajaran" class="form-control">
					<?php
					$dataSql = "SELECT pelajaran.* FROM nilai, pelajaran WHERE nilai.kode_pelajaran = pelajaran.kode_pelajaran AND nilai.kode_kelas = '$dataKelas' GROUP BY nilai.kode_pelajaran ORDER BY nilai.kode_pelajaran ";
					$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					while ($dataRow=mysql_fetch_array($dataQry)) {
						if ($dataRow['kode_pelajaran']==$dataPelajaran) {
							$cek = "selected";
						} else { $cek = ""; }
						echo "<option value = '$dataRow[kode_pelajaran]' $cek> $dataRow[nama_pelajaran] </option>";
					}
					?>
			</select>
			<input type="submit" class="btn btn-success btn-xs" name="btnPilih2" value="Pilih" />
		</div>
		<div class="form-group-sm col-md-3">
			<label for="cmbSemester">Pilih Semester</label>
			<select name="cmbSemester" id="cmbSemester" class="form-control">
					<?php
					$pilihan = array ("1" => "Ganjil", "2" => "Genap");
					foreach ($pilihan as $isi => $info) {
						if ($isi == $dataSemester) {
							$cek = "selected";
						} else { $cek = ""; }
						echo "<option value='$isi' $cek> $isi - $info </option>";
					}
					?>
			</select>
			<input type="submit" class="btn btn-success btn-xs" name="btnPilih3" value="Pilih" />
		</div>
	</div>
</form>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Semester</th>
					<th>Tugas 1</th>
					<th>Tugas 2</th>
					<th>Kepribadian</th>
					<th>UTS</th>
					<th>UAS</th>
					<th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
					<th width="30px">No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Semester</th>
					<th>Tugas 1</th>
					<th>Tugas 2</th>
					<th>Kepribadian</th>
					<th>UTS</th>
					<th>UAS</th>
					<th width="100px">Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
				<?php 
				//skrip menampilkan data dari tabel
				$mySql = "SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis FROM nilai LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa $filterSQL ORDER BY semester, kode_pelajaran ASC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("gagal Query ".mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
				$nomor++;
					$Kode = $myData['id'];
				?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $myData['nis']; ?> </td>
					<td> <?php echo $myData['nama_siswa']; ?> </td>
					<td> <?php echo $myData['semester']; ?> </td>
					<td> <?php echo $myData['nilai_tugas1']; ?> </td>
					<td> <?php echo $myData['nilai_tugas2']; ?> </td>
					<td> <?php echo $myData['kepribadian']; ?> </td>
					<td> <?php echo $myData['nilai_uts']; ?> </td>
					<td> <?php echo $myData['nilai_uas']; ?> </td>
					<td class="text-center">
					<a href="?open=Nilai-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Nilai-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>

	</table>
</div>

