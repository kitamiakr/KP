

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>input pengumuman</h2>
  <form method="POST" action="proses_input_pres.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="judul">judul prestasi</label>
      <input type="text" name="judul" class="form-control" id="judul" placeholder="judul pengumuman">
    </div>
    <div class="form-group">
      <label for="tgl">tanggal</label>
      <input type="date" class="form-control" id="tgl" name="tanggal">
    </div>
    <div class="form-group">
      <label for="gambar">upload gambar</label>
      <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
     <div class="form-group">
      <label for="isi">isi</label>
    <textarea class="form-control" id="isi" name="isi_pres" rows="3"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
