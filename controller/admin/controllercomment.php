<?php
include_once("../model/dbAPI.php");
include_once("../model/commentAPI.php");

$db = new db();
$conn = $db->connect();
$comment = new Comment($db);
if(array_key_exists('input',$_GET)) 
{
    $input = $_GET['input'];
    $read = $comment->readfind($input);
}
else
$read = $comment->read();
$numRows = $read->rowCount();
$jsonarray = [];
$jsonarray['comments'] = [];
if($numRows>0){
    $count=1;
    while ($row = $read->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        array_push($jsonarray['comments'],['id' => $id,'count' => $count,'uid' => $uid,'content' => $content]);
        $count++;
    }
}
echo json_encode($jsonarray);
?>