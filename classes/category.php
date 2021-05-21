<?php
require_once "database.php";

class Category extends Database{
    public function addCategory($category_name){
        $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
        
        if($this->conn->query($sql)){
            header("location: ../views/category.php");
            exit;
        }
    }

    public function checkCategory($category_name){
        $sql = "SELECT * FROM categories WHERE category_name = '$category_name'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function showCategory(){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            while($categories = $result->fetch_assoc()){
                $rows[] = $categories;
            }
            return $rows;
        }else{
            return "No Record";
        }
    }

    public function checkMovieCategory($movie_id, $category_id){
        $sql = "SELECT * FROM movie_category WHERE movie_id = '$movie_id' AND category_id = '$category_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getCategoryRow($category_id){
        $sql = "SELECT category_name FROM categories WHERE category_id = '$category_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            return $result;
        }else{
            die("Error getting category row: ".$this->conn->error);
        }
    }

    public function updateCategory($category_id, $new_category_name){
        $sql = "UPDATE categories
                SET category_name = '$new_category_name'
                WHERE category_id = '$category_id'";
        if($this->conn->query($sql)){
            header("location: ../views/category.php");
            exit;
        }else{
            die("Error updating category: ".$this->conn->error);
        }
    }

    public function deleteCategory($category_id){
        $sql = "DELETE FROM categories WHERE category_id = '$category_id'";

        if($this->conn->query($sql)){
            header("location: ../views/category.php");
            exit;
        }else{
            die("Error deleting category: ".$this->conn->error);
        }
    }


}
?>