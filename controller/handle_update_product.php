<?php
        include_once("../model/dbAPI.php");
        include_once("../model/productAPI.php");
        if(count($_POST)>0)
        {
            $db = new db();
            $conn = $db->connect();
            $product = new product($db);
            $product->name = $_POST['pName'];
            $product->sellerid = $_POST['sellerid'];
            echo $product->sellerid;
            $product->type = $_POST['potatoType'];
            $product->quantity=(float) $_POST['quantity'];
            $product->description=$_POST['description'];
            $product->price=(float) $_POST['price'];
            $product->image1=$_POST['img-data1'];
            $product->image2=$_POST['img-data2'];
            $product->image3=$_POST['img-data3'];
            if ($product->create())
            header('Location: ../controller/?perm=seller&action=updateproduct&success=1');
            else
            header('Location: ../controller/?perm=seller&action=updateproduct&success=0');
        }
?>