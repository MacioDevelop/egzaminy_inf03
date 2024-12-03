<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep dla uczniów</title>
</head>
<body>
    <div class="baner">
    <h1>Dzisiejsze promocje naszego sklepu</h1>
    </div>

    <div class="lewy">
        <h2>Taniej o 30%</h2>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "sklep");
        $result = mysqli_query($conn, "SELECT nazwa from towary WHERE towary.promocja = 1;");

        echo "<ol>";
        while($row = mysqli_fetch_array($result)){
            echo "<li>",$row['nazwa'],"</li>";
        }
        echo "</ol>";

        ?>
    </div>

    <div class="srodek">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="POST">
            <select name="nazwa" id="nazwa">
                <option value="Gumka do mazania" id="1">Gumka do mazania</option>
                <option value="Cienkopis" id="2">Cienkopis</option>
                <option value="Pisaki 60 szt." id="3">Pisaki 60 szt.</option>
                <option value="Markery 4 szt." id="4">Markery 4 szt.</option>
            </select>
            <button type="submit">SPRAWDŹ</button>
        </form>

        <div class="wynik">
        <?php

        if(isset($_POST['nazwa'])){
            $nazwa = mysqli_real_escape_string($conn, $_POST["nazwa"]);

            $query = "SELECT cena FROM towary WHERE nazwa = '$nazwa';";
            $wynik = mysqli_query($conn, $query);

            $row = mysqli_fetch_assoc($wynik);
            $cena = $row['cena'];

            $promocja = $cena * 0.7;
            echo "Cena regularna:", " ", "$cena", "<br>"; 
            echo "Cena w promocji:", " ", "$promocja";
        }

        mysqli_close($conn);
        ?>
        </div>
    </div>
    
    <div class="prawy">
        <h2>Kontakt</h2>
        <p>email: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </div>

    <div class="stopka">
        <h4>Autor strony: Maciej Stieler</h4>
    </div>
</body>
</html>