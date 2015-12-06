<?php
session_start();
// tutaj mamy cały nagłóweczek ze wszystkim. Do każdej podstrony taki ładujemy, i jest miło i fajno

// najpierw nasza baza danych
include ("../Baza/łacze.php");


// robimy wylogowanie
if (isset($_GET['wyloguj']))
{
    session_destroy(); // usuneicie sesji
    header("Location: index.php");
}


// potem cały html leci
?>
<html>
  
  <head>
    <title>Sklep!</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    .odstep{
      height: 15px;
    }
    </style>
 
  </head>
  
  
  
  <div class="odstep"></div>   
  <div class="container">
      <div class="row">

       <div class="col-md-8">
           <a href="index.php"><img src="http://www.jpg.aq.pl/s/3516.jpg" width="600" height="100"></a>
        </div>
        <div class="col-md-4">
          
              <?php
              // przyciski do logowania i rejestracji się wyswietlają, jak nikt nie jest zalogowany
              if (@$_SESSION['zalogowany']!=1)
              {
                  ?>
                        <a href="index.php" class="btn btn-block btn-success btn-lg">Zaloguj</button>
                      
                      
                        <a href="rejestracja2.php" type="button" name="przypomnij" class="btn btn-block btn-danger btn-lg">Rejestracja</a>
                     
            <?php
             }
             else if (@$_SESSION['zalogowany']==1) // jeśli jesteśmy zalogowani, to są inne przyciski, do dupy psa
             {
                 ?>
                 
            <a class="btn btn-success btn-block" >Witaj użytkowniku <b><?=$_SESSION['login']?></b></a><br>
                 
            <a href="index.php?wyloguj=herring" type="button" name="przypomnij" class="btn btn-info btn-lg">Wyloguj</a>

            <a href="moje_konto.php" type="button" name="przypomnij" class="btn btn-info btn-lg">Moje konto</a>
        
            <?php
                
            // przyciski dla ucznia
                if ($_SESSION['ranga']=="u")
                {
                    ?>
            <a href="../Uczen/uczen_lista_korsow.php" type="button" name="przypomnij" class="btn btn-warning btn-lg">Moje kursy</a>
            
            <?php
                }

            // przyciski dla nauczyciela
                else if ($_SESSION['ranga']=="n" || $_SESSION['ranga']=="a")
                {
                    ?>
            <a href="../Nauczyciel/wygladdlanaucz.php" type="button" name="przypomnij" class="btn btn-success btn-lg">Zarządzaj</a>
            
            
            <?php
                }
            
             }
            ?>
            
            
        </div>
      </div>