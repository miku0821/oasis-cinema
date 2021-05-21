<?php
    include "../classes/article.php";

    $article_id = $_POST['article_id'];
    $new_title = $_POST['new_title'];
    $new_date = $_POST['new_date'];
    $new_message = $_POST['new_message'];
    $new_image_name = $_FILES['new_image']['name'];
    $new_tmp_image_name = $_FILES['new_image']['tmp_name'];
    $new_trailer = $_POST['new_trailer'];

    $article = new Article;

    if(empty($new_image_name)){
        $article->updateArticle($article_id, $new_title, $new_date, $new_message, $new_trailer);
    }else{
        $article->updateArticleAndImage($article_id, $new_title, $new_date, $new_message, $new_image_name, $new_tmp_image_name, $new_trailer);
    }
    
?>