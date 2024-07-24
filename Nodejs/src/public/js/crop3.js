const chooseFile3 = document.getElementById("choose-file3");
const imgPreview3 = document.getElementById("img-preview3");
function doneButton3() {
    document.getElementById("cropWindow3").hidden = true;
    document.getElementById("conf-file3").setAttribute("value", document.getElementById("output3").src)
    console.log(document.getElementById("output3").src);
}
chooseFile3.addEventListener("change", function () {
    getImgData3();
});
function getImgData3() {
    document.getElementById("cropWindow3").hidden = false;
    const files = chooseFile3.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview3.style.display = "block";
            imgPreview3.innerHTML = '<img id = "image3" src="' + this.result + '" style="height: 400px; width: 400px;"/>';
        });
        setTimeout(abc3, 50);
    }
}
//CROPPER

function abc3() {
    var image = document.getElementById('image3');
    var button = document.getElementById('btn-crop3');
    var cropper = new Cropper(image, {
        aspectRatio: 1,
    });

    // BUTTON CLICK EVENT
    button.onclick = function () {
        var croppedCanvas;
        var roundedCanvas;

        // CROP
        croppedCanvas = cropper.getCroppedCanvas();

        // MAKE IT ROUND
        roundedCanvas = getRoundedCanvas(croppedCanvas);

        // SHOW OUTPUT
        document.querySelector('#output3').src = roundedCanvas.toDataURL();
        document.querySelector('#output3').hidden = false;
        document.querySelector('#preview3').src = roundedCanvas.toDataURL();
        document.querySelector('#preview3').hidden = false;
        imgsrc = document.querySelector('#preview3').src;
        fetch(imgsrc).then(response => response.blob()).then(blob => {
            var reader = new FileReader();

            reader.onload = function () {
                var base64data = reader.result;
                console.log(base64data);
                document.getElementById("imgdata3").value = base64data;
                // Send the 'base64data' to the server using a method like HTTP POST
            };

            reader.readAsDataURL(blob);
        }).catch(error => {
            console.error('Error fetching the image:', error);
        });
        document.querySelector('.cropped-container').style.display = 'flex';
    };
}