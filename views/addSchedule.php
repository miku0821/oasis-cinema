<?php
include "../classes/movie.php";
include "../classes/schedule.php";
$schedule = new Schedule;
$movie = new Movie;
$movie_details = $movie->getMovieDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="../assets/css/add_schedule.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="f-container">
        <!-- menubar -->
        <div class="left-menu-bar">  
            <div class="logo">
                <h4> Oas<span>i</span>s C<span>i</span>nema</h4>
            </div>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="upcoming.php">Upcoming</a>
                        </li>
                        <li class="nav-item">
                            <a href="addMovie.php">Manage Movies</a>
                        </li>
                        <li class="nav-item">
                            <a href="addSchedule.php">Add Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php">Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="information.php">Offers & Information</a>                            
                        </li>
                        <li class="nav-item">
                            <a href="article.php">News & Articles</a>
                        </li>
                        <li class="nav-item">
                            <a href="nowPlayingMovieAdmin.php">Now Playing Movie</a>
                        </li>
                    </ul>
                </nav>
        </div>
        <section>
            <div class="menu-right">
                <div class="date h5"><?php echo date("Y/m/d");?></div>
                <a href="../actions/logout.php">LOGOUT</a>
            </div>
            <h2>Add Schedule</h2>

        <!-- form -->
            <form action="../actions/addSchedule.php" method="post">
                <div class="form-row">
                    <div class="form-group">
                            <?php
                                if($movie_details == FALSE){
                            ?>
                                <h4>
                                    <i class="fas fa-exclamation-triangle"></i>No Movie Available
                                </h4>
                            <?php
                                }else{
                            ?>

                            <label for="movie">Select Movie</label><br>
                            <select name="movie" id="movie" class="form-control" required>
                            
                            <?php
                                    foreach($movie_details as $movie_detail){
                                    $date = $movie_detail['st_date'];
                                    $time = $movie_detail['time'];
                                    $screen_date = strtotime("$date $time");
                                        if($screen_date <= time()){     
                                ?>
                        
                        <option value="<?php echo $movie_detail['movie_id'];?>"><?php echo $movie_detail['title']?></option>
                        
                            <?php
                                        }
                                    } 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="screen">Screen Number</label>
                        <input type="number" name="screen" id="screen" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="st_time">Starting Time</label>
                        <input type="time" name="st_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4 ml-3">
                        <label for="end_time">Ending Time</label>
                        <input type="time" name="end_time" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group m-auto">
                        <button type="submit" name="add" class="button">Add</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>