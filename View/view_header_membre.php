<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Content/CSS/style.css">
    <link rel="shortcut icon" href="../Content/Images/Logo_bde">
    <title>BDE USPN</title>
</head>
<body>

<header>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="?controller=accueil&action_membre"><img src="../Content/Images/Logo_BDE_noir.png" alt="Logo BDE"></a>
        </div>
        <!-- Barre de navigation -->
        <nav>
            <ul class="navigation">
                <!-- Côté gauche de la barre de navigation -->
                <ul class="menuL">
                    <li style="padding-bottom: 2.6%">
                        <a href="?controller=accueil">Accueil</a>
                    </li>
                    <li>
                        <a>Commande</a>
                        <!-- Sous menu de commande -->
                        <ul>
                            <li><a href="?controller=commande&action=">Nouvelle Commande</a></li>
                            <li><a href="?controller=commande&action=">Retour Commande</a></li>
                        </ul>                        
                    </li>
                    <li>
                        <a>Inventaire</a>
                        <!-- Sous menu de inventaire -->
                        <ul>
                            <li><a href="?controller=article&action=">Stock/Réaprovisionnement</a></li>
                            <li><a href="?controller=article&action=">Ajout d'article</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>Comptabilité</a>
                        <!-- Sous menu de Comptabilité -->
                        <ul>
                            <li><a href="?controller=historique&action=ventes">Historique des ventes</a></li>
                            <li><a href="?controller=historique&action=bilan">Bilan</a></li>
                        </ul>
                    </li>
                    <li style="padding-bottom: 2.6%">
                        <a href="?">Gestion des comptes</a>
                    </li>
                </ul>
                <!-- Côté droit de la barre de navigation -->
                <ul class="menuR">
                    <li style="width : 20px"><a href=""><img src="../Content/Images/cloche.png"></a></li>
                    <li style="width : 20px"><a href=""><img src="../Content/Images/icone.png"></a></li>
                    <li style="width : 20px"><a href=""><img src="../Content/Images/drapeau" style="margin-bottom : 25%"></a></li>
                </ul>
            </ul>
        </nav>
    </div>
</header>