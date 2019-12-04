<?php
//koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form
$NIM = $_POST['NIM'];
$nama = $_POST['nama'];
$ip = $_POST['ip'];
$kt = $_POST['kt'];
$prestasi = $_POST['prestasi'];
$pb = $_POST['pb'];

//menginput data ke database
mysqli_query($koneksi, "insert into mahasiswa values ('$NIM', '$nama', '$ip', '$kt', '$prestasi', '$pb')");

//mengalihkan halaman kembali ke index.php
header("location:home.php");
?>
