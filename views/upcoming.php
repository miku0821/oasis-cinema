<?php
include "../classes/movie.php";
$movie = new Movie;
$movie_details = $movie->getMovieDetails();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/upcoming.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="f-container">
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
                <h2 class="mt-5">Schedule</h2>
                <div class="upcoming">

                    <h3>Upcoming</h3>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Poster</th>
                                <th>Title</th>
                                <th>Release Year</th>
                                <th>Runtime</th>
                                <th>Rating</th>
                                <th>Dategory</th>
                                <th>Screening started at:</th>
                                <th>Screening ends at:</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($movie_details == FALSE){
                            ?>

                            <tr>
                                <td  colspan="8">
                                    <h3 class="text-center">
                                    <i class="fas fa-exclamation-triangle"></i><br>No Movies Added
                                    </h3>
                                </td>
                            </tr>

                            <?php
                                }else{

                               
                                    foreach($movie_details as $movie_detail){
                                    $movie_id = $movie_detail['movie_id'];
                                    $category_list = $movie->getCategories($movie_id);
                                    $date = $movie_detail['st_date'];
                                    $time = $movie_detail['time'];
                                    date_default_timezone_set('Asia/Tokyo');
                                    $timestamp = strtotime("$date $time")."<br>";
                                        if($timestamp > time()){
                            ?>

                            <tr>
                                <td><img src="../assets/images/<?php echo $movie_detail['photo'];?>" width="120px"></td>
                                <td><?php echo $movie_detail['title'];?></td>
                                <td><?php echo $movie_detail['release_year']?></td>
                                <td><?php echo $movie_detail['runtime'];?></td>
                                <td><?php echo $movie_detail['rating'];?></td>
                                <td><?php while ($category_details = $category_list->fetch_assoc()){
                                    echo $category_details['category_name']."<br>";
                                }?></td>
                                <td><?php echo $movie_detail['st_date'];?></td>
                                <td><?php echo $movie_detail['end_date'];?></td>
                                <td class="edit"><a href="editMovie.php?id=<?php echo $movie_detail['movie_id'];?>">Edit</a></td>
                                <td class="delete"><a onClick="return confirm('Are you sure you want to delete?')" href='../actions/deleteUpcomingMovie.php?movie_id=<?php echo $movie_detail['movie_id'];?>'>Delete</a></td>
                            </tr>
                        
                        <?php
                                        }
                                    } 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>