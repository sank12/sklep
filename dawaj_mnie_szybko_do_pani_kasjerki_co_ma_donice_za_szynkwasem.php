<?php
// kupuje gowno
include ("naglowek.php");
// dawaj_mnie_szybko_do_pani_kasjerki_co_ma_donice_za_szynkwasem.php


$id_zamowienia = time() + (7 * 24 * 60 * 60);  // numer zamówienia to timestamp
$data = date("Y-m-d"); // data do wpisania do bazy


 mysql_query("START TRANSACTION");

// dodawanie wpisu do bazy danych
 for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++)
{
    $przedmiot = $_SESSION['koszyk'][$i]; // przypisanie kawałka tablicy do zmiennej, by wygodniej operować
    // stworzenie długiego i skomplikowanego zapytania
    $zapytanie = "INSERT INTO `sprzedaz` (`id_zamowienia`, `id_uzytkownika`, `id_produktu`, `ilosc`) "
            . "VALUES ('{$id_zamowienia}', '{$_SESSION['id_usera']}', '{$przedmiot['id_produktu']}', '{$przedmiot['ilosc']}')";
    // dodanie zapytania do bazy
    $idzapytania = mysql_query($zapytanie) or die ("bleeee eeee");    
}
     

 mysql_query("COMMIT");

// usunięcie koszyka
usun_koszyk();
// przekierowanie do strony o potwiedzeniu


?>
<h1>Kupiono pomyślnieeee</h1>
    


