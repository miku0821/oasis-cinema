<?php
    session_start();
    include "../classes/reservation.php";

    $seats = $_POST['seats'];
    $schedule_id = $_GET['schedule_id'];
    $movie_id = $_GET['movie_id'];
    $user_id = $_SESSION['user_id'];

    $reservation = new Reservation;
    if($reservation->makeReservation($seats, $schedule_id, $movie_id, $user_id == "success")){
        header("location: ../views/ticket.php");
        exit;
    }
    
?>