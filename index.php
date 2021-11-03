<?php
    include __DIR__.('/Utente.php');
    $utente1=new Utente("nome","cognome","1234567891234567","24/11/1987");
    $utente2=new Utente("nome2","cognome2","1234567891234567","24/11/1977");
    var_dump($utente1);
    var_dump($utente2);
?>