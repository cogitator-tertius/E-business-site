
// creating image array
var image1Array = new Array(6);
for (i = 0; i < image1Array.length; i++) {
    image1Array[i] = "images/" + (i + 1) + ".gif";
}
var image1AltArray = [
    "a Masked Hacker",
    "Crash Override",
    "a Cat Hacker",
    "an infinite laptop",
    "the coolest hacker",
    "Trevor Noah"
]

var imagecounter = 1;

// script to control rotation of images on main page
function rotate() {
    var imageObject1 = document.getElementById('rotatee');
    imageObject1.src = image1Array[imagecounter];
    imageObject1.alt = image1AltArray[imagecounter];
    ++imagecounter;
    if (imagecounter == 6) imagecounter = 0;
}



// start rotation on page load
function startRotation() {
    document.getElementById('rotatee').src = image1Array[0];
    document.getElementById('rotatee').alt = "This is a picture of " + image1AltArray[0] + ", you're welcome!";
    setInterval('rotate()', 8e3);
}


// loop to keep images moving and update alt text