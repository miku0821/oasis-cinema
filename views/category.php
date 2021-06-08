<?php
include "../classes/category.php";
$category = new Category;
$category_details = $category->showCategory();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../assets/css/category.css">
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
            <h2>Add Category</h2>

            <div class="category-frame"> 
            <!-- form -->
                <form action="../actions/category.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-5 mx-auto">
                            <input type="text" name="category_name" class="form-control text-center" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mx-auto">
                            <button type="submit" name="add" class="button">ADD</button>
                        </div>
                    </div>
                </form>

                <?php
                    if(isset($_SESSION['msg'])){
                ?>
                    <h3 class="text-center"><i class="fas fa-exclamation-triangle"></i><br><?php echo $_SESSION['msg']; ?></h3>
            
                <?php   
                    }
                    unset($_SESSION['msg']); 
                ?>

            <!-- table -->
                <table class="table mt-5">
                    <thead class="thead-light">
                        <tr class="d-flex">
                            <th class="col-md-4">Category ID</th>
                            <th class="col-md-4">Category NAME</th>
                            <th class="col-md-2"></th>
                            <th class="col-md-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($category_details == "No Record"){
                        ?>

                        <tr>
                            <td>
                                <h3 class="text-center"><i class="fas fa-exclamation-triangle"></i><br>No Category Found</h3>
                            </td>
                        </tr>
                    
                        <?php
                            }elseif($category_details !== "No Record"){
                                foreach($category_details as $category_detail){
                        ?>

                        <tr class="d-flex">
                            <td class="col-md-4">
                                <?php echo $category_detail['category_id'];?>
                            </td>
                            <td class="col-md-4">
                                <?php echo $category_detail['category_name'];?>
                            </td>
                            <td class="update col-md-2"><a href="updateCategory.php?category_id=<?php echo $category_detail['category_id'];?>">UPDATE</a></td>
                            <td class="delete col-md-2">
                                <a onClick="return confirm('Are you sure you want to delete?')" href="../actions/deleteCategory.php?category_id=<?php echo $category_detail['category_id'];?>">DELETE</a>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>  
            </div>
        </section>
    </div>
</body>
</html>