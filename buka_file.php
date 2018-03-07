<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?open
	switch($_GET['open']){				
		case 'Login' :
			if(!file_exists ("login.php")) die ("File tidak ada!"); 
			include "login.php"; 
			break;
			
		case 'Login-Validasi' :
			if(!file_exists ("login_validasi.php")) die ("File tidak ada!"); 
			include "login_validasi.php"; 
			break;

		case 'Data-Pelajaran' :
			if (!file_exists("pelajaran_data.php")) die("File tidak ada!");
			include "pelajaran_data.php";
			break;

		case 'Pelajaran-Add' :
			if (!file_exists("pelajaran_add.php")) die("File tidak ada!");
			include "pelajaran_add.php";
			break;

		case 'Pelajaran-Edit' :
			if (!file_exists("pelajaran_edit.php")) die("File tidak ada!");
			include "pelajaran_edit.php";
			break;

		case 'Pelajaran-Delete' :
			if (!file_exists("pelajaran_delete.php")) die("File tidak ada!");
			include "pelajaran_delete.php";
			break;
		case 'Data-User':
			if (!file_exists("user_data.php")) die("file tidak ada!"); 
			include "user_data.php";
			break;
		case 'User-Add':
			if (!file_exists("user_add.php")) die("file tidak ada!"); 
			include "user_add.php";
			break;
		case 'User-Edit':
			if (!file_exists("user_edit.php")) die("file tidak ada!"); 
			include "user_edit.php";
			break;
		case 'User-Delete':
			if (!file_exists("user_delete.php")) die("file tidak ada!"); 
			include "user_delete.php";
			break;
		case 'Data-Guru':
			if (!file_exists("guru_data.php"))
				die("file tidak ada!");
			include "guru_data.php";
			break;
		case 'Guru-Add':
			if (!file_exists("guru_add.php"))
				die("file tidak ada!");
			include "guru_add.php";
			break;
		case 'Guru-Edit':
			if (!file_exists("guru_edit.php"))
				die("file tidak ada!");
			include "guru_edit.php";
			break;
		case 'Guru-Delete':
			if (!file_exists("guru_delete.php"))
				die("file tidak ada!");
			include "guru_delete.php";
			break;
		case 'Data-Siswa':
			if (!file_exists("siswa_data.php")) die("file tidak ada!");
			include "siswa_data.php";
			break;
		case 'Siswa-Add':
			if (!file_exists("siswa_add.php")) die("file tidak ada!");
			include "siswa_add.php";
			break;
		case 'Siswa-Edit':
			if (!file_exists("siswa_edit.php")) die("file tidak ada!");
			include "siswa_edit.php";
			break;
		case 'Siswa-Delete':
			if (!file_exists("siswa_delete.php")) die("file tidak ada!");
			include "siswa_delete.php";
			break;
		case 'Data-Kelas':
			if (!file_exists("kelas_data.php")) die("file tidak ada!");
			include "kelas_data.php";
			break;
		case 'Kelas-Add':
			if (!file_exists("kelas_add.php")) die("file tidak ada!");
			include "kelas_add.php";
			break;
		case 'Kelas-Edit':
			if (!file_exists("kelas_edit.php")) die("file tidak ada!");
			include "kelas_edit.php";
			break;
		case 'Kelas-Delete':
			if (!file_exists("kelas_delete.php")) die("file tidak ada!");
			include "kelas_delete.php";
			break;
		case 'Data-Nilai':
			if (!file_exists("nilai_data.php")) die("file tidak ada!");
			include "nilai_data.php";
			break;
		case 'Nilai-Add':
			if (!file_exists("nilai_add.php")) die("file tidak ada!");
			include "nilai_add.php";
			break;
		case 'Nilai-Edit':
			if (!file_exists("nilai_edit.php")) die("file tidak ada!");
			include "nilai_edit.php";
			break;
		case 'Nilai-Delete':
			if (!file_exists("nilai_delete.php")) die("file tidak ada!");
			include "nilai_delete.php";
			break;
		case 'Laporan':
			if (!file_exists("menu_laporan.php")) die("file tidak ada!");
			include "menu_laporan.php";
			break;
		case 'Laporan-User':
			if (!file_exists("laporan_user.php")) die("file tidak ada!");
			include "laporan_user.php";
			break;
		case 'Laporan-Pelajaran':
			if (!file_exists("laporan_pelajaran.php")) die("file tidak ada!");
			include "laporan_pelajaran.php";
			break;
		case 'Laporan-Guru':
			if (!file_exists("laporan_guru.php")) die("file tidak ada!");
			include "laporan_guru.php";
			break;
		case 'Laporan-Siswa':
			if (!file_exists("laporan_siswa.php")) die("file tidak ada!");
			include "laporan_siswa.php";
			break;
		case 'Laporan-Kelas':
			if (!file_exists("laporan_kelas.php")) die("file tidak ada!");
			include "laporan_kelas.php";
			break;
		case 'Laporan-Nilai':
			if (!file_exists("laporan_nilai.php")) die("file tidak ada!");
			include "laporan_nilai.php";
			break;
			case 'Pengumuman':

			if (!file_exists("peng_lengkap.php")) die("file tidak ada!");
			include "peng_lengkap.php";
			break;

			case 'Prestasi':

			if (!file_exists("pres_lengkap.php")) die("file tidak ada!");
			include "pres_lengkap.php";
			break;
			case 'Pengumuman-tampil':
			if (!file_exists("data_pengumuman.php")) die("file tidak ada!");
			include "data_pengumuman.php";
			break;
			case 'Pengumuman-Add':
			if (!file_exists("tambah_pengumuman.php")) die("file tidak ada!");
			include "tambah_pengumuman.php";
			break;
			case 'Prestasi-tampil':
			if (!file_exists("data_prestasi.php")) die("file tidak ada!");
			include "data_prestasi.php";
			break;
			
			case 'Prestasi-Add':
			if (!file_exists("tambah_prestasi.php")) die("file tidak ada!");
			include "tambah_prestasi.php";
			break;

			case 'Pengumuman-Edit':
			if (!file_exists("pengumuman_edit.php")) die("file tidak ada!");
			include "pengumuman_edit.php";
			break;
			case 'Prestasi-Edit':
			if (!file_exists("prestasi_edit.php")) die("file tidak ada!");
			include "prestasi_edit.php";
			break;
			case 'Pengumuman-Delete':
			if (!file_exists("pengumuman_delete.php")) die("file tidak ada!");
			include "pengumuman_delete.php";
			break;
			case 'Prestasi-Delete':
			if (!file_exists("prestasi_delete.php")) die("file tidak ada!");
			include "prestasi_delete.php";
			break;		
		case 'Logout' :
			if(!file_exists ("login_out.php")) die ("File tidak ada!"); 
			include "login_out.php"; 
			break;		

		
	}
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("main.php")) die ("File tidak ada!"); 
	include "main.php";	
}
?>