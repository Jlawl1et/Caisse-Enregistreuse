<?php require_once "view_header_membre.php"; ?>

    <section class="accueil" id="accueil">
        <h1>

        </h1>
        <div class="">
            <table class="tab_stock">
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                </tr>

                <?php foreach($data as $val) : ?>
                    <tr>
                        <td> <a href="?controller=compte&action=formulaire_modifier&id_utilisateur=<?= e($val['id_utilisateur']) ?>"><img src="Content/Images/edit.png" style="width:13px; height:13px"></a> <?= e($val['id_utilisateur']) ?> </td>
                        <td> <?= e($val['nom']) ?> </td>
                        <td> <?= e($val['prenom']) ?> </td>
                        <td> <?= e($val['role']) ?> </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </section>

<?php require_once "view_end.php"; ?>
