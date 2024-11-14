function showImage(thumbnail){

    const mainImage = document.getElementById("mainImage");
    mainImage.src = thumbnail.src;
}

function toggleIcon(){
    const icon = document.getElementById("toggleIcon");

    if(icon.src.includes("icon-off.png")){
        icon.src = "icon-on.png";
    } else {
        icon.src = "icon-off.png";
    }

}

