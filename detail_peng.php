<?php 
include 'koneksi/config.php';

if ($_POST['rowid']) {
	$id=$_POST['rowid'];

	$sql=mysqli_query($koneksi,"SELECT * FROM pengumuman WHERE id_peng=$id");
	foreach ($sql as $baris) {
		?>

		 <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo $baris['judul_peng'];?></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data">
                    	<img src="" class="image-responsive" alt="gambar">
                    	<p><?php echo $baris['isi_peng']; ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
		
<?php 

	}
}

?>