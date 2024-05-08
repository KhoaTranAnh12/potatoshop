
<div class="container my-2">
            <div class="row">
                <!-- Content here -->
                <div class="container my-2 overflow-auto">
                    <form id="updateProductForm" action="../controller/handle_update_product.php" method="post" class="bg-light m-3 p-1">
                        <div class="mb-3">
                        <label for="pName" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="pName" placeholder="Enter product name" name="pName">
                        </div>
                        <input type="hidden" value=<?php echo $_SESSION['id'];?> name="sellerid">
                        <div class="mb-3 mt-3">
                        <label for="potatoType" class="form-label">Loại khoai:</label>
                        <select class="form-control" id="potatoType" name="potatoType">
                        <?php
                            include_once("../model/dbAPI.php");
                            include_once("../model/producttypeAPI.php");
                        
                            $db = new db();
                            $conn = $db->connect();
                            $producttype = new ProductType($db);
                            $read = $producttype -> read();
                            $numRows = $read->rowCount();
                            echo ' abcđsd';
                            if($numRows>0){
                                while ($row = $read->fetch(PDO::FETCH_ASSOC))
                                {
                                    extract($row);
                                    echo'<option value="'.$name.'">'.$name.'</option>';
                                }
                            }

                        ?>
                        </select>
                        <span id="potatoTypeError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" min="0.1" max="1000" step="0.01">
                        <span id="quantityError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                        <label for="quantity" class="form-label">Giá:</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                        <span id="quantityError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                        <span id="descriptionError" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for= "choose-file" class="form-label">Ảnh đại diện:</label>
                            <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                        </div>
                        <img id="preview1" alt="" style="width: 400px;display: block;">
                        <input type="hidden" id="img-data1" name="img-data1">
                        <div class="mb-3">
                            <label for= "choose-file2" class="form-label">Ảnh đại diện:</label>
                            <input type="file" id="choose-file2" name="choose-file2" accept="image/*" />
                        </div>
                        <img id="preview2" alt="" style="width: 400px;display: block;">
                        <input type="hidden" id="img-data2" name="img-data2">
                        <div class="mb-3">
                            <label for= "choose-file3" class="form-label">Ảnh đại diện:</label>
                            <input type="file" id="choose-file3" name="choose-file3" accept="image/*" />
                        </div>
                        <img id="preview3" alt="" style="width: 400px;display: block;">
                        <input type="hidden" id="img-data3" name="img-data3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link  href="../image-cropper-round/cropperjs/cropper.css" rel="stylesheet">
                        <script src="../image-cropper-round/cropperjs/cropper.js"></script>
                        <div id="cropWindow" hidden class="bg-light border border-dark" style="position: fixed; width: 60vw; height: 50vh; top: 20vh; left: 20vw;">
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
                        <script src="../Scripts/update1.js"> </script>
                    </form>
                    <script src="../Scripts/updateProductValidator.js"></script>
                </div>
            </div>
        </div>