<?php
include "../classes/category.php";
include "../classes/movie.php";
$id = $_GET['id'];
$category = new Category;
$category_details = $category->showCategory();
$movie = new Movie;
$movie_details = $movie->getMovieDetailRow($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movies</title>
    <link rel="stylesheet" href="../assets/css/add_movies.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
            <h2>Edit Movies</h2>
            
            <!-- form -->
            <form action="../actions/editMovie.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="title">Title</label>
                        <input type="text" name="new_title" id="title" value="<?php echo $movie_details['title'];?>" class="form-control">   
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="release">Release Year</label>
                        <input type="text" name="new_release" id="release" value="<?php echo $movie_details['release_year'];?>" class="form-control">   
                    </div>
                    <div class="form-group col-md-3">
                        <label for="runtime">Runtime</label>
                        <input type="text" name="new_runtime" id="runtime" value="<?php echo $movie_details['runtime'];?>" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rating">Rating</label>
                        <select name="new_rating" id="rating" class="form-control">
                            <option value="<?php echo $movie_details['rating'];?>" hidden><?php echo $movie_details['rating'];?></option>
                            <option value="G">G</option>
                            <option value="PG12">PG12</option>
                            <option value="R15+">R15+</option>
                            <option value="R18+">R18+</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row mt-2">
                    <div class="form-group col-md-4">
                        <div class="movie-poster mb-2">
                            <img src="../assets/images/<?php echo $movie_details['photo'];?>" alt="movie_poster" width="45%">
                        </div>
                        <div class="custom-file">
                            <label for="image" class="custom-file-label">Upload Image</label>
                            <input type="file" name="new_photo" id="image" class="custom-file-input">
                        </div> 
                    </div>
                    <div class="form-group col-md-4 f-image">
                        <div class="feature-image mb-2">
                            <img src="../assets/images/<?php echo $movie_details['feature_image'];?>" alt="feature_image" width="70%">
                        </div>
                        <div class="custom-file">
                            <label for="f-image" class="custom-file-label">Upload Feature Image</label>
                            <input type="file" name="new_feature_image" id="f-image" class="custom-file-input">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="trailer">Upload Trailer</label>
                        <input type="url" name="new_trailer" id="trailer" value="<?php echo $movie_details['trailer'];?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-row mt-4">
                    <div class="form-group col-md-12">
                        <textarea name="new_synopsis" cols="30" rows="10" class="form-control" placeholder="SYNOPSIS" required><?= $movie_details['synopsis']?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group category">
                        <label for="category">Choose Categories</label><br>
                            <?php 
                            foreach($category_details as $category_detail){
                                if($category->checkMovieCategory($movie_details['movie_id'], $category_detail['category_id'])){
                                    
                               
                                ?>
                            <div class="form-check-inline" id="category">

                                <label class="form-check-label" for="<?php $category_detail['category_id'];?>">

                                    <input type="checkbox" name="new_categories[]" id="<?php echo $category_detail['category_id'];?>" value="<?php echo $category_detail['category_id'];?>" class="form-check-input" checked><?php echo $category_detail['category_name'];?>

                                </label>

                            </div>
                        <?php 
                                }else{
                        ?>
                            <div class="form-check-inline" id="category">
                                <label class="form-check-label" for="<?php $category_detail['category_id'];?>">
                                    <input type="checkbox" name="new_categories[]" id="<?php echo $category_detail['category_id'];?>" value="<?php echo $category_detail['category_id'];?>" class="form-check-input" ><?php echo $category_detail['category_name'];?>
                                </label>
                            </div>
                        <?php
                                }
                            }
                        ?>

                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="date">Screening starts on:</label>
                        <input type="date" name="new_st_date" id="date" value="<?php echo $movie_details['st_date'];?>" class="form-control">
                        <input type="hidden" name="new_st_time" value="00:00">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">Screening End on:</label>
                        <input type="date" name="new_end_date" id="date" value="<?php echo $movie_details['end_date'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group m-auto">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <button type="submit" name="add" class="button">Add</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>