
<?php 
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include 'library/inc.connection.php';
$kelas_siswa=mysql_query("SELECT * FROM kelas ");

?>
<!--
<div>
        <script src="styles/js/Chart.js/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 80%;
                
                margin: 15px auto;
                background-color: white;
                margin-top: 80px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php //while($b=mysql_fetch_array($kelas_siswa)) {
                        
                       // echo '"'.$b['kelas'].'",',
//$kode=$b['kode_kelas'];
                    } ?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php // while($p=mysql_fetch_array($kelas_siswa)){
                                $hitung_siswa//=mysql_query("SELECT COUNT(*) AS total_siswa FROM kelas_siswa WHERE kode_kelas='$kode'"),
                               // echo ' "'.$p['total_siswa'].'" ,';} ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
   </div>-->

   <canvas id="chartkurs"></canvas>
<?php
   
    /*mysql_connect($server,$username,$password) or die("Koneksi gagal");
    mysql_select_db($database) or die("Database tidak bisa dibuka");
    $query = "select * from datapenduduk";
    $result = mysql_query($query);
    $result2 = mysql_query($query);*/

    $num_results = mysql_num_rows($kelas_siswa);
    if( $num_results > 0){
  ?>
 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("chartkurs");
var myChart = new Chart(ctx, {
type:'doughnut',
data: {
 
  labels : [ 
          <?php
          while( $row = mysql_fetch_array($kelas_siswa) ){
              extract($row);
              echo '"'.$row['kelas_siswa'].'",';
          }
          ?>
        ],
  datasets : [{
    label : false,
        data : [
            <?php
            while( $row = mysql_fetch_array($kelas_siswa) ){
                //extract($row);
                $kode=$row['kode_kelas'],
                 $jumlah_siswa=mysql_query("SELECT COUNT(*) AS total_siswa FROM kelas_siswa WHERE kode_kelas=$kode_kelas "),
                echo '"'.$row['total_siswa'].'",';
            }
            ?>
                      ], 
backgroundColor: [
    "#41fbca",
    "#e56e14",
    "#1c0bdc",
    "#a4b319",
    "#c6066a",
    "#ebcd79",
    "#86ee4f",
    "#36b419",
    "#0bdbff",
    "#4b652d",
    "#f08ce0",
    "#57645b",
    "#4920d3",
    "#9df78f",
    "#6dbd2d",
    "#a2e2fd",
    "#35499a",
    "#4d37d1",
    "#a7eae7",
            ],
hoverBackgroundColor: [
      "#41fbca",
      "#e56e14",
      "#1c0bdc",
      "#a4b319",
      "#c6066a",
      "#ebcd79",
      "#86ee4f",
      "#36b419",
      "#0bdbff",
      "#4b652d",
      "#f08ce0",
      "#57645b",
      "#4920d3",
      "#9df78f",
      "#6dbd2d",
      "#a2e2fd",
      "#35499a",
      "#4d37d1",
      "#a7eae7",
          ]
    }
  ]
}
});
</script>