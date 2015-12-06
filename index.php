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
    header("Location: zalogowany.php");
    return;
}

    if ((empty($login)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="index.php">Strona Główna</a><br>';
}

}



?>

      <div class="row">
        <div class="col-md-6">
            <h1>Logowanie:</h1>
             <form method="POST" action="index.php?wyslano=tak">
          




<div class="form-group">
<input  class="form-control" type="text" name="login" maxlength="32" placeholder="login"></div>
                 <div class="form-group">
<input  class="form-control" type="password" name="haslo" maxlength="32" placeholder="haslo"></div>


          <div id='l_button_lewy'><button type="submit" name="submit" class="btn btn-info btn-block ">Zaloguj</button></div>
           </form>
         
        </div>
         
        <div class="col-md-5">
          <h1>Witaj na stronie naszego sklepu!</h1>
         
          <p>
             Cieszymy się że postanowiłeś odwiedzić naszą stronę,
             aby móc korzystać z naszych usług musisz się zarejestrować
             i zalogować. Posiadamy duży wybór towarów które na pewno Cię 
             zainteresują. Wybierz towar dla siebie i zamów go!
             
             
             <br>Miłego korzystania!
          </p>
        </div>
      </div>

  </body>
</html>
