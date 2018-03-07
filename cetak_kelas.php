<?php include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';
ob_start();

$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$dataAjaran = isset($_POST['cmbAjaran']) ? $_POST['cmbAjaran'] : $tahun;
if (isset($dataAjaran)) {
  $filterSql = "WHERE kelas.tahun_ajar = '$dataAjaran' ";
} else {
  $filterSql = "";
}


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
<h3>Laporan Data Kelas</h3>


<table>
  <tr>
  <th width="30px"> No </th>
            <th> Tahun Ajaran </th>
            <th> Nama Kelas </th>
            <th> Qty Siswa </th>
            <th> Wali Kelas </th>
  </tr>
  <?php 



  $mySql = "SELECT kelas. *, guru.nama_guru FROM kelas LEFT JOIN guru ON kelas.kode_guru = guru.kode_guru $filterSql ORDER BY kelas.tahun_ajar, kelas.kode_kelas ASC";
          $myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal!".mysql_error());
         
$no=0;
while($myData = mysql_fetch_array($myQry)){
	 $no++;
   $Kode = $myData['kode_kelas'];

            #sub skrip menghitung data siswa
            $my2Sql = "SELECT COUNT(*) AS total_siswa FROM kelas_siswa WHERE kode_kelas = '$Kode'";
            $my2Qry = mysql_query($my2Sql, $koneksidb) or die ("gagal Query ".mysql_error());
            $my2Data = mysql_fetch_array($my2Qry);
  ?>
  <tr>
 <td><?php echo $no; ?></td>
          <td><?php echo $myData['tahun_ajar']; ?></td>
          <td><?php echo $myData['kelas']."-".$myData['nama_kelas']; ?></td>
          <td><?php echo $my2Data['total_siswa']; ?></td>
          <td><?php echo $myData['nama_guru']; ?></td>
  </tr>

 <?php  } ?>
</table>
<?php?>
</body>
</html>
<?php
$html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_kelas.pdf");

 ?>