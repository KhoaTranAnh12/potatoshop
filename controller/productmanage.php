<?php
    var_dump($_GET);
    var_dump($_POST);
    include_once("../../model/dbAPI.php");
    include_once("../../model/productAPI.php");
    $db = new db();
    $conn = $db->connect();
    $product = new Product($db);
    if($_GET['action'] == "delete"){
        $product->id = (int)$_POST["ID"];
        if($product->delete()){
            header("Location: ./adminProductManage.php");
        }
        else
        {
            header("Location: ./adminProductManage.php?err=1");
        }
    }
?>