<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background-color:black">


    <div class="bigcontainer">

        <div class="rightpane">





            <!-- <div class="backbuttons">
                    <button type="button" class="btn btn-primary btn-circle btn-md">Blue</button>
                    <button type="button" class="btn btn-primary btn-circle btn-md">Blue</button>
                </div> -->

            <div class="dd">
                <div>
                    <button class="careerbtn" onclick="location.href='careers.php'">Careers</button>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-circle-user"></i>
                        &nbsp;
                        <?php
                        session_start();
                        echo $_SESSION['username'];
                        ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="di1" href="account.php">Edit account</a>
                        <a class="dropdown-item" href="subscription.php">Subscription</a>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </div>
            </div>


            <div class="container" style="margin-top:6%">

                <div class="songlist">
                    <h2>Zayn - Icarus Falls</h2>
                    <div class="sic">
                        <div class="songitem">
                            <img  src="images/cover.jpg" alt="1">
                            <span class="songName" id="songname">Let me</span>
                            <span class="songplay"><span class="timestamp">03:05<i id="1" onclick="playspec(this.id)" class="fa-solid fa fa-play-circle"></i></span>
                        </div>
                        <div class="songitem">
                            <img  src="images/cover.jpg" alt="1">
                            <span class="songName" id="songname">Let me</span>
                            <span class="songplay"><span class="timestamp">03:28<i id="2" onclick="playspec(this.id)" class="fa-solid fa fa-play-circle"></i></span>
                        </div>
                        <div class="songitem">
                            <img src="images/cover.jpg" alt="1">
                            <span class="songName" id="songname">Let me</span>
                            <span class="songplay"><span class="timestamp">03:41<i id="3" onclick="playspec(this.id)" class="fa-solid fa fa-play-circle"></i></span>
                        </div>
                        <div class="songitem">
                            <img  src="images/cover.jpg" alt="1">
                            <span class="songName" id="songname">Let me</span>
                            <span class="songplay"><span class="timestamp">02:51<i id="4" onclick="playspec(this.id)" class="fa-solid fa fa-play-circle"></i></span>
                        </div>
                    </div>

                </div>
            </div>

<div id="coverimg"></div>
        </div>
        <div class="sidebar">
            <div >
                <img class="wellogo" src="slogowhite.png" alt="1">
            </div>

            <div>
                <a class="sideitems">
                    <i class="fa-solid fa-house"></i>
                    <button class="sidebutton" onclick="location.href='#'">Home</button>
                </a>
                <a class="sideitems">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <button class="sidebutton" onclick="location.href='#'">Search</button>
                </a>
                <a class="sideitems">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                        <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                    </svg>
                    <button class="sidebutton" onclick="location.href='#'">Your Library</button>
                    
                </a>
            </div>
            <br>
            <a class="sideitems2">
                <i class="fa-solid fa-square-plus"></i>
                <button class="sidebutton" href="home.php">Create PLaylist</button>
            </a>
            <a class="sideitems2">
                <i class="fa-solid fa-heart"></i>

                <button class="sidebutton" href="home.php">Liked Songs</button>
            </a>


            <hr style="margin:5% 10%; border-width:.1px; width:80%; color: grey; background-color: grey; align-items: center;">

            <a class="sideitems3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                </svg>
                <button class="sidebutton" onclick="location.href='contact.php'">Contact Us</button>
            </a>
        </div>

    </div>



    <div class="bottumcont">
        <div>
        <div class="bottom">
        <input type="range" name="range" id="progbar" min="0" max="100">
        <div class="icons">
            <i class="fa-solid fa-2x fa-step-backward" id="previoussong"></i>
            <i class="fa-solid fa-2x fa-play-circle" id="masterplay"></i>
            <i class="fa-solid fa-2x fa-step-forward" id="nextsong"></i>
        </div>
        <div class="songinfo">
            <img class="gif" src="./playing.gif" width="50px" alt="" id="gif">
            <div id="detoo">Let me</div>
        </div>
    </div>
        </div>


    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4d9150139d.js" crossorigin="anonymous"></script>
</body>

</html>