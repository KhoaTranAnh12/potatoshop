<?php
session_start();
include_once("../model/dbAPI.php");
include_once("../model/newsAPI.php");

$db = new db();
$conn = $db->connect();
$news = new News($db);
$news->url = $_POST['url'];
$news->image = $_POST['img'];
$news->secondaryimage = $_POST['secondaryimg'];
$news->uploaderid = $_SESSION['id'];
if ($news->create())
header("Location: ../controller/?perm=admin&success=1");
else header("Location: ../controller/?perm=admin&err=1");
?>