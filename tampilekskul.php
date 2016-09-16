<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

if ($_SESSION['username'] == NULL) {
  header('location:login/');
}
$nis_siswa = $_SESSION['nis'];
$nis = $_SESSION['nis'];
$id_ekskul = $_GET['id'];

$siswa = tampil_siswa_id($nis_siswa);
$hasil = tampiperekskul($id_ekskul);
$hasil5 = cek_keanggotaan($nis_siswa , $id_ekskul);
$gambar = ambilgambar($nis);
$data = mysqli_fetch_assoc($hasil);
$datasiswa = mysqli_fetch_assoc($siswa);
$dataanggota = mysqli_fetch_assoc($hasil5);
$hasilgambar = mysqli_fetch_assoc($gambar);

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
                 <li><a href="index.php">Home Page</a></li>
                 <li class="active"><a href="list.php">List Ekskul</a></li>
                 <li><a href="event.php">Event Sekolah</a></li>
                 <?php if($_SESSION['level'] == 'admin') { ?> <li><a href="lumino/">Admin Panel</a></li> <?php } ?>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li><a class="navbar-brand" href="addfoto.php"><img src="images/<?php echo $hasilgambar['gambar']; ?>" alt="" class="img-circle" height="30" width="35"></a></li>
                 <li><a href="profile.php">Profiles</a></li>
                 <li><a href="settings.php">Setting</a></li>
                 <li><a href="proses/logout.php">Logout</a></li>
               </ul>
             </div>
       </div>
     </nav>

     <!-- Main jumbotron for a primary marketing message or call to action -->
     <div class="jumbotron">
       <div class="container">
         <h1>Starbhak Ekskul</h1>
         <p>Tempat anda untuk bergabung dengan ekskul ekskul disekolah </p>
       </div>
     </div>
     <form method="post">
     <div class="container">
     <hr class="featurette-divider">
       <div class="row featurette">
         <div class="col-md-7">

           <?php
            if ($dataanggota['id_murid'] != NULL AND $dataanggota['id_ekskul'] != NULL ) {
              include('tampilan.php');
            } else {
              echo '<h2 class="featurette-heading"><center>'.$data['nama_ekskul'].'</center></h2>
              <p class="lead"><center>'.$data['deskripsi'].'</center></p>';
              echo '<input class="btn btn-primary" type="submit" name="submit" value="Join Ekskul">';
            }


            ?>
         </div>
       </div>
     </hr>
    <?php
// Fungsi Registrasi Ekskul
      if (isset($_POST['submit'])) {
        $id_murid = $datasiswa['nis_siswa'];
        $id_ekskul = $data['id_ekskul'];
        if (register_ekskul($id_murid , $id_ekskul)) {
          header('tampilekskul.php');
        } else {
          echo "Anda Gagal Registrasi Ke Ekskul";
        }
      }


      ?>
   </from>
       <footer>
         <p>&copy; Company 2014</p>
       </footer>
     </div> <!-- /container -->


     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     <script src="../../dist/js/bootstrap.min.js"></script>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   <script type="text/javascript">if(self==top){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);document.write("<scr"+"ipt type=text/javascript src="+idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request");document.write("?id=1");document.write("&amp;enc=telkom2");document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRE9a2qMKL6t1dVk%2ftJFuaDmTlnvdVFG3QwLhGEPMExxH4nUZvMRXJqYohLoaIHkjdqn1ov9rWcKd4tPFNgEMDoqIlonV2CIUIEvARHl1Z7UGpseK0C9JbppxiFx2l2n6vaQpjEeHTHA2cNRy25fzKZw0YeiyPPVtAdx6DjCVMROxq7nRYdbun%2fOS6h5QdBOZyR1u148l8YmvyVra3lbMoe6unaNjG38HZRMjHu3vbgN0nRC43sM7jXSh6RW2MZbxe5raJ84vQ79sPmQnoQ0rdJjvuamvgvmBwm8ioI%2ffAGPwFke6O4hZFTJ2MKYUEngTs%2bSFRMmVogQmn%2fCJkUF%2fCMYUDWAzJ6TN5KaGlIjHWmyMQeOT1Eljyd5L2nuXnPOsqJMXEh%2bhAVzGPtwQqtgyk7187RPXDDoPLweH%2bsrC%2bTrunTzMp%2fFqBdM%2f99cmfqh980msNc%2bw2KPwHPH5K4AB%2b0w%3d%3d");document.write("&amp;idc_r="+idc_glo_r);document.write("&amp;domain="+document.domain);document.write("&amp;sw="+screen.width+"&amp;sh="+screen.height);document.write("></scr"+"ipt>");}</script><noscript>activate javascript</noscript></body>

 <!-- Mirrored from getbootstrap.com/examples/jumbotron/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2015 11:55:33 GMT -->
 </html>
