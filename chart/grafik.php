
<?php include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include 'library/inc.connection.php';?>
<!--Fungsi Load Javascript fusioncharts-->
<script type="text/javascript" src="chart/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="chart/JS/jquery.fusioncharts.js"></script>
<body style="background-color: white;">
<div class="container" style="width: 100%; background-color: white; height: 100%;">
<!--GRAFIK JUMLAH SISWA PER KELAS-->
<div class="tengah_judul" style="margin-top: 80px;"><h3>
   	Grafik Jumlah Siswa Setiap Kelas</h3><hr align="left" size="1" color="#cccccc">
</div>

<table id="TableSiswa" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Kelas</th> <th>Jumlah Siswa</th></tr>
    <?php
	//KONEKSI KE DATABASE
	
	//QUERY AMBIL DATA KELAS
    $query_kelas = "SELECT * FROM kelas";
    $result_kelas = mysql_query($query_kelas);
    $count_kelas = mysql_num_rows($result_kelas);

    while ($data = mysql_fetch_array($result_kelas)) {
        $kode_kelas = $data['kode_kelas'];
		//QUERY MENGHITUNG JUMLAH SISWA SESUAI DENGAN KODE KELAS
        $query_siswa = "SELECT COUNT(*) AS jumlah_siswa FROM kelas_siswa WHERE kode_kelas='$kode_kelas'";
        $result_siswa = mysql_query($query_siswa);
        $data_siswa = mysql_fetch_array($result_siswa);
?>
        <tr bgcolor='#D5F35B' style='display:none;'>
              <td>Kelas <?php echo $data['kelas'].' '.$data['nama_kelas']; ?></td>
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