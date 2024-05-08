<!DOCTYPE html>
<html>
    <head>
        <title>potato.shop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="bg-body">
        <nav class="navbar navbar-expand-md navbar-dark bg-warning container-fluid p-0">    
                <a class="navbar-brand" href="../controller?perm=admin&action=menu"><h1>Admin</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../controller/?perm=admin">Đăng nhập</a></li>
                    <li class="nav-item" hidden><a class="nav-link" href="../controller/?perm=admin&action=info&id=<?php echo $_SESSION['id'];?>">
                        <?php
                        if (isset($_SESSION['id']))
                        {
                            include_once("../model/dbAPI.php");
                            include_once("../model/customerAPI.php");
                            $db = new db();
                            $conn = $db->connect();

                            $customer = new Customer($db);
                            
                            $customer->id = $_SESSION['id'];

                            if ($customer->showid())
                            {
                                echo '<img src="'.$customer->avatar.'" alt="avatar" style="width: 2rem;">';
                            }
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item" hidden><a class="nav-link" href="../controller/?perm=admin">Đăng xuất</a></li>
                </div>
                    <?php
                    if (isset($_SESSION['id']))
                        {
                            echo '<script>
                            items=document.querySelectorAll(".nav-item");
                            items[0].hidden=true;
                            items[1].hidden=false;
                            items[2].hidden=false;
                            </script>';
                        }
                    
                    ?>
                </ul>           
        </nav>
        <div class="row">
        <div class="col-lg-8">
                <div id="suggests2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php
                        $first = true;
                        foreach($allnews as $n)
                        {
                            extract($n);
                            if($first)
                            {
                                echo '
                                <div class="carousel-item active">
                                    <a href="../controller/?perm=admin&action=news&id='.$id.'"><img class="d-block w-100" src="'.$image.'" alt="First slide"></a>
                                </div>
                                ';
                                $first = false;
                            }
                            else
                            echo '
                            <div class="carousel-item">
                                <a href="../controller/?perm=admin&action=news&id='.$id.'"><img class="d-block w-100" src="'.$image.'" alt="First slide"></a>
                            </div>
                            ';
                        }
                    ?>
                    </div>
                    <a class="carousel-control-prev" href="#suggests2" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#suggests2" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <?php
                    $numRows = count($allnews);
                    if($numRows>=2)
                    {
                        for($i=1;$i<=2;$i++)
                        {
                            extract($allnews[$i-1]);
                            {
                                echo '
                                <div class="col-sm-6 col-lg-12">
                                    <a href="../controller/?perm=admin&action=news&id='.$id.'"><img class="w-100" src="'.$secondaryimage.'" alt="abc"></a>
                                </div>
                                ';
                                $first = false;
                            }
                        }
                    }
                    else if ($numRows == 1)
                    {
                        extract($allnews[0]);
                        echo '
                        <div class="col-12">
                            <a href="../controller/?perm=admin&action=news&id='.$id.'"><img class="w-100" src="'.$secondaryimage.'" alt="abc"></a>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>