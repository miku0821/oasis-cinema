<?php
    include "../classes/reservation.php";
    include "../classes/movie.php";
    include "../classes/schedule.php";
    $movie_id = $_GET['movie_id'];
    $schedule_id = $_GET['schedule_id'];
    $movie = new Movie;
    $movie_details = $movie->getMovieDetailRow($movie_id);
    $schedule = new Schedule;
    $schedule_details = $schedule->getScheduleRow($schedule_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="../assets/css/ticket.css">
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
                <li class="col-md-3 d-inline active">1. Tickets</li>
                <li class="col-md-3 d-inline">2. Seats</li>
                <li class="col-md-3 d-inline">3. Payment</li>
                <li class="col-md-3 d-inline">4. Confirmation</li>
            </ul>
        </div>
        <h4>Choose your tickets</h4>
        <form action="../views/seatReservation.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="adult">Adult</label>
                    <input type="number" name="adult" id="adult" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Child">Child</label>
                    <input type="number" name="child" id="child" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="senior">Senior</label>
                    <input type="number" name="senior" id="senior" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="student">Student</label>
                    <input type="number" name="student" id="student" value="0" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">

                    <input type="hidden" name="movie_id" value="<?= $movie_id;?>">
                    <input type="hidden" name="schedule_id" value="<?= $schedule_id; ?>">
                    <button type="submit" name="submit">Proceed</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>