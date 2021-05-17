<?php
include "../classes/schedule.php";
$date = $_GET['date'];
$schedule = new Schedule;
$screen_times = $schedule->getSchedule($date);
// $movie = new Movie;
// $move->deleteMovie('id');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Detail</title>
    <link rel="stylesheet" href="../assets/css/movie_detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<header></header>
    <main>
        <div class="trailer"></div>
        <div class="poster-details"></div>

    <form action="../actions/movieDetail.php" method="post">
<?php   $today = strtotime("today");
        for($i = 0; $i < 7; $i++){
        ?>

        <button type="submit" name="date" value="<?php echo date('Y-m-d', strtotime("$i day", $today));?>"><?php echo date('D m/d', strtotime("$i day", $today));?></button>
        <?php
        }

?>
    </form>


        <table class="table">
            <tbody>
                <tr>
                    <td>Screen Number</td>
                </tr>
                <?php

                    while($time_schedules = $screen_times->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $time_schedules['time'];?></td>
                </tr>                
                <?php
                    }
                ?>

            </tbody>
        </table>
    </main>
</body>
</html>