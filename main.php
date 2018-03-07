  
<style type="text/css">
  
  .navbar{
     margin-bottom: 0px;
      border-radius: 0;
     
      color: #FFFFFF;

  }
 
  li:hover{
    border:1px solid white;

  }
  a:hover{
    color: #2980b9;
  }
  a.text{
    color: white;
  }
</style>
<?php
if(isset($_SESSION['SES_LOGIN'])) {
	//echo "<b> Anda berhasil login";
  include 'chart/grafik.php';
   


	exit;


}
else {
	/*echo "<h2>Selamat pada Sistem Informasi Akademik SD Muhammadiyah Kayen !</h2>";
	echo "<b>Anda belum login, silahkan <a href='?open=Login' alt='Login'>login </a>untuk mengakses sitem ini ";	*/

	
?>

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <center> <img src="img/logo.png" width="150" height="150">
        <div><h3><b>SD Muhammadiyah Kayen</h3></b></div></center>
       <?php 
       
       include 'login.php';
   ?>
      </div>
     
    </div>
  </div>
</div>

<section id="home">
<div style="margin-top: 50px;">
 <?php include 'layout/library/header.php'; ?>
</div>





 <div class="slide"> <?php include 'layout/library/slide.php'; ?></div>
</section>

<section id="info">
  
  <div class="container"  style="  background-color: white; margin-top: 15px; margin-bottom: 10px;
  ">


  <div class="row">
          <div class="col-md-12">
            <div class="content-box-large">
              <div class="panel-heading">
              <hr>
              <div class="panel-title"><center><h1>Profil</h1></center></div>
              <hr>
              
            
            </div>
              <div class="panel-body">
                <div id="rootwizard">
                <div class="navbar">
                  <div class="navbar-inner">
                    <div class="container">
                <ul class="nav nav-pills">
                    <li><a style="color: white;" href="#info#tab1" data-toggle="tab">Sejarah Singkat</a></li>
                  <li><a style="color: white;" href="#info#tab2" data-toggle="tab">Visi Misi</a></li>
                  <li><a style="color: white;" href="#info#tab3" data-toggle="tab">Struktur Organisasi</a></li>
                  <li><a style="color: white;" href="#info#tab5" data-toggle="tab">Grafik Siswa</a></li>
                   <li><a style="color: white;" href="#info#tab4" data-toggle="tab">Guru</a></li>
                    
                  
               
                </ul>
                 </div>
                  </div>
                </div>
                <div class="tab-content" style="margin-top: 20px;">
                    <div class="tab-pane active" id="tab1">
                     <?php include 'info/sejarah.php'; ?>
                    </div>

                    
                    <div class="tab-pane" id="tab2">
                   <?php include 'info/visi_misi.php'; ?>
                    </div>
<div class="tab-pane" id="tab3">
                   <?php include 'info/struktur_organisasi.php'; ?>
                    </div>
 <div class="tab-pane" id="tab5"><?php include 'chart/grafik_siswa.php';?></div>

                  <div class="tab-pane" id="tab4"><?php include 'info/info_guru.php';?></div>
 
        </div> <!-- /widget-content -->
      
      </div> <!-- /widget -->
            </div>
                  
                </div>  
                <!-- batas-->
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- batas-->

  </div>

</section>

<section id="pengumuman">
<div class="container" style="  background-color: white;  margin-top: 15px;
    "> 
    <hr>
     <div><center><h1>Pengumuman</h1></center></div>
     <hr>
 
 
  <div class="row" style="margin-top: 15px; "  >
  <?php 
  //include 'library/config.php';
 
$sql_tampil=mysql_query("SELECT * FROM pengumuman ORDER BY tanggal_peng DESC");
$cek_row=mysql_num_rows($sql_tampil);
if($cek_row>0){

$no=0;
if($cek_row==6){
  while($no<6){
   $data1=mysql_fetch_array($sql_tampil); 


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
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1-1] . " ". $tahun;
$isi=$data1['isi_peng'];
    ?>
    <div class="col-sm-4"  >
      <div class="panel ">

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data1['judul_peng']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar/<?php echo $data1['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi, 0,200); ?><span>...</span></div>
        <div class="panel-footer"><button id="backdrop" type="button" data-id="<?php echo $data1['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-html="true" data-toggle="popover" data-animation='pop' title="<?php echo $data1['judul_peng']; ?>" data-content="<img src='gambar/<?php echo $data1['gambar']; ?>' class='img-responsive' style='margin-bottom:10px;' width='300' height='330'/><?php echo $data1['isi_peng']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>

      </div>
    </div>

<?php $no++;} }elseif($cek_row<6){

  while($no<$cek_row){
   $data1=mysql_fetch_array($sql_tampil); 


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
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1-1] . " ". $tahun;
$isi=$data1['isi_peng'];
    ?>
    <div class="col-sm-4"  >
      <div class="panel ">

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data1['judul_peng']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar/<?php echo $data1['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi, 0,200); ?><span>...</span></div>
        <div class="panel-footer"><button id="backdrop" type="button" data-id="<?php echo $data1['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-html="true" data-toggle="popover" data-animation='pop' title="<?php echo $data1['judul_peng']; ?>" data-content="<img src='gambar/<?php echo $data1['gambar']; ?>' class='img-responsive' style='margin-bottom:10px;' width='300' height='330'/><?php echo $data1['isi_peng']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>

      </div>
    </div>

<?php $no++;}
}else{ 

while($no<6){
   $data1=mysql_fetch_array($sql_tampil); 


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
 
  $result = $tgl1 . " " . $bulan[(int)$bulan1-1] . " ". $tahun;
$isi=$data1['isi_peng'];
    ?>
    <div class="col-sm-4"  >
      <div class="panel ">

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data1['judul_peng']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar/<?php echo $data1['gambar']; ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi, 0,200); ?><span>...</span></div>
        <div class="panel-footer"><button id="backdrop" type="button" data-id="<?php echo $data1['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-html="true" data-toggle="popover" data-animation='pop' title="<?php echo $data1['judul_peng']; ?>" data-content="<img src='gambar/<?php echo $data1['gambar']; ?>' class='img-responsive' style='margin-bottom:10px;' width='300' height='330'/><?php echo $data1['isi_peng']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>

      </div>
    </div>

<?php $no++;} } ?>



     </div>
    <?php if($cek_row>6){ ?>
      <div class="navbar-right" style="margin-right: 5px"><a href="?open=Pengumuman" class="btn-selengkapnya btn">Selengkapnya <span style="vertical-align: middle;" class="glyphicon glyphicon-circle-arrow-right icon"></span></a></div>

      <?php }?>
  </div>
<?php  }else{  ?>

<div class="alert alert-info" style="margin-right: 20px; margin-left: 20px;" role="alert">Pengumuman tidak ada</div>

<?php }?>
</div><br>
</section>
<br><br>
<section id="prestasi">


<div class="container" style="  background-color: white; margin-top: 15px;
  "> 
  <hr>
 
 <div><center><h1>Prestasi</h1></center></div>
 <hr>
  <div class="row" style="margin-top: 15px; "  >
  <?php 
  include 'koneksi/config.php';
  include 'function/funv_tgl.php';
$sql_tampil=mysql_query("SELECT * FROM prestasi ORDER BY tanggal_pres DESC");
$row_cek=mysql_num_rows($sql_tampil);
if($row_cek>0){
$no=0;
if($row_cek==6){
  while($no<6){
   $data=mysql_fetch_array($sql_tampil); 

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

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data['judul_pres']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar2/<?php echo $data['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi,0,200); ?><span>...</span></div>
        <div class="panel-footer"><button  type="button" data-id="<?php echo $data['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-toggle="popover" data-animation='pop' title="<?php echo $data['judul_pres']; ?>" data-html="true" data-content="<img src='gambar2/<?php echo $data['gambar']; ?>' style='margin-bottom:10px;' class='img-responsive' width='300' height='330'/><?php echo $data['isi_pres']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>
      </div>
    </div>
<?php $no++;}}elseif($row_cek<6){
while($no<$row_cek){
   $data=mysql_fetch_array($sql_tampil); 

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

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data['judul_pres']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar2/<?php echo $data['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi,0,200); ?><span>...</span></div>
        <div class="panel-footer"><button  type="button" data-id="<?php echo $data['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-toggle="popover" data-animation='pop' title="<?php echo $data['judul_pres']; ?>" data-html="true" data-content="<img src='gambar2/<?php echo $data['gambar']; ?>' style='margin-bottom:10px;' class='img-responsive' width='300' height='330'/><?php echo $data['isi_pres']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>
      </div>
    </div>
<?php $no++;}
}else{ 

while($no<6){
   $data=mysql_fetch_array($sql_tampil); 

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

        <div class="panel-heading" style="background-color: #3498DC; text-align: center; color: #FFFFFF;"><?php echo $data['judul_pres']; ?></div>
              <div class="panel-body"><span class="glyphicon glyphicon-pencil" style=" color: #34495e;"><span><?php echo $hari[$day] .', '. $result;  ?>  </div>
        <div class=" thumbnail"><img src="gambar2/<?php echo $data['gambar'] ?>" class="img-responsive" style="width:100%; height: 220px;" alt="Image"></div>
        <div class="panel-body"><?php echo substr($isi,0,200); ?><span>...</span></div>
        <div class="panel-footer"><button  type="button" data-id="<?php echo $data['id_pres']; ?>" class="btn" style="background-color: #3498DC; color: white;" data-toggle="popover" data-animation='pop' title="<?php echo $data['judul_pres']; ?>" data-html="true" data-content="<img src='gambar2/<?php echo $data['gambar']; ?>' style='margin-bottom:10px;' class='img-responsive'width='300' height='330'/><?php echo $data['isi_pres']; ?>">Lanjutkan <span class="glyphicon glyphicon-circle-arrow-right"></span></button></div>
      </div>
    </div>
<?php $no++;}} ?>
  </div>
  <?php if($row_cek>6){

   ?>
  <div class="navbar-right" style="margin-right: 5px"><a href="?open=Prestasi" class="btn-selengkapnya btn">Selengkapnya <span style="vertical-align: middle;" class="glyphicon glyphicon-circle-arrow-right icon"></span></a></div>
     </div>
     <?php }?>

     <?php }else{

      ?>

      <div class="alert alert-info" role="alert" style="margin-left: 20px; margin-right: 20: 20px;">Prestasi tidak ada</div>
      <?php } ?>
  </div>
</div><br>

        </div>
    </div>
</section>

<?php } ?>


