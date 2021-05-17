<?php
include "../classes/schedule.php";

$movie = $_POST['movie'];
$st_time = $_POST['st_time'];
$date = $_POST['date'];
$screen_num = $_POST['screen'];


$schedule = new Schedule;
$schedule->addSchedule($movie, $st_time, $date, $screen_num);
?>