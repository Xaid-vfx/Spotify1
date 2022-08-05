<?php
//error
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $desc = $_POST['message'];
  $experience = $_POST['experience'];


  if (!empty(trim($_POST['username'])) || !empty(trim($_POST['cvv'])) || !empty(trim($_POST['cardno']))) {

    if ($username == $_SESSION['username']) {
      $qry = "INSERT INTO careers VALUES('$username','$email','$desc','$experience')";
      mysqli_query($conn, $qry);
      $msg = "Thank You for applying";
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

  <h2 style="text-align: center; padding:3%">Careers at Spotify</h2>
  <div style="text-align: center">

  </div>


  <div class="c=bigcontainer">

    <div class="row mx-0 justify-content-center">
      <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0">
        <form method="POST" class="w-100 rounded p-4 border bg-white" action="">
          <label class="d-block mb-4">
            <span class="d-block mb-2">Username</span>
            <input required name="username" type="text" class="form-control" placeholder="Mohd Zaid" />
          </label>

          <label class="d-block mb-4">
            <span class="d-block mb-2">Email address</span>
            <input required name="email" type="email" class="form-control" placeholder="zaid.work@example.com" />
          </label>

          <label class="d-block mb-4">
            <span class="d-block mb-2">Years of experience</span>
            <select name="experience" class="custom-select">
              <option>Less than a year</option>
              <option>1 - 2 years</option>
              <option>2 - 4 years</option>
              <option>4 - 7 years</option>
              <option>7 - 10 years</option>
              <option>10+ years</option>
            </select>
          </label>

          <label class="d-block mb-4">
            <span class="d-block mb-2">Tell us more about yourself</span>
            <textarea name="message" class="form-control" rows="3" placeholder="What motivates you?"></textarea>
          </label>

          <div class="mb-4">
            <label class="d-block mb-2">Your CV</label>
            <div class="form-control h-auto">
              <input required name="cv" type="file" class="form-control-file" />
            </div>
          </div>

          <div class="mb-4">
            <div>
              <label class="custom-control custom-radio">
                <input name="remote" value="yes" type="radio" class="custom-control-input" checked />
                <span class="d-inline-block mt-1 custom-control-label">You'd like to work remotely</span>
              </label>
            </div>

            <div>
              <label class="custom-control custom-radio">
                <input name="remote" value="no" type="radio" class="custom-control-input" />
                <span class="d-inline-block mt-1 custom-control-label">You'd prefer to work onsite</span>
              </label>
            </div>
          </div>

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

          <div class="mb-3">
            <button type="submit" class="btn btn-primary px-3">Apply</button>
          </div>

      </div>
      </form>
    </div>
  </div>
  </div>








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>