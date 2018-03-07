<?php include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';
ob_start();

$datasiswa = $_GET['kdsiswa'];
$dataKelas = isset($_GET['kdkelas']) ? $_GET['kdkelas'] : '';

$dataSemester = isset($_GET['sem']) ? $_GET['sem'] : '';

$filterSQL = "";
if(isset($_GET['kdsiswa'])){
  $filterSQL= "WHERE nilai.kode_siswa = '$datasiswa' ";
}
elseif (isset($_GET['kdkelas'])) {
  $filterSQL = "WHERE nilai.kode_kelas = '$dataKelas' AND nilai.kode_siswa='$datasiswa' ";
}elseif (isset($_GET['sem'])) {
  $filterSQL = "WHERE nilai.kode_kelas = '$dataKelas'  AND nilai.semester = '$dataSemester' AND nilai.kode_siswa='$datasiswa'";
}
else {
  $filterSQL = "";
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
<h3>Laporan Nilai</h3>
<?php 
              $mySql = "SELECT nilai.*, pelajaran.nama_pelajaran, kelas.kode_kelas, kelas.kelas, kelas.nama_kelas, siswa.nama_siswa, siswa.nis, nilai.nilai_tugas1, nilai.nilai_tugas2, nilai.kepribadian, nilai.nilai_uts, nilai.nilai_uas, nilai.semester
                FROM nilai
                JOIN siswa ON (nilai.kode_siswa=siswa.kode_siswa)
                JOIN kelas ON (nilai.kode_kelas=kelas.kode_kelas)
                JOIN pelajaran ON (nilai.kode_pelajaran=pelajaran.kode_pelajaran) $filterSQL ORDER BY nilai.kode_pelajaran ASC ";

$myQry = mysql_query($mySql, $koneksidb) or die ("gagal Query ".mysql_error());
$data=mysql_fetch_array($myQry);

 ?>

 <div><p>Nama : <?php echo $data['nama_siswa'];  ?></p>
 <p>Nis : <?php echo $data['nis']; ?></p>
 <p>Kelas : <?php echo $data['kelas'] ." ".$data['nama_kelas'];?></p>
 <p>Semester : <?php echo $data['semester']; ?></p></div>

<table>
  <tr>
  <th>No</th>
    
            <th>Mata Pelajaran</th>
           <th>Nilai Tugas 1</th>
          <th>Nilai Tugas 2</th>
           <th>Kepribadian</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
  </tr>
  <?php 

/*$sql=mysql_query("SELECT  nilai.*, pelajaran.nama_pelajaran, nilai.nilai_tugas1,nilai.nilai_tugas2,nilai.kepribadian, nilai.nilai_uts,nilai_uas FROM nilai LEFT JOIN pelajaran ON nilai.kode_pelajaran=pelajaran.kode_pelajaran $filterSQL ORDER BY kode_pelajaran");*/

        
$no=0;
$total_nilai=0;

$myQry2 = mysql_query($mySql, $koneksidb) or die ("gagal Query ".mysql_error());
while($myData=mysql_fetch_array($myQry2)){
 $no++;
   
   $total_nilai=($myData['nilai_tugas1']+$myData['nilai_tugas2']+$myData['kepribadian']+$myData['nilai_uts']+$myData['nilai_uas'])/5;
  ?>
  <tr>
  <td><?php echo $no; ?></td>
                <td><?php echo $myData['nama_pelajaran']; ?></td>
          
          <td> <?php echo $myData['nilai_tugas1']; ?> </td>
          <td> <?php echo $myData['nilai_tugas2']; ?> </td>
          <td> <?php echo $myData['kepribadian']; ?> </td>
          <td> <?php echo $myData['nilai_uts']; ?> </td>
          <td> <?php echo $myData['nilai_uas']; ?> </td>
          <td> <?php echo $total_nilai; ?> </td>

  </tr>


 <?php
 

  } ?>
 
</table>
<?php ?>
</body>
</html><?php

$html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("laporan_nilai_siswa.pdf");
 ?>