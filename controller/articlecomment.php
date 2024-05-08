<?php
include_once("../model/dbAPI.php");
include_once("../model/commentAPI.php");
$db = new db();
$conn = $db->connect();
var_dump($_POST);
$comment = new Comment($db);
$comment->uid = (int)$_POST['customerId'];
$comment->articleid = (int)$_POST['articleId'];
$comment->content = $_POST['content'];

if($comment->createarticlecomment()){
    header("Location: ./?perm=".$_GET['perm']."&action=article&id=".$comment->articleid."");
}
else{
    header("Location: ./?perm=".$_GET['perm']."&action=article&id=".$comment->articleid."&err=1");
}
?>