<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="materialy2/styl.css">
    <title>Hurtownia szkolna</title>
</head>
<body>
    <div class="baner">
    <h1>Hurtownia z najlepszymi cenami</h1>
    </div>

    <div class="lewy">
        <h2>Nasze ceny</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "sklep");
        $result = mysqli_query($conn, "SELECT nazwa, cena from towary LIMIT 4;");

        echo "<table>";
        while($row = mysqli_fetch_array($result)){
            echo"
                <tr>
                <td>",$row['nazwa']," ","</td>",
                "<td>",$row['cena'],"</td>",
                "</tr>";
        }
        echo "</table>";

        mysqli_close($conn);
        ?>
    </div>

    <div class="srodek">
        <h2>Koszt zakupów</h2>
        <form action="index.php" method="post">
            <p>Wybierz artykuł: </p>
            <select name="nazwa" id="towary">
                <option value="Zeszyt 60 kartek" id="1">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki" id="2">Zeszyt 32 kartki</option>
                <option value="Cyrkiel" id="3">Cyrkiel</option>
                <option value="Linijka 30cm" id="4">Linijka 30cm</option>
            </select>
            <p>Liczba sztuk: </p>
            <input type="number" id="liczba" name="liczba"><br>
            <button type="submit">OBLICZ</button>
        </form>

        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "sklep");

        if (isset($_POST["nazwa"]) && isset($_POST["liczba"])) {
            $nazwa = mysqli_real_escape_string($polaczenie, $_POST["nazwa"]);
            $liczba = (int)$_POST["liczba"]; 

            $query = "SELECT cena FROM towary WHERE nazwa='$nazwa';";
            $wynik = mysqli_query($polaczenie, $query);

                $row = mysqli_fetch_assoc($wynik);
                $cena = $row["cena"];

                $wartosc_zakupow = $liczba * $cena;

                echo "<p>Wartość zakupów: <strong>" . number_format($wartosc_zakupow, 2) . " zł</strong></p>";
            
        }

        mysqli_close($polaczenie);
        ?>

    </div>

    <div class="prawy">
        <h2>Kontakt</h2>
        <img src="materialy2/zakupy.png" alt="hurtownia">
        <p><a href="mailto:hurt@poczta2.p"> hurt@poczta2.p</a></p>
    </div>

    <div class="stopka">
        <h4>Witrynę wykonał: Maciej Stieler</h4>
    </div>
</body>
</html>