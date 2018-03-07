<!DOCTYPE html>
<html lang="en">
<head>
  <title>SD Muhammadiyah Kayen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
  <script src="styles/js/jquery-1.11.3.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="styles/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/js/jquery.js">
  <link rel="stylesheet" type="text/css" href="styles/style/style.css">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="styles/bootstrap/js/smoothscroll">
  <script>
 $(document).ready(function(){
    $('[data-toggle="popover"]').popover().on("show.bs.popover", function () { $(this).data("bs.popover").tip().css("width", "900px").css("text-align","justify"); });



    
});
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});




</script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    
    
    /* Remove the jumbotron's default bottom margin */ 

     .jumbotron {
      margin-bottom: 0;
      background-color:  #3498DC;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #2980b9;
      padding: 25px;
    }
   
   
    .btn-selengkapnya{
      margin-bottom: 20px;
      background-color: #2980b9;
      color: white;
    }

    /* Popover */
  .popover {
      border: 2px dotted white;
  }
  /* Popover Header */
  .popover-title {
      background-color: #2980b9; 
      color: #FFFFFF; 
      font-size: 28px;
      text-align:center;
  }
  /* Popover Body */
  .popover-content {
      background-color:#FFFFFF;
      color: black;
    
      padding: 25px;
  }
  /* Popover Arrow */
  .arrow {
      border-right-color: red !important;
  }
  .navbar{
    background-color: #2980b9;
  }
  li{
    border-color: #2980b9;

  }
  li:hover{
    border:1px solid white;

  }
  a:hover{
    color: #2980b9;
  }
  a{
    color: white;
  }
  </style>
</head>
<body>
 <nav id="header" class="navbar navbar-fixed-top">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" style="color: white;" href="#"><img src=""></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse" >
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://localhost/sia-muhkayen/" ><span ></span>Beranda</a></li>
                     
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
<section id="home">
<div  style="margin-top: 50px;">
 <?php include 'layout/library/header.php'; ?>
</div>






</section>
<section id="pengumuman">

   
 
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Pengumuman
                   
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <?php 
        include 'library/inc.connection.php';
        $batas=3;
$pg=isset($_GET['pg']) ? $_GET['pg']: "";
if (empty($pg)) {
  $posisi=0;
  $pg=1;
}else{
  $posisi=($pg-1)*$batas;
}
$sql_tampil=mysql_query("SELECT * FROM pengumuman ORDER BY tanggal_peng DESC limit ".$posisi.",".$batas."");
$cek_row=mysql_num_rows($sql_tampil);
if($cek_row>0){
$no=0;
  while( $data1=mysql_fetch_array($sql_tampil)){
   
$tgl=$data1['tanggal_peng'];
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
$tgl_bulan=$data1['tanggal_peng'];
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
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1] . " ". $tahun;
$isi=$data1['isi_peng'];
    ?>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-4">
                <a href="#">
                    <img  class="img-responsive" src="gambar/<?php echo $data1['gambar'];  ?>" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <h3><?php echo $data1['judul_peng']; ?></h3>
                <small><?php echo $hari[$day].','.$result; ?></small>
                <p></p><?php echo substr($isi, 0,200); ?></p>
                <button id="backdrop" type="button" data-id="<?php echo $data1['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-html="true" data-toggle="popover" data-animation='pop' title="<?php echo $data1['judul_peng']; ?>" data-content="<img src='gambar/<?php echo $data1['gambar']; ?>' class='img-responsive' style='margin-bottom:10px;'/><?php echo $data1['isi_peng']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
            </div>
        </div>
        <!-- /.row -->

        <hr>

     
<?php $no++;}?>
      
  <div class="modal fade" id="mymodal" role="dialog">
     <?php include 'detail_peng.php'; ?>  
    </div>
 
       <?php 


$jml_data=mysql_num_rows(mysql_query("SELECT * FROM pengumuman"));
$jml_hal=ceil($jml_data/$batas);



       ?>
        <!-- Pagination -->
        <nav aria-label="..." class="navbar-right">
  <ul class="pagination">

  <?php if ($pg>1) {
  $link=$pg-1;
  $prev="  <li>
      <a class='page-link' href='peng_lengkap.php?pg=$link' tabindex='-1'>Previous</a>
    </li>";
  }else{
    $prev=" <li class='page-item disabled'>
      <a class='page-link' href='#' tabindex='-1'>Previous</a>
    </li>";
    } 
$nmr='';
for ($i=1; $i <= $jml_hal ; $i++) { 
  if ($i==$pg) {
    $nmr.="  <li class='active'><a class='page-link' href='peng_lengkap.php?pg=$i'>$i</a></li>";
  }else{
    $nmr.="  <li class='page-item'><a class='page-link' href='peng_lengkap.php?pg=$i'>$i</a></li>";
  }
}

if ($pg<$jml_hal) {
  $link=$pg+1;
  $next="<li>
      <a class='page-link' href='peng_lengkap.php?pg=$link' tabindex='-1'>Next</a>
    </li>";
}else{
  $next="<li class='page-item disabled'>
      <a class='page-link' href='#' tabindex='-1'>Previous</a>
    </li>";
}
echo $prev . $nmr . $next;
    ?>
   
  
   
    
  </ul>
</nav>
        <!-- /.row -->

    

        <!-- Footer -->
      
 
     </div>
   <?php }else{

     ?>
     <div class="alert alert-info" style="margin-right: 20px; margin-left: 20px;" role="alert">Pengumuman tidak ada</div>
     <?php  }?>
    
      </div>

</div><br>

</section>
<br><br>

 <script type="text/javascript">
   $(document).ready(function(){
    $('#mymodal').on('show.bs.modal',function(e){
      var rowid=$(e.relatedTarget).data('id');
      $.ajax({
        type:'post',
        url:'detail_peng.php',
        data:'rowid='+rowid,
        success:function(data){
          $('.fetched-data').html(data);
        }
      });
    });
   });
 </script>
   
<?php
if($pg>1){
 include 'layout/library/footer.php';} ?>

</body>
</html>
