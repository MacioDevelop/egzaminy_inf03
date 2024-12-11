function Next(){
    const currentBlock = button.closest('div'); 
    currentBlock.style.display = 'none'; 

    const currentIdNumber = parseInt(currentBlock.id.replace('blok', ''));
    const nextBlockId = 'blok'(currentIdNumber + 1);
    const NextBlock = document.getElementById(nextBlockId);

    if (nextBlock) {
        nextBlock.style.display = 'block'; 
    }

}

function Submit(event){
    event.preventDefault();
    let haslo = document.getElementById("haslo").value;
    let powthaslo = document.getElementById("powthaslo").value;
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;

    

    if(haslo != powthaslo){
        alert("hasła nie są takie same")
    } else {
    console.log('Witaj' + imie + nazwisko);
    }

}