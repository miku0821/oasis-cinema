<?php
include "../classes/information.php";
$info_id = $_POST['info_id'];
$new_title = $_POST['new_title'];
$new_image_name = $_FILES['new_image']['name'];
$new_tmp_image_name = $_FILES['new_image']['tmp_name'];
$new_message = $_POST['new_message'];
$new_date = $_POST['new_date'];

$info = new Information;

if(empty($new_image_name)){
   $info-> updatePost($info_id, $new_title, $new_message, $new_date); 
}else{
    $info->updatePostAndImage($info_id, $new_title, $new_image_name, $new_tmp_image_name, $new_message, $new_date);
}

?>