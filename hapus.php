<?php
include 'koneksi.php';

$nim = $_GET['NIM'];

mysqli_query($koneksi, " delete from mahasiswa where NIM='$nim'");

header("locatiOn:home.php");
  ?>