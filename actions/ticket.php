<?php
    include "../classes/reservation.php";
    $adult_ticket_num = $_POST['adult'];
    $child_ticket_num = $_POST['child'];
    $senior_ticket_num = $_POST['senior'];
    $student_ticket_num = $_POST['student'];
    $movie_id = $_POST['movie_id'];
    $schedule_id = $_POST['schedule_id'];
    $reservation = new Reservation;
    $ticket_num = $reservation->computeTotalTicketNumber($adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num);

    if($ticket_num > 0){
        header("location: ../views/seatReservation.php?ticket_num=$ticket_num&schedule_id=$schedule_id&movie_id=$movie_id&adult_ticket_num=$adult_ticket_num&child_ticket_num=$child_ticket_num&senior_ticket_num=$senior_ticket_num&student_ticket_num=$student_ticket_num");
    }

?>