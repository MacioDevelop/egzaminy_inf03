function Promocja(){
    
    let wybor = document.querySelector('input[name="dlugosc"]:checked');
    let cena = wybor.value - 10;

    if(cena != 0){
        document.getElementById("result").innerText = "cena promocyjna: "+ cena +"zł";
    }
   
}