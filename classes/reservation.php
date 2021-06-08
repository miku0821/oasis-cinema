<?php
    require_once "database.php";

    class Reservation extends Database{

        // public function checkReservation($movie_id, $schedule_id, $seats){

        //     foreach($seats as $seat){
        //         $sql = "SELECT seat_no FROM schedules WHERE seat_no == '$seat'";
        //         $result = $this->conn->query($sql);
        //     }

        //     if($result->num_rows > 0){
        //         print_r($result);
        //     }
        // }

        public function makeReservation($seats, $schedule_id, $movie_id, $user_id, $adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num){

            
            foreach($seats as $seat){
                $sql = "INSERT INTO reservations (user_id, seat_no, movie_id, schedule_id, adult, child, senior, student) VALUES ('$user_id', '$seat', '$movie_id', '$schedule_id', '$adult_ticket_num', '$child_ticket_num', '$senior_ticket_num', '$student_ticket_num')";
                $this->conn->query($sql);
            }

            header("location: ../views/confirmation.php?movie_id=$movie_id&schedule_id=$schedule_id");
            exit;
        }

        public function checkSeats($movie_id, $schedule_id, $seat_no){
            $sql = "SELECT seat_no FROM reservations WHERE movie_id ='$movie_id' AND schedule_id = '$schedule_id' AND seat_no = '$seat_no'";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return true;
            }else{
                return false;
            }
        }

        public function getReservationUser($user_id, $schedule_id){
            $sql = "SELECT user_id FROM reservations WHERE reservations.user_id = '$user_id' && reservations.schedule_id = '$schedule_id' GROUP BY user_id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return $result;
            }else{
                die("Error getting reservation details: ".$this->conn->error);
            }
        }

        public function getReservationDetail($user_id, $schedule_id){
            $sql = "SELECT * FROM reservations INNER JOIN schedule ON reservations.schedule_id = schedule.schedule_id WHERE reservations.user_id = '$user_id' && reservations.schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }else{
                die("Error getting reservation detail: ".$this->conn->error);
            }
        }

        public function getReservedSeats($user_id, $schedule_id){
            $sql = "SELECT seat_no FROM reservations INNER JOIN schedule ON reservations.schedule_id = schedule.schedule_id WHERE reservations.user_id = '$user_id' && reservations.schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return $result;
            }else{
                die("Error getting reservation seats detail: ".$this->conn->error);
            }
        }

        public function computeAdultToal($adult_ticket_num){
            return 23 * $adult_ticket_num;
        }

        public function computeChildTotal($child_ticket_num){
            return 16 * $child_ticket_num;
        }

        public function computeSeniorTotal($senior_ticket_num){
            return 16 * $senior_ticket_num;
        }

        public function computeStudentTotal($student_ticket_num){
            return 18.5 * $student_ticket_num;
        }

        public function computeTotalTicketNumber($adult_ticket_num, $child_ticket_num, $senior_ticket_num, $student_ticket_num){
            return $adult_ticket_num + $child_ticket_num + $senior_ticket_num + $student_ticket_num;
        }

        public function computeTotal($adult_total, $child_total, $senior_total, $student_total){
            return $adult_total + $child_total + $senior_total + $student_total;
        }

        public function getUsersScheduleId($user_id){
            $sql = "SELECT schedule_id, movie_id FROM reservations WHERE user_id = '$user_id' GROUP BY schedule_id, movie_id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        public function getUsersAllReserv($user_id, $schedule_id){
            $sql = "SELECT * FROM reservations INNER JOIN schedule ON reservations.schedule_id = schedule.schedule_id WHERE reservations.user_id = '$user_id' AND reservations.schedule_id = '$schedule_id'";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                return $result->fetch_assoc();}
            // }else{
            //     die("Error getting all reservation info: ".$this->conn->error);
            // }
        }

        public function updateScheduleId(){
            date_default_timezone_set('Asia/Tokyo');
            $today = strtotime(date("Y-m-d 00:00:00"));
            $expiration_date = strtotime("-1 week", $today);
            $expiration_timestamp = date('Y-m-d', $expiration_date);
            $sql = "UPDATE reservations INNER JOIN schedule ON reservations.schedule_id = schedule.schedule_id
                    SET reservations.schedule_id = NULL
                    WHERE schedule.date <= '$expiration_timestamp'";
            if($this->conn->query($sql)){
                return true;
            }else{
                die("Error".$this->conn->error);
            }
        }

        public function deleteReservationAuto(){
            $sql = "DELETE FROM reservations WHERE schedule_id IS NULL";
            
            if($this->conn->query($sql)){
                return true;
            }else{
                die("error".$this->conn->error);
            }
        }
    }
?>