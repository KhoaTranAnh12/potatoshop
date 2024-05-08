const chooseFile1 = document.getElementById("choose-file");

const preview1 = document.getElementById("preview1");

const output1 = document.getElementById("img-data1");



const imgPreview = document.getElementById("img-preview");
function doneButton(){
    document.getElementById("cropWindow").hidden=true;
    document.getElementById("articletitle").disabled=false;
    document.getElementById("content").disabled=false;
    document.getElementById("conf-file").setAttribute("value",document.getElementById("output").src)
    console.log(document.getElementById("output").src);
}
function closeButton(){
    document.getElementById("cropWindow").hidden=true;
    document.getElementById("articletitle").disabled=false;
    document.getElementById("content").disabled=false;
}
chooseFile1.addEventListener("change", function () {
getImgData(chooseFile1,preview1,output1);
});
chooseFile2.addEventListener("change", function () {
getImgData(chooseFile2,preview2,output2);
});
chooseFile3.addEventListener("change", function () {
getImgData(chooseFile3,preview3,output3);
});
function getImgData(chooseFile,preview,outputt) {
document.getElementById("cropWindow").hidden=false;
document.getElementById("articletitle").disabled=true;
document.getElementById("content").disabled=true;
const files = chooseFile.files[0];
if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
    imgPreview.style.display = "block";
    imgPreview.innerHTML = '<img id = "image" src="' + this.result + '" style="height: 600px; width: 800px;"/>';
    });    
    setTimeout(function(){abc(preview,outputt)},50);
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
context.rect(0,height/8,width,3*height/4);
// context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
context.fill();

return canvas;
}
function abc(preview,outputt) {
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
    document.querySelector('.cropped-container').style.display = 'flex';
    preview.src=roundedCanvas.toDataURL();
    imgsrc = preview.src;
    outputt.value = imgsrc;
};
}

// EVENT LISTENER FOR DOM CONTENT LOADED