<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/CSS/style">
    <link rel="shortcut icon" href="Content/Images/Logo_bde">
    <title>BDE USPN</title>
</head>
<body>

<header>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href=""><img src="Content/Images/Logo_BDE_noir.png" alt="Logo BDE"></a>
        </div>
        <!-- Barre de navigation -->
        <nav>
            <ul class="navigation">
                <!-- Côté gauche de la barre de navigation -->
                <ul class="menuL">
                    <li style="padding-bottom: 2.6%">
                        <a href="?controller=accueil">Accueil</a>
                    </li>
                    <li style="padding-bottom: 2.6%">
                        <a href="?controller=historique&action=client">Mes Achats</a>
                    </li>
                    <li id="droite" style="padding-bottom: 2.6%" >
                        <a id="deco" href="?controller=identification&action=logout">Se déconnecter</a>
                    </li>
                </ul>
                <!-- Côté droit de la barre de navigation -->
                <ul class="menuR">
                    <li style="width : 20px"><a href=""><img src="Content/Images/cloche.png"></a></li>
                    <li style="width : 20px"><a href="?controller=compte"><img src="Content/Images/icone.png"></a></li>
                    <li style="width : 20px"><a href=""><img src="Content/Images/drapeau" style="margin-bottom : 25%"></a></li>
                </ul>
            </ul>
        </nav>
    </div>
</header>