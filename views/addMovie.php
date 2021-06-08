<?php
include "../classes/category.php";
$category = new Category;
$category_details = $category->showCategory();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link rel="stylesheet" href="../assets/css/add_movies.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
            <h2>Add Movies</h2>

            <!-- form -->
            <form action="../actions/addMovie.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">   
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="release">Release Year</label>
                        <input type="text" name="release" id="release" class="form-control">   
                    </div>
                    <div class="form-group col-md-3">
                        <label for="runtime">Runtime</label>
                        <input type="text" name="runtime" id="runtime" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rating">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                            <option hidden>Select</option>
                            <option value="G">G</option>
                            <option value="PG12">PG12</option>
                            <option value="R15+">R15+</option>
                            <option value="R18+">R18+</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-5">
                    <div class="form-group col-md-3">
                        <div class="custom-file">
                                <label for="image" class="custom-file-label">Upload Poster</label>
                                <input type="file" name="photo" id="image" class="custom-file-input" required>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="custom-file">
                            <label for="f-image" class="custom-file-label">Upload Feature Image</label>
                            <input type="file" name="feature_image" id="f-image" class="custom-file-input" required>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2 mb-5">
                    <div class="form-group col-md-3">
                        <label for="trailer">Upload Trailer</label>
                        <input type="url" name="trailer" id="trailer" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="form-group col-md-12">
                        <textarea name="synopsis" cols="30" rows="10" class="form-control" placeholder="SYNOPSIS" required></textarea>
                    </div>
                </div>
                <div class="form-row my-4">
                    <div class="form-group category">
                        <label for="category">Choose Categories</label><br>

                        <?php 
                        foreach($category_details as $category_detail){
                        ?>

                        <div class="form-check-inline" id="category">                                                 <label class="form-check-label" for="<?php $category_detail['category_id'];?>">
                                <input type="checkbox" name="categories[]" id="<?= $category_detail['category_id'];?>" value="<?= $category_detail['category_id'];?>" class="form-check-input"><?= $category_detail['category_name']?>
                            </label>
                        </div>
                        <?php
                            }
                            ?>

                     </div>
                </div>
                <div class="form-row my-3">
                    <div class="form-group col-md-4">
                        <label for="date">Screening starts on:</label>
                        <input type="date" name="st_date" id="date" class="form-control">
                        <input type="hidden" name="st_time" value="00:00">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">Screening ends on:</label>
                        <input type="date" name="end_date" id="date" class="form-control">
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