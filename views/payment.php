<?php
session_start();
include "../classes/reservation.php";
include "../classes/movie.php";
include "../classes/schedule.php";
$reservation = new Reservation;
$adult_ticket_num = $_POST['adult_ticket_num'];
$child_ticket_num = $_POST['child_ticket_num'];
$senior_ticket_num = $_POST['senior_ticket_num'];
$student_ticket_num = $_POST['student_ticket_num'];
$seats = $_POST['seats'];
$schedule_id = $_GET['schedule_id'];
$movie_id = $_GET['movie_id'];
$user_id = $_SESSION['user_id'];
$movie = new Movie;
$movie_details = $movie->getMovieDetailRow($movie_id);
$schedule = new Schedule;
$schedule_details = $schedule->getScheduleRow($schedule_id);
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
    <link rel="stylesheet" href="../assets/css/payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    <div class="f-container top-banner">
        <div class="feature-image">
            <img src="../assets/images/<?= $movie_details['feature_image'];?>" alt="movie_image" id="feature_image">
        </div>
        <div class="reservation_detail">
            <div class="movie_poster">
                <img src="../assets/images/<?= $movie_details['photo'];?>" alt="movie_poster" width="75%" id="movie_poster">
            </div>
            <div class="info">
                <div class="title p-0"><?= $movie_details['title'];?></div>
                <ul class="p-0">
                    <li class="d-inline p-0">
                        <?= $schedule_details['date'];?>,
                    </li>
                    <li class="d-inline p-0">
                        <?= $schedule_details['st_time'];?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container w-75">
        <div class="step-marker">
            <ul class="d-flex p-0 text-center">
                <li class="col-md-3 d-inline">1. Tickets</li>
                <li class="col-md-3 d-inline">2. Seats</li>
                <li class="col-md-3 d-inline active">3. Payment</li>
                <li class="col-md-3 d-inline">4. Confirmation</li>
            </ul>
        </div>
        <div class="container w-75">
            <div class="booking-summary">
                <div class="selected-seats">
                    <h6>selected Seats</h6>
                    <?php
                        foreach($seats as $seat){
                    ?>
                        <div class="seat d-inline-block"><?= $seat;?></div>
                    <?php
                        }
                    ?>
                </div>
                <h5 class="my-3">Booking Summary</h5>
                <table class="table">
                    <tbody>
                    <?php
                        if($adult_ticket_num !== "0"){
                    ?>
                    
                        <tr>
                            <td>Adult</td>
                            <td><?= $adult_ticket_num;?></td>
                            <td>$<?= $adult_total;?></td>
                        </tr>
                        
                    <?php
                        }
                        if($child_ticket_num !== "0"){
                    ?>
                    
                        <tr>
                            <td>Child</td>
                            <td><?= $child_ticket_num?></td>
                            <td>$<?= $child_total;?></td>
                        </tr>
        
                    <?php
                        }
                        if($senior_ticket_num !== "0"){
                    ?>
                    
                        <tr>
                            <td>Senior</td>
                            <td><?= $senior_ticket_num;?></td>
                            <td>$<?= $senior_total;?></td>
                        </tr>
        
                    <?php
                        }
                        if($student_ticket_num !== "0"){
                    ?>
                    
                    <tr>
                        <td>Student</td>
                        <td><?= $student_ticket_num;?></td>
                        <td>$<?= $student_total;?></td>
                    </tr>
        
                    <?php
                        }
                    ?>
                        <tr>
                            <td class="total">Total Price</td>
                            <td><?= $reservation->computeTotalTicketNumber($adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num)?></td>
                            <td>$<?= $reservation->computeTotal($adult_total, $child_total, $senior_total, $student_total);?></td>
                        </tr>
                    </tbody>    
                </table>
            </div>
            <div class="payment p-1">
                <h5>Payment</h5>
                <form action="../actions/payment.php?schedule_id=<?= $schedule_id;?>&movie_id=<?= $movie_id;?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-10 mx-auto">
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John Smith" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10 mx-auto">
                            <label for="ccnum">Credit Card Number</label>
                            <input type="text" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444" class="form-control" min="18" max="18" required>
                        </div>
                    </div>
                    <div class="form-row expiration">
                        <div class="form-group col-md-6 mx-auto">
                            <label for="cardexpiry">Expiration</label>
                            <input type="text" id="cardexpiry" name="cardexpiry" placeholder="MM / YY" class="form-control" max="5" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label for="csc">Card Security Code</label>
                            <input type="text" id="csc" name="csc" placeholder="123" class="form-control" max="3" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="hidden" name="adult_ticket_num" value="<?= $adult_ticket_num;?>">
                            <input type="hidden" name="child_ticket_num" value="<?= $child_ticket_num;?>">
                            <input type="hidden" name="senior_ticket_num" value=<?= $senior_ticket_num;?>>
                            <input type="hidden" name="student_ticket_num" value="<?= $student_ticket_num;?>">
                            <?php
                            for($i = 0; $i < count($seats); $i++){
                            ?>
                                <input type="hidden" name="seats[]" value="<?= $seats[$i];?>">
                            <?php
                            }
                            ?>
                            
                            <button type="submit" name="comp
                            lete">Complete your order</button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>