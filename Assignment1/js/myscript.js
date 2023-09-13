images = new Array();
images[0] = "../images/image1.jpg";
images[1] = "../images/image2.jpg";
images[2] = "../images/image3.jpg";
var i = 0;
setInterval("switchImage()", 30000);

function switchImage() {

    var image = document.getElementById("large-image");
    image.src = images[i];

    i++;
    if(i >= images.length) {
        i = 0;
    }
}
