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
    <link rel="stylesheet" href="../assets/css/now_playing_movie.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <?php include "userNavbar.php"; ?>
        <div class="f-container">
            <h1 class="w-75">Now Playing Movies</h1>

                <div class="movie-items w-75">
                    <div class="row p-0">

            <?php
                if(!empty($movie_details = $movie->getMovieDetails())){ 
                    foreach($movie_details as $movie_detail){
                    $date = $movie_detail['st_date'];
                    $time = $movie_detail['time'];
                    date_default_timezone_set('Asia/Tokyo');
                    $timestamp = strtotime("$date $time");
                        if($timestamp <= time()){
            ?>
                        <div class="col-md-3">
                            <a href="movieDetail.php?movie_id=<?= $movie_detail['movie_id']; ?>&date=<?= date("Y/m/d");?>">
                                <div class="card">
                                    <div class="card-header p-0">
                                        <img src="../assets/images/<?= $movie_detail['photo'];?>" alt="movie_image" style="width:100%">
                                    </div>
                                    <div class="card-body p-0">
                                        <h4 class="card-title">
                                            <?= $movie_detail['title'];?>
                                        </h4>
                                        <div class="row">
                                            <ul class="movie_details p-0">
                                                <li class="col-md-4 d-inline"><?= $movie_detail['release_year'];?></li>
                                                <li class="col-md-4 d-inline"><i class="far fa-clock"></i><?= $movie_detail['runtime']?></li>
                                                <li class="col-md-4 d-inline"><?= $movie_detail['rating'];?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> 
                            </a>
                        </div>

            <?php 
                        }
                    }
                }
            ?>
                    </div>
                </div>
        </div>
    </main>
</body>
</html>