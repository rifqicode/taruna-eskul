<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:login/');
}

$id = $_SESSION['nis'];
$nis = $_SESSION['nis'];
$nis_siswa = $_SESSION['nis'];
$anggota = tampil_anggota($id);
$namauser = tampil_siswa_id($nis_siswa);
$hasiluser = mysqli_fetch_assoc($namauser);
$gambar = ambilgambar($nis);
$hasilgambar = mysqli_fetch_assoc($gambar);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>STARBHAK - EXTRACURRICULAR</title>
    <link rel="shortcut icon" href="images/tblogoicon.png">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway" rel="stylesheet">
    <link href="style/customlist.css" rel="stylesheet">
    <link href="css/cfont-awesome.min" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <nav>
     <nav class=" navbar-default navbar-fixed-top">
  <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header2">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
              <li class=""><a href="index.php">HOME <span class="sr-only">(current)</span></a></li>
              <li class="active"><a type="submit" href="mylist.php">MY EXTRACURRICULAR</a></li>
              <li ><a href="list.php">EXTRACURRICULAR LIST</a></li>
              <li ><a href="event.html">SCHOOL EVENT</a></li>
              <?php if($_SESSION['level'] == 'admin') { ?>
              <li ><a href="lumino">ADMIN MANAGEMENT</a></li>
              <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li type="submit" class="profile-picture"><a><img src="images/<?php echo $hasilgambar['gambar']; ?>" width="40"
                  height="40"></a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $hasiluser['nama']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="addfoto.php">Change Avatar</a></li>
                      <li><a href="profile.php">Your Profile</a></li>
                      <li><a href="settings.php">Setting Profile</a></li>
                      <li><a href="proses/logout.php">LOGOUT</a></li>
                    </ul>
                  </li>
            </ul>
            </div><!-- /.navbar-collapse -->
          </div>
    </nav>
      <nav class=" navbar-default navbar-fixed-top">
  <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img src="images/tblogo.png" class="tblogo"></a>

        </div>
<br>
        <!-- Collect the nav links, forms, and other content for toggling -->
<!-- /.container-fluid -->

    </nav>



          <!-- HEADER -->
    <header class="container-fluid">
      <div class="row">
        <!--<img src="img/profile_picture.jpg" class="img-circle profile-picture">-->
        <h2>MY EXTRACURRICULAR</h2>
        <p>LET'S SHARE YOUR CREATION</p>
      </div>
    </header>
          <!--/HEADER-->

          <!-- MAIN CONTENT -->
      <div class="main-content container">
        <div class="row">
          <hr class="featurette-divider">
            <?php while ($data = mysqli_fetch_assoc($anggota)) { ?>
              <div class="col-md-4 portfolio-item">
                 <a href="#">
                     <img class="img-responsive" src="img/ekskul/silat.jpg" width="700"
                     height="400" alt="">
                 </a>
                 <h3>
                     <a href="#"><?php echo $data['nama_ekskul']; ?></a>
                 </h3>
                 <p><?php echo $data['deskripsi']; ?></p>
                 <p><a href="tampilekskul.php?id=<?php echo $data['id_ekskul']; ?>" class="btn btn-default" role="button">More Details..</a></p>
             </div>
            <?php } ?>
          </hr>
        </div>
      </div>
           <!--/MAIN CONTENT-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
