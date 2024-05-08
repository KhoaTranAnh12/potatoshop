<?php 
session_start();
if($_SESSION['permission']=='BUY') 
include_once('../view/header.php');
else
include_once('../view/header_seller.php');?>
?>
<?php include_once('../view/about.php')?>
<?php include_once('../view/footer.php')?>