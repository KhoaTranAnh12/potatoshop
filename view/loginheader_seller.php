<?php
unset($_SESSION['id']);
unset($_SESSION['permission']);
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../Styles/style.css">
    </head>
    <?php
    ?>
    <body class="bg-body">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <div class="navbar-brand"><a style = "text-decoration: none; color: black" href = "../controller/?perm=seller"><h1>potato.shop người bán</h1></a></div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../controller/?perm=client&action=login">Kênh người mua</a></li>
                </ul>
            </div>           
        </nav>