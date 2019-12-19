<?php
//koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form
	$nim = $_POST['NIM'];
	$nama = $_POST['nama'];
	$ip = $_POST['ip'];
	$kt = $_POST['kt'];
	$prestasi = $_POST['prestasi'];
	$pb = $_POST['pb'];

//menginput data ke database
//echo "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$ip', '$kt', '$prestasi', '$pb')";
	$SQL = "INSERT INTO mahasiswa (NIM, Nama, ip, kt, prestasi, pb) VALUES ('$nim', '$nama', '$ip', '$kt', '$prestasi', '$pb')";
	if (mysqli_query($koneksi, $SQL)) {
	} else {
		echo "Error: Could not able to execute $SQL".mysqli_error($koneksi);
	}


//mengalihkan halaman kembali ke index.php
// header("location:home.php");
?>
