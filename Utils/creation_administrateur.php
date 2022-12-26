<?php

require_once "Model/Model.php";
$m = Model::getModel();

if (isset($_POST["identifiant"], $_POST["nom"] , $_POST["prenom"] , $_POST["mail"] , $_POST["mdp"] )){
    $identifiant = $_POST["identifiant"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $m->ajoutCompteAdministrateur($identifiant, $nom, $prenom, $mail, $mdp);
    header('Location:function.php');
}
