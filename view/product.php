<div class="container my-2 overflow-auto">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row justify-content-center">
                                    <div id="suggests22" class="container-fluid carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                        <?php
                                            echo '
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="'.$product['image1'].'" alt="First slide" ">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="'.$product['image2'].'" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="'.$product['image3'].'" alt="Third slide">
                                            </div>
                                            ';
                                        
                                        ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#suggests22" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#suggests22" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                <?php
                                    echo '
                                    <div data-target="#suggests22" class= "col-4" data-slide-to="0" class="active">
                                        <img class="d-block w-100 border-dark" src="'.$product['image1'].'" alt="Third slide">
                                    </div>
                                    <div data-target="#suggests22" class= "col-4 border-dark" data-slide-to="1">
                                        <img class="d-block w-100" src="'.$product['image2'].'" alt="Third slide">
                                    </div>
                                    <div data-target="#suggests22" class= "col-4 border-dark" data-slide-to="2">
                                        <img class="d-block w-100" src="'.$product['image3'].'" alt="Third slide">
                                    </div>
                                    ';
                                ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <h2 class="row mt-5"><?php echo $product['name'];?></h2>
                                <p class="row text-justify">
                                <?php
                                $kg=false;
                                if($product['type']!="Các đồ ăn vặt khoai") $kg=true;
                                if($kg)
                                echo '
                                <ul>
                                <li><h5>Loại:'.$product['type'].'</h5></li>
                                <li><h5>Giá:'.$product['price'].' VNĐ</h5></li>
                                <li><h5>Còn tồn:'.$product['quantity'].' kg</h5></li>
                                </ul>
                                ';
                                else
                                echo '
                                <ul>
                                <li><h5>Loại:'.$product['type'].'</h5></li>
                                <li><h5>Giá:'.$product['price'].' VNĐ</h5></li>
                                <li><h5>Còn tồn:'.$product['quantity'].'</h5></li>
                                </ul>
                                ';
                                echo'
                                <h5>Mô tả</h5>
                                <p class="text-justify">'.$product['description'].'</p>
                                '
                                ?>
                                </p>
                                <div class="row">
                                <?php
                                if(array_key_exists('id',$_SESSION))
                                {
                                if ($_SESSION['permission']=='SELL' && $_SESSION['id']==$product['sellerid']) 
                                echo '
                                <button class="btn-danger bg-success mx-auto" data-toggle="modal" data-target="#myModal">Xoá mặt hàng</button>
                                <button class="btn-danger bg-success mx-auto" data-toggle="modal" data-target="#yourModal">Thêm mặt hàng</button>
                                ';
                                else if($_SESSION['id']!=$product['sellerid']) echo '<button class="btn-danger bg-success mx-auto" data-toggle="modal" data-target="#mModal">Mua</button>';
                                }
                                else echo "<h3>Vui lòng đăng nhập trước khi mua!</h3>";
                                ?>
                                
                                </div>
                            </div>
                            <div class="modal" id="mModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Mua mặt hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="container-fluid" id="buyForm" action="../controller/addintocart.php" method="post" class="bg-light m-3 p-1">
                                                <input type="hidden" name="productid" value="<?php echo $product['id']?>">
                                                <input type="hidden" name="buyerid" value="<?php echo $_SESSION['id']?>">
                                                <input type="hidden" name="producttype" value="<?php echo $product['type']?>">
                                                <div class="mb-3 mt-3">
                                                <label for="productname" class="form-label">Mặt hàng:</label>
                                                <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $product['name']?>" disabled>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                <label for="quantity" class="form-label">Số lượng:</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity" min="0" max="<?php echo $product['quantity']?>" step="0.01">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                <label for="price" class="form-label">Đơn giá:</label>
                                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']?>" disabled>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                <label for="price" class="form-label">Tổng giá:</label>
                                                <input type="number" class="form-control" id="overallprice" name="overallprice" value="<?php echo $product['price']?>" disabled>
                                                </div>
                                                <script>
                                                    document.getElementById("quantity").addEventListener("change",function(){
                                                        let quantity=parseFloat(document.getElementById("quantity").value);
                                                        let price=parseFloat(document.getElementById("price").value);
                                                        let overall=quantity*price;
                                                        console.log(quantity);
                                                        console.log(price);
                                                        console.log(overall);
                                                        document.getElementById("overallprice").value=String(overall);
                                                    });
                                                </script>
                                                <div class="mb-3 mt-3">
                                                <button class="m-auto btn btn-primary">Mua</button>
                                                </div>
                                                
                                                
                                            </form>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(array_key_exists('id',$_SESSION)) if ($_SESSION['permission']=='SELL'&& $_SESSION['id']==$product['sellerid'])
                        echo '
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Xoá mặt hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        <p>Bạn có chắc chắn muốn xoá không?</p>
                                        <form class="container-fluid" id="deleteform" action="../controller/manageproduct.php?manage=delete" method="post" class="bg-light m-3 p-1">
                                        <div class="row mb-3">
                                            <input type="hidden" name="productId" value='.$_GET["productid"].'>
                                            <button type "submit" class="btn btn-danger ml-auto mt-2">Submit</button>
                                        </div>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="yourModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Thêm mặt hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        <form class="container-fluid" id="addform" action="../controller/manageproduct.php?manage=add" method="post" class="bg-light m-3 p-1">
                                        <div class="row mb-3">
                                            <input type="hidden" name="productId" value='.$_GET["productid"].'>
                                            <label for="content" class="form-label">Số lượng:</label>
                                            <input type="text" name="quantity" class="form-control" placeholder="Thêm số lượng">
                                            <button type "submit" class="btn btn-danger ml-auto mt-2">Submit</button>
                                        </div>
                                        </div>
                                        </form>
                                        <!-- Modal footer -->
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        ';
                        ?>
                        
                    </div>
                    <div class="row">
                        <h2>Bình luận</h2>
                        <a href="#" class="ml-auto">Xem thêm</a>
                    </div>
                    <div class="container-fluid" style="height: 270px; overflow-y: scroll;">
                    <?php
                        foreach ($comments as $row)
                            {
                                extract($row);
                                $customerCMT = getCustomerIDInfo($row['uid']);
                                echo '
                                <div class="row mt-3 border border-primary rounded">
                                    <div class="col-1 card">
                                        <img class="d-block w-100" src="'.$customerCMT['avatar'].'"alt="abc">
                                    </div>
                                    <div class="col-11">
                                        <h6>'.$customerCMT['username'].'</h6>
                                        <p>'.$row['content'].'</p>
                                    </div>
                                </div>
                                ';
                            }
                    ?>
                    </div>
                    <?php
                    if(array_key_exists('id',$_SESSION)) 
                    {
                        echo'
                        <form id="cmt" action="../controller/productcomment.php?perm='.$_GET['perm'].'" method="post" class=" m-3 p-1">
                        <div class="row mb-3">
                            <input type="hidden" name="productId" value='.$_GET['productid'].'>
                            <input type="hidden" name="customerId" value='.$customer['id'].'>
                            <label for="content" class="form-label">Bình luận:</label>
                            <textarea name="content" id="content" rows="3" class="form-control" placeholder="Bình luận..."></textarea>
                        </div>
                        <div class="row mb-3">
                        <button type="submit" class="ml-auto btn btn-primary">Submit</button>
                        </div>
                        </form>
                        ';
                    }
                    else echo '<h3>Vui lòng đăng nhập trước khi bình luận!</h3>'
                    
                    
                    ?>
                    
                </div>
            </div>
        </div>