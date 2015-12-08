<?php

include ("naglowek.php");

// tutaj są opcje dla tych co są zalogowani

if (!@isset($_SESSION['zalogowany']) && @$_SESSION['zalogowany'] != 1)
{
   echo "<h1>Zaloguj się!</h1>";
   return;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>


<h1>Jesteś zalogowany!</h1>
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
         <?php
         
         
       
         $wynik = mysql_query("SELECT * FROM magazyn")
or die('Błąd zapytania'); 
         
         
         while($r = mysql_fetch_assoc($wynik)) 
      { 
         echo '<div class="col-md-4 thumbnail">';
         echo "<h2><a href='dany_produkt.php?id={$r['id_produktu']}'>{$r['nazwa']}</a></h2>";
         echo "{$r['cena']} zł<br>";
         echo "<a class='btn btn-default' href='koszykarz.php?id={$r['id_produktu']}'>Dodaj do koszyczka</a>";

         echo '</div>';
             
         }
         
        
         
         
         
         
         ?>
        </div>
      </div>
    </div>
  </body>

</html>
</p>
