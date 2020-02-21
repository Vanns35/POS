<?php

session_start();

if($_SESSION['username'] == null){
   header("location: login.php");
}
else {
  header("location: dashboard.php");
}
?>