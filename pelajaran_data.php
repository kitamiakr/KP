<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Pelajaran</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Pelajaran-Add" target="_self" class="btn btn-primary">Tambah Data</a>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>Kode</th>
	                <th>Nama Pelajaran</th>
	                <th>Keterangan</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Kode</th>
	                <th>Nama Pelajaran</th>
	                <th>Keterangan</th>
	                <th>Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
			<?php
				$mySql = "SELECT * FROM pelajaran ORDER BY kode_pelajaran ASC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal! ". mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
					$Kode = $myData['kode_pelajaran'];

				?>
				<tr>
					<td> <?php echo $nomor; ?></td>
					<td> <?php echo $myData['kode_pelajaran']; ?></td>
					<td> <?php echo $myData['nama_pelajaran']; ?> </td>
					<td> <?php echo $myData['keterangan']; ?></td>
					<td class="text-center">
					<a href="?open=Pelajaran-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Pelajaran-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	</table>
</div>