<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    
    $customer->username = $_POST['username'];
    $customer->password = $_POST['pswd'];
    $customer->phoneNum = $_POST['phoneNum'];
    $customer->nComments = 0;
    $customer->avatar = $_POST['img-data'];
    if($_POST['flags'] == 'seller') 
    {
        $customer->sellerFlag = 1;
    }
    else $customer->buyerFlag = 1;
    $customer->money = 0;

    if($customer->create())
    {
        header("Location: ../controller/?perm=client&action=login");
    }
    else
    {
        header("Location: ../controller/?perm=client&action=");
    }
?>