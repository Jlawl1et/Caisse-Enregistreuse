<?php require_once 'view_header_client.php'; ?>

    <section class="accueil" id="accueil">
        <div class="historique">
            <table class="tab_historique">
                <td colspan="6" style="text-align: center">
                    <strong>Total :
                        <?php
                        $total = 0;
                        foreach ($data as $val) {
                            $total += $val['montant'];
                        }
                        echo $total;
                        ?> €
                    </strong>
                    <strong> sur
                        <?php
                        $total = 0;
                        foreach ($data as $val) {
                            $total += $val['quantite'];
                        }
                        echo $total;
                        ?> articles achetés (
                    </strong>
                    <strong>
                        <?php
                        $espece = 0;
                        $cb = 0;
                        foreach ($data as $val){
                            if($val['moyen_paiement'] == "Espece") {
                                $espece += 1;
                            } else {
                                $cb += 1;
                            }
                        }
                        echo $espece ." en espèces et " .$cb ." par carte bleue )";
                        ?>
                    </strong>
                </td>
                <tr>
                    <th>
                        <a href="?controller=historique&action=client&tri=nom_article"><img src="Content/Images/tri.png" style="float: left">Article</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=client&tri=date_achat"><img src="Content/Images/tri.png" style="float: left">Date d'achat</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=client&tri=heure_achat"><img src="Content/Images/tri.png" style="float: left">Heure d'achat</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=client&tri=moyen_paiement"><img src="Content/Images/tri.png" style="float: left">Moyen de paiement</a>
                    </th>
                    <th>
                        <a href="?controller=historique&action=client&tri=prix"><img src="Content/Images/tri.png" style="float: left">Montant</a>
                    </th>
                </tr>

                <?php foreach ($data as $valeur) : ?>
                    <tr>
                        <td> <?= e($valeur['nom_article']) ." (x" .e($valeur['quantite']) .")"; ?> </td>
                        <td> <?= e($valeur['date_achat']) ?> </td>
                        <td> <?= e($valeur['heure_achat']) ?> </td>
                        <td> <?= e($valeur['moyen_paiement']) ?> </td>
                        <td> <?= e($valeur['montant']) ."€"?> </td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>
    </section>

<?php require_once 'view_end.php'; ?>