<?php
    session_start();
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    include_once("../model/adminAPI.php");
    $db = new db();
    $conn = $db->connect();

    $customer = new Customer($db);
    $admin = new Admin($db);
    
    $customer->username = $_POST['username'];
    echo $customer->username;

    if ($customer->show())
    {
        if($customer->password == $_POST['pswd'])
        {
            $admin->id=$customer->id;
            
            if($admin->show()) 
            {
                $_SESSION['id'] = $admin->id;
                $_SESSION['permission'] = "ADMIN";
                header('Location: ../controller/adminMenu.php'); 
            }
            else header('Location: ../controller/adminLogin.php?err=1');
            // header('Location: ../adminMenu/adminMenu.php');
        }
        else
        {
            header('Location: ../controller/adminLogin.php?err=2');
        }
    }
    else
    {
        header('Location: ../controller/adminLogin.php?err=3');
    }
?>