<?php 
include 'library/inc.connection.php';
include 'library/inc.library.php';
include 'dompdf/dompdf_config.inc.php';

$dataKelas = isset($_GET['kdkelas']) ? $_GET['kdkelas'] : '';
$filterSQL = isset($_GET['kdkelas']) ? "WHERE kelas_siswa.kode_kelas = '$dataKelas'" : "";

$mySql = "SELECT kelas_siswa.*,kelas.nama_kelas, siswa.nis,siswa.nama_siswa,siswa.kelamin,siswa.alamat,siswa.no_telepon,siswa.tahun_angkatan, kelas.kelas,kelas.nama_kelas,kelas.tahun_ajar FROM kelas_siswa LEFT JOIN siswa ON kelas_siswa.kode_siswa=siswa.kode_siswa LEFT JOIN kelas ON kelas_siswa.kode_kelas=kelas.kode_kelas $filterSQL ORDER BY kode_kelas ASC";
$query    = mysql_query($mySql, $koneksidb) or die ("Gagal Query!".mysql_error());
$kelas=mysql_fetch_array($query);
$jmldata  = mysql_num_rows($query);
$jmlbaris = 13;
$jmlbarispertama = 8;
$jmlhal   = (($jmldata-$jmlbarispertama) / $jmlbaris) + 2;
$no       = 0;

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
    <h3>Laporan Siswa Kelas <?php echo $kelas['kelas'].' '.$kelas['nama_kelas'].' Tahun Ajaran '.$kelas['tahun_ajar'];?></h3>
    <?php for ($hal=1; $hal<=$jmlhal; $hal++) {  ?>
    <table style="page-break-after:always;">
    <thead>
      <tr>
      <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Kelamin</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>Angkatan</th>
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
          <td><?php echo $data['nis']; ?></td>
          <td><?php echo $data['nama_siswa']; ?></td>
          <td><?php echo $data['kelamin']; ?></td>
          <td><?php echo $data['alamat']; ?></td>
          <td><?php echo $data['no_telepon']; ?></td>
          <td><?php echo $data['tahun_angkatan']; ?></td>
      </tr>
     <?php }  ?>
     </tbody>
    </table>
    <?php } ?>

</body>
</html>
<?php 
$html=ob_get_clean();
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_siswa.pdf");
?>