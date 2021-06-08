<?php
    include "../classes/schedule.php";

    $schedule_id = $_POST['schedule_id'];
    $new_movie = $_POST['new_movie'];
    $new_screen_num = $_POST['new_screen'];
    $new_date = $_POST['new_date'];
    $new_st_time = $_POST['new_st_time'];
    $new_end_time = $_POST['new_end_time'];

    $schedule = new Schedule;
    $schedule->updateSchedule($schedule_id, $new_movie, $new_screen_num, $new_date, $new_st_time, $new_end_time);
?>