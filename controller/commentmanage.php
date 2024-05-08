<?php
    var_dump($_GET);
    var_dump($_POST);
    include_once("../model/dbAPI.php");
    include_once("../model/commentAPI.php");
    $db = new db();
    $conn = $db->connect();
    $comment = new Comment($db);
    if($_GET['action'] == "delete"){
        $comment->id = (int)$_POST["ID"];
        if($comment->delete()){
            header("Location: ../controller/?perm=admin&action=comment");
        }
        else
        {
            header("Location: ../controller/?perm=admin&action=comment&err=1");
        }
    }
?>