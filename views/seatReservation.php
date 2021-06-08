<?php
    include "../classes/reservation.php";
    include "../classes/movie.php";
    include "../classes/schedule.php";
    $schedule_id = $_POST['schedule_id'];
    $movie_id = $_POST['movie_id'];
    $adult_ticket_num = $_POST['adult'];
    $child_ticket_num = $_POST['child'];
    $senior_ticket_num = $_POST['senior'];
    $student_ticket_num = $_POST['student'];
    $movie = new Movie;
    $movie_details = $movie->getMovieDetailRow($movie_id);
    $schedule = new Schedule;
    $schedule_details = $schedule->getScheduleRow($schedule_id);
    $reservation = new Reservation;
    $ticket_num = $reservation->computeTotalTicketNumber($adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Reservation</title>
    <link rel="stylesheet" href="../assets/css/seat_reservation.css">
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
                <li class="col-md-3 d-inline active">2. Seats</li>
                <li class="col-md-3 d-inline">3. Payment</li>
                <li class="col-md-3 d-inline">4. Confirmation</li>
            </ul>
        </div>
        <h4>Select <span class="text-danger"><?= $ticket_num;?></span> seat</h4>
        <div class="available d-inline-block mr-2 ml-4">
            <span></span>
            Available
        </div>
        <div class="your-seat d-inline-block mr-2">
            <span></span>
            Your seat(s)
        </div>
        <div class="reserved d-inline-block">
            <span></span>
            Reserved
        </div>
        <div class="screen">
            <h5 class="text-center mt-4">Screen</h5>
        </div>

        <form action="../views/payment.php?schedule_id=<?= $schedule_id;?>&movie_id=<?= $movie_id;?>" method="post">
            <table class="table" width="100%">
                <tbody>
                    <tr>
                        <td class="align-middle">A</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $reservation = new Reservation;
                                $seat_no = $i."A";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>A" value="<?= $i;?>A" <?= $seat_no = $i."A";?> disabled>
                                    <label for="<?= $i;?>A"><?= $i;?>A</label>
                                </td>

                        <?php    
                                }else{
                        ?>
                        
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>A" value="<?= $i;?>A" class="seats">
                                    <label for="<?= $i;?>A"><?= $i;?>A</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">B</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."B";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>B" value="<?= $i;?>B" <?= $seat_no = $i."B";?> disabled>
                                    <label for="<?= $i;?>B"><?= $i;?>B</label>
                                </td>

                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>B" value="<?= $i;?>B">
                                    <label for="<?= $i;?>B"><?= $i;?>B</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">C</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."C";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>C" value="<?= $i;?>C" <?= $seat_no = $i."C";?> disabled>
                                    <label for="<?= $i;?>C"><?= $i;?>C</label>
                                </td>

                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>C" value="<?= $i;?>C">
                                    <label for="<?= $i;?>C"><?= $i;?>C</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">D</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."D";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>D" value="<?= $i;?>D" <?= $seat_no = $i."D";?> disabled>
                                    <label for="<?= $i;?>D"><?= $i;?>D</label>
                                </td>
                        <?php
                                }else{
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>D" value="<?= $i;?>D">
                                    <label for="<?= $i;?>D"><?= $i;?>D</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">E</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."E";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>E" value="<?= $i;?>E" <?= $seat_no = $i."E";?> disabled>
                                    <label for="<?= $i;?>E"><?= $i;?>E</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>E" value="<?= $i;?>E">
                                    <label for="<?= $i;?>E"><?= $i;?>E</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">F</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."F";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>F" value="<?= $i;?>F" <?= $seat_no = $i."F";?> disabled>
                                    <label for="<?= $i;?>F"><?= $i;?>F</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>F" value="<?= $i;?>F">
                                    <label for="<?= $i;?>F"><?= $i;?>F</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">G</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."G";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>G" value="<?= $i;?>G" <?= $seat_no = $i."G";?> disabled>
                                    <label for="<?= $i;?>G"><?= $i;?>G</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>G" value="<?= $i;?>G">
                                    <label for="<?= $i;?>G"><?= $i;?>G</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">H</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."H";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>H" value="<?= $i;?>H" <?= $seat_no = $i."H";?> disabled>
                                    <label for="<?= $i;?>H"><?= $i;?>H</label>
                                </td>
                        
                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>H" value="<?= $i;?>H">
                                    <label for="<?= $i;?>H"><?= $i;?>H</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">I</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."I";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>I" value="<?= $i;?>I" <?= $seat_no = $i."I";?> disabled>
                                    <label for="<?= $i;?>I"><?= $i;?>I</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>I" value="<?= $i;?>I">
                                    <label for="<?= $i;?>I"><?= $i;?>I</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td class="align-middle">J</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."J";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>J" value="<?= $i;?>J" <?= $seat_no = $i."J";?> disabled>
                                    <label for="<?= $i;?>J"><?= $i;?>J</label>
                                </td>

                        <?php
                                }else{
                        ?>

                                <td class="seat">
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>J" value="<?= $i;?>J">
                                    <label for="<?= $i;?>J"><?= $i;?>J</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group">
                    <input type="hidden" name="adult_ticket_num" value="<?= $adult_ticket_num;?>">
                    <input type="hidden" name="child_ticket_num" value="<?= $child_ticket_num;?>">
                    <input type="hidden" name="senior_ticket_num" value="<?= $senior_ticket_num;?>">
                    <input type="hidden" name="student_ticket_num" value="<?= $student_ticket_num;?>">
                    <button type="submit" name="submit">Proceed</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>