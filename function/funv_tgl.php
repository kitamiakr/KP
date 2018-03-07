<?php
function tanggal_indo($tanggal){
	$hari= array(
  'Sun' => 'Minggu',
  'Mon' => 'Senin',
  'Tue' => 'Selasa',
  'Wed' => 'Rabu',
  'Thu' => 'Kamis',
  'Fri' => 'Jumat',
  'Sat' => 'Sabtu'
);


$bulan = array (1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
$split=explode('_', $tanggal);
$tgl_indo=$split[2].' '.$bulan[(int)$split].' '.$split[0];

return $tgl_indo;
}

 ?>