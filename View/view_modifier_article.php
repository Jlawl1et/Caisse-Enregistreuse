<?php require 'view_header_membre.php'?>

    <section class="accueil" style="justify-content: center;">
        <div class="form">

            <h1> <a href="?controller=article"><img src="Content/Images/fleche.png" style="float: left"></a> Modifier l'article : <?= e($nom_article) ?></h1>
            <hr>
                <form action="?controller=article&action=modifier_article" method="post">
                    <br>
                    <label>Id article : <?= e($id_article) ?> </label>
                    <input type="hidden" name="id_article" value="<?= e($id_article) ?>">
                    <br>

                    <label>Nom de l'article:</label>
                    <input class="input_form" type="text" name="nom_article" value="<?= e($nom_article) ?>">
                    <br>

                    <label>Prix :</label>
                    <input class="input_form" type="text" name="prix" value="<?= e($prix) ?>"/>
                    <br>

                    <label>Informations du produit :</label>
                    <textarea class="input_form" name="informations" value=""><?= e($informations) ?></textarea>
                    <br>

                    <label>Catégorie :</label>
                    <select name="categorie" class="input_form">
                        <option value="<?= e($categorie); ?>">-Choisissez la catégorie-</option>
                        <option value="snack">Snack</option>
                        <option value="boisson">Boisson</option>
                    </select>
                    <br>

                    <label>Nouveau Stock :</label>
                    <input class="input_form" type="number" name="nb_article" min="0" max="10000" value="<?= e($nb_article) ?>">
                    <br>

                    <div class="submit_modif">
                        <input type="submit" value="Modifier l'article">
                    </div>

                </form>
            </div>
        </div>

    </section>

<?php require 'view_end.php'?>