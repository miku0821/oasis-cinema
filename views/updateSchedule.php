<?php
include "../classes/movie.php";
include "../classes/schedule.php";
$schedule_id = $_GET['schedule_id'];
$movie = new Movie;
$movie_details = $movie->getMovieDetails();
$schedule = new Schedule;
$schedule_details = $schedule->getScheduleRow($schedule_id);
$end_date = strtotime($schedule_details['end_time']);
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
            <div class="company-name">
                <h4>Oas<span>i</span>s Cinema</h4>
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
                            <a href="information.php">Offers &Information</a>                            
                        </li>
                        <li class="nav-item">
                            <a href="news.php">News & Articles</a>
                        </li>
                    </ul>
                </nav>
        </div>
        <section>
            <div class="menu-right">
                <div class="date h5"><?php echo date("Y/m/d");?></div>
                <a href="logout.php">LOGOUT</a>
            </div>
            <h2>Edit Schedule</h2>

        <!-- form -->
            <form action="../actions/updateSchedule.php" method="post">
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
                            <select name="new_movie" id="movie" required>
                            <option hidden value="<?= $schedule_details['title'];?>"><?= $schedule_details['title'];?></option>
                            <?php
                                    foreach($movie_details as $movie_detail){
                                ?>
                        
                        <option value="<?php echo $movie_detail['movie_id'];?>"><?php echo $movie_detail['title']?></option>
                        
                            <?php
                                    } 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="screen">Screen Number</label>
                        <input type="number" name="new_screen" id="screen" value="<?= $schedule_details['screen_num'];?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="date">Date</label>
                        <input type="date" name="new_date" id="date" value="<?= $schedule_details['date'];?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="st_time">Starting Time</label>
                        <input type="time" name="new_st_time" value="<?= $schedule_details['st_time'];?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4 ml-3">
                        <label for="end_time">Ending Time</label>
                        <input type="time" name="new_end_time" value="<?= $end_time = date("H:i", $end_date);?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group m-auto">
                        <input type="hidden" name="schedule_id" value="<?= $schedule_id;?>">
                        <button type="submit" name="add" class="button">Add</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>