<!-- <?php $matrixn = array();

	$matrixn[] = array('pb', 'kt', 'ip');
	$matrixn[] = array('pb', 'kt', 'ip');


	// echo "<pre>";
	// print_r($matrixn);

	//die(); ?> -->
 <!DOCTYPE html>
 <html>
 <head>
 	<title>SPK Matpres</title>
 	<head>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 		<style>

 		.topnav {
 			overflow: hidden;
 			background-color: #ea8685;
 		}

 		.topnav a {
 			float: right;
 			color: #f2f2f2;
 			text-align: center;
 			padding: 10px 20px;
 			text-decoration: none;
 			font-size: 17px;
 		}

 		.topnav a:hover {
 			background-color: #60a3bc;
 			color: black;
 		}
 		.topnab {
 			overflow: hidden;
 			background-color: #e66767;
 		}

 		.topnab p{
 			color: #f2f2f2;
 			text-align: center;
 			padding: 7px 5px;
 			text-decoration: none;
 			font-size: 17px;
 		}
 		.leftnav {
 			overflow: hidden;
 		}

 		.leftnav a {
 			color: #000000;
 			text-align: center;
 			text-decoration: none;
 			padding: 10px;
 			padding-right: 100%;
 			font-size: 17px;
 		}

 		.leftnav a:hover {
 			background-color: #4ec0f4;
 			color: black;
 		}
 	</style>
 	<script>
 	$(document).ready(function(){
 		$("#hitung").click(function(){
 			$("#tampilhitung").fadeIn();
 		});
 	});
 </script>
</head>
<body>
	<!-- <div class="topnav">
  <!--  <a href="logout.php">LogOut</a>
   <?php 
   //session_start();
   //echo $_SESSION['uname'];
   //session_destroy(); 
   ?> -->
   <!-- <br>
	<h2>Data Mahasiswa Prestasi</h2>
	<br> -->
<!-- </div> -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
  <!-- <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
  </ul>
 -->  <!-- Navbar text-->
  <span class="navbar-text">
   <h4>Sistem Pemilihan Keputusan Mahasiswa Berprestasi</h4>
  </span>
</nav>
<div class="container">
	<br>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		+ Tambah Data Mahasiswa
	</button>

	<br>  
	<br>  
	<h2>Data Mahasiswa Prestasi</h2>     
	<table class="table table-striped">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Indeks Prestasi</th>
				<th>Karya Tulis Ilmiah</th>
				<th>Jumlah Capaian Prestasi</th>
				<th>Penguasaan Bahasa Asing</th>
			</tr>
		</thead>
		<tbody>
			<div id="tabel">
				<?php 
				include 'koneksi.php';
				$no =1;
				$data = mysqli_query($koneksi, "select * from mahasiswa");
				while ($d = mysqli_fetch_array($data)) {
					?>
					<tr>
						<td><?php echo $d['NIM']; ?></td>
						<td><?php echo $d['Nama']; ?></td>
						<td><?php echo $d['ip']; ?></td>
						<td><?php echo $d['kt']; ?></td>
						<td><?php echo $d['prestasi']; ?></td>
						<td><?php echo $d['pb']; ?></td>
        <!-- //<td>
        <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-default btn-md">EDIT</a>
        <a href="hapus.php?id=<?php echo $d['id']; ?>"onClick="return confirm('Hapus Inputan?') class="btn btn-default btn-md">HAPUS</a>
    </td> -->
</tr>
<?php
} 
?>
</div>
</tbody>
</table>
<div class="input-group right">     
	<input type="submit" class="btn btn-success" value="Perhitungan SPK" id="hitung">
</div>
</div>
<div class="topnab">

</div>

<!-- Tambah Data -->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Mahasiswa</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="container">
				<form method="post" action="tambah_data.php">
					<div class="form-group">
						<label for="usr">NIM</label>
						<input type="text" class="form-control" id="usr" name="NIM">
					</div>
					<div class="form-group">
						<label for="jns">Nama</label>
						<input type="pwd" class="form-control" id="jns" name="nama">
					</div>
					<div class="form-group">
						<label for="sup">Indeks Prestasi</label>
						<input type="text" class="form-control" id="sup" name="ip">
					</div>
					<div class="form-group">
						<label for="mo">Karya Tulis Ilmiah</label>
						<input type="text" class="form-control" id="mo" name="kt">
					</div>
					<div class="form-group">
						<label for="ju">Capaian Prestasi</label>
						<input type="text" class="form-control" id="ju" name="prestasi">
					</div>
					<div class="form-group">
						<label for="jum">Penguasaan Bahasa Asing</label>
						<input type="text" class="form-control" id="jum" name="pb">
					</div>
					<div class="input-group">     
						<input type="submit" class="btn btn-primary" value="Tambahkan">
					</div>
					<br>
				</form>
			</div>

		</div>
	</div>
</div> 
</div>

<div id="tampilhitung" style="display: none">
	<?php
    ////////////////KONVERSI NILAI ///////////////////////
    $pb = "";
	$kt = "";
	$ip = "";
	$data = mysqli_query($koneksi, "select * from mahasiswa");
	while ($d = mysqli_fetch_array($data)){
     // KONVERSI IP
		global $ip;
		$ip = $d['ip'];
		if ($d['ip']<0.8 && $d['ip']>=0){
			$ip = 1;
		} else if ($d['ip']<=1.6 && $d['ip']>0.81){
			$ip = 2;
		} else if ($d['ip']<=2.4 && $d['ip']>1.61){
			$ip = 3;
		} else if ($d['ip']<=3.2 && $d['ip']>2.41){
			$ip = 4;
		}else if ($d['ip']<=4 && $d['ip']>3.21){
			$ip = 5;
		}
     // KONVERSI KT
		global $kt;
		$kt = $d['kt'];
		if ($d['kt']<20 && $d['kt']>=0){
			$kt = 1;
		} else if ($d['kt']<40 && $d['kt']>=21){
			$kt = 2;
		} if ($d['kt']<60 && $d['kt']>=41){
			$kt = 3;
		}
		if ($d['kt']<80 && $d['kt']>=61){
			$kt = 4;
		}
		if ($d['kt']<100 && $d['kt']>=81){
			$kt = 5;
		}
     // KONVERSI PB
		global $pb;
		$pb = $d['pb'];
		if ($pb==0){
			$pb = 1;
		} else if ($pb>0){
			$pb = 2;
		}
     // KONVERSI PRESTASI
     // BELUM DIBUAT 
	}
	
	///////////////// END OF KONVERSI NILAI ////////////
     ///////////////// CREATE MATRIX ////////////////////
	echo $GLOBALS['pb'];
		

     //////////////// END OF CREATE MATRIX //////////////

	?>
</div>
</body>
</html>