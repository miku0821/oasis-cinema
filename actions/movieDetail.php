<?php
include "../classes/schedule.php";
$date = $_POST['date'];
$movie_id = $_POST['movie_id'];

header("location: ../views/movieDetail.php?date=$date&movie_id=$movie_id#time_schedule");
exit;
?>