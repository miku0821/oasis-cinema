<?php
require_once "database.php";
class Schedule extends Database{
    public function addSchedule($movie, $st_time, $date, $screen_num){
        $sql = "INSERT INTO schedule (st_time, end_time, date, movie_id, screen_num) VALUES ('$st_time', '$date $end_time', '$date', '$movie', $screen_num)";
        if($this->conn->query($sql)){
            header("location: ../views/addSchedule.php");
            exit;
        }else{
            die("Error inserting data: ".$this->conn->error);
        }
    }


    public function getScreenNum($date, $movie_id){

        $sql = "SELECT screen_num FROM schedule WHERE date = '$date' AND movie_id = '$movie_id' GROUP BY screen_num";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getTime($screen_num, $movie_id, $date){
        $sql = "SELECT * FROM schedule WHERE screen_num = '$screen_num' AND movie_id = '$movie_id' AND date = '$date' ORDER BY st_time ASC";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            die("Error retrieving date: ".$this->conn->error);
        }
    }

    public function getScheduleRow($schedule_id)

    public function deleteSchedule(){
        $timestamp = time();
        $expiration_time = strtotime("-1 week", $timestamp);
        $expiration_date = date('Y-m-d', $expiration_time);
        $sql = "DELETE FROM schedule WHERE end_time < '$expiration_date'";

        if($this->conn->query($sql)){
            return true;
        }else{
            die("Error: ".$this->conn->error);
        }
    }


}

?>