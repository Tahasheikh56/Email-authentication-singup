<?php
session_start();
include("dbcon.php");

if(isset($_SESSION["name"])){
    $_SESSION["status"] = "you are already logged in..";
    header("Location:index.php");
    exit(0);
    }

if(isset($_POST["send"])){
if(!empty(trim($_POST["email"])) && !empty(trim($_POST["pass"]))){
$email = mysqli_real_escape_string($con,$_POST["email"]);
$pass = mysqli_real_escape_string($con,$_POST["pass"]);

$query = "SELECT * FROM users WHERE email = '$email' AND Password = '$pass'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run) > 0){
$row = mysqli_fetch_array($run);
if($row["verify_status"] == "1"){

$_SESSION["name"] = $row["name"]; 
$_SESSION["email"] = $row["email"]; 
$_SESSION["verify_token"] = $row["verify_token"]; 
$_SESSION["verify_status"] = $row["verify_status"]; 
$_SESSION["status"] = "you logged in successfully..."; 
header("Location:index.php");
}
else{
    $_SESSION["status"] = "Please verify email address"; 
}
}
else{
    $_SESSION["status"] = "Invalid email and password"; 
}

}
else{
    $_SESSION["status"] = "All Fields are mendetory"; 
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login </title>
    <style>
        body {
            background: linear-gradient(to right, #4b6cb7, #182848);
            font-family: Arial, sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeIn 1s ease-in;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.7);
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            height: 40px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #34cceb;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #1da6d9;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login Form</h2>
        <div class="alert">
            <?php
            if (isset($_SESSION["status"])) {
                echo "<h6 class = 'alert alert-success'>" . $_SESSION["status"] . "</h6>";
                unset($_SESSION["status"]);
            }
            ?>
        </div>
        <form action="" method="POST">
        <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" required>
            </div>
         
            <div class="form-group">
                <button type="submit" name="send">Login in</button>
            </div>
        </form>
        <p><a href="registration.php">Registration Here</a></p>
    </div>
</body>

</html>