<?php
session_start();

if ($_SESSION['level'] == 'admin') {
  header('Location:lumino/');
} else {
  echo "";
}

?>
