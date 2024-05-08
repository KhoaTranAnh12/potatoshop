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
            header("Location: ./adminCommentManage.php");
        }
        else
        {
            header("Location: ./adminCommentManage.php?err=1");
        }
    }
?>