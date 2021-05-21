<?php
include "../classes/schedule.php";

$schedule = new Schedule;
$date = $_GET['date'];
$movie_id = $_GET['movie_id'];
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
    <main class="mx-3">
        <div class="trailer"></div>
        <div class="poster-details"></div>

    <form action="../actions/movieDetail.php" method="post">
    <?php
        date_default_timezone_set('Asia/Tokyo');
        $today = strtotime("today");
        for($i = 0; $i < 7; $i++){
    ?>
                <input type="hidden" name="movie_id" value="<?= $movie_id;?>">
                <button type="submit" name="date" value="<?php echo date('Y-m-d', strtotime("$i day", $today));?>"><?php echo date('D m/d', strtotime("$i day", $today));?></button>

    <?php
        }
    ?>
    </form>


        <table class="table">
            <tbody>
            <?php
                $schedules = $schedule->getScreenNum($date, $movie_id);
                if($schedules == FALSE){
            ?>

                    <tr class="d-flex">
                        <td class="col-md-12">
                            <h3>No Screening</h3>
                        </td>
                    </tr>

            <?php
                }else{
                    while($screen_schedules = $schedules->fetch_assoc()){
                    $screen_num = $screen_schedules['screen_num'];
            ?>

            <tr class="d-flex">
                <td class="col-md-12">Screen Number <?= $screen_schedules['screen_num'];?></td>
            </tr>

            <tr class="d-flex">
                <?php
                    $time = $schedule->getTime($screen_num, $movie_id, $date);
                    
                    while($times = $time->fetch_assoc()){
                        date_default_timezone_set('Asia/Tokyo');
                        $date = $times['date'];
                        $st_time = $times['st_time'];
                        $screen_time = strtotime("$date $st_time");
                        $expiration_time = strtotime("-2 hour", $screen_time);
                            if($expiration_time <= time()){
                ?>

                <td>
                    <?= $times['st_time'];?>
                </td>
                <td>
                    <a href="updateSchedule.php?schedule_id=<?= $times['schedule_id'];?>" class="btn btn-success">UPDATE</a>
                </td>
                <td>
                    <a href="" class="btn btn-warning">DELETE</a>
                </td>
                    
                <?php
                            }else{
                ?>

                <td>
                    <a href="seatReservation.php?schedule_id=<?= $times['schedule_id'];?>&movie_id=<?= $movie_id;?>"><?= $times['st_time'];?></a>
                </td>
                <td>
                    <a href="updateSchedule.php?schedule_id=<?= $times['schedule_id'];?>" class="btn btn-success">UPDATE</a>
                </td>
                <td>
                    <a href="" class="btn btn-warning">DELETE</a>
                </td>
                
                <?php
                            }
                    }
                ?>
            </tr>   
            
            <?php
                    }
                }
            ?>

            </tbody>
        </table>
    </main>
</body>
</html>