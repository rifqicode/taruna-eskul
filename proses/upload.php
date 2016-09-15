<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:login.php');
}

$nis = $_SESSION['nis'];
// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;

        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :
            if (uploadgambar($nis , $nama_file)) {
              header('Location:index.php');
            } else {
              echo "Gambar Gagal Di Upload";
            }
        }

?>
