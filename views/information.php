<?php
include "../classes/information.php";
$information = new Information;
$posts = $information->getPost();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers and Information</title>
    <link rel="stylesheet" href="../assets/css/information.css">
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
            <h2>Offers and Informaiton</h2>

            <div class="information-frame">
                <a href="addInformation.php" id="add_info_btn">Add Post</a>
                <table class="table">
                    <thead class="thead-light">
                        <tr class="d-flex">
                            <th class="col-md-2">INFO_ID</th>
                            <th class="col-md-4">TITLE</th>
                            <th class="col-md-2">DATE</th>
                            <th class="col-md-2"></th>
                            <th class="col-md-2"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                        if($posts == "No Info"){
                    ?>
                        <tr>
                            <td>
                                <h3>
                                    <i class="fas fa-exclamation-triangle"></i><br>No Posts
                                </h3>
                            </td>
                        </tr>
                    <?php
                        }else{
                            foreach($posts as $post){
                    ?>
                        <tr class="d-flex">
                            <td class="col-md-2"><?php echo $post['information_id'];?></td>
                            <td class="col-md-4"><?php echo $post['title'];?></td>
                            <td class="col-md-2"><?php echo $post['date'];?></td>
                            <td class="details col-md-2"><a href="infoDetail.php?info_id=<?php echo $post['information_id'];?>">Details</a></td>
                            <td class="delete col-md-2"><a onClick="return confirm('Are you sure you want to delete?')" href="../actions/deleteInformation.php?info_id=<?= $post['information_id'];?>">Delete</a></td>
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