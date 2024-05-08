<?php
    session_start();
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    
    $customer->username = $_POST['username'];
    echo $customer->username;

    if ($customer->show())
    {
        echo $customer->password;
        if($customer->password == $_POST['pswd'] && $customer->sellerFlag == 1)
        {
            $_SESSION['id']=$customer->id;
            $_SESSION['permission']='SELL';
            header('Location: ../controller/?perm=seller');
        }
        else
        {
            header('Location: ../controller/?perm=seller&action=login&err=1');
        }
    }
    else
    {
        header('Location: ../controller/?perm=seller&action=login&err=1');
    }
?>