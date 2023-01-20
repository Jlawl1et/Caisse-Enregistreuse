<?php require_once "view_header_membre.php" ?>

<div class="titre">
    <h1>Commande en cours</h1>
</div>


<div class="container1">

<div class="bloc">

    <div class="scroll">

        <?php foreach($data as $val) : ?>

            <div class="produit">
                <img src="Content/Images/no-image.png" >
                <p class="nom_prod"> <?= e($val['nom_article']); ?> </p>
                <p class="prix_prod"><strong> <?= e($val['prix']) ?>€ </strong></p>

                <label for="q">Quantité: </label>
                <select id="quantite" name="q" class="qt">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                <input type="button" id="abc" value="Ajouter au panier"/>
            </div>

        <?php endforeach ?>
        
    </div>

</div>

<div class="container2">
    <div class="panier">
        <h3 class="categorie" id="titre-panier">Panier</h3>
        <hr>
    </div>

    <div class="tt">
        <h3 style="text-align: center">Réduction :</h3>
        <br>
        <div class="reduc">
            <label>Points : </label><input type="number" id="r" value="0" name="r" min="0" max="1000" />
        </div>
        <br/>
        <hr>
        <h3 style="text-align: center">Total</h3>
        <br>
        <div class="total">
            <p class="pt">Prix total :</p><p class="inserer">0</p><p>&euro;</p>
        </div>
        <br/>
        <hr>
        <div class="mode">
            <h3 style="text-align: center"> Mode de paiement :</h3>
            <div>
                <input type="radio" id="choix" value="mode1" name="mode" checked/> <label>CB</label>
                <input type="radio" id="choix" value="mode2" name="mode" /> <label>Espèces</label>
            </div>
        </div>

        <div class="valider">
            <input type="button" id="payer" value="Valider la commande"/>
            <input type="button" id="vider" value="Annuler commande"/>
        </div>

    </div>
</div>

</div>
</div>
<script src="Content/JS/script.js"></script>
</body>

<?php require_once 'view_end.php'?>
