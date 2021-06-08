<?php
include "../classes/movie.php";

$title = $_POST['title'];
$release_year = $_POST['release'];
$runtime = $_POST['runtime'];
$rating = $_POST['rating'];
$categories = $_POST['categories'];
$st_date = $_POST['st_date'];
$st_time = $_POST['st_time'];
$end_date = $_POST['end_date'];
$photo_name = $_FILES['photo']['name'];
$tmp_photo_name = $_FILES['photo']['tmp_name'];
$trailer = $_POST['trailer'];
$feature_image_name = $_FILES['feature_image']['name'];
$tmp_feature_image_name = $_FILES['feature_image']['tmp_name'];
$synopsis = $_POST['synopsis'];


$movie = new Movie;
$movie->addMovie($title, $release_year, $runtime, $rating, $st_date, $st_time, $end_date, $photo_name, $tmp_photo_name, $trailer,$feature_image_name, $tmp_feature_image_name, $synopsis,  $categories);
?>