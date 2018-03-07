<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

$baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM kelas";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("Gagal Query!".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maksData = ceil($jumlah/$baris);


?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data User</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Kelas-Add" target="_self" class="btn btn-primary">Tambah Data</a>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>Kode</th>
	                <th>Tahun Ajaran</th>
	                <th>Nama Kelas</th>
	                <th>Siswa</th>
	                <th>Wali Kelas</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Kode</th>
	                <th>Tahun Ajaran</th>
	                <th>Nama Kelas</th>
	                <th>Siswa</th>
	                <th>Wali Kelas</th>
	                <th>Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
				<?php
					#menampilkan data kelas
					$mySql = "SELECT kelas. *, guru.nama_guru FROM kelas LEFT JOIN guru ON kelas.kode_guru = guru.kode_guru ORDER BY kelas.tahun_ajar, kelas.kode_kelas ASC LIMIT $hal, $baris";
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
					<td class="text-center">
					<a href="?open=Kelas-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Kelas-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	</table>
</div>


