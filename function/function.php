<?php

  function input($nama , $nis_siswa , $kelas , $jurusan , $email) {
    global $link;

    $query = "INSERT INTO siswa SET     nis_siswa = '$nis_siswa' ,
                                        nama = '$nama' ,
                                        kelas = '$kelas' ,
                                        jurusan = '$jurusan' ,
                                        email = '$email'";

    if (mysqli_query($link , $query) or die("Query Input Gagal")) {
      return true;
    } else {
      return false;
    }

  }
  function buatakun($nis , $username , $password , $level) {
    global $link;

    $query = "INSERT INTO akun SET nis = '$nis' ,
                                   username = '$username' ,
                                   password = '$password' ,
                                   level = '$level'";

    if (mysqli_query($link , $query) or die("Query Buat Akun Gagal")) {
      return true;
    } else {
      return false;
    }

  }

  function dataguru($nis_guru , $nama_guru , $email_guru) {
    global $link;


    $query = "INSERT INTO dataguru SET nama_guru = '$nama_guru',
                                       nis_guru = '$nis_guru',
                                       email_guru = '$email_guru'";

    if (mysqli_query($link , $query ) or die("Input Data Guru Gagal")) {
      return true;
    } else {
      return false;
    }
  }

  function buatekskul($nama_ekskul , $deskripsi) {
    global $link;

    $query = "INSERT INTO ekskul SET nama_ekskul = '$nama_ekskul' ,
                                     deskripsi = '$deskripsi'";

     if (mysqli_query( $link , $query) or die('Query Buat Eskul Gagal')) {
       return true;
     } else {
       return false;
     }

  }
  function register_ekskul($id_murid , $id_ekskul) {
    global $link;

    $query = "INSERT INTO anggota SET id_murid = '$id_murid',
                                      id_ekskul = '$id_ekskul'";

    if (mysqli_query($link , $query) or die("Query Register Ekskul Gagal")) {
      return true;
    } else {
      return false;
    }
  }
  function lihat_ekskul(){
    global $link;

    $query = "SELECT * FROM ekskul";
    $result = mysqli_query($link , $query) or die("Query lihat_ekskul ");

    return $result;
  }
  function tampil_anggota($id) {
    global $link;

    $query = "SELECT * FROM anggota JOIN ekskul ON ekskul.id_ekskul = anggota.id_ekskul
                                    JOIN siswa  ON siswa.nis_siswa = anggota.id_murid
                                    WHERE anggota.id_murid = $id";

    $result = mysqli_query($link , $query) or die('Query tampil_anggota Gagal');

    return $result;
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

  function tampil() {
    global $link;

    $query = "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.kelas
                                  JOIN jurusan ON jurusan.id_jurusan = siswa.jurusan
                                  JOIN akun ON siswa.nis_siswa = akun.nis";
    $result = mysqli_query($link , $query ) or die("Query tampil gagal");

    return $result;
  }
  function tampil_akun(){
    global $link;

    $query = "SELECT * FROM akun";
    $result = mysqli_query($link ,$query) or die('Query Tampil_Akun Gagal');

    return $result;

  }
  function tampil_siswa_id($nis_siswa) {
    global $link;

    $query = "SELECT * FROM siswa WHERE nis_siswa = $nis_siswa";
    $result = mysqli_query($link , $query) or die("Query Tampil Siswa Gagal");

    return $result;

  }

  function tampilekskul(){
    global $link;

    $query = "SELECT * FROM ekskul";
    $result = mysqli_query($link , $query) or die("Query Tampil Ekskul Gagal");

    return $result;

  }
  function tampiperekskul($id_ekskul) {
    global $link;

    $query = "SELECT * FROM ekskul WHERE id_ekskul = $id_ekskul";
    $result = mysqli_query($link , $query) or die('Query Tampil Per Ekskul Gagal');

    return $result;
  }

  function cek_keanggotaan($nis_siswa , $id_ekskul) {
    global $link;

    $query = "SELECT * FROM anggota WHERE id_murid = $nis_siswa AND id_ekskul = $id_ekskul";
    $result = mysqli_query($link , $query) or die('Query cek_keanggotaan Gagal');

    return $result;

  }

  function profiles($nis) {
    global $link;

    $query = "SELECT * FROM akun INNER JOIN siswa ON akun.nis = siswa.nis_siswa
                                JOIN jurusan ON jurusan.id_jurusan = siswa.jurusan
                                JOIN kelas ON kelas.id_kelas = siswa.kelas WHERE nis = $nis ";
    $result = mysqli_query($link , $query) or die('Query Profile Gagal');

    return $result;
  }

  function cek_username($username) {
    global $link;

    $query = "SELECT username FROM akun WHERE username = '$username'";
    $result = mysqli_query($link , $query) or die('Cek Username Gagal');

    return $result;

  }

  function cek_nis_siswa($nis_siswa) {
    global $link;

    $query = "SELECT nis_siswa FROM siswa WHERE nis_siswa = '$nis_siswa'";
    $result = mysqli_query($link , $query) or die('Query cek_nis_siswa Gagal');

    return $result;

  }

  function settings($nis_siswa , $nama , $kelas , $jurusan , $email)   {
    global $link;

    $query = "UPDATE siswa SET nama = '$nama' ,
                               kelas = '$kelas' ,
                               jurusan = '$jurusan' ,
                               email = '$email'
                           WHERE nis_siswa = '$nis_siswa'";
    if (mysqli_query($link , $query) or die('Query settings Gagal')) {
      return true;
    } else {
      return false;
    }

  }
  function tampilguru(){
    global $link;

    $query = "SELECT * FROM dataguru";
    $result = mysqli_query($link , $query) or die("Query tampilguru gagal");

    return $result;

  }
  function tampil_semua_id($nis_siswa) {
    global $link;

    $query = "SELECT * FROM siswa INNER JOIN jurusan ON siswa.kelas = jurusan.id_jurusan
                                        JOIN kelas ON siswa.kelas = kelas.id_kelas
                                        WHERE nis_siswa = $nis_siswa ";
    $result = mysqli_query($link , $query) or die('Query tampil_semua_id Gagal');

    return $result;

  }
  function http_redirect(){
    header('location:index.php');

    return;
  }
  function uploadgambar($nis , $gambar) {
    global $link;

    $query = "UPDATE akun SET gambar = '$gambar' WHERE nis = $nis";

    if (mysqli_query($link , $query) or die("Query uploadgambar Gagal")) {
      return true;
    } else {
      return false;
    }
  }
  function ambilgambar($nis){
    global $link;

    $query = "SELECT gambar FROM akun WHERE nis = $nis";
    $result = mysqli_query($link , $query) or die('Query ambilgambar Gagal');

    return $result;
  }
  function hitunguser() {
    global $link;

    $query = "SELECT COUNT(*) AS jumlah FROM akun";
    $result = mysqli_query($link , $query) or die("Query hitunguser Gagal");

    return $result;
  }
  function hitungguru() {
    global $link;

    $query = "SELECT COUNT(*) AS jumlah FROM dataguru";
    $result = mysqli_query($link , $query) or die("Query hitunguser Gagal");

    return $result;
  }
  function hitungekskul() {
    global $link;

    $query = "SELECT COUNT(*) AS jumlah FROM ekskul";
    $result =  mysqli_query($link , $query) or die("Query hitungekskul Gagal");

    return $result;

  }
 ?>
