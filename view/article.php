<div class="container">
<h1><?php echo $article['title'];?></h1>
<h5>By: <?php echo $article['writerid']?></h5>
<div class="row">
<img class="mx-auto" src="<?php echo $article['image']?>" alt="abc" style="width: 50vw;">
</div>
<h1>Nội dung</h1>
<p><?php echo $article['content']?></p>
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
                        <form id="cmt" action="../controller/articlecomment.php?perm='.$_GET['perm'].'" method="post" class=" m-3 p-1">
                        <div class="row mb-3">
                            <input type="hidden" name="articleId" value='.$_GET['id'].'>
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