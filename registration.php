<?php
session_start();
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
    <title>Registration</title>
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
        <h2>Registration</h2>
        <div class="alert">
            <?php
            if (isset($_SESSION["status"])) {
                echo "<h6 class = 'alert alert-success'>" . $_SESSION["status"] . "</h6>";
                unset($_SESSION["status"]);
            }
            ?>
        </div>
        <form action="mail.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit" name="send">Registration</button>
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>

</html>