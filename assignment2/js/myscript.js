//create an array and init it with values of path for the images to be used.
images = new Array();
images[0] = "../images/image1.jpg";
images[1] = "../images/image2.jpg";
images[2] = "../images/image3.jpg";
var i = 0;

//set an interval to call function switchimage every 30 seconds
setInterval("switchImage()", 30000);


//function that is to be used to switch image
function switchImage() {

    //get the image element by using its id.
    var image = document.getElementById("hero-image");
    //replace its src with the new images src that we have in the array
    image.src = images[i];

    
    i++;
    //makes sure that the index if larger or equal the array length
    //to restart it back to 0 and go back to image1.
    if(i >= images.length) {
        i = 0;
    }
}
