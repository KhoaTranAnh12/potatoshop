<div class="row">
            <div class="col-lg-4">
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="<?php echo $customer['avatar'];?>" alt="Card image" style="width:100%">
                    <h6 class="card-title text-center"><?php echo $customer['username'];?></h6>
                </div>
            </div>
            <div class="col-lg-8">
                <h6>Thông tin cá nhân:</h6>
                <form method ="post" action="../controller/membermanage.php?perm=<?php echo $_GET['perm']?>&action=update">
                <input type="hidden" class="form-control" id="updateID" name="ID" value=<?php echo $customer['id'];?>>
                <input type="hidden" class="form-control" id="updateAvatar" name="avatar" value=<?php echo $customer['avatar'];?>>
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" class="form-control" placeholder="Enter first name" id="username" name="username" value=<?php echo $customer['username'];?>>
                </div>
                <div class="form-group">
                    <label for="fName">Họ:</label>
                    <input type="text" class="form-control" placeholder="Enter first name" id="fName" name="fName" value="<?php echo $customer['fName'];?>">
                </div>
                <div class="form-group">
                    <label for="lName">Tên:</label>
                    <input type="text" class="form-control" placeholder="Enter last name" id="lName" name="lName" value="<?php echo $customer['lName'];?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" id="email" name="email" value=<?php echo $customer['email'];?>>
                </div>
                <div class="form-group">
                    <label for="phoneNum">SĐT:</label>
                    <input type="text" class="form-control" placeholder="Enter phone num" id="phoneNum" name="phoneNum" value=<?php echo $customer['phoneNum'];?>>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" value=<?php echo $customer['password'];?>>
                </div>
                <div class="form-group">
                    <?php echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Sửa</button>'?>
                    
                    <div class="modal" id="confirmModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                            
                                <div class="modal-header">
                                    <h4 class="modal-title">Sửa thông tin thành viên</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn sửa thông tin thành viên này?
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-danger mr-0">Sửa</button>   
                                </div>

                            </div>
                        </div>
                    </div>
                 
                </div>
                
                </form>
                <a href="../controller/?perm=<?php echo $_GET['perm']?>&action=info&search=sell"><h6>Mặt hàng bán gần đây:</h6></a>
                <div style="height: 200px; overflow-y: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Tên mặt hàng</th>
                            <th scope="col">Số lượng/Khối lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count=1;
                        foreach($userProducts as $n)
                        {
                            extract($n);
                            echo '
                            <tr>
                                <th scope="row">'.$count.'</th>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$quantity.'</td>
                            </tr>
                            ';
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
                </div>
                <a href="../controller/?perm=<?php echo $_GET['perm']?>&action=info&search=buy"><h6>Mặt hàng mua gần đây:</h6></a>
                <div style="height: 200px; overflow-y: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">ID mặt hàng</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Số lượng/Khối lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            foreach ($boughtProducts as $r){
                                extract($r);
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$id.'</td>
                                    <td>'.$productid.'</td>
                                    <td>'.$pType.'</td>
                                    <td>'.$quantity.'</td>
                                </tr>
                                ';
                                $count++;
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <a href="../controller/?perm=<?php echo $_GET['perm']?>&action=info&search=comment"><h6>Các bình luận gần đây:</h6></a>
                <div style="height: 200px; overflow-y: auto">
                <table class="table">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Loại trang bình luận</th>
                            <th scope="col">ID Mặt hàng/Bài viết/Tin tức bình luận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            foreach ($comments as $row)
                            {
                                extract($row);
                                if(isset($articleid))
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$content.'</td>
                                    <td>Bài viết</td>
                                    <td>'.$articleid.'</td>
                                </tr>
                                ';
                                else if(isset($productid))
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$content.'</td>
                                    <td>Sản phẩm</td>
                                    <td>'.$productid.'</td>
                                </tr>
                                ';
                                else if(isset($newsid))
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$content.'</td>
                                    <td>Tin tức</td>
                                    <td>'.$newsid.'</td>
                                </tr>
                                ';
                                else if(isset($commentid))
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$content.'</td>
                                    <td>Bình luận</td>
                                    <td>'.$commentid.'</td>
                                </tr>
                                ';
                                $count++;
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <a href="../controller/?perm=<?php echo $_GET['perm']?>&action=info&search=article"><h6>Các bài viết gần đây:</h6></a>
                <div style="height: 200px; overflow-y: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Hình ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            foreach($articles as $row){
                                extract($row);
                                echo '
                                <tr>
                                    <th scope="row">'.$count.'</th>
                                    <td>'.$id.'</td>
                                    <td>'.$title.'</td>
                                    <td>'.$content.'</td>
                                    <td><img src="'.$image.'" style="max-height: 200px;"></td>
                                </tr>
                                ';
                                $count++;
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <h6>Giỏ hàng:</h6>
                <div style="height: 200px; overflow-y: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">ID mặt hàng</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Số lượng/Khối lượng</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            foreach($cart as $row){
                                extract($row);
                                echo '
                                <tr>
                                    <td scope="row">'.$count.'</td>
                                    <td>'.$id.'</td>
                                    <td>'.$productid.'</td>
                                    <td>'.$pType.'</td>
                                    <td>'.$quantity.'</td>
                                    <td><button onclick=changedeleteinput('.$id.') class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Xoá</button></td>
                                    <td><button onclick=changemanageinput('.$id.') class="btn btn-danger" data-toggle="modal" data-target="#updateModal">Sửa</button></td>
                                </tr>
                                ';
                                $count++;
                            }
                        ?>
                        
                        <script>
                            function changedeleteinput(id){
                                document.getElementById("delID").value = id;
                            }
                            function changemanageinput(id){
                                document.getElementById("updateproductID").value = id;
                            }
                        </script>
                        <div class="modal" id="deleteModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Xoá mặt hàng trong giỏ</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Bạn chắc chắn xoá mặt hàng trong giỏ chứ?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <form method="POST" action="../controller/cartedit.php?action=delete">
                                        <input type="hidden" id="delID" name="ID">
                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                    </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal" id="updateModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Sửa số lượng mặt hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form method="POST" action="../controller/cartedit.php?action=update">
                                    <div class="form-group">
                                        <input type="hidden" name="ID" id="updateproductID">
                                        <label for="quantity">Số lượng:</label>
                                        <input name="quantity" type="number" min="0.1" step="0.1"></input>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Sửa</button>
                                    </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
                </div>
                <?php if(count($cart)>0) echo'<a href="../controller/buy.php" class="btn btn-danger" role="button">Mua hàng</a>';?>
                <?php if($customer['sellerFlag']&&$_GET['perm']=='seller') echo'
                <div class="row mt-2">
                <a href="../controller/?perm=seller&action=updateproduct" class="btn btn-info" role="button">Thêm mặt hàng</a>
                <a href="../controller/?perm=seller&action=updatearticle" class="btn btn-info ml-2" role="button">Thêm Bài viết</a>
                </div>
                ';?>
            </div>
        </div>