<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once("../main/dbAPI.php");
    include_once("./customerAPI.php");
    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    $customer->id = isset($_GET['id'])?$_GET['id']:die();


    $customer->show();
    $customer_item = array(
        'id' => $customer->id,
        'username' => $customer->username,
        'password' => $customer->password,
        'fname' => $customer->fName,
        'lname' => $customer->lName,
        'email' => $customer->email,
        'nComments' => $customer->nComments,
        'buyerFlag' => $customer->buyerFlag,
        'sellerFlag' => $customer->sellerFlag,
        'money' => $customer->money
    );
    echo json_encode($customer_item);
?>