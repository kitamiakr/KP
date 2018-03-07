<?php 

include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';


$query=mysql_query("SELECT * FROM guru ORDER BY kode_guru");
$jmldata  = mysql_num_rows($query);
$jmlbaris = 13;
$jmlbarispertama = 10;
$jmlhal   = (($jmldata-$jmlbarispertama) / $jmlbaris) + 2;
$no=0;
ob_start();
  ?>
<!DOCTYPE html>
<html>
<head>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #2980b9;
    color: white;
}
h2,h4{
	text-align: center;
}
</style>
</head>
<body>
<?php include 'kop_header_lap.php'; ?>

<br>
<h3>Laporan Data Guru</h>
 <?php for ($hal=1; $hal<=$jmlhal; $hal++) {  ?>
<table style="page-break-after:always;">
  <thead>
  <tr>

  <th>No</th>
    <th>NIP</th>
    <th>Nama Guru</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>No. Telp</th>
    <th>Status Aktif</th>
  </tr>
  </thead>
  <tbody>
  <?php 



 
          $maks = ($hal==1) ? $jmlbarispertama : $jmlbaris;
          for($n=1;$n<=$maks;$n++){ 
            if($no >= $jmldata) continue;
            $data=mysql_fetch_array($query);
    
  ?>
  <tr>
   <td><?php echo ++$no; ?></td>
    <td><?php echo $data['nip']; ?></td>
    <td><?php echo $data['nama_guru']; ?></td>
    <td><?php echo $data['kelamin'];?></td>
    <td><?php echo $data['alamat'];?></td>
    <td><?php echo $data['no_telepon'];?></td>
    <td><?php echo $data['status_aktif'];?></td>
  </tr>
</tbody>
 <?php  } ?>
</table>
 <?php } ?>
</body>
</html>
<?php $html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_guru.pdf");?>