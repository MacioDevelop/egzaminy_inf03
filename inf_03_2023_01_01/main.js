function policz(){
    let ilosc_metrow = parseInt(document.getElementById("ilosc").value);
    let odpowiedz = document.getElementById("wynik");
    let zawartosc_puszki = 4;

    let wynik = Math.ceil(ilosc_metrow / zawartosc_puszki);

    odpowiedz.innerText =  "liczba potrzebnych puszek: " + wynik;
}