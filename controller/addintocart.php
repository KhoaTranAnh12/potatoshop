<?php
    include_once("../model/dbAPI.php");
    include_once("../model/cartitemAPI.php");
    $db = new db();
    $db->connect();
    $buy = new CartItem($db);
    $buy->productid = $_POST["productid"];
    $buy->uid = $_POST["buyerid"];
    $buy->pType = $_POST["producttype"];
    $buy->quantity = $_POST["quantity"];
    if($buy->create()) header("Location: ./?perm=client&action=product&&productid=".$buy->productid);
?>