<?php
if(array_key_exists('input',$_GET))
{
    $input = $_GET['input'];
}
?>
<div class="container my-2">
            <div class="row">
                <h1>Kết quả tim kiếm: <?php echo $input;?></h1>
            </div>
            <div class="row">
                <h3>Người dùng</h3>
            </div>
            <?php
                if (count($user)>0)
                foreach($user as $row2)
                {
                        extract($row2);
                        if($sellerFlag)
                        echo '
                        <div class="row mt-3 border border-primary rounded">
                            <div class="col-1 card">
                                <img class="d-block w-100" src="'.$avatar.'" alt="abc">
                            </div>
                            <div class="col-11">
                                <h6>'.$username.'</h6>
                                <ul>
                                    <li>Tên:'.$fName.''.$lName.'</li>
                                    <li>SĐT: '.$phoneNum.'</li>
                                    <li>Vai trò: Người bán</li>
                                </ul>
                            </div>
                        </div>
                        
                        ';
                        else if($buyerFlag)
                        {
                        echo '
                        <div class="row mt-3 border border-primary rounded">
                            <div class="col-1 card">
                                <img class="d-block w-100" src="'.$avatar.'" alt="abc">
                            </div>
                            <div class="col-11">
                                <h6>'.$username.'</h6>
                                <ul>
                                    <li>Tên:'.$fName.''.$lName.'</li>
                                    <li>SĐT: '.$phoneNum.'</li>
                                    <li>Vai trò: Người mua</li>
                                </ul>
                            </div>
                        </div>
                        
                        ';
                        }
                        else
                        echo '
                        <div class="row mt-3 border border-primary rounded">
                            <div class="col-1 card">
                                <img class="d-block w-100" src="'.$avatar.'" alt="abc">
                            </div>
                            <div class="col-11">
                                <h6>'.$username.'</h6>
                                <ul>
                                    <li>Tên:'.$fName.''.$lName.'</li>
                                    <li>SĐT: '.$phoneNum.'</li>
                                    <li>Vai trò: Admin</li>
                                </ul>
                            </div>
                        </div>
                        
                        ';
                    }
                else{
                    echo '<div class="row">
                    <p>Không có kết quả</p>
                    </div>';
                }
                ?>
            <div class="row">
                <h3>Sản phẩm</h3>
            </div>
            <div class="row">
                <?php
                if (count($products)>0)
                foreach($products as $row3)
                {
                    extract($row3);
                    echo'
                    <div class="card col-lg-4 col-md-6 py-2 h-100 item">
                        <a href="../controller/?perm='.$_GET['perm'].'&action=product&productid='.$id.'"><img src="'.$image1.'" alt="Polo picture" class="card-img-top"></a>
                        <p class="text-center">Price: '.$price.' VNĐ</p>
                    </div>
                    ';
                }
                else{
                    echo'<p>Không có kết quả</p>';
                }
                ?>
            </div>
        </div>