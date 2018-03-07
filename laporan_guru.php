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
				<h4>Laporan Data Guru</h4>
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
						<th>Kelamin</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
		            </tr>
		        </thead>

		        <tfoot>
		            <tr>
		                <th>No</th>
						<th>Kode</th>
						<th>NIP</th>
						<th>Nama Guru</th>
						<th>Kelamin</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
		            </tr>
		        </tfoot>

		        <tbody>
					<?php
					$mySql = "SELECT * FROM guru ORDER BY kode_guru ASC LIMIT $mulai, $baris ";
					$myQry = mysql_query($mySql, $koneksidb) or die ("GAGAL Koneksi~!".mysql_error());
					$nomor = $hal;
					while ($myData = mysql_fetch_array($myQry)) {
						$nomor++;
						$Kode = $myData['kode_guru'];
					?>
					<tr>
						<td> <?php echo $nomor; ?> </td>
						<td> <?php echo $myData['kode_guru']; ?> </td>
						<td> <?php echo $myData['nip']; ?> </td>
						<td> <?php echo $myData['nama_guru']; ?> </td>
						<td> <?php echo $myData['kelamin']; ?> </td>
						<td> <?php echo $myData['alamat']; ?> </td>
						<td> <?php echo $myData['no_telepon']; ?> </td>
					</tr>
				<?php } ?>
		    </tbody>
	</table>
	<div style="margin-bottom: 20px; "><a href="cetak_guru.php" class="btn btn-success">cetak guru</a></div>
</div>