<?php
include "../classes/movie.php";
$movie_id = $_GET['movie_id'];
$movie = new Movie;
$movie->deleteUpcomingMovie($movie_id);
?>