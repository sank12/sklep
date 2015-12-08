<?php
// dołączenie nagłówka
include ("naglowek.php"); // wymagany na początku KAZDEGO pliku

// ten plik to formularz do logowania
// jeśli ktoś  jest zalogowany to przenosi go automatycznie do pluku zalogowany.php

if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1)
{
   header("Location: zalogowany.php");
    return;
}


?>


<?php

// LOGOWANIE
if (isset($_GET['wyslano']) && $_GET['wyslano']=="tak")
{
@$login = $_POST['login'];
@$haslo = $_POST['haslo'];

$liczba_bledow = 0;
    if (!isset($_POST['haslo']) || $haslo=="" || !isset($_POST['login'])) {
echo '<p class="alert bg-danger">Wypełnij pole z hasłem!</p>';
$liczba_bledow++;
    }

if ($liczba_bledow==0)
{
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `login` = '$login' AND `haslo` = '$haslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 0) {
    echo '<p class="alert bg-danger">Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.</p>';}
    else {

$_SESSION['login'] = $login;
$_SESSION['haslo'] = $haslo;
$_SESSION['zalogowany'] = 1;
$zapytanie = mysql_query("SELECT * FROM uzytkownicy WHERE `login` = '{$_POST['login']}' AND `haslo` = '{$_POST['haslo']}'");

     while($r = mysql_fetch_assoc($zapytanie)) {
         // odczytanie danych z bazy
         $_SESSION['ranga']=$r['typ'];
         $_SESSION['imie'] = $r['imie'];
         $_SESSION['nazwisko'] = $r['nazwisko'];
         $_SESSION['email'] = $r['email'];
         $_SESSION['id_usera'] = $r['id'];
         $_SESSION['id_kursu'] = $r['klucz_dostepu'];
     }
     }

}

// jeśli zalogowano, to przenosimy do zalogowanych userow
if (@$_SESSION['zalogowany'] == 1)
{
    header("Location: index.php");
    return;
}

    if ((empty($login)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="index.php">Strona Główna</a><br>';
}

}



?>
<html>
    <body>
    </div>
  <div class="odstep"></div>
  <div class="odstep"></div>
  <div class="odstep"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h1 class="text-center">Wybierz kategorie!</h1>
          <p class="text-center">Jedzenie</p>
          <p class="text-center">Picie</p>
          <p class="text-center">Zabawki</p>
          <p class="text-center">Żeczy codziennego uzytku</p>
          
        </div>
        <div class="col-md-8">
              <div class="col-md-8">
         <?php
         
         
       
         $wynik = mysql_query("SELECT * FROM magazyn")
or die('Błąd zapytania'); 
         
         
         while($r = mysql_fetch_assoc($wynik)) 
      { 
         echo '<div class="col-md-4 thumbnail">';
         echo "<h2><a href='dany_produkt.php?id={$r['id_produktu']}'>{$r['nazwa']}</a></h2>";
         echo "{$r['cena']} zł<br>";

         echo '</div>';
             
         }
         
        
         
         
         
         
         ?>
        </div>
        </div>
      </div>
    </div>
  </body>

</html>

  </body>
</html>
