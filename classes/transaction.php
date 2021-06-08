<?php
    require_once "database.php";

    class Payment extends Database{
        public function insertPaidInfo($user_id, $schedule_id){
            $sql = "INSERT INTO transaction (user_id, schedule_id) VALUES ('$user_id', '$schedule_id')";

            if($this->conn->query($sql)){
                return true;
            }else{
                die("Error inserting data ".$this->conn->error);
            }
        }
    }
?>