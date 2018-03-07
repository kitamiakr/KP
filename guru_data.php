<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

$baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql = "SELECT * FROM guru";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("Gagal Query!".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai = $baris * ($hal-1);

?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Guru</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Guru-Add" target="_self" class="btn btn-primary">Tambah Data</a>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>Kode</th>
	                <th>NIP</th>
	                <th>Nama Guru</th>
	                <th>Jenis Kelamin</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Kode</th>
	                <th>NIP</th>
	                <th>Nama Guru</th>
	                <th>Jenis Kelamin</th>
	                <th>Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
			<?php
				$mySql = "SELECT * FROM guru ORDER BY kode_guru ASC LIMIT $mulai, $baris";
				$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query!".mysql_error());
				$nomor = $mulai;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
					$Kode = $myData['kode_guru'];
				?>


				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['kode_guru']; ?></td>
					<td><?php echo $myData['nip']; ?></td>
					<td><?php echo $myData['nama_guru']; ?></td>
					<td><?php echo $myData['kelamin']; ?></td>
					<td class="text-center">
					<a href="?open=Guru-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Guru-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	</table>
</div>

