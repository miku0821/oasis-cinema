<?php
include "../classes/schedule.php";
include "../classes/movie.php";
$schedule = new Schedule;
$date = $_GET['date'];
$movie_id = $_GET['movie_id'];
$movie = new Movie;
$movie_details = $movie->getMovieDetailRow($movie_id);
$categories = $movie->getCategories($movie_id)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Detail</title>
    <link rel="stylesheet" href="../assets/css/movie_detail_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include "userNavbar.php"; ?>
    <main>
        <div class="trailer">
            <img src="../assets/images/<?= $movie_details['feature_image'];?>" alt="movie_image">
            <h4>
                <?= $movie_details['title'];?>
            </h4>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trailer">
            <i class="far fa-play-circle"></i> Watch Trailer
            </button>

            <div class="modal" id="trailer">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" >
            
                    <!-- Modal body -->
                        <div class="modal-body" id="#trailer" >
                        <iframe width="760" height="515" src="<?= $movie_details['trailer'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="movie-intro">
            <div class="movie-poster">
                <img src="../assets/images/<?= $movie_details['photo'];?>" alt="movie_poster">
            </div>
            <div class="movie-details">
                <h3>Synopsis</h3>
                <p><?= $movie_details['synopsis'];?></p>
                <div class="row">
                    <ul class="p-0">
                        <li class="col-md-4 d-inline p-0"><?= $movie_details['release_year'];?></li>|
                        <li class="col-md-4 d-inline p-0"><?= $movie_details['rating'];?></li>|
                        <?php
                            foreach($categories as $category){
                        ?>
                        <li class="col-md-4 d-inline p-0"><?= $category['category_name'];?></li>
                        <?php
                            }
                        ?>
                       
                    </ul>
                </div>
            </div>
        </div>

    <div class="calender">
        <form action="../actions/movieDetailAdmin.php" method="post" class="text-center">
        <?php
            date_default_timezone_set('Asia/Tokyo');
            $today = strtotime("today");
            for($i = 0; $i < 7; $i++){
        ?>

                    <input type="hidden" name="movie_id" value="<?= $movie_id;?>">
                    <button type="submit" name="date" value="<?php echo date('Y-m-d', strtotime("$i day", $today));?>"><?php echo date('D m/d', strtotime("$i day", $today));?></button>
    
        <?php
            }
        ?>
        </form>
    </div>


        <table class="table table-borderless" id="time_schedule">

            <?php
                $schedules = $schedule->getScreenNum($date, $movie_id);
                if($schedules == FALSE){
            ?>

            <tr>
                <td class="col-md-12">
                    <h3>No Screening</h3>
                </td>
            </tr>

            <?php
                }else{
                    while($screen_schedules = $schedules->fetch_assoc()){
                    $screen_num = $screen_schedules['screen_num'];
            ?>

            <tr class="d-flex">
                <td class="col-md-12 screen_num">Screen Number<?= $screen_schedules['screen_num'];?></td>
            </tr>

            <tr class="d-flex">
                <?php
                    $time = $schedule->getTime($screen_num, $movie_id, $date);
                    
                    while($times = $time->fetch_assoc()){
                        date_default_timezone_set('Asia/Tokyo');
                        $date = $times['date'];
                        $st_time = $times['st_time'];
                        $screen_time = strtotime("$date $st_time");
                        $expiration_time = strtotime("-1 hour", $screen_time);
                            if($expiration_time <= time()){
                ?>

                <!-- expired date -->
                <td class="col-md-2">   
                    <p class="d-inline"><?= $times['st_time'];?></p>
                </td>
                    
                <?php
                            }else{
                ?>

                <!-- reservation link -->
                <td class="buttons">
                    <a href="ticket.php?schedule_id=<?= $times['schedule_id'];?>&movie_id=<?= $movie_id;?>" class="d-inline"><?= $times['st_time'];?></a><br>
                    <a href="updateSchedule.php?schedule_id=<?= $times['schedule_id'];?>&movie_id=<?= $movie_id;?>" class="edit">Edit</a>
                    <a onClick="return confirm('Are you sure you want to delete?')" href="../actions/deleteSchedule.php?schedule_id=<?= $times['schedule_id'];?>" class="delete">Delete</a>
                </td>
                
                <?php
                            }
                    }
                ?>
            </tr>   
            
            <?php
                    }
                }
            ?>

            </tbody>
        </table>
    </main>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("calender");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
</body>
</html>