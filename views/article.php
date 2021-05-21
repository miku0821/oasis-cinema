<?php
include "../classes/article.php";

$article = new Article;
$article_details = $article->showArticle();
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
                    </ul>
                </nav>
        </div>
        <section>
            <div class="menu-right">
                <div class="date h5"><?php echo date("Y/m/d");?></div>
                <a href="logout.php">LOGOUT</a>
            </div>
            <h2>News and Articles</h2>

            <div class="information-frame">
                <a href="addArticle.php" id="add_info_btn">Add an  Article</a>
                <table class="table">
                    <thead class="thead-light">
                        <tr class="d-flex">
                            <th class="col-md-2">Article_ID</th>
                            <th class="col-md-4">TITLE</th>
                            <th class="col-md-2">DATE</th>
                            <th class="col-md-2"></th>
                            <th class="col-md-2"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                        if($article_details == "No Record"){
                    ?>
                        <tr>
                            <td>
                                <h3>
                                    <i class="fas fa-exclamation-triangle"></i><br>No Articles
                                </h3>
                            </td>
                        </tr>
                    <?php
                        }else{
                            foreach($article_details as $article_detail){
                    ?>
                        <tr class="d-flex">
                            <td class="col-md-2"><?php echo $article_detail['article_id'];?></td>
                            <td class="col-md-4"><?php echo $article_detail['title'];?></td>
                            <td class="col-md-2"><?php echo $article_detail['date'];?></td>
                            <td class="details col-md-2"><a href="articleDetail.php?article_id=<?php echo $article_detail['article_id'];?>">Details</a></td>
                            <td class="delete col-md-2"><a href="../actions/deleteArticle.php?article_id=<?php echo $article_detail['article_id'];?>">DELETE</a></td>
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