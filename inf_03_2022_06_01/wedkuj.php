<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <header class="baner">
    <h1>Portal dla wędkarzy</h1>
    </header>

    <div class="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
            $result = mysqli_query($conn, "SELECT ryby.nazwa, lowisko.akwen,
            lowisko.wojewodztwo FROM lowisko join ryby on ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3; ");

            echo "<ol>";
            while($row = mysqli_fetch_array($result)){
                echo "<li>",$row['nazwa']," pływa w rzece ",$row['akwen'],", ", $row['wojewodztwo'], "</li>";
            }
            echo "</ol>";
        ?>
    </div>
    <div class="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <td>L.p.</td>
                <td>Gatunek</td>
                <td>Występowanie</td>
            </tr>
            <?php
                $wynik = mysqli_query($conn, "SELECT id, nazwa, wystepowanie from ryby WHERE ryby.styl_zycia = 1;");

                while($row = mysqli_fetch_array($wynik)){
                echo "<tr><td>",$row['id'],"</td>","<td>", $row['nazwa'], "</td>", "<td>", $row['wystepowanie'] ,"</td></tr>";
                }
            ?>
        </table>
    </div>
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
        <form action="wedkuj.php" method="post">
            <h3>Dodaj Rybe: </h3>
            <input type="text" name="nazwa" id="nazwa" placeholder="nazwa">
            <input type="text" name="wystepowanie" id="wystepowanie" placeholder="występowanie">
            <input type="number" name="id" id="id" placeholder="id">
            <button type="submit">DODAJ</button>
        </form>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "wedkowanie");
        if(isset($_POST['nazwa']) && isset($_POST['wystepowanie']) && isset($_POST['id'])){

            $id = (int)$_POST["id"];
            $nazwa = mysqli_real_escape_string($conn, $_POST["nazwa"]);
            $wystepowanie = mysqli_real_escape_string($conn, $_POST["wystepowanie"]);
            
            
            $zapytanie = "INSERT INTO ryby (id, nazwa, wystepowanie) VALUES ('$id', '$nazwa', '$wystepowanie')";
            $query = mysqli_query($polaczenie, $zapytanie);

            echo "<p>Dodano nową rybę</p>";
        }
        mysqli_close($conn);
        ?>
    </div>

    <footer class="stopka">
        <p>Stronę wykonał: Maciej Stieler</p>
    </footer>
</body>
</html>