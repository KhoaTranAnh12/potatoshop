        <div class="container my-2">
            <div class="row">
                <h1>Quản lý toàn bộ</h1>
            </div>
            <div class="row justify-content-around mt-3">
            <a href="../controller/?perm=admin&action=client" class="btn btn-info" role="button">Quản lý người dùng</a>
            <a href="../controller/?perm=admin&action=comment" class="btn btn-info" role="button">Quản lý Bình luận</a>
            <a href="../controller/?perm=admin&action=article" class="btn btn-info" role="button">Quản lý Bài viết</a>
            </div>
            <div class="row justify-content-around mt-3">
            <a href="../controller/?perm=admin&action=newsinfo" class="btn btn-info" role="button">Quản lý tin tức</a>
            <a href="../controller/?perm=admin&action=product" class="btn btn-info" role="button">Quản lý Sản phẩm</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNews">Thêm tin tức</button>

            <!-- The Modal -->
            <div class="modal" id="addNews">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm tin tức</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="addnews.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                            <label for="url" class="form-label">Link:</label>
                            <input type="text" class="form-control" id="url" placeholder="Enter link" name="url">
                            </div>
                            <div class="mb-3">
                            <label for="photo1" class="form-label">Ảnh 1:</label>
                            <input type="file" class="form-control" id="photo1" name="photo1" onchange="imageUploaded('#photo1','img')">
                            <input type="hidden" name='img' id='img'> 
                            </div>
                            <div class="mb-3">
                            <label for="photo2" class="form-label">Ảnh 2:</label>
                            <input type="file" class="form-control" id="photo2" name="photo2" onchange="imageUploaded('#photo2','secondaryimg')">
                            <input type="hidden" name='secondaryimg' id='secondaryimg'> 
                            </div>
                        </div>
                        <script>
                            function imageUploaded(id,img) {
                                let file = document.querySelector(
                                    id)['files'][0];
                    
                                let reader = new FileReader();
                                console.log("next");
                    
                                reader.onload = function () {
                                    base64String = reader.result;
                    
                                    imageBase64Stringsep = base64String;
                    
                                    // alert(imageBase64Stringsep);
                                    document.getElementById(img).value = base64String;
                                }
                                reader.readAsDataURL(file);
                            }
                        </script>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">OK</button>
                        </div>
                    </form>
                    <!-- Modal body -->
                    </div>
                </div>
                </div>
            </div>
        </div>