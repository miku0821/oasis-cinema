<?php
    include "../classes/reservation.php";
    include "../classes/movie.php";
    $reservation = new Reservation;
    $movie = new Movie;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Ticket</title>
    <link rel="stylesheet" href="../assets/css/myticket.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
    include "userNavbar.php";
    ?>
    <hr class="bar">
    <div class="container w-75 outer-frame">
        
        <h1 class="heading">My Bookings</h1>
            <?php
                $schedule_rows = $reservation->getUsersScheduleId($user_id);
                if($schedule_rows == FALSE){
            ?>
                    <h2 class="no-booking"><i class="fas fa-exclamation-triangle"></i> <br> No Bookings</h2>
            <?php
                }else{

                    while($schedule_row = $schedule_rows->fetch_assoc()){
                        $schedule_id = $schedule_row['schedule_id'];
                        $movie_id = $schedule_row['movie_id'];
                        $movie_details = $movie->getMovieDetailRow($movie_id);
                        $reservation_details = $reservation->getUsersAllReserv($user_id, $schedule_id);
                        date_default_timezone_set('Asia/Tokyo');
                        $timestamp = time().'<br>';
                        $date = $reservation_details['date'];
                        $time = $reservation_details['st_time'];
                        $expiration_time = strtotime("$date $time");
                        if($timestamp >= $expiration_time){
            ?>
                
                <div class="expired-booking-details">
                    <div class="expired-poster">
                        <img src="../assets/images/<?= $movie_details['photo'];?>" alt="poster_image" width="200px">
                    </div>
                    <div class="schedule-info">
                        <ul>
                            <li class="title"><?= $movie_details['title'];?></li>
                            <li><?= $reservation_details['date'];?> | <?= $reservation_details['st_time'];?></li>
                            <li>Screen Number:  <?= $reservation_details['screen_num'];?></li>
                            <li>Seats:
            <?php
                            $seat = $reservation->getReservedSeats($user_id, $schedule_id);
                            while($seats = $seat->fetch_assoc()){
            ?>
        
                            <span class="expired-seat"><?= $seats['seat_no'];?></span>
            <?php 
                            }
                        }else{ 
            ?>
                        <div class="booking-details">
                            <div class="poster">
                                <img src="../assets/images/<?= $movie_details['photo'];?>" alt="poster_image" width="200px">
                            </div>
                            <div class="schedule-info">
                                <ul>
                                    <li class="title"><?= $movie_details['title'];?></li>
                                    <li><?= $reservation_details['date'];?> | <?= $reservation_details['st_time'];?></li>
                                    <li>Screen Number:  <?= $reservation_details['screen_num'];?></li>
                                    <li>Seats:
            <?php
                                $seat = $reservation->getReservedSeats($user_id, $schedule_id);
                                while($seats = $seat->fetch_assoc()){
            ?>
        
                                <span class="seat"><?= $seats['seat_no'];?></span>
            <?php 
                            }
                        }
            ?>
            
                                    </li>
                                </ul>
                            </div>        
                        </div> 
             <?php
                    }
                }
             ?>
        
    </div>
</body>
</html>