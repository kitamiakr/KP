<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

?>
<div class="well">
	<div class="row">
			<div class="col-md-6 text-left">
				<h4>Laporan Data User</h4>
			</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
			<thead>
		            <tr>
		                <th width="30px">No</th>
		                <th>Kode</th>
		                <th>Nama User</th>
		                <th>Username</th>
		            </tr>
		        </thead>

		        <tfoot>
		            <tr>
		                <th>No</th>
		                <th>Kode</th>
		                <th>Nama User</th>
		                <th>Username</th>
		            </tr>
		        </tfoot>

		        <tbody>
				<?php
					$mySql = "SELECT * FROM user ORDER BY kode_user ASC";
					$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal! ". mysql_error());
					$nomor = 0;
					while ($myData = mysql_fetch_array($myQry)) {
						$nomor++;
						$Kode = $myData['kode_user'];

					?>
					<tr>
						<td> <?php echo $nomor; ?></td>
						<td> <?php echo $myData['kode_user']; ?></td>
						<td> <?php echo $myData['nama_user']; ?> </td>
						<td> <?php echo $myData['username']; ?></td>
					</tr>
				<?php } ?>
		    </tbody>

	</table>

	<div style="margin-bottom: 20px; "><a href="cetak_user.php" class="btn btn-success">cetak user</a></div>
</div>