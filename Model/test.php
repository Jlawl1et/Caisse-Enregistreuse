<?php

    $bd = new PDO('mysql:host=localhost;dbname=bde','root');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->query("SET nameS 'utf8'");

    $requete = $bd->prepare('SELECT * FROM article');
    $requete->execute();
    $tab = $requete->fetch(PDO::FETCH_NUM);

    echo '<p> Nom : ' . $tab[0] . ' et prénom : ' . $tab[1].'</p>';
?>



