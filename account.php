<?php
//error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conpassword = $_POST['conpassword'];
    $password = $_POST['password'];
    $username = $_SESSION['username'];
    $err="";


    $hpassword = password_hash($password, PASSWORD_DEFAULT);

    if (!empty(trim($password)) && !empty(trim($conpassword))) {


        if ($conpassword == $password) {

            if(strlen($password)>4){
                $sql = "UPDATE users SET password = '$hpassword' WHERE username = '$username'";
                mysqli_query($conn, $sql);
            }
            else{
                echo "err";
                $err="Password must contain atleast 5 characters";
            }
            
        } else {
            echo "err";
            $err ="Passwords should match";
        }
    }
    else{
        $err="Fill all fields";
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
    <link rel="stylesheet" href="css1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>


<body>

    <nav>
        <ul>
            <a>
                <li class="brand"><img class="hello" src="./images/logo.png" alt="Spotify">Spotify</li>
                <div class="buttons">
                    <a href="test.php"><button class="home">Home</button></a>
                    <a href="about.html"><button class="home">About</button></a>
                </div>
                <div class="logbutton">
                    <a href="logout.php"><button class="loginbutt">Logout</button></a>
                </div>
        </ul>
    </nav>



    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" style="width: 50%" src="userimage.jpg" alt="1"><span class="font-weight-bold">

                        <?php
                        // session_start();
                        echo $_SESSION['username'];



                        ?>
                    </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Change Password</h4>
                    </div>
                    <form action="" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12" style="padding-top: 10px;"><label class="labels">Password</label><input name="password" type="password" class="form-control" placeholder="enter password" value=""></div>
                            <div class="col-md-12" style="padding-top: 10px;"><label class="labels">Confirm Password</label><input name="conpassword" type="password" class="form-control" placeholder="enter password again" value=""></div>
                            
                        </div>
                        <br>
                        
                        <?php
                        

                        if(!empty($err)){
                        echo "<div id='warningus' class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Holy guacamole!</strong> " . $err . "
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                        
                        ?>



                        <div class="mt-3"><button class="btn btn-primary profile-button" type="submit">Save Password</button></div>
                </div>
            </div>
            </form>
            <div class="col-md-4">
                <div class="p-3 py-5">
                  
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>