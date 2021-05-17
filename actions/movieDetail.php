<?php
include "../classes/schedule.php";
$date = $_POST['date'];

$schedule = new Schedule;

if($schedule->getSchedule($date) == false){
    return "No Screening";
}else{
    header("location: ../views/movieDetail.php?date=$date");
    exit;
}
?>