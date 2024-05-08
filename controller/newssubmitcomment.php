<?php
include_once("../model/dbAPI.php");
include_once("../model/commentAPI.php");
$db = new db();
$conn = $db->connect();
$comment = new Comment($db);
$comment->uid = (int)$_POST['customerId'];
$comment->newsid = (int)$_POST['newsId'];
$comment->content = $_POST['content'];

if($comment->createnewscomment()){
    header("Location: ./?perm=".$_POST['perm']."&action=news&id=".$comment->newsid."");
}
else{
    header("Location: ./?perm=".$_POST['perm']."&action=news&id=".$comment->newsid."&err=1");
}
?>