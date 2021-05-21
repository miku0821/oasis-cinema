<?php
include "../classes/schedule.php";
$date = $_POST['date'];
$movie_id = $_POST['movie_id'];

$schedule = new Schedule;

if($schedule->getScreenNum($date, $movie_id) == FALSE){
    header("location: ../views/movieDetail.php?date=$date&movie_id=$movie_id");
    exit;
}else{
    header("location: ../views/movieDetail.php?date=$date&movie_id=$movie_id");
    exit;
}
?>