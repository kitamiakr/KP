<?php
include '../library/inc.connection.php';
$judul=$_POST['judul'];
$tanggal=$_POST['tanggal'];
$tipe=$_FILES['gambar']['type'];
$ukuran=$_FILES['gambar']['size'];
$tmp=$_FILES['gambar']['tmp_name'];
$gambar=$_FILES['gambar']['name'];
$isi=$_POST['isi_pres'];
$path="gambar2/".$gambar;

if ($tipe=="image/jpeg" || $tipe=="image/png") {
	if ($ukuran<=1000000) {
		if (move_uploaded_file($tmp, $path)) {
			$query=mysql_query("INSERT INTO prestasi(judul_pres,isi_pres,tanggal_pres,gambar) VALUES ('".$judul."','".$isi."','".$tanggal."','".$gambar."')");
			if ($query) {
				echo '<script>alert("data berhasil diinput");
				window.location.href="input_prestasi.php"</script>';
			}else{
				echo '<script>alert("data belum berhasil diinput");
				window.location.href="input_prestasi.php"</script>';
			}
		}else{
			echo '<script>alert("gagal  diinput");
				window.location.href="input_prestasi.php"</script>';
		}
	}else{
		echo '<script>alert("ukuran gambar lebih dari 1 mb");
				window.location.href="input_prestasi.php"</script>';
	}
}else{
	echo '<script>alert("data diupload bukan file JPG atau PNG");
				window.location.href="input_prestasi.php"</script>';
}


 ?>