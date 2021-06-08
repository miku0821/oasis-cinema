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
    <title>Movie News</title>
    <link rel="stylesheet" href="../assets/css/news.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="f-container">
        <?php
            include "userNavbar.php";
        ?>
        <h1 class="w-75 mx-auto">Movie News</h1>
        <div class="news">
            <div class="news-items w-75">
                <div class="row p-0">
                    <?php
                        while($article_detail = $article_details->fetch_assoc()){
                    ?>
                    
                        <div class="col-md-6">
                            <div class="card">
                                <a href="userArticleDetail.php?article_id=<?= $article_detail['article_id'];?>">
                                    <div class="card-header p-0">
                                        <img src="../assets/images/<?= $article_detail['image']?>" alt="movie_image" style="width:100%">
                                    </div>
                                    <div class="card-body p-0">
                                        <h3 class="card-title mt-3 ml-3">
                                            <?= $article_detail['title'];?>
                                        </h3>
                                    </div> 
                                </a>
                            </div>
                        </div>
                  
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
