<?php
require "database.php";

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

        if($result->num_rows == 1){
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