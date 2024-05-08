<?php
include_once("../model/dbAPI.php");
include_once("../model/commentAPI.php");
$db = new db();
$conn = $db->connect();
var_dump($_POST);
$comment = new Comment($db);
$comment->uid = (int)$_POST['customerId'];
$comment->productid = (int)$_POST['productId'];
$comment->content = $_POST['content'];

if($comment->createproductcomment()){
    header("Location: ./product.php?productid=".$comment->productid."");
}
else{
    header("Location: ./product.php?productid=".$comment->productid."&err=1");
}
?>