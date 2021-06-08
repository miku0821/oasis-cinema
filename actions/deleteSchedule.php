<?php
    include "../classes/schedule.php";
    $schedule_id = $_GET['schedule_id'];

    $schedule = new Schedule;
    echo $schedule->deleteSchedule($schedule_id);
?>