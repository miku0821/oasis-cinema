<?php
    include "../classes/article.php";

    $article_id = $_GET['article_id'];
    $article = new Article;
    $article_details = $article->getArticle($article_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News and Articles</title>
    <link rel="stylesheet" href="../assets/css/add_information.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-50">
        <h1 class="text-center">Edit News and Articles</h1>
        <form action="../actions/editArticle.php" method="POST" enctype = "multipart/form-data">
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="title">TITLE</label>
                    <input type="text" name="new_title" id="title" value="<?= $article_details['title'];?>" class="form-control">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="date">Date</label>
                    <input type="text" name="new_date" id="date" value="<?= $article_details['date'];?>" class="form-control">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <label for="trailer">Upload Trailer</label>
                    <input type="text" name="new_trailer" id="trailer" value="<?= $article_details['trailer'];?>" class="form-control">
                </div>
            </div>
            <div class="movie-image text-center mt-2">
                <img src="../assets/images/<?= $article_details['image'];?>" alt="movie_image" width="50%" class="mx-auto">
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-9 mx-auto">
                    <div class="custom-file">
                        <label for="image" class="custom-file-label">Upload Image</label>
                        <input type="file" name="new_image" id="image" class="custom-file-input">
                    </div>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-12">
                    <textarea name="new_message" cols="30" rows="10" class="form-control" placeholder="MESSAGE"><?= $article_details['message'];?></textarea>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-12">
                    <input type="hidden" name="article_id" value="<?=$article_id;?>">
                    <button type="submit" name="add" class="button">Add</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>