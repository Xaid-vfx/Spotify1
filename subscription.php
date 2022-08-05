<?php
//error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $cardno = $_POST['cardno'];
    $cvv = $_POST['cvv'];
    $type = $_POST['type'];
    

    if (!empty(trim($_POST['username'])) || !empty(trim($_POST['cvv'])) || !empty(trim($_POST['cardno']))) {

        if ($username == $_SESSION['username']) {
            if ($type == "Normal")
                $qry = "INSERT INTO normal VALUES('$username','$cardno','$cvv')";
            else
                $qry = "INSERT INTO premium VALUES('$username','$cardno','$cvv')";
            mysqli_query($conn, $qry);
            header("location: test.php");
        } else {
            $error = "Enter correct username";
        }
    } else {
        echo "eroor";
        $error = "Fill all fields";
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>

    <div class="padding">
        <div class="row">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-sm-8 col-md-6">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-6">
                                    <span>CREDIT/DEBIT CARD PAYMENT</span>

                                </div>

                                <div class="col-md-6 text-right" style="margin-top: -5px;">

                                    <img src="https://img.icons8.com/color/36/000000/visa.png">
                                    <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                                    <img src="https://img.icons8.com/color/36/000000/amex.png">

                                </div>

                            </div>

                        </div>
                        <div class="card-body" style="height: 500px">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cc-number" class="control-label">USERNAME</label>

                                    <input name="username" id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="Enter username" required>
                                    <br>

                                    <label for="cc-number" class="control-label">CARD NUMBER</label>

                                    <input name="cardno" id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" required>
                                    <br>
                                </div>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label">CARD EXPIRY</label>
                                            <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="&bull;&bull; / &bull;&bull;" required>
                                        </div><br>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc-cvc" class="control-label">CVV</label>
                                            <input name="cvv" id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="&bull;&bull;&bull;&bull;" required>
                                        </div>
                                    </div><br>

                                </div>


                                <div class="form-group">
                                    <label for="numeric" class="control-label">CARD HOLDER NAME</label>
                                    <input type="text" class="input-lg form-control">
                                </div><br>
                                <div class="form-group col-md-4">
                                    <label for="inputState">TYPE</label>
                                    <select id="inputState" class="form-control" name="type">
                                        <option selected>Choose...</option>
                                        <option>Normal</option>
                                        <option>Premium</option>
                                    </select>
                                </div>

                                <div class="form-group">

                                    <br>
                                    <?php
                                    if (!empty($error)) {
                                        echo "<div style='display:flex; justify-content:center'>
        <div id='warningus' class='alert alert-warning alert-dismissible fade show' role='alert'>
        " . $error . "
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        </div>";
                                    }
                                    ?>
                                    <button type="submit" class="btn btn-success btn-lg form-control" style="font-size: .8rem;"> Subscribe</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>