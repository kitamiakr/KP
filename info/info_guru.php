<div class="container">
  <h3>Info Guru</h3>
  <ul class="nav nav-tabs">
    <li><a href="#info#tab4#guru1" data-toggle="tab">Jenis Kelamin</a></li>
    <li><a href="#info#tab4#guru2" data-toggle="tab">Status Aktif</a></li>
    <li><a href="#info#tab4#guru3" data-toggle="tab">Daftar</a></li>
  
  </ul>
  <br>
  <div class="tab-content">
    <div class="tab-pane active" id="guru1">
    <div class="container">
 <?php $query=mysql_query("SELECT COUNT(*)  AS total FROM guru");
 $total=mysql_fetch_array($query);



  ?>
  <table class="table">
    <thead>
      <tr>
        <th>Jenis Kelamin</th>
        <th>Jumlah</th>
      
      </tr>
    </thead>
    <tbody>
        <tr>
        <td>Total</td>
        <td><?php echo $total['total']; ?></td>
       
      </tr>    
     
      <tr class="danger">
      <?php $jekel=mysql_query("SELECT COUNT(*) AS jekel_laki2 FROM guru WHERE kelamin='Laki-laki' ");
$data_jekel=mysql_fetch_array($jekel); ?>
        <td>Laki-laki</td>
        <td><?php echo $data_jekel['jekel_laki2']; ?></td>
        
      </tr>
      <tr class="info">
        <?php $jekel_pr=mysql_query("SELECT COUNT(*) AS jekel_perempuan FROM guru WHERE kelamin='Perempuan' ");
$data_jekel_pr=mysql_fetch_array($jekel_pr); ?>
        <td>Perempuan</td>
        <td><?php echo $data_jekel_pr['jekel_perempuan']; ?></td>
       
      </tr>
     
    </tbody>
  </table>
</div>
    </div>
    <div class="tab-pane " id="guru2">
     <div class="container">
       
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Status Aktif</th>
        <th>Jumlah</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
       <?php $aktif=mysql_query("SELECT COUNT(*) AS guru_aktif FROM guru WHERE status_aktif='aktif' ");
$data_aktif=mysql_fetch_array($aktif); ?>
        <td>Aktif</td>
        <td><?php echo $data_aktif['guru_aktif']; ?></td>
       
      </tr>
      <tr>
       <?php $aktif=mysql_query("SELECT COUNT(*) AS guru_tdk_aktif FROM guru WHERE status_aktif='tidak aktif' ");
$data_aktif=mysql_fetch_array($aktif); ?>
        <td>Tidak Aktif</td>
        <td><?php echo $data_aktif['guru_tdk_aktif']; ?></td>
        
      </tr>
      
    </tbody>
  </table>
</div>

    </div>
     <div class="tab-pane " id="guru3">
     <?php 
    $baris = 50;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql = "SELECT * FROM guru";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("Gagal Query!".mysql_error());
$jumlah = mysql_num_rows($pageQry);
$maks = ceil($jumlah/$baris);
$mulai = $baris * ($hal-1);

?>
<div class="well">
  <div class="row">
      <div class="col-md-6 text-left">
        <h4>Laporan Data Guru</h4>
      </div>
  </div>
  <br/>
  <table width="100%" class="table table-striped table-bordered" id="tabeldata">
      <thead>
                <tr>
                    <th width="30px">No</th>
         
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Kelamin</th>
            
                </tr>
            </thead>

           
            <tbody>
          <?php
          $mySql = "SELECT * FROM guru ORDER BY kode_guru ASC LIMIT $mulai, $baris ";
          $myQry = mysql_query($mySql, $koneksidb) or die ("GAGAL Koneksi~!".mysql_error());
          $nomor = $hal;
          while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
            $Kode = $myData['kode_guru'];
          ?>
          <tr>
            <td> <?php echo $nomor; ?> </td>
           
            <td> <?php echo $myData['nip']; ?> </td>
            <td> <?php echo $myData['nama_guru']; ?> </td>
            <td> <?php echo $myData['kelamin']; ?> </td>
           
          </tr>
        <?php } ?>
        </tbody>
  </table>
    </div>
  </div>
</div>
