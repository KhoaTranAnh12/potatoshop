<?php
// $_SESSION['id']=1;
// $_SESSION['permission']='SELL';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>potato.shop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body class="bg-body">
        <div class="fixed-top">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="navbar-brand"><h1><a style="text-decoration: none; color: white" href="../controller/?perm=seller">potato.shop</a></h1></div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="../controller/?perm=seller&action=signup">Đăng ký</a></li>
                        <li class="nav-item"><a class="nav-link" href="../controller/?perm=seller&action=login">Đăng nhập</a></li>
                        <li class="nav-item" hidden><a class="nav-link" href="../controller/?perm=seller&action=info">
                            <img src="<?php echo $customer['avatar'];?>" alt="avatar" style="width: 2rem;">
                        </a></li>
                        
                        <li class="nav-item" hidden><a class="nav-link" href="../controller/?perm=seller&action=login">Đăng xuất</a></li>
                        <?php
                        if (isset($_SESSION['id']))
                            {
                                echo '<script>
                                items=document.querySelectorAll(".nav-item");
                                items[0].hidden=true;
                                items[1].hidden=true;
                                items[2].hidden=false;
                                items[3].hidden=false;
                                </script>';
                            }
                        
                        ?>
                    </ul>
                </div>           
            </nav>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="header__references">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="../controller/?perm=seller&action=about">Về Potato.shop</a></li>
                        </ul>
                    </div>
                    <form method="get" id="searchForm" action="../controller/" class="header__search d-flex ml-auto">
                        <input name="perm" type="hidden" value="seller">    
                        <input name="action" type="hidden" value="search">
                        <input name="input" class="form-control mr-2" type="text" placeholder="Search">
                        <button class="btn-primary bg-success">Search</button>
                    </form>
                </div>           
            </nav>
        </div>
        <div style="height: 9rem; width: 100%;"></div>
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
                                    <a href="../controller/?perm=seller&action=news&id='.$id.'"><img class="d-block w-100" src="'.$image.'" alt="First slide"></a>
                                </div>
                                ';
                                $first = false;
                            }
                            else
                            echo '
                            <div class="carousel-item">
                                <a href="../controller/?perm=seller&action=news&id='.$id.'"><img class="d-block w-100" src="'.$image.'" alt="First slide"></a>
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
                                    <a href="../controller/?perm=seller&action=news&id='.$id.'"><img class="w-100" src="'.$secondaryimage.'" alt="abc"></a>
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
                            <a href="../controller/?perm=seller&action=news&id='.$id.'"><img class="w-100" src="'.$secondaryimage.'" alt="abc"></a>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <h2>Danh mục</h2>
        </div>
        <nav class="navbar navbar-expand-sm navbar-dark bg-light">
            <div class="container-fluid">
                <div class="header__references container-fluid">
                    <ul class="navbar-nav justify-content-around overflow-auto row p-0">
                        <?php
                        foreach($allProductTypes as $n)
                        {
                            extract($n);
                            echo'
                            <li class="nav-item px-2 col-lg-2 col-md-3 col-4">
                                <div class="card">
                                    <a href="../controller/?perm=client&action=specific&name='.$name.'"><img class="card-img-top" src="'.$image.'" alt="Card image" style="width:100%"></a>
                                    <h6 class="card-title text-center">'.$name.'</h6>
                                </div>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                    
                </div>
            </div>           
        </nav>