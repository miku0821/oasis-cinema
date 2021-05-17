<?php
include "../classes/category.php";
$category_id = $_GET['category_id'];
$category = new Category;
$category->deleteCategory($category_id);
?>