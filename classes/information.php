<?php
require "database.php";
class Information extends Database{
    public function createPost($title, $photo_name, $tmp_photo_name, $message, $date){
        $sql ="INSERT INTO information (title, image, message, date) VALUES ('$title', '$photo_name', '$message', '$date')";

        if($this->conn->query($sql)){
            $destination = "../images/".basename($photo_name);
            
            if(move_uploaded_file($tmp_photo_name, $destination)){
                header("location: ../views/information.php");
                exit;
            }else{
                die("Error Uploading photo: ".$this->conn->error);
            }
        }else{
            die("Error inserting data: ".$this->conn->error);
        }
    }

    public function getPost(){
        $sql = "SELECT * FROM information";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            while($information = $result->fetch_assoc()){
                $rows[] = $information;
            }
            return $rows;
        }else{
            return "No Info";
        }
    }

    public function getPostDetail($info_id){
        $sql = "SELECT * FROM information WHERE information_id = '$info_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }
}
?>