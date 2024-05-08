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
        if($customer->password == $_POST['pswd'] && $customer->buyerFlag == 1)
        {
            $_SESSION['id']=$customer->id;
            $_SESSION['permission']='BUY';
            header('Location: ../controller/?perm=client');
        }
        else
        {
            header('Location: ../controller/?perm=client&action=login&err=1');
        }
    }
    else
    {
        header('Location: ../controller/?perm=client&action=login&err=1');
    }
?>