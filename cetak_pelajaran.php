<?php include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';
$query=mysql_query("SELECT * FROM pelajaran ORDER BY kode_pelajaran"); 
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
<h3>Laporan Data Pelajaran</h3>

 <?php for ($hal=1; $hal<=$jmlhal; $hal++) {  ?>
<table style="page-break-after:always;">
<thead>
  <tr>
  <th>No</th>
    <th>Nama Pelajaran</th>
    <th>Keterangan</th>
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
    <td><?php echo $data['nama_pelajaran']; ?></td>
    <td><?php echo $data['keterangan'];?></td>
  </tr>
   <?php  } ?>
</tbody>

</table>
<?php }?>
</body>
</html>
<?php $html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_pelajaran.pdf"); ?>