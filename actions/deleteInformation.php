<?php
    include "../classes/information.php";
    $info_id = $_GET['info_id'];
    $info = new Information;
    $info->deletePost($info_id);
?>