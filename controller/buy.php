<?php
session_start();
include_once("../model/dbAPI.php");
include_once("../model/cartitemAPI.php");
include_once("../model/buyproductAPI.php");
$db = new db();
$conn = $db->connect();
$cartitem = new CartItem($db);
$buyproduct = new BuyProduct($db);
$cartitem->uid = $_SESSION['id'];
$read = $cartitem->readuid();
$numRows = $read->rowCount();
if($numRows>0)
{
    while ($row = $read->fetch(PDO::FETCH_ASSOC)){
        var_dump($row);
        extract($row);
        $buyproduct->uid = $_SESSION['id'];
        $buyproduct->productid = $productid;
        $buyproduct->pType = $pType;
        $buyproduct->quantity = $quantity;
        $buyproduct->create();
        // $cartitem->id = $id;
        // $cartitem->delete();
    }
}
// header("Location: ../controller/?perm=client&action=info")
?>