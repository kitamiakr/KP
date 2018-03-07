<?php include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';
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
<h3>Laporan User</h3>


<table>
  <tr>
  <th>No</th>
    <th>Nama User</th>
    <th>Username</th>
  </tr>
  <?php 

$query=mysql_query("SELECT * FROM user ORDER BY kode_user");
$no=0;
while($data=mysql_fetch_array($query)){
	 $no++;
  ?>
  <tr>
  <td><?php echo $no; ?></td>
    <td><?php echo $data['nama_user']; ?></td>
    <td><?php echo $data['username'];?></td>
  </tr>

 <?php  } ?>
</table>
<?php ?>
</body>
</html>
<?php

$html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_user.pdf");
 ?>