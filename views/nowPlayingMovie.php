<?php
    include "../classes/movie.php";
    $movie = new Movie;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Playing Movies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Now Playing Movies</h1>
        <?php
            if(!empty($movie_details = $movie->getMovieDetails())){ 
            foreach($movie_details as $movie_detail){
        ?>

            <h5><?php echo  $movie_detail['title'];?></h5>
            <a href="movieDetail.php?movie_id=<?= $movie_detail['movie_id'];?>&date=<?= date("Y-m-d");?>" class="btn btn-success">Details</a>

        <?php
            }
            } 
        ?>

    </div>
</body>
</html>