<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
$dataKode = buatKode("pelajaran", "P");
$dataPelajaran = isset($_POST['txtPelajaran']) ? $_POST['txtPelajaran'] : '';
$dataKeterangan = isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';

if (isset($_POST['btnSimpan'])) {
	$txtPelajaran = $_POST['txtPelajaran'];
	$txtKeterangan = $_POST['txtKeterangan'];

	$kodeBaru = buatKode("pelajaran", "P");
	$mySql = "INSERT INTO pelajaran (kode_pelajaran, nama_pelajaran, keterangan) VALUES ('$kodeBaru', '$txtPelajaran', '$txtKeterangan')";
	$myQry = mysql_query($mySql, $koneksidb) or die("Gagal Query! ".mysql_error());
	if ($myQry) {
		echo "<meta http-equiv='refresh' content='0; url=?open=Data-Pelajaran'>";
	}
	exit;
}
?>

<div class="row">
		 
		  <div class="well">
		  	<div class="page-header">
			  <h3>TAMBAH DATA PELAJARAN</h3>
			</div>
			
			    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name= "form1" target="_self" >
				  <div class="form-group">
				    <label for="textfield">Kode</label>
				    <input type="text" class="form-control" name="textfield" value="<?php echo $dataKode; ?>" readonly required>
				  </div>
				  <div class="form-group">
				  	<label for="txtPelajaran">Nama Pelajaran</label>
				  	<input name="txtPelajaran" class="form-control" value="<?php echo $dataPelajaran; ?>" required />
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
				  
				  <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='?open=Data-Pelajaran'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  </div>