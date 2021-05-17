<?php
include "../classes/movie.php";
$id = $_GET['movie_id'];
$movie = new Movie;
$movie->deleteMovie($id);
?>