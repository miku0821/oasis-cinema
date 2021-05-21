<?php
require_once "database.php";
class Article extends Database{
    public function createArticle($title, $date, $message, $image_name, $tmp_image_name, $trailer){
        $sql = "INSERT INTO articles (title, date, message, image, trailer) VALUES ('$title', '$date', '$message', '$image_name', '$trailer')";

        if($this->conn->query($sql)){
            $destination = "../images".basename($image_name);

            if(move_uploaded_file($tmp_image_name, $destination)){
                header("location: ../views/article.php");
                exit;
            }else{
                die("Error inserting image: ".$this->conn->error);
            }
        }else{
            dir("Error inserting data: ".$this->conn->error);
        }
    }

    public function showArticle(){
        $sql = "SELECT * FROM articles";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return "No Record";
        }
    }

    public function getArticle($article_id){
        $sql = "SELECT * FROM articles WHERE article_id = '$article_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            die("Error getting the article: ".$this->conn->error);
        }
    }


    public function updateArticleAndImage($article_id, $new_title, $new_date, $new_message, $new_image_name, $new_tmp_image_name, $new_trailer){
        $sql = "UPDATE articles
                SET title = '$new_title',
                    date = '$new_date',
                    message = '$new_message',
                    image = '$new_image_name',
                    trailer = '$new_trailer'
                WHERE article_id = '$article_id'";

        if($this->conn->query($sql)){
            $destination = "../images/".basename($new_image_name);
                
            if(move_uploaded_file($new_tmp_image_name, $destination)){
                header("location: ../views/article.php");
                exit;
            }else{
                die("Error Uploading photo: ".$this->conn->error);
            }

        }else{
            die("Error inserting data: ".$this->conn->error);
        }
    }

    public function updateArticle($article_id, $new_title, $new_date, $new_message, $new_trailer){
        $sql = "UPDATE articles
                SET title = '$new_title',
                    date = '$new_date',
                    message = '$new_message',
                    trailer = '$new_trailer'
                WHERE article_id = '$article_id'";

        if($this->conn->query($sql)){
            header("location: ../views/article.php");
            exit;
        }else{
            die("Error updating data without image: ".$this->conn->error);
        }
    }

    public function deleteArticle($article_id){
        $sql = "DELETE FROM articles WHERE article_id = '$article_id'";

        if($this->conn->query($sql)){
            header("location: ../views/article.php");
            exit;
        }else{
            die("Error deleting the article: ".$this->conn->error);
        }
    }
}
?>