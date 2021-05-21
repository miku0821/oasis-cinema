<?php
include "../classes/information.php";
$title = $_POST['title'];
$image_name = $_FILES['image']['name'];
$tmp_image_name = $_FILES['image']['tmp_name'];
$message = $_POST['message'];
$date = $_POST['date'];

$information = new Information;
$information->createPost($title, $image_name, $tmp_image_name, $message, $date);
?>