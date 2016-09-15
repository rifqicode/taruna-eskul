<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:login.php');
}

$nis = $_SESSION['nis'];

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <!-- Mirrored from getbootstrap.com/examples/jumbotron/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2015 11:55:32 GMT -->
 <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="../../favicon.ico">

     <title>Starbhak -- Ekskul </title>

     <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="jumbotron.css" rel="stylesheet">

     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
     <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
     <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
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
                 <li class="active"><a href="index.php">Home Page</a></li>
                 <li><a href="list.php">List Ekskul</a></li>
                 <li><a href="event.php">Event Sekolah</a></li>
                 <?php if($_SESSION['level'] == 'admin') { ?> <li><a href="lumino/">Admin Panel</a></li> <?php } ?>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li><a class="navbar-brand" src="images/" href="addfoto.php" alt=""></a></li>
                 <li><a href="profile.php">Profiles</a></li>
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
       <form method="post" action="proses/upload.php" enctype="multipart/form-data">
       <table class="table">
         <tr>
           <td> Upload Foto Profile </td>
         </tr>
         <tr>
           <td><input type="file" name="gambar"></td>
         </tr>
         <tr>
           <td> <input class="btn btn-primary "type="submit" name="submit" value="Upload">
                <a class="btn btn-danger" href="index.php">Batal</a></td>
         </tr>
       </table>
     </form>
     </div>
   </body>
</html>
