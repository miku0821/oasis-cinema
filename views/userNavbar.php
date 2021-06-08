<?php
    session_start();
    $user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
</head>
<body>
    <main>
        <div class="f-container">
            <div class="top-bar p-3">
                <div class="logo">
                    <a href="index.php"><h4> Oas<span>i</span>s C<span>i</span>nema</h4></a>
                </div>
                <div class="greeting">
                    <div class="username d-inline"><a href="profile.php">Welcome, <?= $_SESSION['username'];?></a></div>
                    <div class="logout d-inline">
                        <a href="../actions/logout.php">LOGOUT</a> 
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-sm">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="nowPlayingMovie.php">Now Showing</a>
                    </li>
                    <li class="nav-item">
                        <a href="comingsoon.php">Coming Soon</a>
                    </li>
                    <li class="nav-item">
                        <a href="news.php">Movie News</a>
                    </li>
                    <li class="nav-item">
                        <a href="myticket.php">My Ticket</a>
                    </li> 
                </ul>
            </nav>
