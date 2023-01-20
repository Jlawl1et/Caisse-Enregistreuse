<?php require_once "view_header_membre.php" ?>

<section class="accueil" style="justify-content: center">
    <div class="form">
        <h1>Ajout d'un article</h1>
        <hr>
        <form action="?controller=article&action=ajouter_article" method="post">
            <br>
            <label> Nom de l'article :</label>
            <input class="input_form" type="text" name="nom_article">
            <br>

            <label>Prix :</label>
            <input class="input_form" type="text" name="prix">
            <br>

            <label>Informations du produit :</label>
            <textarea class="input_form" name="informations"></textarea>
            <br>

            <label>Catégorie :</label>
            <select class="input_form" name="categorie">
                <option value="">- Choisissez une catégorie -</option>
                <option value="snack">Snack</option>
                <option value="boisson">Boisson</option>
            </select>
            <br>

            <label>Stock initial :</label>
            <input class="input_form" type="number" name="nb_article" min="1" max="10000">
            <br>

            <div class="submit_modif">
                <input type="submit" value="Ajouter l'article">
            </div>
        </form>
    </div>
</section>

<?php require_once "view_end.php" ?>
