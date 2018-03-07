<?php
if(empty($_SESSION['SES_ADMIN'])) {
	/*echo "<center>";
	echo "<br><br> <b> Maaf akses ditolak</b><br>";
	echo "<center>";*/
	echo "<meta http-equiv='refresh' content='0; url=http://localhost/sia-muhkayen/'>";
	exit();
}
?>