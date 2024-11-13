function obliczCene(){
    var suma = 0;

    const checkboxes = document.querySelectorAll("#formularz input[type='checkbox']");

    checkboxes.forEach(checkbox => {
        if (checkbox.checked){
            suma += parseInt(checkbox.value);
        }
    });

    document.getElementById("wynik").textContent = "Cena zabiegów: "+ suma + "zł";
}