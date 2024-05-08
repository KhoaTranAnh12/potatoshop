<div class="container my-2">
    <div class="row">
        <!-- Content here -->
        <div class="container my-2 overflow-auto">
            <form id="addArticlesForm" action="../controller/addArticlesProcess.php" method="post" class="bg-light m-3 p-1">
                <input type="hidden" value=<?php echo $_SESSION['id'];?> name="sellerid">
                <div class="mb-3">
                <label for="articletitle" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="articletitle" placeholder="Enter title" name="articletitle">
                <span id="articletitleError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                <label for="content" class="form-label">Nội dung:</label>
                <textarea name="content" id="content" rows="3" class="form-control" placeholder="Enter content"></textarea>
                <span id="contentError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for= "choose-file" class="form-label">Ảnh đại diện:</label>
                    <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                </div>
                <img id="preview1" alt="" style="width: 400px;display: block;">
                <input type="hidden" id="img-data1" name="img-data1">
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
                <script src="../Scripts/update2.js"> </script>
            </form>

        </div>
    </div>
</div>