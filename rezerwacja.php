<?php
$conn = mysqli_connect("localhost", "root", "", "baza");

if(isset($_POST['data']) && isset($_POST['ilosc']) && isset($_POST['telefon']) && isset($_POST['zgoda'])){
    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $ilosc = mysqli_real_escape_string($conn, $_POST['ilosc']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
    $zgoda = mysqli_real_escape_string($conn, $_POST['zgoda']);

    $zapytanie = "INSERT INTO rezerwacje (data_rez, liczba_osob, telefon) VALUES ($data, $ilosc, $telefon);";

    $wynik = mysqli_query($conn, $zapytanie);
    
    echo "Dodano rezerwację do bazy";
    
}
mysqli_close($conn);
?>