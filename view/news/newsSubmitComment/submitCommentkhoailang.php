<?php
include_once("./model/dbAPI.php");
include_once("./model/commentAPI.php");
$db = new db();
$conn = $db->connect();
$comment = new Comment($db);
$comment->uid = (int)$_POST['customerId'];
$comment->newsid = (int)$_POST['newsId'];
$comment->content = $_POST['content'];

if($comment->createnewscomment()){
    header("Location: ./khoailanggiamgia.php");
}
else{
    header("Location: ./khoailanggiamgia.php&err=1");
}
?>