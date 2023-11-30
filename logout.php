<?php
session_start();
session_unset();
session_destroy();
$_SESSION["status"] = "you logged out successfully..."; 
header("Location:login.php");
?>