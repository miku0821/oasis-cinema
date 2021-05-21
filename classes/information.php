<?php
require_once "database.php";
class Information extends Database{
    public function createPost($title, $image_name, $tmp_image_name, $message, $date){
        $sql ="INSERT INTO information (title, image, message, date) VALUES ('$title', '$image_name', '$message', '$date')";

        if($this->conn->query($sql)){
            $destination = "../images/".basename($image_name);
            
            if(move_uploaded_file($tmp_image_name, $destination)){
                header("location: ../views/information.php");
                exit;
            }else{
                die("Error Uploading image: ".$this->conn->error);
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

    public function updatePostAndImage($info_id, $new_title, $new_image_name, $new_tmp_image_name, $new_message, $new_date){
        $sql = "UPDATE information
                SET title = '$new_title',
                    image = '$new_image_name',
                    message = '$new_message',
                    date = '$new_date'
                WHERE information_id = '$info_id'";

        if($this->conn->query($sql)){
            $destination = "../images/".basename($new_image_name);
                
            if(move_uploaded_file($new_tmp_image_name, $destination)){
                header("location: ../views/information.php");
                exit;
            }else{
                die("Error Uploading photo: ".$this->conn->error);
            }

        }else{
            die("Error inserting data: ".$this->conn->error);
        }
    }

    public function updatePost($info_id, $new_title, $new_message, $new_date){
        $sql = "UPDATE information
                SET title = '$new_title',
                    message = '$new_message',
                    date = '$new_date'
                WHERE information_id = '$info_id'";

        if($this->conn->query($sql)){
            header("location: ../views/information.php");
            exit;
        }else{
            die("Error updating data without image: ".$this->conn->error);
        }
    }

    public function deletePost($info_id){
        $sql = "DELETE FROM information WHERE information_id = '$info_id'";

        if($this->conn->query($sql)){
            header("location: ../views/information.php");
            exit;
        }else{
            die("Error deleting data: ".$this->conn->error);
        }
    }
}
?>