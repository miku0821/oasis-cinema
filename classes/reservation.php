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

        public function makeReservation($seats, $schedule_id, $movie_id, $user_id){
            
            foreach($seats as $seat){
                $sql = "INSERT INTO reservations (user_id, seat_no, movie_id, schedule_id) VALUES ('$user_id', '$seat', '$movie_id', '$schedule_id')";
                $this->conn->query($sql);
            }
            return "success";
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
    }
?>