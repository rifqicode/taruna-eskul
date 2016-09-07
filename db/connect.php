<?php
// Koneksi ke data base

  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'taruna_eskul';

// koneksi disimpan kedalam variabel $link

  $link = mysqli_connect($host , $username , $password , $database) or die('Koneksi ke database gagal');

 ?>
