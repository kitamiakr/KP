<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

?>
<div class="well">
	<div class="row">
			<div class="col-md-6 text-left">
				<h4>Laporan Data Pelajaran</h4>
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
		            </tr>
		        </thead>

		        <tfoot>
		            <tr>
		                <th>No</th>
		                <th>Kode</th>
		                <th>Nama Pelajaran</th>
		                <th>Keterangan</th>
		            </tr>
		        </tfoot>

		        <tbody>
				<?php
				$mySql = "SELECT * FROM pelajaran ORDER BY kode_pelajaran ASC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("GAGAL Koneksi~!".mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
				
				?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $myData['kode_pelajaran']; ?> </td>
					<td> <?php echo $myData['nama_pelajaran']; ?> </td>
					<td> <?php echo $myData['keterangan']; ?> </td>
				</tr>
				<?php } ?>
		    </tbody>
		</table>
		<div style="margin-bottom: 20px; "><a href="cetak_pelajaran.php" class="btn btn-success">cetak pelajaran</a></div>
	</div>