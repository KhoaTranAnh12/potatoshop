<?php
        include_once("../model/dbAPI.php");
        include_once("../model/articlesAPI.php");
        if(count($_POST)>0)
        {
            $db = new db();
            $conn = $db->connect();
            $article = new Article($db);
            $article->writerid = $_POST['sellerid'];
            $article->title = $_POST['articletitle'];
            $article->content = $_POST['content'];
            $article->image=$_POST['img-data1'];
            if ($article->create())
            header('Location: ../controller/?perm=seller&action=updatearticle&success=1');
            else
            header('Location: ../controller/?perm=seller&action=updatearticle&success=0');
        }
?>