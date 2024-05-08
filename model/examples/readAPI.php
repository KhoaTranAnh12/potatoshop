<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once("../main/dbAPI.php");
    include_once("./customerAPI.php");

    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    $read = $customer->read();


    $numRows = $read->rowCount();
    if($numRows>0){
        $customer_array = [];
        $customer_array['data'] = [];
        while ($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $customer_item = array(
                'id' => $id,
                'username' => $username,
                'password' => $password,
                'fname' => $fName,
                'lname' => $lName,
                'email' => $email,
                'nComments' => $nComments,
                'buyerFlag' => $buyerFlag,
                'sellerFlag' => $sellerFlag,
                'money' => $money
            );
            array_push($customer_array['data'],$customer_item);
        }
        echo json_encode($customer_array);
    }
?>