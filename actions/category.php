<?php
include "../classes/category.php";
session_start();
    $category_name = $_POST['category_name'];

    $category = new Category;
    $check_category = $category->checkCategory($category_name);

    if($check_category == FALSE){
        $category->addCategory($category_name);
    }else{
        $_SESSION['msg'] = "The category already exists";
        header("location: ../views/category.php");
        exit;
    }
?>