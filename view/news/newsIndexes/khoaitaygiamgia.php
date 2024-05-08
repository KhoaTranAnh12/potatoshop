        <div class="container-fluid my-2 row">
        <img src="../view/news/newsIndexes/khoai ngon giảm giá.jpg" class="w-100" alt="abc">
        <p style="font-size: 40px;">
            Hôm nay là 1 ngày tuyệt vời, là ngày ra mắt của chuỗi cửa hàng bán khoai potato.shop. Vì vậy, những ai mua khoai
            vào 3 ngày đầu tiên sẽ giảm giá 25%. Đặc biệt là các món ăn vặt, chế biến từ khoai tây, giảm còn 17.900VNĐ/kg! Ngoài ra khi mua với đơn hàng bất kì
            các bạn sẽ được tặng thêm 10% khối lượng đơn hàng! (Đối với đồ ăn từ khoai tây, sẽ được + 1 sản phẩm free cho lần mua đầu tiên,
            reset mỗi 10 sản phẩm.)
        </p>
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
            <form id="cmt" action="../controller/newssubmitcomment.php" method="post" class=" m-3 p-1">
            <div class="row mb-3">
                <input type="hidden" name="perm" value='.$_GET['perm'].'>
                <input type="hidden" name="newsId" value='.$_GET['id'].'>
                <input type="hidden" name="customerId" value='.$_SESSION['id'].'>
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