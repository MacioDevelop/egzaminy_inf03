function Count() {
    let typ = Number(document.getElementById("type").value);
    let liters = Number(document.getElementById("liters").value);
    let price = 0;


    if(typ === 1){
        price = 4;
    } else if (typ === 2){
        price = 3.5; 
    } else {
        price = 0;
    }

    let suma = price * liters;

    if(price != 0){
        document.getElementById("result").innerText = "Koszt paliwa: " + suma + "zł";
    }

}