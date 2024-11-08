<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>
<body>
    <div class="baner">
    <h1>Forum wielbicieli psów</h1>
    </div>

    <div class="blok_lewy">
    <img src="obraz.jpg" alt="foksterier">
    </div>

    <div class="blok_prawy1">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">

        <label for="login">
        login:
        <input type="text" id="login" name="login"><br>
        </label>

        <label for="haslo">
        hasło:
        <input type="password" id="haslo" name="haslo"><br>
        </label>

        <label for="powthaslo">
        powtórz hasło:
        <input type="password" id="powthaslo" name="powhaslo"><br>
        </label>

        <button type="submit">Zapisz:</button>
        </form>

        <?php
        $con = mysqli_connect('localhost', 'root', '', 'psy');

        if( isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['haslo'])){
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $powhaslo = $_POST['powhaslo'];

            $blad = FALSE;

            if($login == '' || $haslo == '' || $powhaslo == ''){
                echo "<p>wypełnij wszystkie pola</p>";
                $blad = TRUE;
            }

            $kw = "SELECT login from uzytkownicy;";
            $res = mysqli_query($con, $kw);
            while($tab = mysqli_fetch_row($res)){
                if($login == $tab[0]){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                    $blad = TRUE;
                    break;
                }
            }

            if($haslo != $powhaslo){
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                $blad = TRUE;
            }
            
            if($blad == FALSE){
                $szyfr = sha1($haslo);
                $kw = "INSERT INTO uzytkownicy values (NULL, '$login', '$szyfr');";
                mysqli_query($con, $kw);
                echo "<p>konto zostało dodane</p>";
            }

        }
        mysqli_close($con);
        ?>


    </div>

    <div class="blok_prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="index.html">Przeczytaj regulamin</a>
    </div>

    <div class="stopka">Stronę wykonał Maciej Stieler</div>
</body>
</html>