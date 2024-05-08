<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
    include_once("../dbAPI.php");
    include_once("../customerAPI.php");

    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);

    $data = json_decode(file_get_contents("php://input"));

    $customer->id = $data->id;
    $customer->username = $data->username;
    $customer->password = $data->password;
    $customer->fName = $data->fName;
    $customer->lName = $data->lName;
    $customer->email = $data->email;
    $customer->nComments = $data->nComments;
    $customer->buyerFlag = $data->buyerFlag;
    $customer->sellerFlag = $data->sellerFlag;
    $customer->money = $data->money;

    if ($customer->create())
    echo json_encode(Array('message','Đã tạo thành công'));
    else
    echo json_encode(Array('message','Chưa thể tạo được~~'));
?>