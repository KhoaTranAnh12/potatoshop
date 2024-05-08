<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
    include_once("../main/dbAPI.php");
    include_once("./customerAPI.php");

    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);

    $data = json_decode(file_get_contents("php://input"));

    $customer->id = $data->id;

    if ($customer->delete())
    echo json_encode(Array('message','Đã Xoá thành công'));
    else
    echo json_encode(Array('message','Chưa thể xoá được~~'));