<div class="row">
            <div class="col-md-4">
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="<?php echo $customer['avatar'];?>" alt="Card image" style="width:100%">
                    <h6 class="card-title text-center"><?php echo $customer['username'];?></h6>
                </div>
            </div>
            <div class="col-md-8">
                <h6>Thông tin cá nhân:</h6>
                <ul>
                    <li>Họ tên: <?php echo $customer['lName'];?> <?php echo $customer['fName'];?></li>
                    <li>Tên đăng nhập: <?php echo $customer['username'];?></li>
                    <li>Email: <?php echo $customer['email'];?></li>
                    <li>SĐT: <?php echo $customer['phoneNum'];?></li>
                    <li>Số dư: <?php echo $customer['money'];?> VNĐ</li>
                </ul>
                <h6>Mặt hàng bán gần đây:</h6>
                <div>
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
                            <tr class="info-'.ceil($count/12).'">
                                <th scope="row" >'.$count.'</th>
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
                <?php
                $pagecount=ceil($count/12);
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
                </div>                       
            </div>
        </div>