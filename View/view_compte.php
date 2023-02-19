<?php
    if ($_SESSION['role'] == 'administrateur' OR $_SESSION['role'] == 'super-administrateur') {
        require_once 'view_header_membre.php';
    } else {
        require_once 'view_header_client.php';
    }
?>

<section class="accueil" id="accueil">
    <div class="compte">
        <h1>Mon compte</h1>
        <img class="photoDeProfil" src="Content/Images/no-image.png">
        <br><br>
        <h2>Informations personnelles :</h2>
        <h3>Nom</h3>
    </div>
</section>


<?php require_once 'view_end.php'; ?>
