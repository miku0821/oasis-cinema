<?php
include "../classes/movie.php";
$id = $_GET['id'];
$movie = new Movie;
$movie->deleteUpcomingMovie($id);
?>