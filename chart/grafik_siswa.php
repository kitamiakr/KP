<script type="text/javascript" src="chart/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="chart/JS/jquery.fusioncharts.js"></script>
<body style="background-color: white;">
<div class="container" style="width: 100%; background-color: white; height: 100%;">
<!--GRAFIK JUMLAH SISWA PER KELAS-->
<div class="tengah_judul" style="margin-top: 80px;"><h3>
    Grafik Peningkatan Jumlah Siswa SD Muhammadiyah Kayen</h3><hr align="left" size="1" color="#cccccc">
</div>

<table id="TableSiswa" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Angkatan</th> <th>Jumlah Siswa</th></tr>
    <?php
  //KONEKSI KE DATABASE
  
  //QUERY AMBIL DATA KELAS
    $query_kelas = "SELECT * FROM siswa GROUP BY tahun_angkatan";
    $result_kelas = mysql_query($query_kelas);
    $count_kelas = mysql_num_rows($result_kelas);

    while ($data = mysql_fetch_array($result_kelas)) {
        $kode_siswa = $data['tahun_angkatan'];
    //QUERY MENGHITUNG JUMLAH SISWA SESUAI DENGAN KODE KELAS
        $query_siswa = "SELECT COUNT(*) AS jumlah_siswa FROM siswa WHERE tahun_angkatan='$kode_siswa'";
        $result_siswa = mysql_query($query_siswa);
        $data_siswa = mysql_fetch_array($result_siswa);
?>
        <tr bgcolor='#D5F35B' style='display:none;'>
              <td>Angkatan <?php echo $data['tahun_angkatan']; ?></td>
              <td align='center'><?php echo $data_siswa['jumlah_siswa'];?></td>
              </tr>
              <?php
    }
    ?>

</table>
</div>
<!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script type="text/javascript">
    $('#TableSiswa').convertToFusionCharts({
        swfPath: "chart/Charts/",
        type: "MSColumn3D",
        data: "#TableSiswa",
        dataFormat: "HTMLTable"
    });
</script>
</body>