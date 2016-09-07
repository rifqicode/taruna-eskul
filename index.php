<?php
session_start();

if ($_SESSION['username'] == NULL) {
  header('location:login.php');
}

if ($_SESSION['level'] == 'admin') {
  header('Location:lumino/');
} else {
  echo "";
}


?>
