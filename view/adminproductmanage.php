<div class="row">
            <form class="header__search d-flex ml-auto" method="get" action="http://localhost/mvc/controller/">
                <input type="hidden" name="perm" value="admin"><input type="hidden" name="action" value="product">
                <input class="form-control mr-2" type="text" placeholder="Search" name ="input" >
                <button class="btn-primary bg-success">Search</button>
            </form>
        </div>
        <h1>Quản lý Sản phẩm</h1>
        <table class="table" class="mx-auto col-8">
            
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Người bán</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $count=1;
                foreach($products as $row){
                        extract($row);
                        echo '
                        <tr class="info-'.ceil($count/12).'">
                            <th scope="row">'.$count.'</th>
                            <td>'.$id.'</td>
                            <td>'.$sellerid.'</td>                         
                            <td><a href="#">'.$name.'</a></td>
                            <td><button onclick=changedeleteinput('.$id.') type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Xoá</button></td>
                            <td><a href="../controller/?perm=admin&action=productinfo&productid='.$id.'" class="btn btn-info" role="button">Chi tiết</a></td>            
                        </tr>
                        ';
                        $count++;
                    }
                ?>
                <?php
                $pagecount=ceil($numRows/12);
                echo'
                <div class="row">
                    <label for="ProductPage" class="ml-auto">Trang:</label>
                    <input type="number" id="ProductPage" min="1" max="'.$pagecount.'" value="1">
                </div>
                <script>
                    function disableall(){
                        for(let i = 1; i<='.$pagecount.'; i++)
                        {
                        console.log("info-"+i.toString());
                        let menus = document.getElementsByClassName("info-"+i.toString())
                        console.log(menus.length);
                        for(let i=0; i<=menus.length-1; i++) menus[i].hidden = true;
                        } 
                    }
                    function enable(x){
                        console.log("enable" + x.toString());
                        let menus = document.getElementsByClassName("info-"+x.toString())
                        for(let i=0; i<=menus.length-1; i++) menus[i].hidden = false;
                    }
                    disableall();
                    enable(1);
                    $("#ProductPage").change(function(){
                        disableall();
                        console.log($("#ProductPage").val());
                        enable($("#ProductPage").val());
                    });
                </script>
                ';
                ?>
            <script>
                function changedeleteinput(id){
                    document.getElementById("delID").value = id;
                }
                function changemanageinput(id){
                    document.getElementById("updateID").value = id;
                }
            </script>
            <!-- The Modal -->
            <div class="modal" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                    
                        <div class="modal-header">
                            <h4 class="modal-title">Xoá thành viên</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xoá thành viên này?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <form method="POST" action="productmanage.php?action=delete">
                                <input type="text" id="delID" name="ID">
                                <button type="submit" class="btn btn-danger">Xoá</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            </tbody>
            </table>