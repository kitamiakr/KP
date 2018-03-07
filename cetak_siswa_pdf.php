<?php
include 'dompdf/dompdf_config.inc.php';
$html = ob_get_clean();
$filename = '/path/to/cetak_siswa.pdf';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
file_put_contents($filename, $dompdf->output());
 ?>