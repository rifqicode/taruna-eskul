<?php
session_start();
require_once('../db/connect.php');
require_once('../function/function.php');

// if ($_SESSION['username'] == NULL ) {
//   echo "";
// } else {
//   header('Location:index.php');
// }

 ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STARBHAK - EXTRACURRICULAR</title>

        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/tblogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong><center> <img src="../images/tarunabhaktiwh.png" width="200" height="180"> </center></strong></h1>
                            <div class="description">
                            	<p>
                                <a href="index.html"><strong>STARBHAK EXTRACURRICULAR</strong></a>
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login </h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
			                        </div>
			                        <input type="submit" name="submit" value="Sign In!" class="btn btn-primary btn-lg btn-block">
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
                                    $_SESSION['nis'] = $hasil['nis'];
                                    header('Location:../index.php');
                                  } else {
                                    ?> <script type="text/javascript"> alert("Username / Password Salah");</script><?php
                                  }
                              }
                            }
                               ?>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">

                        </div>
                    </div>
                </div>
            </div>

        </div>
            <footer> <!-- start of #footer section -->
    <div class="footer" class="container">
        <div class="row">
            <div id="footer_left" class="span4">
                                                 &nbsp;
            </div>
            <div id="footer_center" class="span4">
                                                 &nbsp;
            </div>
            <div id="footer_right" class="span4">
            <div id="software_name">
                    Portal <a href="index.html" target="_blank"> STARBHAK-EXTRACURRICULAR  </a>
                    &copy; 2016
            </div>
                                                &nbsp;
            </div><!-- end of #footer_right -->
        </div><!-- end of #row -->
    </div><!-- end of #container -->
</footer>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
