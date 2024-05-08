<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link  href="../image-cropper-round/cropperjs/cropper.css" rel="stylesheet">
<script src="../image-cropper-round/cropperjs/cropper.js"></script>
<div class="bg-light container-fluid">
            <div class="row p-3">
                <div class="col-lg-8">
                    <img src="../Images/khoai.jpg" alt="yone" width="100%">
                </div>
                <div class="col-lg-4">
                <form id="registrationForm" action="../controller/signup_process.php?perm=<?php echo $_GET['perm']?>" method="post" class="bg-light m-3 p-1">
                        <div class="mb-3 mt-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                        <span id="usernameError" class="text-danger"></span>
                        </div>
                        <?php
                            if(array_key_exists('err',$_GET))
                            {
                                echo "
                                <script>
                                document.getElementById('usernameError').textContent='Đã có username bị trùng!';
                                </script>
                                ";
                            }
                        ?>
                        <div class="mb-3 mt-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                        <span id="passwordError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                        <label for="confPwd" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confPwd" placeholder="Enter confirm password" name="confPswd">
                        <span id="confPasswordError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="pNum" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="pNum" placeholder="Enter phone number" name="phoneNum">
                            <span id="phoneNumError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <p>Đăng ký với tư cách:</p>
                            <label for="buyer" class="form-label">Người mua</label>
                            <input type="checkbox" id="buyer" name="flags" value="buyer">
                            <label for="seller" class="form-label">Người bán</label>
                            <input type="checkbox" id="seller" name="flags" value="seller">
                            <span id="phoneNumError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for= "choose-file" class="form-label">Ảnh đại diện:</label>
                            <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                            <img src="" id="preview" style="height: 200px; width: 200px;" hidden>
                            <input type="hidden" id="img-data" name="img-data">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div id="cropWindow" hidden class="bg-light border border-dark" style="position: fixed; width: 60vw; height: 80vh; top: 10vh; left: 20vw;">
                            <div class="row m-0 bg-secondary border" style="height: 50px;">
                              <button  type="button"style="width: 48px; height: 48px; margin-left: auto;" onclick="closeButton();"><i class="fa fa-close"></i></button>
                            </div>
                            <div class="row" style="overflow: scroll; height:calc(100% - 50px);">
                              <div class="row justify-content-center m-0">
                                <div id="img-preview" class="img-container col-8">
                                  <img id="image" src="../../Images/example2.png">
                                </div>
                              </div>
                              <div class="row justify-content-center mt-3">
                                <button type="button" id="btn-crop" class="btn btn-primary" style="width: 100px;">Cắt</button>
                              </div>
                              <div class="row cropped-container mt-3 justify-content-center" style="height: 200px;">
                                  <img src="" id="output" style="height: 200px; width: 200px;" hidden>
                              </div>
                              <div class="row justify-content-center mt-3">
                                <button type="button" onclick="doneButton()" id="btn-ok" class="btn btn-primary" style="width: 100px;">Submit</button>
                              </div>
                            </div>
                        </div>
                        <script src="../Scripts/imageSignUp.js"> </script>
                    </form>
                    <script src="../Scripts/signUpValidator.js"></script>
                </div>
            </div>
        </div>