<?php
include "../classes/information.php";
$title = $_POST['title'];
$photo_name = $_FILES['photo']['name'];
$tmp_photo_name = $_FILES['photo']['tmp_name'];
$message = $_POST['message'];
$date = $_POST['date'];

$information = new Information;
$information->createPost($title, $photo_name, $tmp_photo_name, $message, $date);
?>