<?php
include_once("../model/dbAPI.php");
include_once("../model/productAPI.php");

$db = new db();
$conn = $db->connect();

$product = new Product($db);
if($_GET['manage']=='add')
{
    $product->id = $_POST['productId'];
    $product->show();
    $product->quantity += $_POST['quantity'];
    if ($product->update())
    header("Location: ./?perm=seller&action=product&productid=".$product->id);
}
else if($_GET['manage']=='delete')
{
    $product->id = $_POST['productId'];
    if($product->delete()) header("Location: ./?perm=seller&action=menu");
}
?>