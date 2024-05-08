<?php
include_once("./model/dbAPI.php");
include_once("./model/commentAPI.php");
$db = new db();
$conn = $db->connect();
$comment = new Comment($db);
$comment->uid = (int)$_POST['customerId'];
$comment->newsid = (int)$_POST['newsId'];
$comment->content = $_POST['content'];

if($comment->createproductcomment()){
    header("Location: ./product.php?productid=".$comment->newsid."");
}
else{
    header("Location: ./product.php?productid=".$comment->productid."&err=1");
}
?>