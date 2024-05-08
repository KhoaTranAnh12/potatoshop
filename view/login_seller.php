<?php

if (array_key_exists('err',$_GET))
{
    echo "
    <script>alert('Thông tin đăng nhập bị sai!');</script>
    ";
}
?>
<div class="bg-light container-fluid">
            <div class="row p-3">
                <div class="col-lg-8">
                    <img src="../Images/khoai.jpg" alt="yone" width="100%">
                </div>
                <div class="col-lg-4">
                    <form action="./../controller/handle_login_seller.php" method="post" class="bg-light m-3 p-1">
                        
                        <div class="mb-3 mt-3 mx-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                          </div>
                          <div class="mb-3 mx-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                          </div>
                          <div class="mx-3">
                                <a href="../controller/?perm=seller&action=signup" class="btn btn-info" role="button">Đăng ký</a>
                                <button type="submit" class="btn btn-dark">Submit</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>