<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data User</h4>
		</div>
		<?php 
		if ($_SESSION['SES_ADMIN'] == "admin") { ?>
			<div class="col-md-6 text-right" style="margin-top: 50px;">
				<a href="?open=User-Add" target="_self" class="btn btn-primary">Tambah Data</a>
			</div>
			<?php } ?>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>Kode</th>
	                <th>Nama User</th>
	                <th>Username</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Kode</th>
	                <th>Nama User</th>
	                <th>Username</th>
	                <th>Tools</th>
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
					<td class="text-center">
					<?php
					if ($_SESSION['SES_LOGIN'] == $myData['kode_user']) {
						if ($_SESSION['SES_ADMIN'] != "admin" || $_SESSION['SES_ADMIN'] == "admin"  )  { ?>
						<a href="?open=User-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<?php } } ?>
					<?php 
					if ($_SESSION['SES_ADMIN'] == "admin") {
						if ($myData['username'] != "admin") {
							?>
						<a href="?open=User-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href="?open=User-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							<?php
						} }
						?>
					</td>
				</tr>
			<?php } ?>
	    </tbody>

	</table>
</div>