<?php
require_once "database.php";
class Schedule extends Database{
    public function addSchedule($movie, $st_time, $date, $screen_num, $end_time){
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

    public function getScheduleRow($schedule_id){
        $sql = "SELECT * FROM schedule INNER JOIN movies ON schedule.movie_id = movies.movie_id WHERE schedule.schedule_id = '$schedule_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            die("Error getting schedule row: ".$this->conn->error);
        }
    }

    public function updateSchedule($schedule_id, $new_movie, $new_screen_num, $new_date, $new_st_time, $new_end_time){
        $sql = "UPDATE schedule
                SET date = '$new_date',
                    st_time = '$new_st_time',
                    end_time = '$new_date $new_end_time',
                    movie_id = '$new_movie',
                    screen_num = '$new_screen_num'
                WHERE schedule_id = '$schedule_id'";

        if($this->conn->query($sql)){
            header("location: ../views/nowPlayingMovieAdmin.php");
            exit;
        }else{
            die("Error updating schedule: ".$this->conn->error);
        }
    }

    public function deleteSchedule($schedule_id){
        $sql = "DELETE FROM schedule
                WHERE schedule_id = '$schedule_id'";
        
        if($this->conn->query($sql)){
            header("location: ../views/nowPlayingMovieAdmin.php");
            exit;
        }else{
            die("Error deleting schedule: ".$this->conn->error);
        }
    }

    public function deleteScheduleAuto(){
            date_default_timezone_set('Asia/Tokyo');
            $today = strtotime(date("Y-m-d 00:00:00"));
            $expiration_date = strtotime("-1 week", $today);
            $expiration_timestamp = date('Y-m-d', $expiration_date);
            $sql_delete = "DELETE FROM schedule WHERE date <= '$expiration_timestamp'";
            $this->conn->query($sql_delete);
    }


}

?>