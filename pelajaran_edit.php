<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
$dataKode = buatKode("pelajaran", "P");
$dataPelajaran = isset($_POST['txtPelajaran']) ? $_POST['txtPelajaran'] : '';
$dataKeterangan = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';

if (isset($_POST['btnSimpan'])) {
	$txtPelajaran = $_POST['txtPelajaran'];
	$txtKeterangan = $_POST['txtKeterangan'];

	$pesanError = array();
	if (trim($txtPelajaran)=="") {
		$pesanError[] = "Data <b>Nama Pelajaran</b> tidak boleh kosong !";		
	}
	if (trim($txtKeterangan)=="" ) {
		$pesanError[] = "Data <b>Keterangan</b> harus diisi angka!";		
	}
	if (count($pesanError)>=1 ) {
		echo "<div class='mssgBox'>";
		echo "<img src= 'images/attention.png'> <br> <hr>";
		$noPesan = 0;
		foreach ($pesanError as $indeks => $pesan_tampil) {
			$noPesan++;
			echo "&nbsp; $noPesan. $pesan_tampil<br>";
		}
		echo "</div><br>";
	}
	else {
	$Kode = $_POST['txtKode'];
	$mySql = "UPDATE pelajaran SET nama_pelajaran = '$txtPelajaran', keterangan = '$txtKeterangan'
	WHERE kode_pelajaran = '$Kode'";
	
	$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query! ".mysql_error());

	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Pelajaran'>";
	}
	exit;
}
}

$Kode = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
$mySql = "SELECT * FROM pelajaran WHERE kode_pelajaran = '$Kode'";
$myQry = mysql_query($mySql, $koneksidb) or die("Query Gagal! ".mysql_error());
$myData = mysql_fetch_array($myQry);
#Membuat nilai
$dataKode = $myData['kode_pelajaran'];
$dataPelajaran =  isset($_POST['txtPelajaran']) ? $_POST['txtPelajaran'] : $myData['nama_pelajaran'];
$dataKeterangan = isset($_POST['txtPelajaran']) ? $_POST['txtKeterangan'] : $myData['keterangan'];
?>


<div class="row">
		  
		  <div class="well">
		  	<div class="page-header">
			  <h3>UBAH DATA PELAJARAN</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly = "readonly" required />
				    <input type="hidden" name="txtKode" value="<?php echo $dataKode; ?>" />
				  </div>
				  <div class="form-group">
				  	<label for="txtNama">Nama Pelajaran</label>
				  	<input class="form-control" name="txtPelajaran" value="<?php echo $dataPelajaran;?>" required />
				  </div>
				  <div class="form-group">
				  	<label for="txtKeterangan">Kategori</label>
				  	<select class="form-control" id="txtKeterangan" name="txtKeterangan">
						<?php
						$pilihan = array("Umum", "Agama", "Mulok");
							foreach ($pilihan as $keterangan) {
							if ($dataKeterangan == $keterangan) {		
								$cek = "selected";
								} else {$cek = "";}
							echo "<option value='$keterangan' $cek> $keterangan </option> ";
							}
						?>
				  	</select>
				  </div>
				  
				  <button type="submit" name="btnSimpan" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='?open=Data-Pelajaran'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>