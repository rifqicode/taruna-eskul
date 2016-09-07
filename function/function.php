<?php

  function input($nama , $kelas , $jurusan , $email) {
    global $link;

    $query = "INSERT INTO siswa SET     nama = '$nama' ,
                                        kelas = '$kelas' ,
                                        jurusan = '$jurusan' ,
                                        email = '$email'";

    if (mysqli_query($link , $query) or die("Query Input Gagal")) {
      return true;
    } else {
      return false;
    }

  }

  function tampilkelas() {
    global $link;

    $query = "SELECT * FROM kelas";
    $result = mysqli_query($link , $query) or die('Query TampilKelas Gagal');

    return $result;

  }

  function tampiljurusan() {
    global $link;

    $query = "SELECT * FROM jurusan";
    $result = mysqli_query($link , $query ) or die("Query TampilJurusan Gagal");

    return $result;

  }

 ?>
