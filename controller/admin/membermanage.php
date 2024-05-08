<?php
    var_dump($_GET);
    var_dump($_POST);
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();
    $customer = new Customer($db);
    if($_GET['action'] == "delete"){
        $customer->id = (int)$_POST["ID"];
        if($customer->delete()){
            header("Location: ./adminMemberManage.php");
        }
        else
        {
            header("Location: ./adminMemberManage.php?err=1");
        }
    }
    else
    {
        $customer->id = (int)$_POST["ID"];
        $customer->showid();
        $customer->username = $_POST['username'];
        $customer->fName = $_POST['fName'];
        $customer->lName = $_POST['lName'];
        $customer->email = $_POST['email'];
        $customer->phoneNum = $_POST['phoneNum'];
        $customer->password = $_POST['password'];
        if($customer->update()){
            header("Location: ./adminMemberInfo.php?id=".$customer->id."");
        }
        else
        {
            header("Location: ./adminMemberInfo.php?id=".$customer->id."&err=2");
        }
    }
?>