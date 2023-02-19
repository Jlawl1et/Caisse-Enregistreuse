<?php require_once "view_header_membre.php"; ?>

    <section class="accueil" id="accueil">
        <div class="historique">
            <table class="tab_historique">
                <tr>
                    <th>
                        <a href="?controller=historique&action=ventes&tri=id_utilisateur"><img src="Content/Images/tri.png" style="float: left">Identifiant</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=ventes&tri=nom_article"><img src="Content/Images/tri.png" style="float: left">Article</a>
                    </th>
                    <th><a href="?controller=historique&action=ventes&tri=date_achat"><img src="Content/Images/tri.png" style="float: left">Date d'achat</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=ventes&tri=heure_achat"><img src="Content/Images/tri.png" style="float: left">Heure d'achat</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=ventes&tri=moyen_paiement"><img src="Content/Images/tri.png" style="float: left">Moyen de paiement</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=ventes&tri=prix"><img src="Content/Images/tri.png" style="float: left">Montant</a>
                    </th>
                </tr>


                <?php foreach ($data as $valeur) : ?>
                    <tr>
                        <td> <?= e($valeur['id_utilisateur']) ?> </td>
                        <td> <?= e($valeur['nom_article']) ?> </td>
                        <td> <?= e($valeur['date_achat']) ?> </td>
                        <td> <?= e($valeur['heure_achat']) ?> </td>
                        <td> <?= e($valeur['moyen_paiement']) ?> </td>
                        <td> <?= e($valeur['prix']) ?> </td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>
    </section>

<?php require_once "view_end.php"; ?>