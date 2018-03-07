<script type="text/javascript">
window.print(){
	var prtContent = document.getElementById("data");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
<?php 
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";


#PAGING
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$dataTahunAngk = isset($_POST['cmbTahunAngk']) ? $_POST['cmbTahunAngk'] : $tahun;
$baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql = "SELECT * FROM siswa WHERE tahun_angkatan = '$dataTahunAngk'";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("Gagal Query!".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai = $baris * ($hal-1);
#filter

$dataKelas = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
$filterSQL = "";
if (isset($_POST['btnPilih1'])) {
	$filterSQL = "WHERE kelas_siswa.kode_kelas = '$dataKelas'";


}
else {
	$filterSQL = "";
}


?>
<div class="well">
	<div class="row">
			<div class="col-md-6 text-left">
				<h4>Laporan Data Siswa</h4>
			</div>
	</div>
	<br/>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" target = "_self" method = "POST">
		<div class="form-group-sm col-md-4">
			<label for="cmbKelas">Pilih Kelas</label>
			<select name="cmbKelas" id="cmbKelas" class="form-control">
					<?php
					$dataSql = "SELECT * FROM kelas ORDER BY tahun_ajar";
					$dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					while ($dataRow=mysql_fetch_array($dataQry)) {
						if ($dataRow['kode_kelas']==$dataKelas) {
							$cek = "selected";
						} else { $cek = ""; }
						echo "<option value = '$dataRow[kode_kelas]' $cek> $dataRow[kelas] | $dataRow[nama_kelas] ($dataRow[tahun_ajar]) </option>";
					}
					?>
			</select>
			<input type="submit" class="btn btn-success btn-xs" name="btnPilih1" value="Pilih" />
		</div>
	<div class="row">
		<div class="form-group-sm col-md-4">
			
		</div>
		<div class="form-group-sm col-md-3">
			
		</div>
	</div>
</form>
<div id="data">
	<table width="100%" class="table table-striped table-bordered table-hover" id="tabeldata" id="printing">
			<thead>
		            <tr>
		                <th width="30px">No</th>
						<th>Kode</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelamin</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
						<th>Angkatan</th>
		            </tr>
		        </thead>

		        <tfoot>
		            <tr>
		                <th width="30px">No</th>
						<th>Kode</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelamin</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
						<th>Angkatan</th>
		            </tr>
		        </tfoot>

		        <tbody>
				<?php
					$mySql = "SELECT kelas_siswa.*, siswa.nis,siswa.nama_siswa,siswa.kelamin,siswa.alamat,siswa.no_telepon,siswa.tahun_angkatan, kelas.kelas,kelas.nama_kelas FROM kelas_siswa LEFT JOIN siswa ON kelas_siswa.kode_siswa=siswa.kode_siswa LEFT JOIN kelas ON kelas_siswa.kode_kelas=kelas.kode_kelas $filterSQL ORDER BY kode_kelas ASC LIMIT $mulai, $baris";
					$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query!".mysql_error());
					$nomor = $hal;
					while ($myData = mysql_fetch_array($myQry)) {
						$nomor++;
						$Kode = $myData['kode_siswa'];
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $myData['kode_siswa']; ?></td>
						<td><?php echo $myData['nis']; ?></td>
						<td><?php echo $myData['nama_siswa']; ?></td>
						<td><?php echo $myData['kelamin']; ?></td>
						<td><?php echo $myData['alamat']; ?></td>
						<td><?php echo $myData['no_telepon']; ?></td>
						<td><?php echo $myData['tahun_angkatan']; ?></td>
					</tr>
				<?php }
				
				 ?>
		    </tbody>
		   
		</table>
		</div>
		 <div style="margin-bottom: 20px; "><a href="cetak_siswa.php?kdkelas=<?php echo $dataKelas; ?>" class="btn btn-success" >cetak siswa</a></div>
</div>