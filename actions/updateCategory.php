<?php
include "../classes/category.php";
$new_category_name = $_POST['new_category_name'];
$category_id = $_POST['category_id'];
session_start();

$category = new Category;
$category_row = $category->getCategoryRow($category_id);

if($new_category_name !== $categpry_row['category_name']){

    if($category->checkCategory($category_name) == TRUE){
        $_SESSION['msg'] = "The category already exists";
        header("location: ../views/updateCategory.php?category_id=$category_id");
        exit;
    }else{
        $category->updateCategory($category_id, $new_category_name);  
        header("location: ../views/category.php");
        exit;
    }
}

?>