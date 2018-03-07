<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";

?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Prestasi</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Prestasi-Add" target="_self" class="btn btn-primary">Tambah Prestasi</a>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>gambar</th>
	                <th>Judul Prestasi</th>
	                <th>Tanggal Prestasi</th>
	                <th>Isi Prestasi</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th width="30px">No</th>
	                <th>gambar</th>
	                <th>Judul Prestasi</th>
	                <th>Tanggal Prestasi</th>
	                <th>Isi Prestasi</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
			<?php
				$mySql = "SELECT * FROM prestasi ORDER BY tanggal_pres DESC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal! ". mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
				

$tgl=$myData['tanggal_pres'];
$day=date('D',strtotime($tgl));
$hari= array(
  'Sun' => 'Minggu',
  'Mon' => 'Senin',
  'Tue' => 'Selasa',
  'Wed' => 'Rabu',
  'Thu' => 'Kamis',
  'Fri' => 'Jumat',
  'Sat' => 'Sabtu'
);
$tgl_bulan=$myData['tanggal_pres'];
$bulan_name=date('d F Y ', strtotime($tgl_bulan));
$bulan = array (  'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );

$tahun = substr($tgl_bulan, 0, 4);
  $bulan1 = substr($tgl_bulan, 5, 2);
  $tgl1   = substr($tgl_bulan, 8, 2);
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1-1] . " ". $tahun;
$isi=$myData['isi_pres'];
$Kode=$myData['id_prestasi'];

				?>
				<tr>
					<td> <?php echo $nomor; ?></td>
					<td> <img src="gambar2/<?php echo $myData['gambar']; ?>" class="img-responsive" style="width:350px; height: 150px;" alt="Image"></td>
					<td> <?php echo $myData['judul_pres']; ?> </td>
					<td> <?php echo $hari[$day] .', '. $result;  ?> </td>
					<td> <?php echo substr($isi, 0,200); ?><span>...</span></td>
					<td class="text-center">
					<a href="?open=Prestasi-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Prestasi-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	</table>
</div> 