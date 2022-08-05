<?php
//error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "config.php";
session_start();

if (isset($_SESSION['username'])) {
    header('location: test.php');
    exit;
}
$username = "";
$password = $err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
   if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Username or Password cannot be blank";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
    if (empty($err)) {
        $sql = "SELECT username,password FROM users where username=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            //if username exists
            if (mysqli_stmt_num_rows($stmt) == 1) {

                mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        //password correct
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $id;
                        $_SESSION['loggedin'] = true;

                        header("location: test.php");
                    }
                    else {
                        $err = "Invalid Username or Password";
                    }
                }
            } 
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bds">
    <nav>
        <ul>
                <li class="brand"><img class="hello" src="./images/logo.png" alt="Spotify">Spotify</li>
                <div class="buttons">
                    <a href="index.php"><button class="home">Home</button></a>
                    <a href="about.html"><button class="home">About</button></a>
                </div>
                <div class="logbutton">
                    <a href="Register.php"><button class="loginbutt">Register</button></a>
                </div>
        </ul>
    </nav>



    <div class="container mt-4">
        <h3>Login Here</h3>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <br>
            <?php

            if (!empty(trim($err))) {
                echo "<div id='warningus' class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Holy guacamole!</strong> " . $err . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                $err="";
            }
            ?>
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>