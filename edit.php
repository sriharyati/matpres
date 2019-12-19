<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
            include 'koneksi.php';
            $nim = $_GET['NIM'];
            $data = mysqli_query($koneksi, "select * from  mahasiswa where NIM='$nim' ");
           while ($d = mysqli_fetch_assoc($data)) {
            ?>
            <form method="post" action="edit_proses.php">
            	<table>
            <div class="form-group">
              <label for="usr">NIM</label>
              <input type="hidden" class="form-control" id="nim" name="NIM" value="<?php echo $d['NIM']; ?>">
            </div>
            <div class="form-group">
              <label for="jns">Nama Mahasiswa</label>
              <input type="pwd" class="form-control" id="nam" name="nama" value="<?php echo $d['Nama']; ?>">
            </div>
            <div class="form-group">
              <label for="sup">Indeks Prestasi</label>
              <input type="text" class="form-control" id="ipk" name="ip" value="<?php echo $d['ip']; ?>">
            </div>
            <div class="form-group">
              <label for="mo">Karya Tulis Ilmiah</label>
              <input type="text" class="form-control" id="kti" name="kt" value="<?php echo $d['kt']; ?>">
            </div>
            <div class="form-group">
              <label for="ju">Jumlah Capaian Prestasi</label>
              <input type="text" class="form-control" id="pres" name="prestasi" value="<?php echo $d['prestasi']; ?>">
            </div>
            <div class="form-group">
              <label for="jum">Penguasaan Bahasa Asing</label>
              <input type="text" class="form-control" id="pba" name="pb" value="<?php echo $d['pb']; ?>">
            </div
            <div class="input-group">     
            <input type="submit" class="btn btn-primary" value="Edit">
          </div>
          <br>
          </table>
          </form>
  <?php
}
 ?>

</body>
</html>