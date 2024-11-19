<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka publiczna</title>
</head>
<body>
    <div class="baner">
        <h1>Biblioteka w książkowicach wielkich</h1>
    </div>

    <div class="lewy">
    <h3>Polecamy dzieła autorów:</h3>
    <?php
    $polaczenie = mysqli_connect("localhost", "root", "");
    mysqli_select_db($polaczenie, "biblioteka");

    $query = mysqli_query($polaczenie, "SELECT imie, nazwisko from autorzy ORDER BY nazwisko ASC;");

    echo "<ol>";
    while($row = mysqli_fetch_assoc($query)){
        echo "<li>".$row['imie'].$row['nazwisko']."</li>";
    }
    echo "</ol>";


    mysqli_close($polaczenie);
    ?>
    </div>

    <div class="srodek">
    <h3>ul. Czytelnicza 25, Książkowice &nbsp; Wielkie</h3>
    <p><a href="sekretariat@biblioteka.pl">Napisz do nas</a></p>
    <img src="biblioteka.png" alt="książki">
    </div>

    <div class="prawy1">
    <h3>Dodaj czytelnika</h3>
    <form action="biblioteka.php" method="POST">
        imię:<input type="text" id="imie" name="imie"> <br>
        nazwisko:<input type="text" id="nazwisko" name="nazwisko"><br>
        symbol:<input type="number" id="symbol" name="symbol"><br>
        <button type="submit">DODAJ</button>
    </form>
    </div>

    <div class="prawy2">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "biblioteka");

        if(isset($_POST['imie']) && isset($_POST['nazwisko'])){
            $imie = mysqli_real_escape_string($conn, $_POST['imie']);
            $nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
            $symbol = mysqli_real_escape_string($conn, $_POST['nazwisko']);


            $query = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('$imie', '$nazwisko', '$symbol')";
        if (mysqli_query($conn, $query)) {
            echo "<p>Czytelnik $imie $nazwisko został(a) dodany do bazy danych.</p>";
        }
        }
        
        mysqli_close($conn);
    ?>
    </div>

    <div class="stopka">
        <p>Projekt strony: Maciej Stieler</p>
    </div>
</body>
</html>