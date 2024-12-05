<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Video On Demand</title>
</head>
<body>

    <div class="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>

    <div class="baner2">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>

    <div class="polecamy">
        <h3>Polecamy</h3>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "dane3");
            $result = mysqli_query($conn, "SELECT produkty.id, produkty.nazwa, produkty.opis, produkty.zdjecie from produkty where produkty.id = 18 or produkty.id = 22 or produkty.id = 23 OR produkty.id = 25;");

            echo "<table limit='4'  class='lista'>";
            while($row = mysqli_fetch_array($result)){
                $zdjecie = $row['zdjecie'];
                echo "<td>";
                echo "<h4>", $row['id'],"  ", $row['nazwa'],"</h4>";
                echo "<img src='$zdjecie' alt='film'>","</img>";
                echo "<p>", $row['opis'],"</p>";
                echo "</td>";

            }
            echo "</table>";

        ?>
    </div>
    
    <div class="filmy">
            <h3>Filmy fantastyczne</h3>
            <?php
            $query = mysqli_query($conn, " SELECT id, nazwa, opis, zdjecie from produkty WHERE produkty.Rodzaje_id = 12;");

            echo "<table class='lista'>";
            
            $counter = 0;

            while($row = mysqli_fetch_array($query)){
                if ($counter % 4 == 0) { 
                    echo "<tr>";
                }
                $zdjecie = $row['zdjecie'];
                echo "<td>";
                echo "<h4>", $row['id'],"  ", $row['nazwa'],"</h4>";
                echo "<img src='$zdjecie' alt='film'>","</img>";
                echo "<p>", $row['opis'],"</p>";
                echo "</td>";
                $counter++;

                if ($counter % 4 == 0) {
                    echo "</tr>";
                }
            }

            echo "</table>";
            ?>
    </div>

    <div class="stopka">
            <form action="video.php" method="POST">
                Usuń film nr: <input type="number" name="id">
                <button type="submit">Usuń film</button>
            </form>

            <?php
            if(isset($_POST['id'])){
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $query = "DELETE from produkty WHERE produkty.id = $id;";

                $wynik = mysqli_query($conn, $query);
            }

            mysqli_close($conn);
            ?>
            <br><p>Stronę wykonał: Maciej Stieler</p>
    </div>


</body>
</html>