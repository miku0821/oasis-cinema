<?php
require "database.php";
class Schedule extends Database{
    public function addSchedule($movie, $st_time, $date, $screen_num){
        $sql = "INSERT INTO schedule (time, date, movie_id, screen_num) VALUES ('$st_time', '$date', '$movie', $screen_num)";
        if($this->conn->query($sql)){
            header("location: ../views/movieDetail.php");
            exit;
        }else{
            die("Error inserting data: ".$this->conn->error);
        }
    }

    public function getSchedule($date){
        $sql = "SELECT * FROM schedule INNER JOIN movies ON schedule.movie_id = movies.movie_id WHERE schedule.date = '$date'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

}
?>