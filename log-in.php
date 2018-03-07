<?php
session_start();
include_once "library/inc.connection.php";
include_once "library/inc.library.php";


// Baca Jam pada Komputer
date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistem Informasi Akademik Sekolah</title>

		<!-- css kumpulan -->
		
		<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="plugins/tigra_calendar/tcal.css"/>
		
		<link href="styles/css/dataTables.bootstrap.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
			    <?php 
			    include 'layout/navbar.php';
			    include "buka_file.php";
			    ?>
		</div>
		<!-- js kumpulan -->
		<script src="styles/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="plugins/tigra_calendar/tcal.js"></script>
		<script src="styles/js/jquery-1.11.3.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="styles/js/jquery.dataTables.min.js"></script>
	    <script src="styles/js/dataTables.bootstrap.min.js"></script>
		
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		
	    <script>
	    	$(document).ready(function() {

	    		$('#tabeldata').DataTable();

			});
	    </script>
	</body>
</html>