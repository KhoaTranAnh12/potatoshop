<?php
include_once("../model/dbAPI.php");
include_once("../model/cartitemAPI.php");
$db = new db();
$conn = $db->connect();
$cartitem = new CartItem($db);
if($_GET['action']=='delete'){
    $cartitem->id = (int)$_POST["ID"];
    $cartitem->show();
    
    if($cartitem->delete()){
        header("Location: ../controller/?perm=client&action=info");
    }
    else
    {
        header("Location: ../controller/?perm=client&action=info&err=1");
    }
}
else{
    $cartitem->id = (int)$_POST["ID"];
    $cartitem->show();
    
    $cartitem->quantity = (float)$_POST['quantity'];
    if($cartitem->update()){
        header("Location: ../controller/?perm=client&action=info");
    }
    else
    {
        header("Location: ../controller/?perm=client&action=info&err=1");
    }
} 
?>