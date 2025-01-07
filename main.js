let currentSrc = 1;
let max = 7;

function move(direction){
   const mainImage = document.getElementById("main");

   if(direction === 'prev'){
    currentSrc = currentSrc - 1;
    if(currentSrc < 1){
        currentSrc = max;
    }
   }

   if(direction === 'next'){
    currentSrc = currentSrc + 1;
    if(currentSrc > max){
        currentSrc = 1;
    }
   }

    mainImage.src = `${currentSrc}.jpg`;
}