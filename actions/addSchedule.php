<?php
include "../classes/schedule.php";

$movie = $_POST['movie'];
$st_time = $_POST['st_time'];
$end_time = $_POST['end_time'];
$date = $_POST['date'];
$screen_num = $_POST['screen'];
// $end_timestamp = strtotime("$date $end_time");

$schedule = new Schedule;
$schedule->addSchedule($movie, $st_time, $date, $screen_num);
?>