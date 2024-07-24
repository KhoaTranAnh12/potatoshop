const chooseFile2 = document.getElementById("choose-file2");
const imgPreview2 = document.getElementById("img-preview2");
function doneButton2() {
    document.getElementById("cropWindow2").hidden = true;
    document.getElementById("conf-file2").setAttribute("value", document.getElementById("output2").src)
    console.log(document.getElementById("output2").src);
}
chooseFile2.addEventListener("change", function () {
    getImgData2();
});
function getImgData2() {
    document.getElementById("cropWindow2").hidden = false;
    const files = chooseFile2.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview2.style.display = "block";
            imgPreview2.innerHTML = '<img id = "image2" src="' + this.result + '" style="height: 400px; width: 400px;"/>';
        });
        setTimeout(abc2, 50);
    }
}
//CROPPER

function abc2() {
    var image = document.getElementById('image2');
    var button = document.getElementById('btn-crop2');
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
        document.querySelector('#output2').src = roundedCanvas.toDataURL();
        document.querySelector('#output2').hidden = false;
        document.querySelector('#preview2').src = roundedCanvas.toDataURL();
        document.querySelector('#preview2').hidden = false;
        imgsrc = document.querySelector('#preview2').src;
        fetch(imgsrc).then(response => response.blob()).then(blob => {
            var reader = new FileReader();

            reader.onload = function () {
                var base64data = reader.result;
                console.log(base64data);
                document.getElementById("imgdata2").value = base64data;
                // Send the 'base64data' to the server using a method like HTTP POST
            };

            reader.readAsDataURL(blob);
        }).catch(error => {
            console.error('Error fetching the image:', error);
        });
        document.querySelector('.cropped-container').style.display = 'flex';
    };
}