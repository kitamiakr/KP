<?php
# MEMBACA TOMBOL KOGIN DARI FILE login.php
if(isset($_POST['btnLogin'])){
	# Baca variabel form
	$txtUser 		= $_POST['txtUser'];
	$txtUser 		= str_replace("'","&acute;",$txtUser);
	
	$txtPassword	= $_POST['txtPassword'];
	$txtPassword	= str_replace("'","&acute;",$txtPassword);
	
	# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
	$pesanError = array();
	if ( trim($txtUser)=="") {
		$pesanError[] = "Data <b> Username </b>  tidak boleh kosong !";		
	}
	if (trim($txtPassword)=="") {
		$pesanError[] = "Data <b> Password </b> tidak boleh kosong !";		
	}
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
		
		// Tampilkan lagi form login
		include "login.php";
	}
	else {
		# LOGIN CEK KE TABEL USER LOGIN
		$loginSql = "SELECT * FROM user WHERE username='$txtUser' AND password='".md5($txtPassword)."'";
		$loginQry = mysql_query($loginSql, $koneksidb) or die ("Query Salah : ".mysql_error());
		
		
		# JIKA LOGIN SUKSES
		if(mysql_num_rows($loginQry) >=1) {
			// Menyimpan Kode yang Login
			$loginData = mysql_fetch_array($loginQry);

			$_SESSION['SES_LOGIN'] = $loginData['kode_user']; 
			$_SESSION['SES_ADMIN'] = $txtUser;
			
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=http://localhost/sia-muhkayen/'>";
		}
		else {
			 echo "<script>alert('login ditolak');
			 window.location.href='http://localhost/sia-muhkayen/';</script> ";
		}
	}
} // End POST
?>
 
