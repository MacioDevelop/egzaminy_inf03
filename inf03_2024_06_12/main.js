function ChooseEffect() {
    const radioButtons = document.querySelectorAll("input[type='radio']");
    const mainImage = document.getElementById("mainImage");

    radioButtons.forEach((radio) => {
        if (radio.checked) {
            if (radio.id === "1") {
                const blurValue = 4;
                mainImage.style.filter = `blur(${blurValue}px)`;
            } else if (radio.id === "2") {
                mainImage.style.filter = "sepia(100%)";
            } else if (radio.id === "3") {
                mainImage.style.filter = "invert(100%)";
            }
        }
    });
}

function applyFilter(grayscaleValue) {
    const image = document.getElementById("pomarancza");
    image.style.filter = `grayscale(${grayscaleValue}%)`;
}

function applyOpacity() {
    const image = document.getElementById("owoce");
    const slider = document.getElementById("opacitySlider");
    const opacityValue = slider.value; 

    image.style.filter = `opacity(${opacityValue}%)`;
}

function applyBrightness() {
    const image = document.getElementById("zolw");
    const slider = document.getElementById("brightnessSlider");
    const brightnessValue = slider.value; 

    image.style.filter = `brightness(${brightnessValue}%)`;
}
