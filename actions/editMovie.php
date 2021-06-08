<?php
include "../classes/movie.php";
$movie_id = $_POST['id'];
$new_title = $_POST['new_title'];
$new_release_year = $_POST['new_release'];
$new_runtime = $_POST['new_runtime'];
$new_rating = $_POST['new_rating'];
$new_categories = $_POST['new_categories'];
$new_st_date = $_POST['new_st_date'];
$new_st_time = $_POST['new_st_time'];
$new_end_date = $_POST['new_end_date'];
$new_photo_name = $_FILES['new_photo']['name'];
$new_tmp_photo_name = $_FILES['new_photo']['tmp_name'];
$new_trailer = $_POST['new_trailer'];
$new_feature_image_name = $_FILES['new_feature_image']['name'];
$new_tmp_feature_image_name = $_FILES['new_feature_image']['tmp_name'];
$new_synopsis = $_POST['new_synopsis'];

$movie = new Movie;
if(empty($new_photo_name) && empty($new_feature_image_name)){

    $movie->uploadMovie($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_feature_image_name, $new_tmp_feature_image_name, $new_synopsis);

}elseif(empty($new_photo_name)){

    $movie->updateMovieAndFeatureImage($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_feature_image_name, $new_tmp_feature_image_name, $new_synopsis);

}elseif(empty($new_feature_image_name)){

    $movie->updateMovieAndPoster($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_trailer, $new_categories, $movie_id, $new_synopsis, $new_photo_name, $new_tmp_photo_name);

}else{

    $movie->updateMovieAndImage($new_title, $new_release_year, $new_runtime, $new_rating, $new_st_date, $new_st_time, $new_end_date, $new_photo_name, $new_tmp_photo_name, $new_trailer, $new_categories, $movie_id, $new_feature_image_name, $new_tmp_feature_image_name, $new_synopsis);
}
?>