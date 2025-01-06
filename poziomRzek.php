<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Poziomy rzek</title>
</head>
<body>
    
    <header class="baner1">
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header class="baner2">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>

    <div class="menu">
        <form action="poziomRzek.php" method="POST" class="form">
            <input type="radio" name="wybor" id="wszystkie" value="wszystkie"> Wszystkie
            <input type="radio" name="wybor" id="ponad_ostrzegawczy" value="ponad_ostrzegawczy"> Ponad stan ostrzegawczy
            <input type="radio" name="wybor" id="ponad_alarmowy" value="ponad_alarmowy"> Ponad stan alarmowy
            <input type="submit" value="Pokaż">
        </form>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "rzeki");

        if(isset($_POST['wybor'])){
            $wybor = mysqli_real_escape_string($conn, $_POST['wybor']);
        }
        ?>
    </div>

    <div class="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        
        <?php
        echo "<table>
        <tr>
            <th>Wodomierz</th>
            <th>Rzeka</th>
            <th>Ostrzegawczy</th>
            <th>Alarmowy</th>
            <th>Aktualny</th>
        </tr>";

        if($wybor === "wszystkie"){
            $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary on wodowskazy.id = pomiary.wodowskazy_id WHERE
            pomiary.dataPomiaru = '2022-05-05';";

            $wynik = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($wynik)){
                echo "<tr><td>". $row['nazwa']."</td>"."<td>". $row['rzeka']."</td>". "<td>". $row['stanOstrzegawczy']. "</td>". "<td>". $row['stanAlarmowy']. "</td>". "<td>" .$row['stanWody']. "</td>". "</td></tr>";
            }
        }
        if($wybor === "ponad_ostrzegawczy"){
            $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary on wodowskazy.id = pomiary.wodowskazy_id WHERE
            pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy;";

            $wynik = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($wynik)){
                echo "<tr><td>". $row['nazwa']."</td>"."<td>". $row['rzeka']."</td>". "<td>". $row['stanOstrzegawczy']. "</td>". "<td>". $row['stanAlarmowy']. "</td>". "<td>" .$row['stanWody']. "</td>". "</td></tr>";
            }
        }
        if($wybor === "ponad_alarmowy"){
            $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary on wodowskazy.id = pomiary.wodowskazy_id WHERE
            pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy;";

            $wynik = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($wynik)){
                echo "<tr><td>". $row['nazwa']."</td>"."<td>". $row['rzeka']."</td>". "<td>". $row['stanOstrzegawczy']. "</td>". "<td>". $row['stanAlarmowy']. "</td>". "<td>" .$row['stanWody']. "</td>". "</td></tr>";
            }
        }
        echo "</table>";
        ?>

    </div>
    <div class="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Śilny wiatr w Karkonoszach</li>
        </ul>

        <h3>Średnie stany wód</h3>
        <?php
        $query = "SELECT pomiary.dataPomiaru, AVG(pomiary.stanWody) FROM pomiary GROUP BY pomiary.dataPomiaru;";
        $wynik = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($wynik)){
            echo "<p>". $row['dataPomiaru']. ":  ". $row['AVG(pomiary.stanWody)']. "</p>";
        }
        mysqli_close($conn);
        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka" class="obraz2">
    </div>

    <footer class="stopka">
        <p>Stronę wykonał: Maciej Stieler</p>
    </footer>

</body>
</html>