<?php
    include "../classes/reservation.php";
    $schedule_id = $_GET['schedule_id'];
    $movie_id = $_GET['movie_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Reservation</title>
    <!-- <link rel="stylesheet" href="../assets/css/movie_detail.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <h4>Select a seat</h4>

        <form action="../actions/seatReservation.php?schedule_id=<?= $schedule_id;?>&movie_id=<?= $movie_id;?>" method="post">
            <table class="table">
                <tbody>
                    <tr>
                        <td>A</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $reservation = new Reservation;
                                $seat_no = $i."A";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>A" value="<?= $i;?>A" <?= $seat_no = $i."A";?> disabled>
                                    <label for="<?= $i;?>A"><?= $i;?>A</label>
                                </td>

                        <?php    
                                }else{
                        ?>
                        
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>A" value="<?= $i;?>A">
                                    <label for="<?= $i;?>A"><?= $i;?>A</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>B</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."B";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>B" value="<?= $i;?>B" <?= $seat_no = $i."B";?> disabled>
                                    <label for="<?= $i;?>B"><?= $i;?>B</label>
                                </td>

                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>B" value="<?= $i;?>B">
                                    <label for="<?= $i;?>B"><?= $i;?>B</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>C</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."C";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>C" value="<?= $i;?>C" <?= $seat_no = $i."C";?> disabled>
                                    <label for="<?= $i;?>C"><?= $i;?>C</label>
                                </td>

                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>C" value="<?= $i;?>C">
                                    <label for="<?= $i;?>C"><?= $i;?>C</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>D</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."D";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>D" value="<?= $i;?>D" <?= $seat_no = $i."D";?> disabled>
                                    <label for="<?= $i;?>D"><?= $i;?>D</label>
                                </td>
                        <?php
                                }else{
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>D" value="<?= $i;?>D">
                                    <label for="<?= $i;?>D"><?= $i;?>D</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>E</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."E";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>E" value="<?= $i;?>E" <?= $seat_no = $i."E";?> disabled>
                                    <label for="<?= $i;?>E"><?= $i;?>E</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>E" value="<?= $i;?>E">
                                    <label for="<?= $i;?>E"><?= $i;?>E</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>F</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."F";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>F" value="<?= $i;?>F" <?= $seat_no = $i."F";?> disabled>
                                    <label for="<?= $i;?>F"><?= $i;?>F</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>F" value="<?= $i;?>F">
                                    <label for="<?= $i;?>F"><?= $i;?>F</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>G</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."G";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>G" value="<?= $i;?>G" <?= $seat_no = $i."G";?> disabled>
                                    <label for="<?= $i;?>G"><?= $i;?>G</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>G" value="<?= $i;?>G">
                                    <label for="<?= $i;?>G"><?= $i;?>G</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>H</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."H";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>H" value="<?= $i;?>H" <?= $seat_no = $i."H";?> disabled>
                                    <label for="<?= $i;?>H"><?= $i;?>H</label>
                                </td>
                        
                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>H" value="<?= $i;?>H">
                                    <label for="<?= $i;?>H"><?= $i;?>H</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>I</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."I";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>I" value="<?= $i;?>I" <?= $seat_no = $i."I";?> disabled>
                                    <label for="<?= $i;?>I"><?= $i;?>I</label>
                                </td>
                        <?php
                                }else{ 
                        ?>

                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>I" value="<?= $i;?>I">
                                    <label for="<?= $i;?>I"><?= $i;?>I</label>
                                </td>

                        <?php
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>J</td>
                        <?php
                            for($i = 1; $i <= 10; $i++){
                                $seat_no = $i."J";
                                if($reservation->checkSeats($movie_id, $schedule_id, $seat_no)){
                        ?>
                        
                                <td>
                                    <input type="checkbox" name="seats[]" id="<?= $i;?>J" value="<?= $i;?>J" <?= $seat_no = $i."J";?> disabled>
                                    <label for="<?= $i;?>J"><?= $i;?>J</label>
                                </td>

                        <?php
                                }else{
                        ?>

                                <td>
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

            <button type="submit" name="submit" class="btn btn-success">Reserve</button>
        </form>
    </div>
</body>
</html>