<?php require_once "view_header_membre.php"; ?>

    <section class="accueil" id="accueil">
        <div class="historique">
            <table>
                <tr>
                    <th>Identifiant</th>
                    <th>Article</th>
                    <th>Date d'achat</th>
                    <th>Heure d'achat</th>
                    <th>Moyen de paiement</th>
                    <th>Montant</th>
                </tr>


                <?php foreach ($data as $valeur) : ?>
                    <tr>
                        <td> <?= e($valeur['id_utilisateur']) ?> </td>
                        <td> <?= e($valeur['nom_article']) ?> </td>
                        <td> <?= e($valeur['date_achat']) ?> </td>
                        <td> <?= e($valeur['heure_achat']) ?> </td>
                        <td> <?= e($valeur['moyen_payement']) ?> </td>
                        <td> <?= e($valeur['prix']) ?> </td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>
    </section>

<?php require_once "view_end.php"; ?>
