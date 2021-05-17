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
                            <a href="information.php">Offers &Information</a>                            
                        </li>
                        <li class="nav-item">
                            <a href="">News & Articles</a>
                        </li>
                    </ul>
                </nav>
        </div>
        <section>
            <div class="menu-right">
                <div class="date h5"><?php echo date("Y/m/d");?></div>
                <a href="logout.php">LOGOUT</a>
            </div>
            <h2>Add Movies</h2>

            <!-- form -->
            <form action="../actions/addMovie.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="title">TITLE</label>
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
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="photo">Upload Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="trailer">Upload Trailer</label>
                        <input type="url" name="trailer" id="trailer" class="form-control">
                    </div>
                </div>
                    <div class="form-row">
                        <div class="form-group category">
                            <label for="category">Choose Categories</label><br>
                            <?php 
                            foreach($category_details as $category_detail){
                                ?>
                            <div class="form-check-inline" id="category">
                                <label class="form-check-label" for="<?php $category_detail['category_id'];?>">
                                    <input type="checkbox" name="categories[]" id="<?php echo $category_detail['category_id'];?>" value="<?php echo $category_detail['category_id'];?>" class="form-check-input"><?php echo $category_detail['category_name']?>
                                </label>
                            </div>
                        <?php
                            }
                            ?>

                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group screen-date">
                        <label for="date">Screening starts on:</label>
                        <input type="date" name="st_date" id="date" class="form-control">
                        <input type="hidden" name="st_time" value="00:00">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="date">Screening End on:</label>
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