<?php
    include_once("../model/dbAPI.php");
    include_once("../model/customerAPI.php");
    $db = new db();
    $conn = $db->connect();
    $customer = new Customer($db);
    if($_GET['action'] == "delete"){
        $customer->id = (int)$_POST["ID"];
        if($customer->delete()){
            header("Location: ../controller/?perm=admin&action=client&err=1");
        }
        else
        {
            header("Location: ../controller/?perm=admin&action=client&err=1");
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
        $customer->avatar = $_POST['avatar'];
        $customer->phoneNum = $_POST['phoneNum'];
        $customer->password = $_POST['password'];
        if($_GET['perm']!='admin')
        {
            if($customer->update()){
                header("Location: ../controller/?perm=".$_GET['perm']."&action=info");
            }
            else
            {
                header("Location: ../controller/?perm=".$_GET['perm']."&action=info&err=2");
            }
        }
        else
        {
        if($customer->update()){
            header("Location: ../controller/?perm=admin&action=info&id=".$customer->id."");
        }
        else
        {
            header("Location: ../controller/?perm=admin&action=info&id=".$customer->id."&err=2");
        }
        }
    }
?>