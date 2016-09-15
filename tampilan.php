<?php
require_once('db/connect.php');
require_once('function/function.php');
$id_ekskul = $_GET['id'];
$hasil = tampiperekskul($id_ekskul);

$result = mysqli_fetch_assoc($hasil);

 ?>

  <div class="container">
    <h1><?php echo $result['nama_ekskul'] ?></h1>
    <p><a href=""> Info </a></p>
    <p><a href=""> Update </a></p>
    <p><a href=""> Jadwal </a></p>
  </div>
