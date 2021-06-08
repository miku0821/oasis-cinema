<?php
    session_start();
    include "../classes/movie.php";
    include "../classes/schedule.php";
    include "../classes/reservation.php";

    $movie_id = $_GET['movie_id'];
    $schedule_id = $_GET['schedule_id'];
    $user_id = $_SESSION['user_id'];

    $movie = new Movie;
    $movie_details = $movie->getMovieDetailRow($movie_id);

    $reservation = new Reservation;
    $reservation_user = $reservation->getReservationUser($user_id, $schedule_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../assets/css/confirmation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container w-75 pb-5 outer-frame">
        <div class="step-marker">
            <ul class="d-flex p-0 text-center">
                <li class="col-md-3 d-inline">1. Tickets</li>
                <li class="col-md-3 d-inline">2. Seats</li>
                <li class="col-md-3 d-inline">3. Payment</li>
                <li class="col-md-3 d-inline active">4. Confirmation</li>
            </ul>
        </div>
        <h2>You're Booked successfully, <?= $_SESSION['username'];?>!</h2>
        <div class="booking-details">
            <div class="poster">
                <img src="../assets/images/<?= $movie_details['photo'];?>" alt="poster_image" width="65%">
            </div>
            <div class="schedule-info">

                <?php
                    while($reservation_userid = $reservation_user->fetch_assoc()){
                        $user_id = $reservation_userid['user_id'];
                        $reservation_row = $reservation->getReservationDetail($user_id, $schedule_id);
                ?>
    
                    <ul>
                        <li class="title"><?= $movie_details['title'];?></li>
                        <li><?= $reservation_row['date'];?> | <?= $reservation_row['st_time'];?></li>
                        <li>Screen Number:  <?= $reservation_row['screen_num'];?></li>
                        <li>Seats:  
                        <?php
                        }
                            $seat = $reservation->getReservedSeats($user_id, $schedule_id);
                            while($seats = $seat->fetch_assoc()){
                        ?>
    
                            <span><?= $seats['seat_no'];?></span>
    
                        <?php
                            }
                        ?>
                        </li>
                    </ul>

            </div>        
        </div> 
        <div class="button">
            <a href="index.php">Back to Home</a>  
        </div>
    </div>
</body>
</html>