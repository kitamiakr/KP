<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

#tahun Terpilih
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$dataAjaran = isset($_POST['cmbAjaran']) ? $_POST['cmbAjaran'] : $tahun;
if (isset($dataAjaran)) {
	$filterSql = "WHERE kelas.tahun_ajar = '$dataAjaran' ";
} else {
	$filterSql = "";
}



?>
<div class="well">
	<div class="row">
			<div class="col-md-6 text-left">
				<h4>Laporan Data Kelas</h4>
			</div>
	</div>
	<br/>
		
	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
			<thead>
		            <tr>
		                <th width="30px"> No </th>
						<th> Kode </th>
						<th> Tahun Ajaran </th>
						<th> Nama Kelas </th>
						<th> Qty Siswa </th>
						<th> Wali Kelas </th>
		            </tr>
		        </thead>

		        <tfoot>
		            <tr>
		                <th width="30px"> No </th>
						<th> Kode </th>
						<th> Tahun Ajaran </th>
						<th> Nama Kelas </th>
						<th> Qty Siswa </th>
						<th> Wali Kelas </th>
		            </tr>
		        </tfoot>

		        <tbody>
					<?php
					#menampilkan data kelas
					$mySql = "SELECT kelas. *, guru.nama_guru FROM kelas LEFT JOIN guru ON kelas.kode_guru = guru.kode_guru $filterSql ORDER BY kelas.tahun_ajar, kelas.kode_kelas ASC";
					$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal!".mysql_error());
					$nomor = 0;
					while ($myData = mysql_fetch_array($myQry)) {
						$nomor++;
						$Kode = $myData['kode_kelas'];

						#sub skrip menghitung data siswa
						$my2Sql = "SELECT COUNT(*) AS total_siswa FROM kelas_siswa WHERE kode_kelas = '$Kode'";
						$my2Qry = mysql_query($my2Sql, $koneksidb) or die ("gagal Query ".mysql_error());
						$my2Data = mysql_fetch_array($my2Qry);
					?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['kode_kelas']; ?></td>
					<td><?php echo $myData['tahun_ajar']; ?></td>
					<td><?php echo $myData['kelas']."-".$myData['nama_kelas']; ?></td>
					<td><?php echo $my2Data['total_siswa']; ?></td>
					<td><?php echo $myData['nama_guru']; ?></td>
				</tr>
				<?php } ?>
		    </tbody>
		</table>
		<div style="margin-bottom: 20px; "><a href="cetak_kelas.php" class="btn btn-success">cetak data kelas</a></div>
</div>
