<?php 


include ("naglowek.php"); // plik znajduje się w katalogu wyżej, więc musi być coś takiego

?>

<div class="odstep"></div> 
<div class="odstep"></div> 

    
    <div class="form-group">
        <form action="login.php" method="post">
<input  class="form-control" type="text" name="login" maxlength="32" placeholder="login"></div>
                 <div class="form-group">
<input  class="form-control" type="password" name="haslo" maxlength="32" placeholder="haslo"></div>


          <div id='l_button_lewy'><button type="submit" name="submit" class="btn btn-info btn-block ">Zaloguj</button></div>
           </form>
         
        </div>

<?php
if (!isset($_POST['login']) || !isset($_POST['haslo']))
{
    
    return;
}
$login = $_POST['login'];
$haslo = $_POST['haslo'];


    if (!$haslo OR empty($haslo)) {
echo '<p class="alert">Wypełnij pole z hasłem!</p>';
exit;
}

$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `login` = '$login' AND `haslo` = '$haslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 0) {
    echo 'Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.';}
    else {

$_SESSION['login'] = $login;
$_SESSION['haslo'] = $haslo;
$_SESSION['zalogowany'] = 1;
echo "<hr>";

$isdupa = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `login` = '$login' AND typ='p'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
   if ($isdupa[0] > 0)
   {
       // to znak ze pracus
       $_SESSION['ranga']='p';
       header("Location: index.php");
   }
   else
   {
       // to nie pracus
       $_SESSION['ranga']='u';
       header("Location: index.php");
   }
   
   $zapytanie = mysql_query("SELECT * FROM uzytkownicy WHERE `login` = '{$_POST['login']}' AND `haslo` = '{$_POST['haslo']}'");

     while($r = mysql_fetch_assoc($zapytanie)) {
         $_SESSION['id_usera'] = $r['id'];
     }
     }
/*
$j_0 = "SELECT typ FROM uzytkownicy WHERE login= '$login' AND haslo = '$haslo'";
echo $j_0;
$j_1 = mysql_query($j_0);
        $j_2 = mysql_fetch_assoc($j_1);
     while($r = $j_2) {
         // odczytanie danych z bazy
         //echo "a ";
         //$_SESSION['ranga']=$r['typ'];
         //header("Location: index.php");
     }*/
     


$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
    if ((empty($login)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="../index.php">Strona Główna</a><br>';
exit;
}

// tresc dla zalogowanego uzytkownika
echo 'Witaj zostałeś/aś pomyślnie zalogowany/a, tutaj umieść ukryta strone tylko dla zalogowanych';
echo '<br><a href="wyloguj.php">Wyloguj mnie</a>';
?>

