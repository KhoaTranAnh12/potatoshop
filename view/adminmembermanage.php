
        <div class="row">
            <form class="header__search d-flex ml-auto" method="get" action="http://localhost/mvc/controller/">
                <input type="hidden" name="perm" value="admin"><input type="hidden" name="action" value="client">
                <input class="form-control mr-2" type="text" placeholder="Search" name ="input" >
                <button class="btn-primary bg-success">Search</button>
            </form>
        </div>
        <h1>Quản lý người dùng</h1>
        <table class="table" class="mx-auto col-8">
            
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $count=1;
                    foreach($allcustomers as $row){
                        extract($row);
                        echo '
                        <tr class="info-'.ceil($count/12).'">
                            <th scope="row">'.$count.'</th>
                            <td>'.$username.'</td>
                            <td>'.$fName.' '.$lName.'</td>
                            <td>'.$email.'</td>
                            <td><button onclick=changedeleteinput('.$id.') type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Xoá</button></td>
                            <td><a href="../controller/?perm=admin&action=info&id='.$id.'" class="btn btn-info" role="button">Sửa</a></td>                 
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
                            <form method="POST" action="../controller/membermanage.php?action=delete">
                                <input type="text" id="delID" name="ID">
                                <button type="submit" class="btn btn-danger">Xoá</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="modal" id="updateModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa thành viên</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="manage.php?action=update">
                            <div class="form-group">
                                <label for="email">ID:</label>
                                <input type="hidden" class="form-control" placeholder="Enter email" id="updateID" name="ID">
                            </div>
                            <div class="form-group">
                                <label for="fName">Họ:</label>
                                <input type="text" class="form-control" placeholder="Enter first name" id="fName" name="fName">
                            </div>
                            <div class="form-group">
                                <label for="lName">Tên:</label>
                                <input type="text" class="form-control" placeholder="Enter last name" id="lName" name="lName">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" placeholder="Enter email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                            </div>
                            <button type="submit" class="btn btn-danger">Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            </tbody>
            </table>