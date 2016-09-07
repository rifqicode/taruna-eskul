<?php
session_start();
require_once('db/connect.php');
require_once('function/function.php');

// if ($_SESSION['username'] == NULL ) {
//   echo "";
// } else {
//   header('Location:index.php');
// }

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title> Login Page </title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
     <form method="post">
     <br><br><br><br>
     <table align="center">
       <tr>
         <td> Username : </td>
         <td> <input type="text" name="username" value=""></td>
       </tr>
       <tr>
         <td> Password : </td>
         <td> <input type="text" name="password" value=""></td>
       </tr>
       <tr>
         <td> <input type="submit" name="submit" value="Sign In!"></td>
       </tr>
     </table>
   </form>
   <!-- Fungsi Login -->
   <?php

   if (isset($_POST['submit'])) {

     $username = $_POST['username'];
     $password = md5($_POST['password']);

     if (empty($username) || empty($password)) {
       ?> <script type="text/javascript"> alert("Harap Masukan Username / Password Terlebih Dahulu ");</script> <?php
     } else {
        global $link;
       $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
       $result = mysqli_query($link , $query)or die("query gagal");
       $hasil = mysqli_fetch_assoc($result);

       if ($hasil['username'] == $username AND $hasil['password'] == $password) {
         $_SESSION['username'] = $username;
         $_SESSION['level'] = $hasil['level'];
         header('Location:index.php');
       } else {
         ?> <script type="text/javascript"> alert("Username / Password Salah");</script><?php
       }
   }
 }
    ?>
   </body>
 </html>
