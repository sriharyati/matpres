<?php
include 'koneksi.php';

//menangkap data yang dikirim dari form
$nim = $_POST['NIM'];
$nama = $_POST['nama'];
$ip = $_POST['ip'];
$kt = $_POST['kt'];
$prestasi = $_POST['prestasi'];
$pb = $_POST['pb'];

//update data ke database
$query = "update mahasiswa set Nama='$nama', ip='$ip', kt='$kt', prestasi='$prestasi', pb='$pb' where NIM='$nim'";
$result = mysqli_query($koneksi, $query);
// var_dump((mysqli_error($koneksi));

header("location:home.php");