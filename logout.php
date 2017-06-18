<?php
session_start();
if (isset($_SESSION['users'])){
  unset($_SESSION['users']);
  require_once('index.php');
}else{
  require_once('index.php');
}

 ?>
