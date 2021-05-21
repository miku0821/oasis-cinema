<?php
include "../classes/article.php";

$title = $_POST['title'];
$date = $_POST['date'];
$message = $_POST['message'];
$image_name = $_FILES['image']['name'];
$tmp_image_name = $_FILES['image']['tmp_name'];
$trailer = $_POST['trailer'];

$article = new Article;
$article->createArticle($title, $date, $message, $image_name, $tmp_image_name, $trailer);

?>