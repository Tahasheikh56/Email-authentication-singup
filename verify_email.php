<?php
session_start();
include("dbcon.php");
if(isset($_GET["token"])){
$token = $_GET["token"];
$query  = "SELECT * FROM users WHERE verify_token = '$token'";
$q = mysqli_query($con,$query);

if(mysqli_num_rows($q) > 0){
$row = mysqli_fetch_array($q);

if($row["verify_status"] == "0"){
   $click_token = $row["verify_status"];
   $upd_query = "UPDATE users SET verify_status = '1' WHERE verify_status = '$click_token'";
    $q = mysqli_query($con,$upd_query);

    if($q){
        $_SESSION["status"] = "Your verification has been successful..";
        header("Location:login.php");
        exit(0);
    }
    else{
        $_SESSION["status"] = "Verification has been Failed..";
        header("Location:login.php");
        exit(0);
    }
}
else{
    $_SESSION["status"] = "Email has already exists..";
    header("Location:login.php");
    exit(0);
}

}
else{
    $_SESSION["status"] = "This does Not Exists..";
    header("Location:login.php");
}

}
else{
    $_SESSION["status"] = "Not Allowed..";
    header("Location:login.php");
}
?>