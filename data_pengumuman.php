<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
?>

<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Pengumuman</h4>
		</div>

		<div class="col-md-6 text-right" style="margin-top: 50px;">
			<a href="?open=Pengumuman-Add" target="_self" class="btn btn-primary">Tambah Pengumuman</a>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		<thead>
	            <tr>
	                <th width="30px">No</th>
	                <th>gambar</th>
	                <th>Judul Pengumuman</th>
	                <th>Tanggal Pengumuman</th>
	                <th>Isi Pengumuman</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </thead>

	        <tfoot>
	            <tr>
	                <th width="30px">No</th>
	                <th>gambar</th>
	                <th>Judul Pengumuman</th>
	                <th>Tanggal Pengumuman</th>
	                <th>Isi Pengumuman</th>
	                <th width="100px">Tools</th>
	            </tr>
	        </tfoot>

	        <tbody>
			<?php
				$mySql = "SELECT * FROM pengumuman ORDER BY tanggal_peng DESC";
				$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal! ". mysql_error());
				$nomor = 0;
				while ($myData = mysql_fetch_array($myQry)) {
					$nomor++;
				

$tgl=$myData['tanggal_peng'];
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
$tgl_bulan=$myData['tanggal_peng'];
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
  $result = $tgl1 . " " . $bulan[(int)$bulan1] . " ". $tahun;
$isi=$myData['isi_peng'];
$Kode=$myData['id_peng'];
				?>
				<tr>
					<td> <?php echo $nomor; ?></td>
					<td> <img src="gambar/<?php echo $myData['gambar']; ?>" class="img-responsive" style="width:350px; height: 150px;" alt="Image"></td>
					<td> <?php echo $myData['judul_peng']; ?> </td>
					<td> <?php echo $hari[$day] .', '. $result;  ?> </td>
					<td> <?php echo substr($isi, 0,200); ?><span>...</span></td>
					<td class="text-center">
					<a href="?open=Pengumuman-Edit&Kode=<?php echo $Kode; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="?open=Pengumuman-Delete&Kode=<?php echo $Kode;?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			<?php } ?>
	    </tbody>
	</table>
</div> 