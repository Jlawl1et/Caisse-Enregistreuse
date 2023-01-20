<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/CSS/style.css">
    <link rel="shortcut icon" href="Content/Images/Logo_bde">
    <title>BDE USPN</title>
</head>
<body>

<div class="container" id="container_login">
    <div class="logo" id="logo_login">
        <a href="?controller=accueil&action_membre">
            <img src="Content/Images/Logo_BDE_noir.png" alt="Logo BDE" style="height: 100px;width: 100px">
        </a>
    </div>
</div>


<section class="accueil" id="accueil_form">
    <div class="identification">
        <h1 class="login_title">CONNEXION</h1>
        <form action="" method="post" class="formulaire">
            <label>Identifiant :</label>
            <br>
            <input name="identifiant" type="number" class="input_login">
            <br>
            <label>Mot de passe :</label>
            <br>
            <input name="mdp" type="password" class="input_login">
            <br>
            <input type="submit" value="LOGIN" class="submit_login"><br>
            <span>Pas encore de compte ? <a href="?controller=identification&action=signin">Créer un compte</a></span>
        </form>
    </div>
</section>

<?php require_once "view_end.php" ?>