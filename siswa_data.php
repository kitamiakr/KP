<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";








?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Siswa</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Siswa-Add" target="_self" class="btn btn-primary">Tambah Data</a>
		</div>
	</div>
	<br />
	
	<table width="100%" class="table table-striped table-bordered table-hover" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>Kode</th>
	                <th>NIS</th>
	                <th>Nama Siswa</th>
	                <th>Jenis Kelamin</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Kode</th>
	                <th>NIS</th>
	                <th>Nama Siswa</th>
	                <th>Jenis Kelamin</th>
	                <th>Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
			<?php
				$mySql = "SELECT * FROM siswa ORDER BY kode_siswa ASC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query!".mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
					$Kode = $myData['kode_siswa'];
				?>


				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['kode_siswa']; ?></td>
					<td><?php echo $myData['nis']; ?></td>
					<td><?php echo $myData['nama_siswa']; ?></td>
					<td><?php echo $myData['kelamin']; ?></td>
					<td class="text-center">
					<a href="?open=Siswa-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Siswa-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	    
	</table>
	
</div>


