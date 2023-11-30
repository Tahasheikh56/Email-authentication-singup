<?php
session_start();
if(!isset($_SESSION["name"])){
  $_SESSION["status"] = "Please login to access Home Page";
  header("Location:login.php");
}
?>