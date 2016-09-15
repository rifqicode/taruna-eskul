<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:login.php');
}

$nis = $_SESSION['nis'];
$profile = profiles($nis);
$hasilprofile = mysqli_fetch_assoc($profile);
$gambar = ambilgambar($nis);
$hasilgambar = mysqli_fetch_assoc($gambar);

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title> Profiles <?php echo $_SESSION['username']; ?></title>
     <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="jumbotron.css" rel="stylesheet">
   </head>
   <body>
     <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href=""></a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                 <li><a href="index.php">Home Page</a></li>
                 <li><a href="list.php">List Ekskul</a></li>
                 <li><a href="event.php">Event Sekolah</a></li>
                 <?php if($_SESSION['level'] == 'admin') { ?> <li><a href="lumino/">Admin Panel</a></li> <?php } ?>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li><a class="navbar-brand" href="addfoto.php"><img src="images/<?php echo $hasilgambar['gambar']; ?>" alt="" class="img-circle" height="30" width="35"></a></li>
                 <li class="active"><a href="">Profiles</a></li>
                 <li><a href="settings.php">Setting</a></li>
                 <li><a href="proses/logout.php">Logout</a></li>
               </ul>
             </div>
       </div>
        </nav>
       <div class="jumbotron">
         <div class="container">
           <h1>Starbhak Ekskul</h1>
           <p>Tempat anda untuk bergabung dengan ekskul ekskul disekolah </p>
         </div>
       </div>
       <div class="container">
         <h2>Profile <?php echo $hasilprofile['nama']; ?></h2><br><br>
         <table class="table">
           <tr>
             <td><h2>Data Diri</h2></td>
           </tr>
           <tr>
             <td> NIS </td>
             <td> <?php echo $hasilprofile['nis']; ?></td>
           </tr>
           <tr>
             <td> Username </td>
             <td> <?php echo $hasilprofile['username']; ?></td>
           </tr>
           <tr>
             <td> Nama </td>
             <td> <?php echo $hasilprofile['nama']; ?></td>
           </tr>
           <tr>
             <td> Kelas </td>
             <td> <?php echo $hasilprofile['kelas']; ?></td>
           </tr>
           <tr>
             <td> Jurusan </td>
             <td> <?php echo $hasilprofile['jurusan']; ?></td>
           </tr>
           <tr>
             <td> email </td>
             <td> <?php echo $hasilprofile['email']; ?></td>
           </tr>
         </table>

       </div>




   </body>
 </html>
