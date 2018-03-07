<?php


include_once "library/inc.library.php";
include_once "library/inc.connection.php";


if (isset($_POST['submit'])) {
  $judul=$_POST['txtjudul'];
  $tanggal=$_POST['txttanggal'];
  $tipe=$_FILES['txtgambar']['type'];
  $ukuran=$_FILES['txtgambar']['size'];
  $tmp=$_FILES['txtgambar']['tmp_name'];
  $gambar=$_FILES['txtgambar']['name'];
  $isi=$_POST['txtisi_peng'];
  $path="gambar2/".$gambar;
  $pesanError = array();
  $Kode = $_POST['txtKode'];
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
          $query=mysql_query("UPDATE prestasi SET judul_pres='$judul', tanggal_pres='".InggrisTgl($tanggal)."', isi_pres='$isi',gambar='$gambar' WHERE id_prestasi = '$Kode' ") or die("gagal query!".mysql_error());
      if ($query) {
        #refresh
       echo "<meta http-equiv='refresh' content='0; url=?open=Prestasi-tampil'>";
      }
      exit;
    }
  }
}
//skrip membaca variable url
$Kode = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
#menampilkan data untuk diedit
$mySql = "SELECT * FROM prestasi WHERE id_prestasi = '$Kode'";
$myQry = mysql_query($mySql, $koneksidb) or die ("Query Gagal !".mysql_error());
$myData = mysql_fetch_array($myQry);


#nilai
$dataKode = $myData['id_prestasi'];
$dataJudul = isset($_POST['judul']) ? $_POST['judul'] : $myData['judul_pres'];
$dataTanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : IndonesiaTgl($myData['tanggal_pres']);
$dataGambar = isset($_POST['gambar']) ? $_POST['gambar'] : $myData['gambar'];
$dataIsi = isset($_POST['txtisi_peng']) ? $_POST['txtisi_peng'] : $myData['isi_pres'];

?>

<div class="row">
		  <div class="well">
		  	<div class="page-header">
			  <h3>EDIT DATA PRESTASI</h3>
      
			</div>
			
			   <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <div class="form-group">
      <label for="judul">judul prestasi</label>
      <input type="text" name="txtjudul" class="form-control" id="judul" value="<?php echo $dataJudul; ?>" placeholder="judul pengumuman">
      <input type="hidden" name="txtKode" value="<?php echo $dataKode; ?>">
    </div>
    <div class="form-group">
      <label for="tgl">tanggal</label>
      <input class="form-control tcal" id="tgl" name="txttanggal" value="<?php  echo $dataTanggal;?>" >
    </div>
    <div class="form-group">
      <label for="gambar">upload gambar</label>
      <input type="file" class="form-control" id="gambar" name="txtgambar">
    </div>
     <div class="form-group">
      <label for="isi">isi</label>
    <textarea class="form-control" id="isi" name="txtisi_peng" rows="3"><?php echo $dataIsi; ?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
		  </div>
</div>