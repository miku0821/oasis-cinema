<?php
    include "../classes/article.php";
    $article_id = $_GET['article_id'];
    $article = new Article;
    $article->deleteArticle($article_id);
?>