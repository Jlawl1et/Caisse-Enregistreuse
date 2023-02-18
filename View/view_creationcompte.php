<?php ?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/CSS/style.css">
    <link rel="shortcut icon" href="Content/Images/Logo_BDE_noir.png">
    <title>BDE USPN</title>
</head>
<body>

<div class="container" style="background-color: var(--bleu);display: flex;justify-content: center;height: 120px;position: relative;overflow:auto;">
    <div class="logo" id="logo_login">
        <img src="Content/Images/Logo_BDE_noir.png" alt="Logo BDE" style="height: 100px;width: 100px">
    </div>
</div>
<section class="accueil" style="justify-content: center;">
    <div style="background-color: var(--vert_clair);opacity: 0.95;padding: 20px;border-radius: 30px;width: 40%;">
        <form action="?controller=identification&action=signin" method="post" style="padding: 50px;text-align: center;">
            <label>Identifiant : <input name="identifiant" type="text"></label><br>
            <label>Nom : <input name="nom" type="text"></label><br>
            <label>Prenom : <input name="prenom" type="text"></label><br>
            <label>Mail : <input name="mail" type="email"></label><br>
            <label>Mot de passe : <input name="mdp" type="password"></label><br>
            <input type="submit" value="CREER">
        </form>
    </div>
</section>


</body>

</html>