<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#Tahun Terpilih

$dataSemester = isset($_POST['cmbSemester']) ? $_POST['cmbSemester'] : '';

$dataKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
$filterSQL = "";
if (isset($_POST['btnPilih1'])) {
	$filterSQL = "WHERE nilai.kode_kelas = '$dataKelas'";
}

elseif (isset($_POST['btnPilih3'])) {
	$filterSQL = "WHERE nilai.kode_kelas = '$dataKelas'  AND nilai.semester = '$dataSemester' ";
}
else {
	$filterSQL = "";
}
?>


<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Laporan Data Nilai</h4>
		</div>
	</div>
	<br/>
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
					<th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
					<th width="30px">No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th width="100px">Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
				<?php 
				//skrip menampilkan data dari tabel
				$mySql = "SELECT nilai.*,  siswa.nama_siswa, siswa.nis, nilai.semester, nilai.kode_kelas FROM nilai LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa $filterSQL GROUP BY siswa.nama_siswa";
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
					<td class="text-center">
					<a href="cetak_nilai.php?kdsiswa=<?php echo $myData['kode_siswa']; ?> & kdkelas=<?php echo $dataKelas; ?> & sem=<?php echo $dataSemester;?>" >
					<span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>

	</table>
</div>