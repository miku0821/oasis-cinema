<?php
    include "../classes/schedule.php";
    session_start();
    $schedule = new Schedule;
    $schedule->deleteSchedule();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="f-container">
        <div class="top-bar">
            <div class="logo">
                <h4>Oas<span>i</span>s Cinema</h4>
            </div>
            <div class="greeting">
                <h6>Welcome, <?= $_SESSION['username'];?></h6>
            </div>
        </div>
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="nav">
                <li class="nav-item">
                    <a href="">Now Showing</a>
                </li>
                <li class="nav-item">
                    <a href="">Coming Soon</a>
                </li>
                <li class="nav-item">
                    <a href="">News</a>
                </li>
                <li class="nav-item">
                    <a href="">My Ticket</a>
                </li> 
            </ul>
        </nav>
    </div>
</body>
</html>