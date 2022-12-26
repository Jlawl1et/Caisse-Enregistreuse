<!DOCTYPE html>
<html>
  <head>
    <style>
      body{
        margin: 0;
      }

      #wrap {
        width: 100%;
        height: 50px;
        margin: 0;
        z-index: 99;
        position: relative;
        background-color: rgb(226, 226, 226);
      }
      .navbar {
        height: 50px;
        padding: 0;
        margin: 0;

      }
      .navbar li {
        height: auto;
        width: 135.8px;
        float: left;
        text-align: center;
        list-style: none;
        font: normal bold 13px/1em Arial, Verdana, Helvetica;
        padding: 0;
        margin: 0;
        background-color: rgb(226, 226, 226);
      }
      .navbar a {
        padding: 18px 0;
        border-left: 1px solid #ccc9c9;
        text-decoration: none;
        color: white;
        display: block;
      }
      .navbar li:hover,
      a:hover {
        background-color: #444444;
      }
      .navbar li ul {
        display: none;
        height: auto;
        margin: 0;
        padding: 0;
      }
      .navbar li:hover ul {
        display: flex;
        flex-direction: column;
      }
      .navbar li ul li {
        background-color: #444444;
      }
      .navbar li ul li a {
        border-left: 1px solid #444444;
        border-right: 1px solid #444444;
        border-top: 1px solid #c9d4d8;
        border-bottom: 1px solid #444444;
      }
      .navbar li ul li a:hover {
        background-color: #a3a1a1;
      }
    </style>
  </head>
  <body>
    <div id="wrap">
      <ul class="navbar">
        <li>
          <a href="#">Acceuil</a>
        </li>
        <li>
          <a href="#">Commande</a>
          <ul>
            <li><a href="#">Nouvelle commande</a></li>
            <li><a href="#">Retour Commande</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Inventaire</a>
          <ul>
            <li><a href="">Stock/Réaprovisionnement</a></li>
            <li><a href="">Ajout d'article</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Comptabilité</a>
          <ul>
            <li><a href="">Historique des ventes</a></li>
            <li><a href="">Bilan</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Gestion des comptes</a>
        </li>
      </ul>
    </div>

    <h1>Salut sur le site akczecoizcizoczoiczoic</h1>
  </body>
</html>