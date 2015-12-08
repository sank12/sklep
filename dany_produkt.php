<?php

include ("naglowek.php");
       
         $wynik = mysql_query("SELECT * FROM magazyn WHERE id_produktu={$_GET['id']}")
or die('Błąd zapytania'); 
         
         
         while($r = mysql_fetch_assoc($wynik)) 
      { 
         echo '<div class="col-md-8 thumbnail">';
         echo "<h1><a href='dany_produkt.php?id={$r['id_produktu']}'>{$r['nazwa']}</a></h1>";
         echo "{$r['cena']} złociszy polskich wielkich<br>";
          echo "{$r['opis']} <br>";
           echo "{$r['ilosc']} sztuków<br>";
         echo "<a class='btn btn-default' href='koszykarz.php?id={$r['id_produktu']}'>Dodaj do koszyczka</a>";

         echo '</div>';
             
         }
         
         ?>