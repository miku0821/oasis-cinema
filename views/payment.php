<?php
include "../classes/reservation.php";
$reservation = new Reservation;
$adult_ticket_num = $_POST['adult'];
$child_ticket_num = $_POST['child'];
$senior_ticket_num = $_POST['senior'];
$student_ticket_num = $_POST['student'];
$adult_total = $reservation->computeAdultToal($adult_ticket_num);
$child_total = $reservation->computeChildTotal($child_ticket_num);
$senior_total = $reservation->computeSeniorTotal($senior_ticket_num);
$student_total = $reservation->computeStudentTotal($student_ticket_num);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
        <!-- <link rel="stylesheet" href="../assets/css/movie_detail.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <h5>Booking Summary</h5>
        <table class="table">
            <tbody>
            <?php
                if($adult_ticket_num !== "0"){
            ?>
            
                <tr>
                    <td>Adult</td>
                    <td><?= $adult_ticket_num;?></td>
                    <td><?= $adult_total;?></td>
                </tr>
                
            <?php
                }
                if($child_ticket_num !== "0"){
            ?>
            
                <tr>
                    <td>Child</td>
                    <td><?= $child_ticket_num?></td>
                    <td><?= $child_total;?></td>
                </tr>

            <?php
                }
                if($senior_ticket_num !== "0"){
            ?>
            
                <tr>
                    <td>Senior</td>
                    <td><?= $senior_ticket_num;?></td>
                    <td><?= $senior_total;?></td>
                </tr>

            <?php
                }
                if($student_ticket_num !== "0"){
            ?>
            
            <tr>
                <td>Student</td>
                <td><?= $student_ticket_num;?></td>
                <td><?= $student_total;?></td>
            </tr>

            <?php
                }
            ?>
                <tr>
                    <td>Total Price</td>
                    <td><?= $reservation->computeTotalTicketNumber($adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num)?></td>
                    <td><?= $reservation->computeTotal($adult_total, $child_total, $senior_total, $student_total);?></td>
                </tr>
            </tbody>    
        </table>
    </div>
</body>
</html>