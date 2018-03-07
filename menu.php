<?php
if(isset($_SESSION['SES_LOGIN'])){
# JIKA YANG LOGIN LEVEL ADMIN, menu di bawah yang dijalankan
?>

	
	<li class="menu"><a class="text" href='?open=Data-User' title='Data User'>Data User</a></li>
	<li class="menu"><a class="text" href='?open=Data-Pelajaran' title='Data Pelajaran'>Data Pelajaran</a></li>
	<li class="menu"><a class="text" href='?open=Data-Guru' title='Data Guru'>Data Guru</a></li>
	<li class="menu"><a class="text" href='?open=Data-Siswa' title='Data Siswa'>Data Siswa</a></li>
	<li class="menu"><a class="text" href='?open=Data-Kelas' title='Data Kelas'>Data Kelas</a></li>
	<li class="menu"><a class="text" href='?open=Data-Nilai' title='Nilai Kelas'>Nilai Kelas</a></li>
	<li class="dropdown">
			  <a class="text" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li class="menu"><a class="text" href="?open=Laporan-User"> Laporan Data User </a></li>
				<li class="menu"><a class="text" href="?open=Laporan-Pelajaran">Laporan Data Pelajaran </a></li>
				<li class="menu"><a class="text" href="?open=Laporan-Guru">Laporan Data Guru </a> </li>
				<li class="menu"><a class="text" href="?open=Laporan-Siswa">Laporan Data Siswa </a></li>
				<li class="menu"><a class="text" href="?open=Laporan-Kelas">Laporan Data Kelas Belajar </a></li>
				<li class="menu"><a class="text" href="?open=Laporan-Nilai">Laporan Data Nilai Siswa </a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a class="text" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li class="menu"><a class="text" href='?open=Pengumuman-tampil' title='Data User'>Pengumuman</a></li>
	<li class="menu"><a class="text" href='?open=Prestasi-tampil' title='Data User'>Prestasi</a></li>
			  </ul>
			</li>
	<li class="menu"><a class="text" href='?open=Logout' title='Logout (Exit)'>Logout</a></li>

<?php
}
else {
# JIKA BELUM LOGIN (BELUM ADA SESION LEVEL YG DIBACA)
?>

	<!--<li><a href='?open=Login' title='Login System'>Login</a></li>-->


                    <ul class="nav navbar-nav">
                        <li class="menu"><a href="#home" class="text" ><span ></span>Beranda</a></li>
                        <li class="menu"><a href="#info " class="text"><span></span>Profil</a></li>
                        <li class="menu"><a  href="#pengumuman" class="text"><span ></span>Pengumuman</a></li>
                        <li class="menu"><a href="#prestasi " class="text"><span></span>Prestasi</a></li>

                        
                    </ul>
                    <button data-toggle="modal" style="margin-right: 20px;" type="button" data-target="#myModal" class="btn btn-danger navbar-btn">Login</button>
               
<?php
}
?>