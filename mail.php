<?php
session_start();
include("dbcon.php");
function verifyEmail($email,$token){
	extract($_POST);
	$toEmail = $email;
    $sub = "Email Verification.";

$body = "
	You have registerd with sasolution
	Verify your email address to login with the below given link
     <a href = 'https://citypropertyweek.com/fiver-project/verify_email.php?token=$token'>Click Me</a>
	";
	
     $mailSent  =   mail($toEmail,$sub, $body,"sasolution@gmail.com");
}

if(isset($_POST["send"])){
	extract($_POST);
    // create token 
	$token = md5(rand());

	//date
	date_default_timezone_set("Asia/Karachi");
     $date=date("Y-m-d h:i:s");

	// email check
	$checkemail = mysqli_query($con,"SELECT email FROM users WHERE email = '$email'");
    if($checkemail->num_rows > 0){
       $_SESSION["status"] = "Email has already exists..";
	   header("Location:registration.php");
	}

	else{
	$q = "INSERT INTO users VALUES ('', '$name', '$email', '$pass', '$token','','$date')";
	$query = mysqli_query($con, $q);

	 if($query > 0){
		verifyEmail("$email","$token");
		$_SESSION["status"] = "Registration has been successfull.Please verify your Email Address.!";
		header("Location:registration.php");
	 }

	 else{
		$_SESSION["status"] = "Registration Failed..";
		header("Location:registration.php");
	 }

	}
}
 ?>