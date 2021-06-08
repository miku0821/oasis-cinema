<?php
    session_start();
    include "../classes/transaction.php";
    include "../classes/reservation.php";
    $user_id = $_SESSION['user_id'];
    $schedule_id = $_GET['schedule_id'];
    $movie_id = $_GET['movie_id'];
    $adult_ticket_num = $_POST['adult_ticket_num'];
    $child_ticket_num = $_POST['child_ticket_num'];
    $senior_ticket_num = $_POST['senior_ticket_num'];
    $student_ticket_num = $_POST['student_ticket_num'];
    $seats = $_POST['seats'];
 
    $payment = new Payment;
    $reservation = new Reservation;

    if($payment->insertPaidInfo($user_id, $schedule_id) == TRUE){
        $reservation->makeReservation($seats, $schedule_id, $movie_id, $user_id, $adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num);
    }
?>