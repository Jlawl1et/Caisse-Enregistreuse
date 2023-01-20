<?php require_once "view_header_membre.php"; ?>

<section class="accueil" id="accueil">
    <h1>
        
    </h1>
    <div class="">
        <table class="tab_stock">
            <tr>
                <th>Article</th>
                <th>Quantité en stock</th>
            </tr>

            <?php foreach($data as $val) : ?>
            <tr>
                <td class="nom_article"> 
                    <a href="?controller=article&action=formulaire_modifier&id_article= <?= e($val['id_article']) ?>">
                        <img src= "Content/Images/no-image.png" > 
                        <p> <?= e($val['nom_article']) ?> </p>
                    </a>
                </td>
                <td class="qte_article"><?= e($val['nb_article']) ?></td>
            </tr>
             <?php endforeach ?>
        </table>
    </div>
</section>

<?php require_once "view_end.php"; ?>