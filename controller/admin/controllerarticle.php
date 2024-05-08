<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once("../model/dbAPI.php");
include_once("../model/articlesAPI.php");

$db = new db();
$conn = $db->connect();
$article = new Article($db);
if(array_key_exists('input',$_GET)) 
{
    $input = $_GET['input'];
    $read = $article->readfind($input);
}
else
$read = $article->read();
$numRows = $read->rowCount();
$jsonarray = [];
$jsonarray['articles'] = [];
if($numRows>0){
    $count=1;
    while ($row = $read->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($jsonarray['articles'],['id' => $id,'count' => $count,'title' => $title,'image' => $image]);
        $count++;
    }
}
echo json_encode($jsonarray);
?>