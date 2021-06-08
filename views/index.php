<?php
    include "../classes/schedule.php";
    include "../classes/article.php";
    include "../classes/movie.php";
    include "../classes/information.php";
    session_start();
    $schedule = new Schedule;
    $schedule->deleteScheduleAuto();
    $article = new Article;
    $latest_article = $article->getLatestArticle();
    $late_article = $article->getLateArticle();
    $movie = new Movie;
    $info = new Information;
    $late_information = $info->getLatePost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
</head>
<body>
    <main>
        <div class="f-container">
            <div class="top-bar p-3">
                <div class="logo">
                    <h4> Oas<span>i</span>s C<span>i</span>nema</h4>
                </div>
                <div class="greeting">
                    <div class="login d-inline"><a href="login.php">LOGIN</a></div> or
                    <div class="register d-inline"><a href="register.php">REGISTER</a></div>
                </div>
            </div>
            <nav class="navbar navbar-expand-sm">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="nowPlayingMovie.php">Now Showing</a>
                    </li>
                    <li class="nav-item">
                        <a href="comingsoon.php">Coming Soon</a>
                    </li>
                    <li class="nav-item">
                        <a href="news.php">Movie News</a>
                    </li>
                    <li class="nav-item">
                        <a href="myticket.php">My Ticket</a>
                    </li> 
                </ul>
            </nav>

            <div id="articles" class="carousel slide text-center" data-ride="carousel">

        <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#articles" data-slide-to="0" class="active"></li>
                    <li data-target="#articles" data-slide-to="1"></li>
                    <li data-target="#articles" data-slide-to="2"></li>
                </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <img class="d-block img-fluid" src="../assets/images/<?= $latest_article['image'];?>" alt="First slide">
                    </div>
                    <div class="col-md-4 title">
                        <h3><?= $latest_article['title'];?></h3>
                        <a href="userArticleDetail.php?article_id=<?= $latest_article['article_id'];?>">Read More</a> 
                    </div>
                </div>
            </div>

            <?php
                while($article_details = $late_article->fetch_assoc()){
            ?>

            <div class="carousel-item">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <img class="d-block img-fluid" src="../assets/images/<?= $article_details['image'];?>" alt="First slide">
                    </div>
                    <div class="col-md-4 title">
                        <h3><?= $article_details['title'];?></h3>
                        <a href="userArticleDetail.php?article_id=<?= $article_details['article_id'];?>">Read More</a> 
                    </div>
                </div>
            </div>
            
            <?php
                }
            ?>
            
        </div>

        <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#articles" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#articles" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            
        <!-- ranking -->
            <div class="ranking">
            <h2>Ranking</h2>
                <div class="card-deck">
                    <?php
                        $i = 1;
                        $movie_ranking = $movie->calculateRanking();
                        if($movie_ranking == false){
                        ?>
                            <h4 class="no-ranking"><i class="fas fa-medal"></i> No Rankings</h4>
                        <?php
                        }else{

                        
                            while($movie_rankings = $movie_ranking->fetch_assoc()){
                                $movie_id = $movie_rankings['movie_id'];
                                $movie_details = $movie->getMovieRanking($movie_id);

                                while($movie_row = $movie_details->fetch_assoc()){
                    ?>
                    
                    <div class="card col-md-3 ranking-card">
                        <div class="card-header p-0">
                            <img src="../assets/images/<?= $movie_row['photo'];?>" alt="movie_image" style="width:100%">
                        </div>
                        <div class="card-body p-0">
                            <h4 class="card-title">
                                <?= $i++ .". ". $movie_row['title'];?>
                            </h4>
                        </div>
                    </div>

                    <?php
                                }
                            }
                        }
                    ?>
                </div>



        <!-- information -->
            <div class="info">
            <h2>Information</h2>
                <div class="info-items">
                    <div class="row p-0">
                    <?php
                        while($info_details = $late_information->fetch_assoc()){
                    ?>

                    <div class="col-md-6">
                        <div class="card">
                            <a href="userInfoDetail.php?info_id=<?= $info_details['information_id'];?>">
                                <div class="card-header p-0">
                                    <img src="../assets/images/<?= $info_details['image']?>" alt="movie_image" style="width:100%">
                                </div>
                                <div class="card-body p-0">
                                    <h3 class="card-title mt-3 ml-3">
                                        <?= $info_details['title'];?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="top-button text-center mt-2">
            <a href="#"><i class="fas fa-chevron-up fa-lg"></i><br> Back To Top</a>
        </div>
        <div class="social-media">
            <h6>Follow us</h6>
            <ul>
                <li><a href="#"><i class="fab fa-twitter fa-lg pt-2"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f fa-lg pt-2"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram fa-lg pt-2"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube fa-lg pt-2"></i></a></li>
            </ul>
        </div>
        
        <div class="copy-right">
            <div class="company_name text-white">
            © 2021 oasis cinema
            </div>
        </div>
    </footer>
    
</body>
</html>
