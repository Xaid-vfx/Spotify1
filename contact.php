<?php
//error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $desc = $_POST['message'];


  if (!empty(trim($_POST['username'])) || !empty(trim($_POST['cvv'])) || !empty(trim($_POST['cardno']))) {

    $qry = "INSERT INTO contact VALUES('$username','$email','$desc')";
    mysqli_query($conn, $qry);
    // header("location: test.php");
    $msg = "Sent";
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



  <section id="contact">
   
    <h1 style="text-align: center; padding: 2%;">Contact Us</h1>
    <div style="text-align: center">
      <?php
      if(!empty($msg)){
        echo "<div style='display:flex; justify-content:center'>
        <div id='warningus' class='alert alert-warning alert-dismissible fade show' role='alert'>
        " . $msg . "
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        </div>";
    }
      ?>
    </div>

    <div class="contact-wrapper">

      <!-- Left contact page -->

      <form id="contact-form" class="form-horizontal" role="form" action="" method="post">

        <div class="form-group">
          <div class="col-sm-12">
            <h4>Username</h4>
            <input type="text" class="form-control" id="name" placeholder="NAME" name="username" value="" required>
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-12">
            <h4>Email</h4>
            <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
          </div>
        </div>
        <br>
        <h4>Message</h4>
        <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>

        <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
          <span class="send-text">SEND</span>
          <div class="alt-send-button">
            <i class="fa fa-paper-plane"></i>
          </div>

        </button>

      </form>

      <!-- Left contact page -->

      <div class="direct-contact-container">

        <ul class="contact-list">
          <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">Blr, Karnataka</span></i></li>

          <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">(+91) 705-236</a></span></i></li>

          <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email">hitmeup@gmail.com</a></span></i></li>

        </ul>

        <hr>

        <div class="copyright">&copy; ALL OF THE RIGHTS RESERVED</div>

      </div>

    </div>

  </section>
  </div>










  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>