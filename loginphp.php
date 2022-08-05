<?php

//error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (isset($_SESSION['username'])) {
    header('location: home.php');
    exit;
}

require_once "config.php";

$username = "";
$password = $err = "";
if (isset($_POST)) {
   if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Username or Password cannot be blank";
        header("location: login.php");
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        echo "in";
        $sql = "SELECT id,username,password FROM users where username=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            //if username exists
            if (mysqli_stmt_num_rows($stmt) == 1) {

                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        //password correct
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $id;
                        $_SESSION['loggedin'] = true;

                        header("location: home.php");
                    }
                }
            } else {
                $err = "Invalid Username or Password";
                header("Location: login.php");
            }
        }
    }
}
?>