<?php
    var_dump($_GET);
    var_dump($_POST);
    include_once("../../model/dbAPI.php");
    include_once("../../model/articlesAPI.php");
    $db = new db();
    $conn = $db->connect();
    $article = new Article($db);
    if($_GET['action'] == "delete"){
        $article->id = (int)$_POST["ID"];
        if($article->delete()){
            header("Location: ./adminArticleManage.php");
        }
        else
        {
            header("Location: ./adminArticleManage.php?err=1");
        }
    }
    else{
        $article->id = (int)$_POST["ID"];
        $article->show();
        $article->content = $_POST["content"];
        echo $article->content;
        if($article->update()){
            header("Location: ./adminArticleManage.php");
        }
        else
        {
            header("Location: ./adminArticleManage.php?err=2");
        }
    }
?>