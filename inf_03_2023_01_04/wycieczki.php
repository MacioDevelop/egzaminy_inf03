<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wycieczki po Europie</title>
</head>
<body>
    <div class="baner">

    <h1>BIURO TURYSTYCZNE</h1>

    </div>

    <div class="dane">
    <h3>Wycieczki, na które są wolne miejsca</h3>

    <ul>
    <?php
    $conn = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conn, "biuro");

    $result = mysqli_query($conn, "SELECT id, dataWyjazdu, cel, cena from wycieczki;");


    while($row=mysqli_fetch_array($result)){
        echo "<li>".$row["id"].", dnia ". $row["dataWyjazdu"]. " Jedziemy do ".$row["cel"].", ". " cena: ". $row["cena"]. "</li>";
    }

    mysqli_close($conn)
    ?>
    

    
    </ul>
    </div>


    <div class="lewy">
    <h2>Bestselery</h2>
    <table>
        <tr>
            <td>Wenecja</td>
            <td>kwiecień</td>
        </tr>
        <tr>
            <td>Londyn</td>
            <td>lipiec</td>
        </tr>
        <tr>
            <td>Rzym</td>
            <td>wrzesień</td>
        </tr>
    </table>
    </div>


    <div class="srodek">
        <h2>Nasze zdjęcia</h2>
    
         <?php
            $polaczenie = mysqli_connect("localhost", "root", "");
            mysqli_select_db($polaczenie, "biuro");

            $result = mysqli_query($polaczenie, "SELECT nazwaPliku, podpis FROM zdjecia;");

            echo "<table>";
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                if($counter % 3 == 0){
                    echo"<tr>";
                }

                echo "<td><img src='" . $row["nazwaPliku"] . "' alt='" . $row["podpis"] . "'></td>";

                $counter++;

                if($counter % 3 == 0){
                    echo"</tr>";
                }

                }

            echo "</table>";

            mysqli_close($polaczenie);
         ?>


    </div>

    <div class="prawy">
        <h2>Skontaktuj się</h2>
        <a href="turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </div>

    <div class="stopka">
        <p>Stronę wykonał: Maciej Stieler</p>
    </div>
</body>
</html>