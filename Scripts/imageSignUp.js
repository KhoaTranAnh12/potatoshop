const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");
function doneButton(){
    document.getElementById("cropWindow").hidden=true;
    document.getElementById("pwd").disabled=false;
    document.getElementById("confPwd").disabled=false;
    document.getElementById("pNum").disabled=false;
    document.getElementById("conf-file").setAttribute("value",document.getElementById("output").src)
    console.log(document.getElementById("output").src);
}
function closeButton(){
    document.getElementById("cropWindow").hidden=true;
    document.getElementById("pwd").disabled=false;
    document.getElementById("confPwd").disabled=false;
    document.getElementById("pNum").disabled=false;
}
chooseFile.addEventListener("change", function () {
getImgData();
});
function getImgData() {
document.getElementById("cropWindow").hidden=false;
document.getElementById("pwd").disabled=true;
document.getElementById("confPwd").disabled=true;
document.getElementById("pNum").disabled=true;
const files = chooseFile.files[0];
if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
    imgPreview.style.display = "block";
    imgPreview.innerHTML = '<img id = "image" src="' + this.result + '" style="height: 400px; width: 400px;"/>';
    });    
    setTimeout(abc,50);
}
}
//CROPPER


function getRoundedCanvas(sourceCanvas) {
var canvas = document.createElement('canvas');
var context = canvas.getContext('2d');
var width = sourceCanvas.width;
var height = sourceCanvas.height;

// SETUP CANVAS WIDTH AND HEIGHT
canvas.width = width;
canvas.height = height;

// SETUP CONTEXT
context.imageSmoothingEnabled = true;
context.drawImage(sourceCanvas, 0, 0, width, height);
context.globalCompositeOperation = 'destination-in';
context.beginPath();
context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
context.fill();

return canvas;
}
function abc() {
var image = document.getElementById('image');
var button = document.getElementById('btn-crop');
var cropper = new Cropper(image, {
    aspectRatio: 1,
});

// BUTTON CLICK EVENT
button.onclick = function() {
    var croppedCanvas;
    var roundedCanvas;

    // CROP
    croppedCanvas = cropper.getCroppedCanvas();

    // MAKE IT ROUND
    roundedCanvas = getRoundedCanvas(croppedCanvas);

    // SHOW OUTPUT
    document.querySelector('#output').src = roundedCanvas.toDataURL();
    document.querySelector('#output').hidden = false;
    document.querySelector('#preview').src = roundedCanvas.toDataURL();
    document.querySelector('#preview').hidden = false;
    imgsrc = document.querySelector('#preview').src;
    fetch(imgsrc).then(response => response.blob()).then(blob=>{
    var reader = new FileReader();

    reader.onload = function() {
        var base64data = reader.result;
        console.log(base64data);
        document.getElementById("img-data").value = base64data;
        // Send the 'base64data' to the server using a method like HTTP POST
    };

    reader.readAsDataURL(blob);
    }).catch(error => {
        console.error('Error fetching the image:', error);
    });
    document.querySelector('.cropped-container').style.display = 'flex';
};
}

// EVENT LISTENER FOR DOM CONTENT LOADED