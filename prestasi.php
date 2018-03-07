<!DOCTYPE html>
<html lang="en">
<head>
  <title>SD Muhammadiyah Kayen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="bootstrap/js/jquery.js">
  <link rel="stylesheet" type="text/css" href="style/style.css">

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
 <?php include 'library/header.php'; ?>
</div>



<nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
     
      <li><a href="index.php#pengumuman"><span class="glyphicon glyphicon-bookmark icon"></span>Pengumuman</a></li>
      <li><a href="#prestasi"><span class="glyphicon glyphicon-star icon"></span>Prestasi</a></li>
    </ul>
   
  </div>
</nav>

 <div class="slide"> <?php include 'library/slide.php'; ?></div>

<section id="prestasi">
<div class="container" style="   margin-top: 15px;
     box-shadow: 3px 3px 5px 5px;"> 
 
 
  <div class="row" style="margin-top: 15px; "  >
  <?php 
  include 'koneksi/config.php';
  include 'function/funv_tgl.php';
$sql_tampil=mysqli_query($koneksi,"SELECT * FROM prestasi ORDER BY tanggal_pres DESC");

$no=0;
  while($no<6){
   $data=mysqli_fetch_array($sql_tampil); 
$tgl=$data['tanggal_pres'];
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
$tgl_bulan=$data['tanggal_pres'];
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
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1-1] . " ". $tahun;
$isi=$data['isi_pres'];
    ?>
    <div class="col-sm-4"  >
      <div class="panel ">

        <div class="panel-heading" style="background-color: #2980b9; text-align: center; color: #FFFFFF;"><?php echo $data['judul_pres']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="proses/gambar2/<?php echo $data['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi,0,200); ?><span>...</span></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
<?php $no++;} ?>


     </div>
  </div>
</div><br>

</section>

<?php include 'library/footer.php'; ?>
</body>
</html>
