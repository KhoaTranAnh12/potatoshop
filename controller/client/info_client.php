<?php
session_start();
if($_SESSION['permission']=='BUY') 
include_once('../view/header.php');
else
include_once('../view/header_seller.php');?>
<?php
if(array_key_exists('search',$_GET))
{
    if($_GET['search']=='buy') include_once('../view/info_client_buy.php');
    if($_GET['search']=='sell') include_once('../view/info_client_sell.php');
    if($_GET['search']=='comment') include_once('../view/info_client_comment.php');
    if($_GET['search']=='article') include_once('../view/info_client_article.php');
}
else
include_once('../view/info_client.php');
?>
<?php include_once('../view/footer.php')?>