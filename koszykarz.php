<?php

include ("naglowek.php");




if (isset($_GET['id']) && $_GET['id']!="")
{
    
    // dodajemy do kuszyka
    
    dodaj_do_koszyka($_GET['id']);
    echo "<h2>Dodano do koszyka produkt</h2><hr>";
}

?>
<h1> Twój koszyk</h1>
<hr>



<div class="row">
    <div class="col-md-12">
<h2>Cały koszyk</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id</th>
      <th>Nazwa</th>
      <th>Cena jednostkowa</th>
      <th>Ilość</th>
      <th>razeem
      </th>

    </tr>
  </thead>
    <tbody>

<?php
    $adres_pliku = "?v=tresc/koszyk/duzy_koszyk";     

    for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++)
    {
        $przedmiot = $_SESSION['koszyk'][$i];
       
        echo '<tr>';
        echo "<td>{$przedmiot['id_produktu']}</td>";
        echo "<td>{$przedmiot['nazwa']}</a></td>";
        echo "<td>{$przedmiot['cena']} zł </td>";
        echo "<td>  {$przedmiot['ilosc']} </td>";
        echo "<td>".$przedmiot['ilosc']*$przedmiot['cena']." zł </td>";
        echo '</tr>';
    }
    // zakończenie tabeli
    echo '</tbody></table>';
 
    // podsumowanie ceny
    echo '<div align="right">';
    echo '<h3>Razem: <b>'.koszyk_suma().' zł</b>';
    echo '</div>';
    echo "<a href='dawaj_mnie_szybko_do_pani_kasjerki_co_ma_donice_za_szynkwasem.php' type='button' class='btn btn-default btn-lg'> Do kasy, hej pasterze! <br> Do kasy, bo tam cód</a>";
?>
</div>       
</div>