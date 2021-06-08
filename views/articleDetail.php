<?php
include "../classes/article.php";
$article_id = $_GET['article_id'];
$article = new Article;
$article_detail = $article->getArticle($article_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="../assets/css/article_detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1eaebda83d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="edit-button text-right">
            <a href="editArticle.php?article_id=<?php echo $article_id;?>"><i class="fas fa-pen-nib"></i> EDIT ARTICLE</a>
        </div>
        <div class="movie-image">
            <img src="../assets/images/<?php echo $article_detail['image'];?>" alt="image" width="100%" height="500px">
            <h1 class="my-4"><span><?php echo $article_detail['title'];?></span></h1><hr>
        </div>

        
        <p class="mt-5"><?php echo $article_detail['message'];?></p>
        <div class="trailer">
           <iframe width="560" height="315" src="<?php echo $article_detail['trailer'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="mt-5"></iframe> 
        </div>
        

    </div>
</body>
</html>

