<?php
    if ($_SESSION['role'] == 'administrateur' OR $_SESSION['role'] == 'super-administrateur') {
        require_once 'view_header_membre.php';
    } else {
        require_once 'view_header_client.php';
    }
?>

<section class="accueil" id="accueil">
    <div class="compte">
        <div class="headerCompte">
            <h1>Mon compte</h1>
            <img class="photoDeProfil" src="Content/Images/no-pdp.jpg">
        </div>
        <br><hr>
        <div class="infosCompte">
            <h2>Informations personnelles :</h2>
                <h3>Nom : </h3><p><?= e($_SESSION['nom']) ?></p>
                <h3>Prénom : </h3><p><?= e($_SESSION['prenom']) ?></p>
                <h3>E-mail : </h3><p><?= e($_SESSION['mail']) ?></p>
                <h3>Création du compte : </h3><p><?= e($_SESSION['date_creation']) ?></p>
                <h3>Points de fidélité : </h3><p><?= e($_SESSION['point_fid']) ?></p>
        </div>
        <div class="delete" style="text-align: center">
            <form method="post" action="?controller=identification&action=supprimer">
                <input type="submit" value="Supprimer compte" style="background-color: #ee2c2c;border:0px;color: white;height: 25px">
                <label>Oui</label><input type='radio' name='confirmation' value='Oui'>
                <label>Non</label><input type='radio' name='confirmation' value='Non' checked/>
            </form>
        </div>

    </div>
</section>


<?php require_once 'view_end.php'; ?>
