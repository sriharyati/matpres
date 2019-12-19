<?php
	include 'koneksi.php';
    $pb = "";
	$kt = "";
	$ip = "";
	$prestasi = "";
	$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM");
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
		if ($d['kt']<1 && $d['kt']>=0){
			$kt = 1;
		} else if ($d['kt']<3 && $d['kt']>=2){
			$kt = 2;
		} if ($d['kt']<5 && $d['kt']>=4){
			$kt = 3;
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
		global $prestasi;
		$prestasi = $d['prestasi'];
		if ($prestasi<=1){
			$prestasi = 1;
		} else if ($prestasi<=3 && $prestasi>=2){
			$prestasi = 2;
		} else if ($prestasi<=5 && $prestasi>=4){
			$prestasi = 3;
		}
		$SQL = "INSERT INTO konversi (NIM,ip,kt,prestasi,pb) VALUES (".$d['NIM'].", ".$GLOBALS['ip'].", ".$GLOBALS['kt'].",".$GLOBALS['prestasi'].", ".$GLOBALS['pb'].")";
		$update = "UPDATE KONVERSI SET NIM=".$d['NIM'].",ip=".$GLOBALS['ip'].",kt=".$GLOBALS['kt'].",prestasi=".$GLOBALS['prestasi'].",pb=".$GLOBALS['pb']."";
		if ($d['NIM'] != $d['NIM']) {
			mysqli_query($koneksi, $SQL);
			// echo "SUkses ya";
		} else if($d['NIM'] == $d['NIM']){
			mysqli_query($koneksi, $update);
			// echo "Sukses ya";
		}else{
			echo "Error: Could not able to execute $SQL".mysqli_error($koneksi);
		}
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Konversi</title>
				<meta charset="utf-8">
		 		<meta name="viewport" content="width=device-width, initial-scale=1">
		 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		 		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  			<span class="navbar-text">
   				<h4>Konversi Data Mahasiswa</h4>
  			</span>
		</nav>
		<br>
		<div class="container">
			<h2>Data Hasil Konversi Mahasiswa Prestasi</h2>     
			<table class="table table-striped">
				<thead>
					<tr>
						<th>NIM</th>
							<!-- <th>Nama Mahasiswa</th> -->
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
						$data = mysqli_query($koneksi, "SELECT * FROM Konversi");
						while ($d = mysqli_fetch_array($data)) {
							?>
							<tr>
								<td><?php echo $d['NIM']; ?></td>
								<!-- <td><?php echo $d['Nama']; ?></td> -->
								<td><?php echo $d['ip']; ?></td>
								<td><?php echo $d['kt']; ?></td>
								<td><?php echo $d['prestasi']; ?></td>
								<td><?php echo $d['pb']; ?></td>
							</tr>
						<?php
							} 
						?>
					</div>
				</tbody>
			</table>
			<a class="btn btn-success" href="saw.php" id="saw">SAW</a>
		</div>
	</body>
</html>