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
        <h1 style="text-align: center;margin-bottom: 0px;">CREATION DU COMPTE</h1>
        <h3 style="text-align: center;margin-bottom:0;color:#ff0000"> <?= e($data["message"]) ?> </h3>
        <form action="?controller=identification&action=signin" method="post" style="padding: 50px;text-align: center;">
            <label style="font-size: 25px;margin: 50px;">Identifiant :</label>
            <br>
            <input name="id_utilisateur" type="number" style="width: 300px;height: 30px;border-radius: 20px;margin-top: 5px;margin-bottom: 15px;padding: 0 10px 0 20px;font-size: 15px;">
            <br>
            <label style="font-size: 25px;margin: 50px;">Nom :</label>
            <br>
            <input name="nom" type="text" style="width: 300px;height: 30px;border-radius: 20px;margin-top: 5px;margin-bottom: 15px;padding: 0 10px 0 20px;font-size: 15px;">
            <br>
            <label style="font-size: 25px;margin: 50px;">Prénom :</label>
            <br>
            <input name="prenom" type="text" style="width: 300px;height: 30px;border-radius: 20px;margin-top: 5px;margin-bottom: 15px;padding: 0 10px 0 20px;font-size: 15px;">
            <br>
            <label style="font-size: 25px;margin: 50px;">E-mail :</label>
            <br>
            <input name="mail" type="email" style="width: 300px;height: 30px;border-radius: 20px;margin-top: 5px;margin-bottom: 15px;padding: 0 10px 0 20px;font-size: 15px;">
            <br>
            <label style="font-size: 25px;margin: 50px;">Mot de passe :</label>
            <br>
            <input name="mdp" type="password" style="width: 300px;height: 30px;border-radius: 20px;margin-top: 5px;margin-bottom: 15px;padding: 0 10px 0 20px;font-size: 15px;">
            <br>
            <input type="submit" value="CREER" name="submit" style="padding: 8px;margin: 10px;background-color: var(--bleu);border: 0;border-radius: 20px;width: 200px;"><br>

            <span>Déja un compte ? <a href="?controller=identification&action=login">Se connecter</a></span>
        </form>
    </div>
</section>
</body>

</html>