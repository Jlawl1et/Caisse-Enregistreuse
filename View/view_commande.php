<?php require_once "view_header_membre.php" ?>

<style>
    .containerTest{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding-top:30px;
        padding-bottom: 30px;
        background-image: linear-gradient(to bottom, rgba(123,234,255,0.7), var(--vert_clair)), url("Content/Images/accueil.jpg");
    }

    .container1Test{
        overflow-y: scroll;
        width: 1000px;
        height: 400px;
        border: 1px solid black;
        background-image: linear-gradient(to bottom, rgba(123,234,255,0.8), var(--vert_clair)), url("../Images/accueil.jpg");
    }

    .container2Test{
        background: var(--bleu);
        width: 20%;
        display: flex;
        flex-direction: column;
        border: black 1px solid;
        border-radius: 3px;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .validation{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin: 15px 0;
        height: 40px;
    }
    .validation input{
        background-color: var(--bleu_fonce);
        color: white;
        font-size: 18px;
        border: 1px solid white;
        width: 100%;
        margin: 0;
    }

    .validation a{
        padding:  0;
    }

    .panier h4{
        text-align: center;
    }

    a{ text-decoration: none}
</style>

<div class="titre">
    <h1>Commande en cours</h1>
</div>

<div class="containerTest">
    <div class="container1Test">

        <div class="catalogue">
            <?php foreach($data as $val) : ?>
                <div class="produit" style="<?php if($val['nb_article'] == 0) { echo "display:none;"; } ?>" >
                    <img src= "<?= $val['image'] ?>" >
                    <p class="nom_prod"> <?= e($val['nom_article']); ?> </p>
                    <p class="prix_prod"><strong> <?= e($val['prix']) ?>€ </strong></p>
                    <a href="?controller=commande&action=ajouter_panier&article=<?= $val['id_article'] ?>"><input type="button" value="Ajouter au panier" name="<?php $val['nom_article'] ?>"></a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="container2Test">

        <div class="panier">
            <h3 style="text-align: center">Panier</h3>
            <?php
            if (isset($_SESSION['panier'])) {
                foreach($_SESSION['panier'] as $article) {
                    echo ("<h4>" .$article['nom_article'] ." (x" .$article['quantite']  .") - " .$article['prix'] ."€" ."  <a href='?controller=commande&action=retirer_panier&article=" .$article['id_article'] ."'>❌</a></h4>" );
                }
            }
            ?>
            <hr>
        </div>

        <div class="panier2">
            <form method="post" action="?controller=commande&action=validation">
                <h3 style="text-align: center">Réduction</h3>
                <br>
                <div class="reduc">
                    <label>Points : </label><input type="number" min="0" max="1000">
                </div>
                <br><hr>
                <h3 style="text-align: center;margin: 0">Total</h3>
                <div class="total">
                    <h4>Prix total :
                        <?php
                        $total = 0;
                        if (isset($_SESSION['panier'])) {
                            foreach ($_SESSION['panier'] as $val) {
                                $total += $val['prix'];
                            }
                        }
                        echo $total;
                        ?> €
                    </h4>
                </div>
                <br><hr>
                <div class="modePaiement">
                    <h3 style="text-align: center"> Mode de paiement :</h3>
                    <label style="display: flex;justify-content: center">
                        <input type="radio"  name="moyen_paiement" value="Espece"checked/> <label>Espèces</label>
                        <input type="radio" name="moyen_paiement" value="Carte Bleue"> <label>CB</label>
                </div>
                <br>
                <label style="display: flex;justify-content: center">Identifiant : <input type="text" name="id_utilisateur" value="NULL"></label>
        </div>
        <div class="validation">
            <a href="?controller=commande&action=validation"><input type="submit" value="Valider la commande"></a>
            <a href="?controller=commande&action=annulation"><input value="Annuler la commande" style="text-align: center"></a>
        </div>
        </form>
    </div>
</div>


</div>
<?php require_once 'view_end.php'?>
