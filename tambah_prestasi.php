
<?php include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";



if (isset($_POST['submit'])) {
  $judul=$_POST['judul'];
  $tanggal=date("Y-m-d");
  $tipe=$_FILES['gambar']['type'];
  $ukuran=$_FILES['gambar']['size'];
  $tmp=$_FILES['gambar']['tmp_name'];
  $gambar=$_FILES['gambar']['name'];
  $isi=$_POST['isi_pres'];
  $path="gambar/".$gambar;
  $pesanError = array();
  
  if ($ukuran>=1000000) {
    $pesanError[] = "Maaf, file nya terlalu besar";
  }
  if (count($pesanError) >= 1) {
      echo "<div class= 'mssgBox'>";
      echo "<img src = 'images/attention.png'> <br><hr>";
      $noPesan = 0;
      foreach ($pesanError as $indeks => $pesan_tampil) {
        $noPesan++;
        echo "&nbsp; $noPesan. $pesan_tampil<br>";
      }
      echo "</div> <br>";
    }
    else {
      if (move_uploaded_file($tmp, $path)) {
          $query=mysql_query("INSERT INTO prestasi(judul_pres,isi_pres,tanggal_pres,gambar) VALUES ('".$judul."','".$isi."','".$tanggal."','".$gambar."')") or die("gagal query!".mysql_error());
      if ($query) {
        #refresh
        echo "<meta http-equiv='refresh' content='0; url=?open=Prestasi-tampil'>";
      }
      exit;
    }
  }
}
 ?>
<div class="row">
		  <div class="well">
		  	<div class="page-header">
			  <h3>TAMBAH DATA PRESTASI</h3>
			</div>
			
			   <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <div class="form-group">
      <label for="judul">judul prestasi</label>
      <input type="text" name="judul" class="form-control" id="judul" placeholder="judul prestasi">
    </div>
    <div class="form-group">
      <label for="tgl">tanggal</label>
      <input type="date" class="form-control" id="tgl" name="tanggal" disabled="">
    </div>
    <div class="form-group">
      <label for="gambar">upload gambar</label>
      <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
     <div class="form-group">
      <label for="isi">isi</label>
    <textarea class="form-control" id="isi" name="isi_pres" rows="3"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
		  </div>
</div>